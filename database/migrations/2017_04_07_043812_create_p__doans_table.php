<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePDoansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('p_doan', function (Blueprint $table) {
          $table->engine = 'InnoDB';

          $table->increments('id_doan');
          $table->integer('point_doan');
          $table->integer('mssv');
          $table->string('note');
     //     $table->primary('id_doan');
          $table->foreign('mssv')
          ->references('mssv')
          ->on('users')
          ->onDelete('cascade')
          ->onUpdate('cascade');
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
        Schema::drop('p_doan');
    }
}
