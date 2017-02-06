<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $this->call(UsersTableSeeder::class);
         $this->call(ProjectsCategoriesSeeder::class);
         $this->call(ProjectsTagsSeeder::class);
         $this->call(ProjectsSeeder::class);
         $this->call(ContractsSeeder::class);
    }
}
