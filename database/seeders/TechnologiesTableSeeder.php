<?php

namespace Database\Seeders;

use App\Models\Technology;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TechnologiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $technologies = [
            [
                'name' => 'Php',
            ],
            [
                'name' => 'Js',
            ],
            [
                'name' => 'Javascript',
            ],
            [
                'name' => 'Html',
            ],
            [
                'name' => 'C#',
            ],
            [
                'name' => 'Java',
            ],
            [
                'name' => 'C++',
            ],

        ];

      
        foreach($technologies as $technology){
            Technology::create($technology);
        }
    }
}
