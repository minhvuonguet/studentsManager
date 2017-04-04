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
    protected $table = 'point';
    protected $fillable = ['nckh_point','ytcd_point','ytsv_point','hddt_point'];
//    public function role(){
//        return $this->hasOne();
//    }
}