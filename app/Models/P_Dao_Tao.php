<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class P_Dao_Tao extends Model
{
    protected $table = 'p_dao_tao';
    protected $primaryKey = 'id_dao_tao';
    protected $fillable = ['point_dao_tao','mssv','note'];

    public static function getTableName() {
        return with(new static)->getTable();
    }
}
