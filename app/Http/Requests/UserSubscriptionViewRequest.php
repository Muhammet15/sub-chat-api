<?php

namespace App\Http\Requests;

use App\Traits\ApiResponse;
use Illuminate\Foundation\Http\FormRequest;
use App\Models\UserSubscription;
class UserSubscriptionViewRequest extends FormRequest
{
    use ApiResponse;
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        $user = $this->user();
        if ($user->subscriptions->isEmpty()) {
            $this->errorResponse(false, 'User does not have any subscriptions.', [], 422);
            return true;
        }
        return $this->user()->can('view', $this->user()->subscriptions->first());
    }


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            //
        ];
    }
}
