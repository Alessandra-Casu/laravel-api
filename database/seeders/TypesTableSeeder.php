<?php

namespace Database\Seeders;

use App\Models\Type;
use Faker\Generator as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $types = [
            [
                'name'  => 'back-end',
                'description' =>$faker->words(rand(20, 50), true),
            ],
            [
                'name'  => 'front-end',
                'description' =>$faker->words(rand(20, 50), true),
            ],

        ];

        foreach($types as $type){
            Type::create($type);
        }
        
    }
}
