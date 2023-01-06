<?php

namespace Database\Factories;

use App\Models\Order;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    protected $model = Order::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id'=>mt_rand(1, 3),
            'store_id'=>mt_rand(1, 2),
            'status'=>mt_rand(0, 2),
            'total'=>mt_rand(1, 99999),
            'order_sn'=>$this->faker->uuid,
            'password'=>$this->faker->md5,
            'snapshot'=>[$this->faker->title,$this->faker->phoneNumber],
            'options'=>[$this->faker->title,$this->faker->phoneNumber],
        ];
    }
}
