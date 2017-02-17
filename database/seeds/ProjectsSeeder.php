<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class ProjectsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$faker = Faker::create('fr_FR');

    	$etat = ['waiting' , 'in_progress', 'blocked', 'dropped', 'finished'];

        DB::table('projects')->insert([[
        	'created_at' => $faker->dateTimeBetween($startDate = 'now', $endDate = 'now'),
        	'creator_id' => 1,
        	'title' => $faker->text($maxNbChars = 40),
        	'category_id' => rand(1,10),
        	'tag_id' => rand(1,10),
        	'description' => $faker->text($maxNbChars = 200),
        	'img_path' => '/foo/bar/img.jpg',
        	'project_cost' => rand(10000,100000),
        	'etat' => $etat[rand(0,4)],
        	'project_endline' => $faker->dateTimeBetween($startDate = 'now', $endDate = '+2 months'), 
            'toTop' => $faker->numberBetween(0,1),
        ],[
        	'created_at' => $faker->dateTimeBetween($startDate = 'now', $endDate = 'now'),
        	'creator_id' => 1,
        	'title' => $faker->text($maxNbChars = 40),
        	'category_id' => rand(1,10),
        	'tag_id' => rand(1,10),
        	'description' => $faker->text($maxNbChars = 200),
        	'img_path' => '/foo/bar/img2.jpg',
        	'project_cost' => rand(10000,100000),
        	'etat' => $etat[rand(0,4)],
        	'project_endline' => $faker->dateTimeBetween($startDate = 'now', $endDate = '+2 months'), 
            'toTop' => $faker->numberBetween(0,1),        
        ],[
        	'created_at' => $faker->dateTimeBetween($startDate = 'now', $endDate = 'now'),
        	'creator_id' => 1,
        	'title' => $faker->text($maxNbChars = 40),
        	'category_id' => rand(1,10),
        	'tag_id' => rand(1,10),
        	'description' => $faker->text($maxNbChars = 200),
        	'img_path' => '/foo/bar/img2.jpg',
        	'project_cost' => rand(10000,100000),
        	'etat' => $etat[rand(0,4)],
        	'project_endline' => $faker->dateTimeBetween($startDate = 'now', $endDate = '+2 months'),
            'toTop' => $faker->numberBetween(0,1),         
        ],[
        	'created_at' => $faker->dateTimeBetween($startDate = 'now', $endDate = 'now'),
        	'creator_id' => 2,
        	'title' => $faker->text($maxNbChars = 40),
        	'category_id' => rand(1,10),
        	'tag_id' => rand(1,10),
        	'description' => $faker->text($maxNbChars = 200),
        	'img_path' => '/foo/bar/img3.jpg',
        	'project_cost' => rand(10000,100000),
        	'etat' => $etat[rand(0,4)],
        	'project_endline' => $faker->dateTimeBetween($startDate = 'now', $endDate = '+2 months'), 
            'toTop' => $faker->numberBetween(0,1),        
        ],[
        	'created_at' => $faker->dateTimeBetween($startDate = 'now', $endDate = 'now'),
        	'creator_id' => 3,
        	'title' => $faker->text($maxNbChars = 40),
        	'category_id' => rand(1,10),
        	'tag_id' => rand(1,10),
        	'description' => $faker->text($maxNbChars = 200),
        	'img_path' => '/foo/bar/img3.jpg',
        	'project_cost' => rand(10000,100000),
        	'etat' => $etat[rand(0,4)],
        	'project_endline' => $faker->dateTimeBetween($startDate = 'now', $endDate = '+2 months'), 
            'toTop' => $faker->numberBetween(0,1),       
        ]
        
        ]);

        $projects = [];
        for($i=0; $i < 140; $i++){
            $projects[$i] = [
                'created_at' => $faker->dateTimeBetween($startDate = 'now', $endDate = 'now'),
                'creator_id' => rand(1,75),
                'title' => $faker->text($maxNbChars = 40),
                'category_id' => rand(1,15),
                'tag_id' => rand(1,10),
                'description' => $faker->text($maxNbChars = 700),
                'img_path' => $faker->slug(),
                'project_cost' => rand(1000,100000),
                'etat' => $etat[rand(0,4)],
                'project_endline' => $faker->dateTimeBetween($startDate = 'now', $endDate = '+2 months'), 
                'toTop' => $faker->randomElement($array = array (0,0,1)),             
            ];
        }

        DB::table('projects')->insert($projects);

    }
}
