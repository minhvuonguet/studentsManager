<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class P_Doan extends Model
{
    protected $table = 'p_doan';
    protected $primaryKey = 'mssv';
    protected $fillable = ['point_doan','mssv','note'];
//    protected $fillable = ['mssv', 'fullname','class', 'office','email','chuc_vu','birthday','khen_thuong',
//
//        ];

    public static function getTableName() {
        return with(new static)->getTable();
    }
}
