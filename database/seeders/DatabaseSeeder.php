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
            UserSeeder::class,
            MessageSeeder::class,
            WalletSeeder::class,
            ConditionSeeder::class,
            StockSeeder::class,
            SellSeeder::class
        ]);
    }
}
