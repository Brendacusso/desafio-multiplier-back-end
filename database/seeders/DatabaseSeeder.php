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
        $menu = $this->call(MenuSeeder::class);
        $customer = $this->call(CustomerSeeder::class);
        $tables = $this->call(TableSeeder::class);

        if($menu && $customer && $tables) {
            $this->call(OrderSeeder::class);
        }


    }
}
