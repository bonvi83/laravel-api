<?php

namespace Database\Seeders;

use App\Models\Technology;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class TechnologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $technologies = ['Git', 'HTML5', 'CSS3', 'Javascript Plain', 'Vue.js3', 'Vite', 'MySql', 'PHP', 'NPM', 'Laravel', 'e tanto altro'];
        foreach ($technologies as $technology) {
            $technology = new Technology();
            $technology->technology = $technology;
            $technology->save();
        }
    }
};