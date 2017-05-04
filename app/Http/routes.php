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
    return view('Employee.indexStudents');

});


Route::get('/ctsv', function () {
    return view('');
});
Route::post('updateDB', ['as' => 'updateDB', 'uses' => 'DatabaseController@updateDB']);

Route::get('readExcels', ['as' => 'readExcels', 'uses' => 'DatabaseController@readExcels']);

Route::group(['middleware' => ['web']], function () {

    Route::get('/login', ['as' => 'login', 'uses' => 'AdminControler@getLogin']);
    Route::post('/postLogin', ['as' => 'postLogin', 'uses' => 'AdminControler@postLogin']);
    Route::get('ViewUser', ['as' => 'ViewUser', 'uses' => 'AdminControler@ViewUser']);
    Route::get('sendmail', ['as' => 'sendmail', 'uses' => 'AdminControler@sendmail']);
    Route::post('/message/send', ['uses' => 'FrontController@addFeedback', 'as' => 'front.fb']);
    Route::get('formdiem', ['as' => 'formdiem', 'uses' => 'AdminControler@formdiem']);
    Route::get('newclass', ['as' => 'newclass', 'uses' => 'AdminControler@newclass']);
    Route::post('postnewclass', ['as'=>'postnewclass','uses'=>'AdminControler@postnewclass']);
    Route::get('tinhdiem', ['as' => 'tinhdiem', 'uses' => 'CacularPoint@tinhdiem']);
    Route::post('update/{id}/{chu_de}', ['as'=>'update', 'uses'=>'AdminControler@updatePoint']);
    Route::get('listclass', ['as'=>'listclass', 'uses'=>'AdminControler@listclass']);

    Route::post('listofclass/{class}', ['as'=>'listofclass', 'uses'=>'AdminControler@listofclass']);
   // Route::get('tinhdiem', ['as'=>'tinhdiem', 'use'=>'CacularPont@tinhdiem']);

    Route::group(['middleware' => 'auth'], function () {
     //   Route::get('/', ['as' => '/', 'uses' => 'AdminControler@ViewUser']);
        Route::get('list', ['as' => 'list', 'uses' => 'AdminControler@listUser']);
        Route::get('logout', ['as' => 'logout', 'uses' => 'AdminControler@getLogout']);

    });
});
//Route::auth();
//
//Route::get('/home', 'HomeController@index');
