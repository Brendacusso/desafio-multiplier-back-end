<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = ['waiter', 'cooker'];

        $faker = \Faker\Factory::create('pt_BR');
        for ($i=0; $i<10; $i++) {
            $number = rand(0,1);
            \DB::table('users')->insert([
                'email' => $faker->email,
                'password' => $faker->password,
                'role'=> $role[$number]
            ]);
        }
    }
}
