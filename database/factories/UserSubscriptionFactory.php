<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\UserSubscription;
use App\Models\SubscriptionProduct;
use App\Models\User;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\UserSubscription>
 */
class UserSubscriptionFactory extends Factory
{
    protected $model = UserSubscription::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $startDate = $this->faker->dateTimeBetween('-1 year', 'now');
        $endDate = $this->faker->dateTimeBetween($startDate, '+1 year');

        return [
            'user_id' => function () {
                return User::factory()->create()->id;
            },
            'product_id' => function () {
                return SubscriptionProduct::factory()->create()->id;
            },
            'chat_credit' => $this->faker->numberBetween(0, 100),
            'start_date' => $startDate,
            'end_date' => $endDate,
            'status' => $this->faker->boolean(true),
        ];
    }
}
