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


        Schema::create('ctsv', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->Increments('id');

            $table->unsignedInteger('mssv');
            $table->integer('diem');
            $table->string('noidung');
            $table->rememberToken();
            $table->timestamps();
        });
        Schema::create('daotao', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->Increments('id');

            $table->unsignedInteger('mssv');
            $table->integer('diem');
            $table->string('noidung');
            $table->rememberToken();
            $table->timestamps();

        });
        Schema::create('khoa_hoc_cong_nghe', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->Increments('id');

            $table->unsignedInteger('mssv');
            $table->integer('diem');
            $table->string('noidung');
            $table->rememberToken();
            $table->timestamps();

        });
        Schema::create('van_phong_doan', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->Increments('id');

            $table->unsignedInteger('mssv');
            $table->integer('diem');
            $table->string('noidung');
            $table->rememberToken();
            $table->timestamps();

        });
        Schema::create('co_van_hoc_tap', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->Increments('id');

            $table->unsignedInteger('mssv');
            $table->integer('diem');
            $table->string('noidung');
            $table->rememberToken();
            $table->timestamps();

        });
        Schema::create('van_phong_khoa', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->Increments('id');

            $table->unsignedInteger('mssv');
            $table->integer('diem');
            $table->string('noidung');
            $table->rememberToken();
            $table->timestamps();

        });
        Schema::create('other', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->Increments('id');

            $table->unsignedInteger('mssv');
            $table->string('ten_don_vi');
            $table->integer('diem');
            $table->string('noidung');
            $table->rememberToken();
            $table->timestamps();

        });

        Schema::create('user_point', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->Increments('id');
            $table->unsignedInteger('mssv');

//            $table->unsignedInteger('user_id');
            $table->unsignedInteger('khcn_id');
            $table->unsignedInteger('vpk_id');
            $table->unsignedInteger('daotao_id');
            $table->unsignedInteger('vpd_id');
            $table->unsignedInteger('ctsv_id');
            $table->unsignedInteger('cvht_id');
            $table->unsignedInteger('other_id');


            $table->rememberToken();
            $table->timestamps();

//            $table->foreign('khcn_id')->references('id')->on('khoa_hoc_cong_nghe');
//            $table->foreign('vpk_id')->references('id')->on('van_phong_khoa');
//            $table->foreign('daotao_id')->references('id')->on('daotao');
//            $table->foreign('vpd_id')->references('id')->on('van_phong_doan');
//            $table->foreign('ctsv_id')->references('id')->on('ctsv');
//            $table->foreign('cvht_id')->references('id')->on('co_van_hoc_tap');
//            $table->foreign('other_id')->references('id')->on('other');

        });
        Schema::create('hocky', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->Increments('id');
            $table->unsignedInteger('point_id');
            $table->string('ma_hk');
            $table->string('mssv');
            $table->Integer('diem_ren_luyen');
            $table->rememberToken();
            $table->timestamps();


            $table->foreign('point_id')->references('id')->on('user_point');
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
            $table->string('hocky');
            $table->rememberToken();
            $table->timestamps();

//            $table->foreign('hocky')->references('id')->on('hocky');
            $table->foreign('role_id')->references('id')->on('roles');
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
        Schema::drop('users');
        Schema::drop('hocky');
        Schema::drop('user_point');

        Schema::drop('other');
        Schema::drop('van_phong_khoa');
        Schema::drop('co_van_hoc_tap');
        Schema::drop('van_phong_doan');
        Schema::drop('khoa_hoc_cong_nghe');
        Schema::drop('daotao');
        Schema::drop('ctsv');


        Schema::drop('roles');
    }
}
