<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\SubscriptionProduct;

class SubscriptionProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        SubscriptionProduct::create([
            'name' => 'Basic',
            'chat_limit' => 100,
            'price' => 29.99,
        ]);

        SubscriptionProduct::create([
            'name' => 'Pro',
            'chat_limit' => 500,
            'price' => 59.99,
        ]);
    }
}
