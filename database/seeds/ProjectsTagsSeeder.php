<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class ProjectsTagsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$faker = Faker::create('fr_FR');

    	$ProjectsTags = [];

        for ($i=0; $i<10; $i++){
        	$ProjectsTags[$i] =  [
        		'name' => $faker->word()
        	];
        }

        DB::table('projects_tags')->insert($ProjectsTags);
    }
}
