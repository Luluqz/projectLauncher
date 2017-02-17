<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Faker\Factory as Faker;

class ContractsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $faker = Faker::create('fr_FR');
        
        DB::table('contracts')->insert([
            [
        	'created_at' => $faker->dateTimeBetween($startDate = '-2 month', $endDate = 'now'),
        	'investor_id' => 2,
        	'project_id' => 1,
        	'amount' => rand(10,100),
        	],[
        	'created_at' => $faker->dateTimeBetween($startDate = '-2 month', $endDate = 'now'),
        	'investor_id' => 2,
        	'project_id' => 5,
        	'amount' => rand(10,100),
        	],[
        	'created_at' => $faker->dateTimeBetween($startDate = '-2 month', $endDate = 'now'),
        	'investor_id' => 4,
        	'project_id' => 5,
        	'amount' => rand(10,100),
        	]
        ]);

        $contracts = [];
        for($i=0; $i < 650; $i++){
            $contracts[$i] = [
                'created_at' => $faker->dateTimeBetween($startDate = '-2 month', $endDate = 'now'),
                'investor_id' => rand(85,440),
                'project_id' => rand(6,125),
                'amount' => rand(100,7050),             
            ];
        }

        DB::table('contracts')->insert($contracts);

    }
}