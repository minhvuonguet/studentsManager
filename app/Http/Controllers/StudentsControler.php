<?php
/**
 * Created by PhpStorm.
 * User: lv2x
 * Date: 20/03/2017
 * Time: 20:36
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use App\Models\User_Point;
use Illuminate\Support\Facades\DB;

class StudentsControler extends Controller {
    public function report(Request $request){
        return view('Employee.report')->with([
            'username'=>$request->session()->get('username'),
            'mssv'=>$request->session()->get('mssv'),
            'id_role'=>$request->session()->get('id_role'),
            'avatar'=>$request->session()->get('avatar'),
            ]);
    }

    public function showPoint(Request $request){
        return view('Employee.showPoint')->with([
            'username'=>$request->session()->get('username'),
            'mssv'=>$request->session()->get('mssv'),
            'id_role'=>$request->session()->get('id_role'),
            'avatar'=>$request->session()->get('avatar'),
            ]);
    }

    public function getMauDiem () {
        $ad_us = User::find(Auth::user()->id);

        $data = User_Point::all();
        $size = count($data);

        $dataStudents = null;
        for($i = 0; $i < $size; $i++){
            if($data[$i]['mssv'] == $ad_us->mssv){
                $dataStudents = $data[$i];
                break;
            }
        }

        return view ('Employee.mau_diem')->with(['sum_point' => $ad_us->diem_ren_luyen]);
    }
}