<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContractsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contracts', function(Blueprint $table) {
            $table->increments('id');
            $table->timestamps();

            $table->integer('investor_id')->unsigned()->nullable();
            // $table->foreign('investor_id')->references('id')->on('users');
            $table->integer('project_id')->unsigned()->nullable();
            // $table->foreign('project_id')->references('id')->on('projects');

            $table->integer('amount');
        });

        Schema::table('contracts', function(Blueprint $table){
            $table->foreign('investor_id')->references('id')->on('users');
            $table->foreign('project_id')->references('id')->on('projects');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('contracts');
    }
}
