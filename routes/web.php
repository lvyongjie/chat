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

Route::group(['prefix' => 'admin'], function () {
    Route::get('company', 'Admin\AdminCompanyOperateController@getAllCompany');
    Route::post('company', 'Admin\AdminCompanyOperateController@addCompany');
    Route::delete('company', 'Admin\AdminCompanyOperateController@deleteCompanyByCompanyId');

    Route::get('customer', 'Admin\AdminCustomerController@getAllCustomersByCompanyId');
    Route::get('customer/detail', 'Admin\AdminCustomerController@getCustomerInfoByCustomerId');
    Route::post('customer', 'Admin\AdminCustomerController@addCustomer');
    Route::delete('customer', 'Admin\AdminCustomerController@deleteCustomer');
});
