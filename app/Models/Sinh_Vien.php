<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sinh_Vien extends Model
{
    protected $table = 'sinh_vien';
    protected $primaryKey = 'mssv';

    public static function getTableName() {
        return with(new static)->getTable();
    }
}
