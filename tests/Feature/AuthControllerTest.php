<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use Illuminate\Support\Str;
class AuthControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    use RefreshDatabase;

    public function test_auth_control_success()
    {
        // 1. Arrange 🏗
        $deviceUuid = Str::uuid();
        $deviceName = 'Test Device';
        // 2. Act 🏋🏻‍
        $response = $this->postJson(route('api.auth'), [
            'device_uuid' => $deviceUuid,
            'device_name' => $deviceName,
        ]);

        // 3. Assert ✅
        $response->assertStatus(200);
        $user = User::where('device_uuid', $deviceUuid)->first();
        $this->assertNotNull($user);
    }
    public function test_auth_control_missing_device_uuid()
    {
        // 1. Arrange 🏗
        $deviceName = 'Test Device';

        // 2. Act 🏋🏻‍
        $response = $this->postJson(route('api.auth'), [
            'device_name' => $deviceName,
        ]);

        // 3. Assert ✅
        $response->assertStatus(422);
    }


}
