<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('firstname');
            $table->date('birthday');
            $table->string('city');
            $table->string('CP');
            $table->text('address');
            $table->string('phone');
            $table->string('avatar_path');

            $table->string('email')->unique();
            $table->string('password');

            // admin:0 - creator:1 - investor:2
            $table->integer('role');

            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('users');
    }
}
