<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Traits\ApiResponse;
use App\Models\User;
use App\Models\SubscriptionProduct;
use App\Models\UserSubscription;
use App\Http\Requests\PurchaseRequest;
use App\Http\Resources\SubscriptionResource;
class SubscriptionController extends Controller
{
    use ApiResponse;

    public function purchase(PurchaseRequest $request)
    {
        $user = auth()->user();
        $validatedData = $request->validated();
        if ($user->subscription_status) {
            return $this->errorResponse(false, 'User already has an active subscription. If you want to continue, please visit the subscription change page.', ['subscription_status' => 'negative'] , 200);
        }
        if (!$this->validateReceipt($validatedData['receiptToken'])) { //Son gelen değer çift ise true tek ise false.
            return $this->errorResponse(false, 'Invalid receipt token', ['subscription_status' => 'negative']);
        }
        $product = SubscriptionProduct::findOrFail($validatedData['productId']);
        UserSubscription::Create(
            [
                'user_id' => $user->id,
                'product_id' => $product->id,
                'chat_credit' => $product->chat_limit,
                'start_date' => now(),
                'end_date' => now()->addMonths($product->duration),
                'status' => true,
            ]
        );
        $user->update(['subscription_status' => true]);

        return $this->successResponse(true, 'Subscription purchased successfully.', ['subscription_status' => 'positive']);
    }
    private function validateReceipt(string $receiptToken): bool
    {
        $lastCharacter = substr($receiptToken, -1);
        if (is_numeric($lastCharacter)) {
            return $lastCharacter % 2 == 0;
        }
        return false;
    }

    public function info()
    {
        $user = auth()->user();
        $subscriptions = $user->subscriptions()->with('product')->get();
        if ($subscriptions->isEmpty()) {
            return $this->errorResponse(false, 'User does not have an active subscription.',  $subscriptions);
        }
        return $this->successResponse(true, 'Subscription information retrieved successfully.', SubscriptionResource::collection($subscriptions));
    }


}
