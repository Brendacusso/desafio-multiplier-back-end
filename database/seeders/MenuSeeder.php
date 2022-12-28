<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create('pt_BR');
        for($i=0; $i<50; $i++) {
            \DB::table('menu')->insert([
                'name'=> 'Prato '. $faker->word,
            ]);
        }
    }
}
