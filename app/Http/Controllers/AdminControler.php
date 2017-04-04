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
// use Illuminate\Http\Request;



class AdminControler extends Controller {
    public function getLogin() {
        return view('admin.login');
    }
    public function postLogin(Request $request){
//        echo $request->username;
//        echo $request->password;
//        Mail::send('admin.sendMail', array('email' => 'minhvuonguet@gmail.com'), function ($message) {
//            $message->to('minhvuonguet@gmail.com', 'Visitor')->subject('Welcome to Employee Directory. !');
//        });
        if (Auth::attempt([ 'username' => $request->username, 'password' => $request->password,'role_id'=>2 ]) ||
            Auth::attempt([ 'username' => $request->username, 'password' => $request->password,'role_id'=>1 ]) ) {
            $use_ = new User();


            return view('admin.adminManager');
        }
        if (Auth::attempt([ 'username' => $request->username, 'password' => $request->password,'role_id'=>3 ])) {
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

    public function getExcels () {
        Excel::load('T1.xls', function($reader) {
            // echo "$reader";
            $reader->each(function($sheet){
                // echo "$sheet"."<br>"."<br>"."<br>";
                foreach($sheet as $row){
                    // echo $row."<br>"."<br>"."<br>";
                    foreach ($row as $column) {
                        echo $column."<br>";
                    }
                    echo "<br>";
                };
            });
        });
        return view('admin.getExcels');
    }

    // public function postExcels (){
    //     echo "string";
        
    // }
}
