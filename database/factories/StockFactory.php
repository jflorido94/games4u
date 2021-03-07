<?php

namespace Database\Factories;

use App\Models\Stock;
use Illuminate\Database\Eloquent\Factories\Factory;
use \App\Models\Condition;
use App\Models\Sell;
use App\Models\User;

class StockFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Stock::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'game_id' => $this->faker->numberBetween(3498,10000),
            'user_id' => function () {
                return User::all()->random()->id;
            },
            'price' => $this->faker->randomFloat(2,2,50),
            'condition_id' => function () {
                return Condition::all()->random()->id;
            },
            'sell_id' => function () {
                if ($this->faker->boolean(60)) {
                    return null;
                } else {
                    return Sell::all()->random()->id;
                }
            },
        ];
    }
}
