<?php

namespace Database\Seeders;
use App\Models\Type;
use App\Models\Project;
use App\Models\Category;
use App\Models\Technology;
use Faker\Generator as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProjectsTableSeeder extends Seeder
{
    /**
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $types = TYpe::all();
        $categories = Category::all();
        $technologies = Technology::all()->pluck('id');
        for ($i = 0; $i < 50; $i++)
        {
         
            $project = Project::create([
                'type_id'     =>$faker->randomElement($types)->id,
                'category_id' => $faker->randomElement($categories)->id,
                'title'       => $faker->words(rand(2, 10), true),
                'url_image'   =>'https://picsum.photos/id/'. rand(1, 270) . '/500/400',
                'content'     => $faker->paragraphs(rand(2, 20), true),
            ]);

            //associare il progetto ad un certo numero di tecnologie

            $project->technologies()->sync($faker->randomElements($technologies, null));
        }

      
    }
}