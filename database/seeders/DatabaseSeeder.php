<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();
        User::create([
            'device_uuid' => Str::uuid(),
            'name' =>  'Admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('password'),
            'device_name' => 'Web Browser',
            'is_admin' => true,
        ]);
        $this->call([
            SubscriptionProductSeeder::class,
            // UserSubscriptionSeeder::class, gerek yok şuan
        ]);
    }
}
