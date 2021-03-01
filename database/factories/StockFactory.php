<?php

namespace Database\Factories;

use App\Models\Stock;
use Illuminate\Database\Eloquent\Factories\Factory;
use \App\Models\Condition;

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
            'price' => $this->faker->randomNumber(rand(2, 4)),
            'condition_id' => function () {
                return Condition::all()->random()->id;
            },
        ];
    }
}
