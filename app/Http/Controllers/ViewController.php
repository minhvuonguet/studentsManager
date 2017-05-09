<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Mail;
use App\Models\User;
use App\Models\Sinh_Vien;
use App\Models\Points;
use Excel,Input,File;
use Hash;
use DB;

class ViewController extends Controller
{
    public function view(Request $request){
    	$sinhvien = Sinh_Vien::all();
        $diem = Points::all();
        $listClass = [];
        for($i = 0; $i < count($sinhvien); $i++){
            $sinhvien[$i]->point = 0;
            for($j = 0; $j < count($diem)-1 ; $j++) {
                if($diem[$j]->mssv == $sinhvien[$i]->mssv){
                    $sinhvien[$i]->point = $diem[$j]->point_total;
                }
            }
            $listClass[$i] = $sinhvien[$i]->class;
        }
        $listClass = array_unique($listClass);

        return View('Employee.view')->with([
            'user' => $request->session()->get('user'),
            'sinhvien' =>$request->session()->get('user'),
            'list_sinh_vien' =>$sinhvien,
            'list_diem_ren_luyen' =>$diem,
            'list_class' =>$listClass
        ]);
    }

    public function viewChose(Request $request,$chose){
    	switch ($request->columnMSSV) {
    		case '11000000':
    			$list = Sinh_Vien::where('mssv', '>', 11000000)->get();
    			return view('Employee.view')->with([
		    		'user' => $request->session()->get('user'),
		    		'sinhvien' => $request->session()->get('sinhvien'),
		    		'list' => $list
		    		]);
    			break;
    		case '12000000':
    			$list = Sinh_Vien::where('mssv', '>', 12000000)->get();
    			return view('Employee.view')->with([
		    		'user' => $request->session()->get('user'),
		    		'sinhvien' => $request->session()->get('sinhvien'),
		    		'list' => $list
		    		]);
    			break;
    		default:
    			# code...
    			break;
    	}
    }
}
