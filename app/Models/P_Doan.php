<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class P_Doan extends Model
{
    protected $table = 'p_doan';
    protected $primaryKey = 'id_doan';
    protected $fillable = ['point_doan','mssv','note'];

    public static function getTableName() {
        return with(new static)->getTable();
    }
}
