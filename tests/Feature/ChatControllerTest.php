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
        // 1. Arrange 🏗
        $user = User::factory()->create();
        // 2. Act 🏋🏻‍
        $response = $this->actingAs($user)->getJson(route('api.chat.list'));
        // 3. Assert ✅
        $response->assertStatus(422);
    }

    public function test_chat_list_with_chats()
    {
        // 1. Arrange 🏗
        $user = User::factory()->create();
        Chat::factory()->count(3)->create(['user_id' => $user->id]);
        // 2. Act 🏋🏻‍
        $response = $this->actingAs($user)->getJson(route('api.chat.list'));
        // 3. Assert ✅
        $response->assertStatus(200);
        $this->assertCount(3, $response->json('data'));
    }

    public function test_chat_with_no_active_subscription()
    {
        // 1. Arrange 🏗
        $user = User::factory()->create(['subscription_status' => false]);
        // 2. Act 🏋🏻‍
        $response = $this->actingAs($user)->postJson(route('api.chat.send'), [
            'chatId' => 1,
            'message' => 'Hello',
        ]);
        // 3. Assert ✅
        $response->assertStatus(422);
    }

    public function test_chat_with_no_remaining_chat_credits()
    {
        // 1. Arrange 🏗
        $user = User::factory()->create(['subscription_status' => true]);
        $chat = Chat::factory()->create(['user_id' => $user->id]);
        $product = SubscriptionProduct::factory()->create();
        UserSubscription::factory()->create([
            'user_id' => $user->id,
            'product_id' => $product->id
        ]);
        $user->activeSubscription()->update(['chat_credit' => 0]);
        // 2. Act 🏋🏻‍
        $response = $this->actingAs($user)->postJson(route('api.chat.send'), [
            'chatId' => $chat->id,
            'message' => 'Hello',
        ]);
        // 3. Assert ✅
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
        // 1. Arrange 🏗
        $user = User::factory()->create(['subscription_status' => true]);
        $chat = Chat::factory()->create(['user_id' => $user->id]);
        $product = SubscriptionProduct::factory()->create();
        UserSubscription::factory()->create([
            'user_id' => $user->id,
            'product_id' => $product->id
        ]);
        $user->activeSubscription()->update(['chat_credit' => 5]);
        // 2. Act 🏋🏻‍
        $response = $this->actingAs($user)->postJson(route('api.chat.send'), [
            'chatId' => $chat->id,
            'message' => 'Hello',
        ]);
        // 3. Assert ✅
        $response->assertStatus(200);

        $this->assertDatabaseHas('messages', [
            'chat_id' => $chat->id,
            'user_message' => 'Hello',
        ]);
    }

}
