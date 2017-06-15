<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/',['as'=>'test','uses'=>'Auth\AuthController@test']);

Route::group(['namespace' => 'Auth'],function (){
    Route::get('login',['as'=>'web.login','uses'=>'AuthController@login']);
    Route::post('login',['as'=>'web.do.login','uses'=>'AuthController@doLogin']);
    Route::get('register',['as'=>'web.register','uses'=>'AuthController@register']);
    Route::post('register',['as'=>'web.do.register','uses'=>'AuthController@doRegister']);
});
