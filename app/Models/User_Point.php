<?php
/**
 * Created by PhpStorm.
 * User: lv2x
 * Date: 18/03/2017
 * Time: 23:47
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User_Point extends Model
{
    protected $table = 'user_point';
    protected $fillable = [
        'ctsv','daotao',
        'khoa_hoc_cong_nghe',
        'van_phong_doan',
        'co_van_hoc_tap',
        'van_phong_khoa',
        'other',
        'sum',
        'note'
    ];

//    public function role(){
//        return $this->hasOne();
//    }
}