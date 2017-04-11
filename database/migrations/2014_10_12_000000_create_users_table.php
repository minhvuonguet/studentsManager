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
            $table->engine = 'InnoDB';
            $table->string('username')->unique();
            $table->string('password');
            $table->integer('mssv')->unique();
            $table->integer('id_role');
            $table->primary('username');

            $table->foreign('id_role')
            ->references('id_role')
            ->on('roles')
            ->onDelete('cascade')
            ->onUpdate('cascade');

            $table->foreign('mssv')
            ->references('mssv')
            ->on('sinh_vien')
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
        Schema::drop('users');
    }
}
