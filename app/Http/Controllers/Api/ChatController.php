<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Traits\ApiResponse;
use App\Models\Chat;
use App\Http\Requests\ChatRequest;
use App\Http\Resources\ChatResource;
use Illuminate\Support\Arr;
class ChatController extends Controller
{
    use ApiResponse;
    public function chatList()
    {
        $user = auth()->user();
        $chats = $user->chats()->with(['messages' => function ($query) {
            $query->orderByDesc('created_at')->take(5);
        }])->get();
        if ($chats->isEmpty()) {
            return $this->successResponse(true, 'User does not have any chat.', [] , 200 );
        }
        return $this->successResponse(true, 'Chat information retrieved successfully.', ChatResource::collection($chats));
    }
    public function chat(ChatRequest $request)
    {
        $user = auth()->user();
        if ($user && $user->subscription_status) {
            if ($user->activeSubscription()->chat_credit <= 0) {
                return $this->errorResponse(true, 'You have no remaining chat credits. Please purchase a subscription to continue chatting.');
            }
            $chat = Chat::where('id', $request->chatId)->first();
            if (!$chat) {
                $user->chats()->where('is_active', true)->update(['is_active' => false]);
                $chat = Chat::create([
                    'user_id' => $user->id,
                    'name' => $request->message,
                    'code' => uniqid(),
                    'is_active' => true,
                ]);
            }
            $botResponse = $this->botMessage();
            $chat->messages()->create([
                'user_message' => $request->message,
                'bot_reply' => $botResponse,
            ]);
            $user->activeSubscription()->decrement('chat_credit');
            return $this->successResponse(true, 'Chat information retrieved successfully.', ['botResponse' =>$botResponse]);
        } else {
            return $this->errorResponse(false, 'User does not have an active subscription.');
        }
    }
    public function botMessage()
    {
        $sentences = [
            "This is a sample response from the bot.",
            "Hello! How can I assist you today?",
            "What can I do for you?",
            "How may I help you?",
            "Is there anything I can help you with?",
            "Feel free to ask me anything!",
            "I'm here to assist you.",
            "Let me know if you have any questions.",
        ];
        $randomSentence = Arr::random($sentences);
        return $randomSentence;
    }
}
