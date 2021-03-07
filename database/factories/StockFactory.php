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
        $juegos = [
            3498, 4200, 3328, 5286, 5679, 12020, 802, 13536, 4062, 3439, 4291, 4286, 13537, 1030, 28, 11859, 2454, 3070, 3939,
            4459, 3272, 32, 58175, 10213, 3192, 23027, 278, 766, 7689, 19103, 422, 29028, 16944, 3287, 10035, 11973, 11973, 4427, 4252, 2462
        ];

        $plataformas = [1,4,7,14,18,186,187];

        return [
            'game_id' => $this->faker->randomElement($juegos),
            'user_id' => function () {
                return User::all()->random()->id;
            },
            'platform_id' => $this->faker->randomElement($plataformas) ,
            'price' => $this->faker->randomFloat(2, 2, 50),
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
