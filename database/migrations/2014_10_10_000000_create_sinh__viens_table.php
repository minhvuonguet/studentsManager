<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSinhViensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sinh_vien', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->integer('mssv')->primary()->unique();
            $table->string('fullname');
            $table->string('class');
            $table->string('office');
            $table->string('email');
            $table->date('birthday');
            // $table->primary('mssv');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('sinh_vien');
    }
}
