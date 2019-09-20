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

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return response()->success();
});


Route::get('/admin/person/search','Admin\AdminPersonOperateController@searchPersonalUser');
Route::get('/admin/person','Admin\AdminPersonOperateController@getAllPersonalUser');
Route::post('/admin/person','Admin\AdminPersonOperateController@addPersonalUser');
Route::post('/admin/person/state/update','Admin\AdminPersonOperateController@updatePersonalUserByUserId');

