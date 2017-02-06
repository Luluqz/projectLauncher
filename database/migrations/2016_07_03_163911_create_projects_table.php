<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function(Blueprint $table) {
            $table->increments('id');
            $table->timestamps();

            $table->integer('creator_id')->unsigned()->nullable();
            // $table->foreign('creator_id')->references('id')->on('users');
            $table->string('title', 100);
            $table->integer('category_id')->unsigned()->nullable();
            // $table->foreign('category_id')->references('id')->on('projects_categories');
            $table->integer('tag_id')->unsigned()->nullable();
            // $table->foreign('tag_id')->references('id')->on('tags_categories');
            $table->text('description');
            $table->string('img_path');
            $table->integer('project_cost');
            $table->enum('etat', array('waiting', 'in_progress', 'blocked', 'dropped', 'finished'));
            $table->date('project_endline');
            $table->boolean('toTop');

        });

        Schema::table('projects', function(Blueprint $table){
            $table->foreign('creator_id')->references('id')->on('users');
            $table->foreign('category_id')->references('id')->on('projects_categories');
            $table->foreign('tag_id')->references('id')->on('projects_tags');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('projects');
    }
}
