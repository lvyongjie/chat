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

//Route::get('/', function () {
//    return response()->success();
//});
//获取短信接口
Route::get('/admin/other/sms','Admin\AdminOtherSettingController@getSmsInfo');
//修改短信接口
Route::post('/admin/other/sms','Admin\AdminOtherSettingController@updateSmsInfo');
//获取ws地址
Route::get('/admin/other/ws','Admin\AdminOtherSettingController@getWsInfo');
//修改ws地址
Route::post('/admin/other/ws','Admin\AdminOtherSettingController@updateWsInfo');