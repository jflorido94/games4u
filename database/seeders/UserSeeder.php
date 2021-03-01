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
        User::factory()->hasWallet()->create([
            'name' => 'Javier',
            'surname' => 'Florido',
            'nick' => 'Administrador',
            'admin' => true,
            'email' => 'jflorido94@hotmail.com',
            ]);
        User::factory(10)
            ->hasStocks(random_int(0,10))
            ->hasSells(random_int(0,5))
            ->hasWallet()
            ->create();
    }
}
