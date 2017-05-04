<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function goToHome(Request $request)
    {
        switch ($request->session()->get('id_role')) {
            case '3':
                return view('Employee.indexStudents')->with([
                'username'=>$request->session()->get('username'),
                'mssv'=>$request->session()->get('mssv'),
                'id_role'=>$request->session()->get('id_role'),
                'avatar'=>$request->session()->get('avatar'),
                ]);
                break;
            case '2':
                return view('admin.adminManager');
                break;
            case '1':
                return view('admin.adminManager');
                break;
            default:
                return redirect()->route('login');
                break;
        }
    }
}
