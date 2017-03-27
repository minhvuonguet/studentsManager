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
            $table->Increments('id');
            $table->string('name')->unique();
            $table->string('email');
            $table->string('password', 60);
            $table->unsignedInteger('role_id');
            $table->string('office');
            $table->tinyInteger('changePass');
            $table->bigInteger('mssv');
            $table->string('hoten');
            $table->date('ngaysinh');
            $table->string('lop');
            $table->integer('diem_ren_luyen');

            $table->rememberToken();
            $table->timestamps();
            $table->foreign('role_id')->references('id')->on('roles');
        });
        Schema::create('user_point', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->Increments('id');
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('mssv');
//            $table->integer('ctsv');
//            $table->integer('daotao');
//            $table->integer('khoa_hoc_cong_nghe');
//            $table->integer('van_phong_doan');
//            $table->integer('co_van_hoc_tap');
//            $table->integer('van_phong_khoa');
//            $table->integer('other');
//            $table->integer('sum');
//            $table->string('note');
            $table->rememberToken();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
        });
        Schema::create('ctsv', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->Increments('id');
            $table->unsignedInteger('user_point_id');
//            $table->unsignedInteger('mssv');
//            $table->integer('ctsv');
//            $table->integer('daotao');
//            $table->integer('khoa_hoc_cong_nghe');
//            $table->integer('van_phong_doan');
//            $table->integer('co_van_hoc_tap');
//            $table->integer('van_phong_khoa');
//            $table->integer('other');
//            $table->integer('sum');
//            $table->string('note');
            $table->rememberToken();
            $table->timestamps();

            $table->foreign('user_point_id')->references('id')->on('user_point');
        });
        Schema::create('daotao', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->Increments('id');
            $table->unsignedInteger('user_point_id');
//            $table->unsignedInteger('mssv');
//            $table->integer('ctsv');
//            $table->integer('daotao');
//            $table->integer('khoa_hoc_cong_nghe');
//            $table->integer('van_phong_doan');
//            $table->integer('co_van_hoc_tap');
//            $table->integer('van_phong_khoa');
//            $table->integer('other');
//            $table->integer('sum');
//            $table->string('note');
            $table->rememberToken();
            $table->timestamps();

            $table->foreign('user_point_id')->references('id')->on('user_point');
        });
        Schema::create('khoa_hoc_cong_nghe', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->Increments('id');
            $table->unsignedInteger('user_point_id');
//            $table->unsignedInteger('mssv');
//            $table->integer('ctsv');
//            $table->integer('daotao');
//            $table->integer('khoa_hoc_cong_nghe');
//            $table->integer('van_phong_doan');
//            $table->integer('co_van_hoc_tap');
//            $table->integer('van_phong_khoa');
//            $table->integer('other');
//            $table->integer('sum');
//            $table->string('note');
            $table->rememberToken();
            $table->timestamps();

            $table->foreign('user_point_id')->references('id')->on('user_point');
        });
        Schema::create('van_phong_doan', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->Increments('id');
            $table->unsignedInteger('user_point_id');
//            $table->unsignedInteger('mssv');
//            $table->integer('ctsv');
//            $table->integer('daotao');
//            $table->integer('khoa_hoc_cong_nghe');
//            $table->integer('van_phong_doan');
//            $table->integer('co_van_hoc_tap');
//            $table->integer('van_phong_khoa');
//            $table->integer('other');
//            $table->integer('sum');
//            $table->string('note');
            $table->rememberToken();
            $table->timestamps();

            $table->foreign('user_point_id')->references('id')->on('user_point');
        });
        Schema::create('co_van_hoc_tap', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->Increments('id');
            $table->unsignedInteger('user_point_id');
//            $table->unsignedInteger('mssv');
//            $table->integer('ctsv');
//            $table->integer('daotao');
//            $table->integer('khoa_hoc_cong_nghe');
//            $table->integer('van_phong_doan');
//            $table->integer('co_van_hoc_tap');
//            $table->integer('van_phong_khoa');
//            $table->integer('other');
//            $table->integer('sum');
//            $table->string('note');
            $table->rememberToken();
            $table->timestamps();

            $table->foreign('user_point_id')->references('id')->on('user_point');
        });
        Schema::create('van_phong_khoa', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->Increments('id');
            $table->unsignedInteger('user_point_id');
//            $table->unsignedInteger('mssv');
//            $table->integer('ctsv');
//            $table->integer('daotao');
//            $table->integer('khoa_hoc_cong_nghe');
//            $table->integer('van_phong_doan');
//            $table->integer('co_van_hoc_tap');
//            $table->integer('van_phong_khoa');
//            $table->integer('other');
//            $table->integer('sum');
//            $table->string('note');
            $table->rememberToken();
            $table->timestamps();

            $table->foreign('user_point_id')->references('id')->on('user_point');
        });
        Schema::create('other', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->Increments('id');
            $table->unsignedInteger('user_point_id');
//            $table->unsignedInteger('mssv');
//            $table->integer('ctsv');
//            $table->integer('daotao');
//            $table->integer('khoa_hoc_cong_nghe');
//            $table->integer('van_phong_doan');
//            $table->integer('co_van_hoc_tap');
//            $table->integer('van_phong_khoa');
//            $table->integer('other');
//            $table->integer('sum');
//            $table->string('note');
            $table->rememberToken();
            $table->timestamps();

            $table->foreign('user_point_id')->references('id')->on('user_point');
        });
        /**
         *  stt ten, lop mssv ngay sinh, 
         *  students_point : stt, mssv, ctsv, daotao, khoa hoc cong nghe, van phong doan, co van hoc tap,  van phong khoa. ;
         *
         */
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('other');
        Schema::drop('van_phong_khoa');
        Schema::drop('co_van_hoc_tap');
        Schema::drop('van_phong_doan');
        Schema::drop('khoa_hoc_cong_nghe');
        Schema::drop('daotao');
        Schema::drop('ctsv');
        Schema::drop('user_point');
        Schema::drop('users');
        Schema::drop('roles');
    }
}
