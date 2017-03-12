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
        Schema::create('roles', function(Blueprint $table){
            $table->increments('id');
            $table->string('name');
            $table->tinyInteger('role_id');
            $table->timestamps();
        });
        Schema::create('users', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->bigIncrements('id');
            $table->string('name')->unique();
            $table->string('email');
            $table->string('password', 60);
            $table->unsignedInteger('role_id');
            $table->string('office');
            $table->tinyInteger('changePass');
            $table->rememberToken();
            $table->timestamps();

            $table->foreign('role_id')->references('id')->on('roles');
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
        Schema::drop('roles');
    }
}
