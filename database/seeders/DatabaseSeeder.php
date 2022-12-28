<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        $this->call(UserSeeder::class);
        $this->call(MenuSeeder::class);
        $this->call(CustomerSeeder::class);
        $this->call(Table::class);
        $this->call(OrderSeeder::class);

    }
}
