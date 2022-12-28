<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create('pt_BR');
        $status = ['to do', 'on progress'];

        for($i=0; $i<10; $i++) {

            $number = rand(0,1);

            \DB::table('orders')->insert([
                'table' =>  rand(1,10),
                'customer' => rand(1,20),
                'waiter' => rand(1,4),
                'status' => $status[$number],
                'ordered_at' => $faker->dateTimeBetween('-1 year', '-1 day')
            ]);

            \DB::table('orders_items')->insert([
                'order_id' =>  rand(3,6),
                'order_item' => rand(1,6),
            ]);
        }
    }
}
