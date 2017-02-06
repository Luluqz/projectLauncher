<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$faker = Faker::create('fr_FR');

        DB::table('users')->insert([[
        	'name' => $faker->lastName(),
        	'firstname' => $faker->firstName(),
        	'birthday' => $faker->dateTime($max = 'now'),
        	'city' => $faker->city,
        	'CP' => '31000',
        	'address' => $faker->address(),
        	'phone' => '0631313131',
        	'avatar_path' => '/foo/bar/img.jpg',
        	'email' => 'admin@admin.com',
        	'password' => bcrypt('admin'),
        // 	'secret_q' => 'bool ?',
        // 	'secret_r' => 'true',
        	'role' => 0
            ],[
        	'name' => $faker->lastName(),
        	'firstname' => $faker->firstName(),
        	'birthday' => $faker->dateTime($max = 'now'),
        	'city' =>  $faker->city,
        	'CP' => '31100',
        	'address' => $faker->address(),
        	'phone' => '0631313131',
        	'avatar_path' => '/foo/bar/img.jpg',
        	'email' => 'creator@creator.com',
        	'password' => bcrypt('creator'),
        // 	'secret_q' => 'bool ?',
        // 	'secret_r' => 'true',
        	'role' => 1
            ],[
        	'name' => $faker->lastName(),
        	'firstname' => $faker->firstName(),
        	'birthday' => $faker->dateTime($max = 'now'),
        	'city' =>  $faker->city,
        	'CP' => '31200',
        	'address' => $faker->address(),
        	'phone' => '0631313131',
        	'avatar_path' => '/foo/bar/img.jpg',
        	'email' => 'investor@investor.com',
        	'password' => bcrypt('investor'),
        // 	'secret_q' => 'bool ?',
        // 	'secret_r' => 'true',
        	'role' => 2           
        	],[
        	'name' => $faker->lastName(),
        	'firstname' => $faker->firstName(),
        	'birthday' => $faker->dateTime($max = 'now'),
        	'city' =>  $faker->city,
        	'CP' => '31210',
        	'address' => $faker->address(),
        	'phone' => '0631313131',
        	'avatar_path' => '/foo/bar/img4.jpg',
        	'email' => 'investor2@investor.com',
        	'password' => bcrypt('investor'),
        // 	'secret_q' => 'bool ?',
        // 	'secret_r' => 'true',
        	'role' => 2            ]
        ]);

        $creators = [];
        for($i=0; $i < 50; $i++){
            $creators[$i] = [
                'name' => $faker->lastName(),
                'firstname' => $faker->firstName(),
                'birthday' => $faker->dateTime($max = 'now'),
                'city' =>  $faker->city,
                'CP' => rand(10000,95000),
                'address' => $faker->address(),
                'phone' => $faker->phoneNumber(),
                'avatar_path' => $faker->slug(),
                'email' => $faker->email(),
                'password' => bcrypt('creator'),
                'role' => 1              
            ];
        }

        $investors = [];
        for($i=0; $i < 300; $i++){
            $investors[$i] = [
                'name' => $faker->lastName(),
                'firstname' => $faker->firstName(),
                'birthday' => $faker->dateTime($max = 'now'),
                'city' =>  $faker->city,
                'CP' => rand(10000,95000),
                'address' => $faker->address(),
                'phone' => $faker->phoneNumber(),
                'avatar_path' => $faker->slug(),
                'email' => $faker->email(),
                'password' => bcrypt('investor'),
                'role' => 2              
            ];
        }

        DB::table('users')->insert($creators);
        DB::table('users')->insert($investors);

    }
}
