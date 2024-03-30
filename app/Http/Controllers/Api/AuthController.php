<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\AuthRequest;
use App\Models\User;
use App\Traits\ApiResponse;
use App\Http\Resources\AuthResource;
class AuthController extends Controller
{
    use ApiResponse;
    public function authControl(AuthRequest $request)
    {
        $validatedData = $request->validated();
        $user = User::firstOrNew(['device_uuid' => $validatedData['device_uuid']], $validatedData);
        $user->save();
        return $this->successResponse(true, 'User device information processed successfully.',
        [
            'user_info'=>AuthResource::make($user),
            'client_token'=>$user->createToken('client_token')->plainTextToken,
        ]);
    }
}
