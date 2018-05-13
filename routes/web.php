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
    return view('welcome');
});


//后台首页
Route::group(['prefix'=>'admin','namespace'=>'Admin'],function(){
	//后台首页
	Route::get('index','IndexController@index');

	Route::get('index/add','IndexController@add');

	Route::resource('user','UserController');

	

});


//后台栏目管理
Route::group(['prefix'=>'admin','namespace'=>'Admin'],function(){

	































































	/**
	 * 	后台个人中心-订单管理
	 */
	//订单列表页
	Route::get('users/orders','OrdersController@orderList');
	//添加订单页
	Route::get('users/order/addOrder','OrdersController@addOrder');
	//添加订单
	Route::post('users/order/add','OrdersController@add');
	//订单详情页
	Route::get('users/order/orderDetail/{id}','OrdersController@orderDetail');
});
