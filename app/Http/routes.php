<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('admin.login');
});
Route::get('/ctsv', function () {
    return view('');
});


Route::group(['middleware' => ['web']], function () {

    Route::get('/login', ['as' => 'login', 'uses' => 'AdminControler@getLogin']);
    Route::post('/postLogin', ['as' => 'postLogin', 'uses' => 'AdminControler@postLogin']);
    Route::get('ViewUser', ['as'=>'ViewUser', 'uses' => 'AdminControler@ViewUser']);
    Route::get('sendmail', ['as'=>'sendmail', 'uses'=>'AdminControler@sendmail']);
    Route::post('testex', ['as'=>'testex', 'uses'=>'AdminControler@testEX']);

    Route::group(['middleware'=>'auth'], function(){
        Route::get('list', ['as' => 'list', 'uses' => 'AdminControler@listUser']);
        Route::get('caculate', ['as' => 'caculate', 'uses' => 'AdminControler@cacula_point']);
        Route::get('mau_diem', ['as'=> 'mau_diem', 'uses'=> 'StudentsControler@getMauDiem']);
        Route::get('logout', ['as' => 'logout', 'uses' => 'AdminControler@getLogout']);
        Route::get('feadback', ['as'=>'feadback', 'use'=>'AdminControler@feadback']);
    });

   

});
