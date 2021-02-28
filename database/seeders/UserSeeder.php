<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory(1)->hasWallet(1)->create([
            'name' => 'Javier',
            'surname' => 'Florido',
            'nick' => 'Administrador',
            'email' => 'jflorido94@hotmail.com',
            ]);
        User::factory(10) ->hasStocks(random_int(0,10))
                          ->hasSells(random_int(0,5))
                          ->hasWallet(1)
                          ->create();
    }
}
