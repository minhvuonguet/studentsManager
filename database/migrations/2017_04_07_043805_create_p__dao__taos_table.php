<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePDaoTaosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('p_dao_tao', function (Blueprint $table) {
          $table->engine = 'InnoDB';

          $table->increments('id_dao_tao');
          $table->integer('point_dao_tao');
          $table->integer('mssv');
          $table->string('note');
        //  $table->primary('id_dao_tao');
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
        Schema::drop('p_dao_tao');
    }
}
