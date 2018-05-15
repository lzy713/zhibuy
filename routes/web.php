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


	

});




//后台栏目管理
Route::group(['prefix'=>'admin','namespace'=>'Admin'],function(){

	//用户管理
	Route::resource('user','UserController');
	
	
	//公告管理
	Route::resource('notice','NoticeController');

	//推荐管理
	Route::resource('recommend','RecommendController');

	//测评管理
	Route::resource('recommend','EvaluationController');

});
















//前台
Route::group(['namespace'=>'Home'],function(){

	Route::get('login','LoginController@login');
	Route::get('register','RegisterController@register');




});











