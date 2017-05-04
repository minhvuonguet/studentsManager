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

//          $table->increments('id_doan');
//          $table->integer('point_doan');
//          $table->integer('mssv');
//          $table->string('note');
//     //     $table->primary('id_doan');
//          $table->foreign('mssv')
//          ->references('mssv')
//          ->on('users')
//          ->onDelete('cascade')
//          ->onUpdate('cascade');
//          $table->timestamps();

            $table->integer('mssv')->primary()->unique();
            $table->string('fullname');
            $table->string('class');
            $table->string('office');
            $table->string('email');
            $table->string('chuc_vu');
            $table->date('birthday');
            $table->string('khen_thuong');
            $table->string('trung_binh');
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
