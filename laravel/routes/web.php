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
//前台路由分组
Route::group(['namespace' => 'Index'],function (){
    Route::get('index','IndexController@Index');
});
Route::group(['namespace' => 'Live'],function (){
    Route::get('live/index','IndexController@Index');
});
Route::group(['namespace' => 'Usechain','middleware' => 'web'],function (){
    Route::get('usechain/index','UsechainController@IndexCd');
    Route::any('usechain/info','UsechainController@InfoCd');
    Route::any('usechain/admin/login','UsechainAdminController@Adminlogin');
    Route::get('usechain/admin/index','UsechainAdminController@AdminIndex');
    //Route::get('usechain/admin/rand','UsechainAdminController@rand');
    Route::get('usechain/admin/times','UsechainAdminController@times');
    Route::get('usechain/admin/userList','UsechainAdminController@AdminUserListCd');
});
Route::get('/','Index\\IndexController@Index');
