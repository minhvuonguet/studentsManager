<?php
/**
 * Created by PhpStorm.
 * User: lv2x
 * Date: 12/03/2017
 * Time: 20:32
 */
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use App\Models\User_Point;
use Excel;
use Illuminate\Support\Facades\Input;


class AdminControler extends Controller {
    public function getLogin() {
        return view('admin.login');
    }
    public function postLogin(Request $request){
        if (Auth::attempt([ 'name' => $request->username, 'password' => $request->password,'role_id'=>2 ]) ||
            Auth::attempt([ 'name' => $request->username, 'password' => $request->password,'role_id'=>1 ]) ) {
            $use_ = new User();

            return redirect()->route('list');

        }
        if (Auth::attempt([ 'name' => $request->username, 'password' => $request->password,'role_id'=>3 ])) {
            $use_ = new User();
            return redirect()->route('ViewUser');
        }

        return redirect()->route('login')->with(
            ['flash_level' => 'danger', 'flash_message' => 'login error, Please check your name or password and try again']
        )->withInput();

    }
    public function listUser(){
        return view('admin.adminManager');
    }
    public function ViewUser() {
        return view('Employee.indexStudents');
    }
    public function getLogout() {
        Auth::logout(); // logout user
        return Redirect()->route('login'); //redirect back to login
    }
    public function sendmail () {
        $data = ['abc'];
        Mail::send('admin.sendMail', $data , function($message) {
            $message->from('minhvuongeup@gmail.com','minh vuong');
            $message->to('minhvuonguet@gmail.com', 'minh')->subject('wft');
        });
    }
//    public function testEx () {
////        Excel::load('test.xls', function($reader) {
////            // Getting all results
////            $results = $reader->get();
////            // ->all() is a wrapper for ->get() and will work the same
////            $results = $reader->all();
////        });
////        return view('welcome');
//    }
    public function cacula_point () {
        $base_point = 70;

        $allStudents = User::all(["id", "mssv", "role_id","diem_ren_luyen"]);
        $length = count($allStudents);
        $data = User_Point::all();
        $length_User_Point = count($data);
        $sumPoint = 0;

        for($i = 0; $i < $length; $i++) {
            if($allStudents[$i]['role_id'] == 3) {
                for($j = 0; $j < $length_User_Point; $j++ ) {
                    if($data[$j]['mssv']== $allStudents[$i]['mssv']) {

                        $sumPoint = $data[$j]['ctsv'] + $data[$j]['daotao']
                            + $data[$j]['khoa_hoc_cong_nghe']
                            + $data[$j]['van_phong_doan'] + $data[$j]['co_van_hoc_tap']
                            + $data[$j]['van_phong_khoa'] + $data[$j]['other'];
                    }
                }
                $sum = $base_point + $sumPoint;
                if($sum > 100)
                    $sum = 100;
                $sumPoint = 0;
                echo 'sv : '. $allStudents[$i]->mssv .' sum : ' .$sum . '<br />';
                $students = User::find($allStudents[$i]['id']);

                $students->diem_ren_luyen = $sum;
                $students-> save();
            }
        }
        return view ('admin.test')->with(['list' => $allStudents]);
    }
    public function testEX () {
        $file = Input::file('file');
        echo ($file);
        $file_name = $file->getClientOriginalName();
        $file->move('files', $file_name);
        $result = Excel::load('files/'.$file_name, function($reader){
            $reader->all();
        })->get();
        return view ('admin.test', ['test' => $result]);
    }
}
