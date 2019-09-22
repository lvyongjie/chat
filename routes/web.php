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

Route::get('/', function () {
    return response()->success();
});




Route::post('/register' , 'User\LoginController@register');//个人账号注册
Route::post('/uploadPassword' , 'User\LoginController@uploadPassword');//找回密码
Route::post('/getCaptcha' , 'User\LoginController@getCaptcha');//获取验证码
Route::post('/login' , 'User\LoginController@login');//账号登陆
Route::post('/loginOut' , 'User\LoginController@loginOut');//账号注销
Route::group(['middleware' => ['login']],function(){
	Route::post('/suggest' , 'User\LoginController@suggestReturn');//意见反馈
	Route::post('/services/uploadBlackList' , 'Service\ServiceController@uploadBlackList');//上传黑名单申请
	Route::get('/companys/{id}' , 'User\LoginController@getCompanysInfo');//获取指定企业信息
});

