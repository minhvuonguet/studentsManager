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
            $table->engine = 'InnoDB';
            $table->integer('role_id')->unique();
            $table->string('name');
            $table->string('note');
            $table->timestamps();
            $table->primary('role_id');
        });
        Schema::create('users', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->string('username')->unique();
            $table->integer('mssv')->unique();
            $table->string('password');
            $table->integer('role_id');
            $table->string('fullname');
            $table->string('email');
            $table->string('class');
            $table->string('office');
            $table->date('birthday');
            $table->timestamps();
            $table->primary('username');
            $table->foreign('role_id')->references('role_id')->on('roles')->onDelete('cascade')->onUpdate('CASCADE');
        });
        Schema::create('point', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->integer('point_id')->unique();//ma so diem sinh vien trong tung hoc ky
            $table->integer('mssv');//ma so sinh vien
            $table->integer('hk_id');//ma so hoc ky
            $table->integer('nckh_point');//nghien cuu khoa hoc
            $table->integer('ytsv_point');//y thuc sinh vien
            $table->integer('ytcd_point');//y thuc cong dan
            $table->integer('hddt_point');//hoat dong doan the
            $table->integer('total_point');//diem tong
            $table->timestamps();
            $table->primary('point_id');
            $table->foreign('mssv')->references('mssv')->on('users')->onDelete('cascade')->onUpdate('CASCADE');
        });
        Schema::create('nckh', function(
            Blueprint $table){
            $table->engine = 'InnoDB';
            $table->integer('nckh_id');
            $table->integer('mssv');
            $table->integer('nckh_point');
            $table->string('note');
            $table->timestamps();
            $table->primary('nckh_id');
            $table->foreign('mssv')->references('mssv')->on('users')->onDelete('cascade')->onUpdate('CASCADE');
        });
        Schema::create('ytcd', function(
            Blueprint $table){
            $table->engine = 'InnoDB';
            $table->integer('ytcd_id');
            $table->integer('mssv');
            $table->integer('ytcd_point');
            $table->string('note');
            $table->timestamps();
            $table->primary('ytcd_id');
            $table->foreign('mssv')->references('mssv')->on('users')->onDelete('cascade')->onUpdate('CASCADE');
        });
        Schema::create('ytsv', function(
            Blueprint $table){
            $table->engine = 'InnoDB';
            $table->integer('ytsv_id');
            $table->integer('mssv');
            $table->integer('ytsv_point');
            $table->string('note');
            $table->timestamps();
            $table->primary('ytsv_id');
            $table->foreign('mssv')->references('mssv')->on('users')->onDelete('cascade')->onUpdate('CASCADE');
        });
        Schema::create('hddt', function(
            Blueprint $table){
            $table->engine = 'InnoDB';
            $table->integer('hddt_id');
            $table->integer('mssv');
            $table->integer('hddt_point');
            $table->string('note');
            $table->timestamps();
            $table->primary('hddt_id');
            $table->foreign('mssv')->references('mssv')->on('users')->onDelete('cascade')->onUpdate('CASCADE');
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if(Schema::hasTable('nckh')){
            Schema::drop('nckh');
        }
        if(Schema::hasTable('ytsv')){
            Schema::drop('ytsv');
        }
        if(Schema::hasTable('ytcd')){
            Schema::drop('ytcd');
        }
        if(Schema::hasTable('hddt')){
            Schema::drop('hddt');
        }
        if(Schema::hasTable('point')){
            Schema::drop('point');
        }
        if(Schema::hasTable('users')){
            Schema::drop('users');
        }
        if(Schema::hasTable('roles')){
            Schema::drop('roles');
        }
    }
}