<?php

namespace Database\Factories;

use App\Models\Message;
use Illuminate\Database\Eloquent\Factories\Factory;
use \App\Models\User;

class MessageFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Message::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'description' => $this->faker->text,

            'to_user_id' => function () {
                return User::all()->random()->id;
            },
            'from_user_id' => function () {
                return User::all()->random()->id;
            },

            'read' => $this->faker->boolean(25),

        ];
    }
}
