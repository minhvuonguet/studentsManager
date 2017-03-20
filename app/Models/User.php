<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class User extends  Model
{
    protected $table = 'users';
    
    protected $fillable = ['name','email','password', 'mssv', 'diem_ren_luyen', 'hoten', 'ngaysinh', 'lop', 'office'];

    public function role(){
        return $this->hasOne();
    }
    public function getAllStudents () {


    }
    public function updateSumPoint ($sum, $id) {
        DB::table('users')->where('mssv', $id)
            -> update([
               'diem_ren_luyen' => $sum
            ]);
        return ;
    }
}