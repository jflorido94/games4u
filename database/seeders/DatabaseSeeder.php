<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            ConditionSeeder::class,
            UserSeeder::class,
            MessageSeeder::class,
            SellSeeder::class,
            StockSeeder::class
        ]);
    }
}
