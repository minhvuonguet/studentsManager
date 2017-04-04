<?php
/**
 * Created by PhpStorm.
 * User: lv2x
 * Date: 29/03/2017
 * Time: 00:36
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hocky extends Model
{
    protected $table = 'hocky';
    protected $fillable = ['id','point_id', 'ma_hk', 'mssv', 'diem_ren_luyen'];

    public function Hocky(){
        return $this->hasOne();
    }
}