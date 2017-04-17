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

use DB;

class AdminControler extends Controller {
    public function getLogin() {
        return view('admin.login');
    }
    public function postLogin(Request $request){
        if (Auth::attempt([ 'username' => $request->username, 'password' => $request->password,'id_role'=>2 ]) ||
            Auth::attempt([ 'username' => $request->username, 'password' => $request->password,'id_role'=>1 ]) ) {
            $use_ = new User();
            echo ("abc");
            return view('admin.adminManager');
        }
        else if (Auth::attempt([ 'username' => $request->username, 'password' => $request->password,'id_role'=>3 ])) {
            $use_ = new User();
            return redirect()->route('ViewUser');
        } else {
            return redirect()->route('login')->with(
                ['flash_level' => 'danger', 'flash_message' => 'login error, Please check your name or password and try again']
            )->withInput();
        }
//        echo ("asdfasdfsadf");
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
    public function sendmail (Request $request) {

    }
    public function formdiem () {
        return View('Employee.mau_diem');
    }
}