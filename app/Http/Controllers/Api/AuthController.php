<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Traits\ApiResponse;
class AuthController extends Controller
{
    use ApiResponse;
    public function authControl(Request $request)
    {
        $device_uuid = $request->device_uuid;
        $device_name = $request->device_name;

        $user = User::firstOrNew(['device_uuid' => $device_uuid], [
            'device_uuid' => $device_uuid,
            'device_name' => $device_name
        ]);
        $user->save();

        return response()->json([
            'status' => 'success',
            'data' => $user
        ]);
        // return $this->successResponse(true, 'Register OK', (object) []);
    }
}
