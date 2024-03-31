<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;
use App\Models\Chat;
use App\Models\SubscriptionProduct;
use App\Models\UserSubscription;

class ChatControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_chat_list_with_empty_chats()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->getJson(route('api.chat.list'));

        $response->assertStatus(422);
    }

    public function test_chat_list_with_chats()
    {
        $user = User::factory()->create();
        Chat::factory()->count(3)->create(['user_id' => $user->id]);

        $response = $this->actingAs($user)->getJson(route('api.chat.list'));

        $response->assertStatus(200);
        $this->assertCount(3, $response->json('data'));
    }

    public function test_chat_with_no_active_subscription()
    {
        $user = User::factory()->create(['subscription_status' => false]);

        $response = $this->actingAs($user)->postJson(route('api.chat.send'), [
            'chatId' => 1,
            'message' => 'Hello',
        ]);

        $response->assertStatus(422);
    }

    public function test_chat_with_no_remaining_chat_credits()
    {
        $user = User::factory()->create(['subscription_status' => true]);
        $chat = Chat::factory()->create(['user_id' => $user->id]);
        $product = SubscriptionProduct::factory()->create();
        UserSubscription::factory()->create([
            'user_id' => $user->id,
            'product_id' => $product->id
        ]);
        $user->activeSubscription()->update(['chat_credit' => 0]);

        $response = $this->actingAs($user)->postJson(route('api.chat.send'), [
            'chatId' => $chat->id,
            'message' => 'Hello',
        ]);

        $response->assertStatus(422)
        ->assertJson([
            'status' => false,
            'code' => 422,
            'message' => 'You have no remaining chat credits. Please purchase a subscription to continue chatting.',
            'data' => []
        ]);
    }

    public function test_chat_with_valid_data()
    {
        $user = User::factory()->create(['subscription_status' => true]);
        $chat = Chat::factory()->create(['user_id' => $user->id]);
        $product = SubscriptionProduct::factory()->create();
        UserSubscription::factory()->create([
            'user_id' => $user->id,
            'product_id' => $product->id
        ]);
        $user->activeSubscription()->update(['chat_credit' => 5]);

        $response = $this->actingAs($user)->postJson(route('api.chat.send'), [
            'chatId' => $chat->id,
            'message' => 'Hello',
        ]);

        $response->assertStatus(200);

        $this->assertDatabaseHas('messages', [
            'chat_id' => $chat->id,
            'user_message' => 'Hello',
        ]);
    }

}
