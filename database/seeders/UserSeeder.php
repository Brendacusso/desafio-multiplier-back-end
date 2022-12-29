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
        $role_array = ['waiter', 'cooker'];

        $faker = \Faker\Factory::create('pt_BR');
        for ($i=0; $i<10; $i++) {
            if($i<5) {
                $number = 0;
            } else {
                $number = rand(0,1);
            }

            if($i == 0) {
                $email = 'usuario@restaurant.com';
                $password = '123456@';
                $role = 'waiter';
            } else {
                $number = rand(0,1);

                $email = $faker->email;
                $password = $faker->password;
                $role = $role_array[$number];
            }

            \DB::table('users')->insert([
                'email' => $email,
                'password' => $password,
                'role'=> $role
            ]);

        }
    }
}
