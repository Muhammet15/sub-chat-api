<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\SubscriptionProduct;
use App\Models\UserSubscription;

class SubscriptionControllerTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    public function test_purchase_subscription_successfully()
    {
        // 1. Arrange 🏗
        $user =  User::factory()->create();
        $product = SubscriptionProduct::factory()->create();
        // 2. Act 🏋🏻‍
        $response = $this->actingAs($user)
                         ->postJson(route('api.subscription.purchase'), [
                             'productId' => $product->id,
                             'receiptToken' => '6146ccf6a66d994f7c363db875e31ca35581450a4bf6d3be6cc9ac79233a6920' //.ift hane
                         ]);
        // 3. Assert ✅
        $response->assertStatus(200)
             ->assertJson([
                 'status' => true,
                 'code' => 200,
                 'message' => 'Subscription purchased successfully.',
                 'data' => [
                     'subscription_status' => 'positive'
                 ]
             ]);
    }
    public function test_purchase_subscription_receipt_error()
    {
        // 1. Arrange 🏗
        $user =  User::factory()->create();
        $product = SubscriptionProduct::factory()->create();

        // 2. Act 🏋🏻‍
        $response = $this->actingAs($user)
                         ->postJson(route('api.subscription.purchase'), [
                             'productId' => $product->id,
                             'receiptToken' => '6146ccf6a66d994f7c363db875e31ca35581450a4bf6d3be6cc9ac79233a6921' //tek hane
                         ]);

        // 3. Assert ✅
        $response->assertStatus(422);

        // 2. Act 🏋🏻‍
        $response = $this->actingAs($user)
                         ->postJson(route('api.subscription.purchase'), [
                             'productId' => $product->id,
                             'receiptToken' => '6146ccf6a66d994f7c363db875e31ca35581450a4bf6d3be6cc9ac79233a6921A' //string hane
                         ]);

        // 3. Assert ✅
        $response->assertStatus(422);
    }

    public function test_purchase_subscription_with_existing_subscription_failure()
    {
        // 1. Arrange 🏗
        $user = User::factory()->create();
        $product = SubscriptionProduct::factory()->create();
        UserSubscription::factory()->create([
            'user_id' => $user->id,
            'product_id' => $product->id
        ]);
        // 2. Act 🏋🏻‍
        $response = $this->actingAs($user)
                         ->postJson(route('api.subscription.purchase'), [
                             'productId' => $product->id,
                             'receiptToken' => '6146ccf6a66d994f7c363db875e31ca35581450a4bf6d3be6cc9ac79233a6920'
                         ]);
        // 3. Assert ✅
        $response->assertStatus(422);
    }
    public function test_user_can_see_info_plan()
    {
       // 1. Arrange 🏗
        $user = User::factory()->create();
        UserSubscription::factory()->create(['user_id' => $user->id]);

          // 2. Act 🏋🏻‍
        $response = $this->actingAs($user)->getJson(route('api.subscription.info'));

        // Doğru yanıtı kontrol et
        $response->assertStatus(200);
    }
    public function test_user_can_not_see_info_plan_for_other_user()
    {
       // 1. Arrange 🏗
        $user = User::factory()->create();
        $anotherUser = User::factory()->create();

        UserSubscription::factory()->create(['user_id' => $user->id]);

          // 2. Act 🏋🏻‍
        $response = $this->actingAs($anotherUser)->getJson(route('api.subscription.info'));

         // 3. Assert ✅
        $response->assertStatus(422);
    }

}
