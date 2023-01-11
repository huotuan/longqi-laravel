<?php

namespace Database\Factories;

use App\Models\Order;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    protected $model=Order::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id'=>mt_rand(1, 3),
            'status'=>mt_rand(1, 3),
            'order_sn'=>$this->faker->uuid,
            'store_id'=>mt_rand(1, 2),
            'title' => $this->faker->title,
            'password' => md5($this->faker->title),
            'mobile' => $this->faker->phoneNumber,
            'total' => mt_rand(100,999999),
            'snapshot' => ['product_id'=>mt_rand(111111,999999),'sku'=>$this->faker->randomLetter],
            'options' => ['option_id'=>mt_rand(111111,999999),'title'=>$this->faker->title],
        ];
    }
}
