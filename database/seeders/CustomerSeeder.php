<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create('pt_BR');
        for ($i=0; $i<400; $i++) {
            \DB::table('customers')->insert([
                'name' => $faker->name,
                'CPF' => $faker->cpf,
            ]);
        }
    }
}
