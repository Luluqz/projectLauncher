<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class ProjectsCategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$faker = Faker::create('fr_FR');

    	$ProjectsCategories = [];
        $categories = ['Art','BD','Artisanat','Danse','Design','Mode','Cinéma et vidéo','Gastronomie','Jeux','Journalisme','Musique','Photographie','Edition','Technologie','Théâtre'];

        for ($i=0; $i<15; $i++){
        	$ProjectsCategories[$i] =  [
        		'name' => $categories[$i]
        	];
        }

        DB::table('projects_categories')->insert($ProjectsCategories);
    }
}
