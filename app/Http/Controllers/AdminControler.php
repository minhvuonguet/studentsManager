<?php
/**
 * Created by PhpStorm.
 * User: lv2x
 * Date: 12/03/2017
 * Time: 20:32
 */
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Auth;
use App\User;
use Illuminate\Support\Facades\Mail;
use Excel,Input,File;
use Illuminate\Support\Collection;
// use Illuminate\Http\Request;
class AdminControler extends Controller {
    public function getLogin() {
        return view('admin.login');
    }
    public function postLogin(Request $request){

        if (Auth::attempt([ 'username' => $request->username, 'password' => $request->password,'role_id'=>2 ]) ||
            Auth::attempt([ 'username' => $request->username, 'password' => $request->password,'role_id'=>1 ]) ) {
            $use_ = new User();

            return redirect()->route('list');
        }
        else {
            if (Auth::attempt(['username' => $request->username, 'password' => $request->password, 'role_id' => 3])) {
                $use_ = new User();
                return redirect()->route('ViewUser');
            } else {
                return redirect()->route('login')->with(
                    ['flash_level' => 'danger', 'flash_message' => 'login error, Please check your name or password and try again']
                )->withInput();
            }
        };

    }
    public function listUser(){
        return view('admin.manager');
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
        echo $allStudents;
//        return view ('admin.test')->with(['list' => $allStudents]);
    }
    public function getExcels () {
        //load file excels
        Excel::load('T1.xlsx', function($reader){
            $reader->each(function($sheet){
                $sheet->each(function($row){
                    // echo "$row"."</br>";
                    $row->each(function($cell){
                        echo "$cell"."</br>";
                    });
                });
                // foreach($sheet as $row){
                //     echo "$row"."<br>";
                //     foreach ($row as $cell) {
                //         echo $cell."<br>";
                //     }
                //     echo "<br>";
                // };
            });
        });
        // return view('admin.getExcels');
    }
    // public function postExcels (){
    //     echo "string";

    // }
}