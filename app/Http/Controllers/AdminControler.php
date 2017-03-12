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
use App\User;

class AdminControler extends Controller {
    public function getLogin() {
        return view('admin.login');
    }
    public function postLogin(Request $request){
        echo $request->username;
        echo $request->password;
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

    }
    public function getLogout() {
        Auth::logout(); // logout user
        return Redirect()->route('login'); //redirect back to login
    }
}
