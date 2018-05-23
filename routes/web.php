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




//后台栏目管理
Route::group(['prefix'=>'admin','namespace'=>'Admin'],function(){
	//后台首页
	Route::get('index','IndexController@index');	

	//上传接口
	Route::post('upload/upimg','UploadController@upimg');


	//后台栏目管理
	Route::get('menu/createup','MenuController@createup');//多图上传测试
	Route::resource('menu','MenuController');


	//角色管理
	Route::resource('role','RoleController');
























	//分类添加
	Route::get('cates/index','CatesController@cates');
	Route::post('cates/add','CatesController@add');
	Route::get('cates/show','CatesController@show');
	Route::get('cates/edit/{cid}','CatesController@edit');
	Route::post('cates/update/{cid}','CatesController@update');
	Route::get('cates/delete/{id}','CatesController@delete');

	//商品
	Route::get('goods/add','GoodsController@add');
	Route::post('goods/create','GoodsController@create');
	Route::post('goods/upimg','GoodsController@upimg');
	Route::get('goods/show','GoodsController@show');
	Route::get('goods/goodsedit/{id}','GoodsController@edit');
	Route::post('goods/goodsupdate/{id}','GoodsController@update');
	Route::get('goods/goodsdel/{id}','GoodsController@delete');

	Route::get('goods/delimg','GoodsController@delimg');//删除图片

	// 友情链接
	Route::get('links/addlinks','LinksController@add');
	Route::post('links/insert','LinksController@ins');
	Route::get('links/show','LinksController@show');
	Route::get('links/edit/{id}','LinksController@edit');
	Route::post('links/update/{id}','LinksController@update');
	Route::get('links/del/{id}','LinksController@delete');
	//Route::post('links/lookup','LinksController@look');

	//首页栏目
	Route::get('navs/index','NavsController@index');
	Route::post('navs/add','NavsController@add');
	Route::get('navs/show','NavsController@show');
	Route::get('navs/edit/{id}','NavsController@edit');
	Route::post('navs/update/{id}','NavsController@update');
	Route::get('navs/del/{id}','NavsController@delete');
	

























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
	//修改订单页
	Route::get('users/order/editOrder/{id}','OrdersController@editOrder');
	//修改订单
	Route::post('users/order/updateOrder/{id}','OrdersController@updateOrder');

	/**
	 * 订单Ajax
	 */
	//点击发货
	Route::get('users/order/statusAjax','OrderAjaxController@statusAjax');
	//点击删除
	Route::get('users/order/deleteAjax','OrderAjaxController@deleteAjax');
	//判断订单是否可编辑
	Route::get('users/order/editAjax','OrderAjaxController@editAjax');
























	//用户管理
	Route::resource('user','UserController');
	
	
	//公告管理
	Route::resource('notice','NoticeController');

	//推荐管理
	Route::resource('recommend','RecommendController');

	//测评管理
	Route::resource('evaluation','EvaluationController');


















});









//前台
Route::group(['namespace'=>'Home'],function(){

	Route::get('login','LoginController@login');
	Route::get('register','RegisterController@register');





















































































	// guxiaolei  前台
	Route::get('/','IndexController@cateslist');
	Route::get('/goodslist/{id}','GoodsController@show');
	Route::get('/goodsdetails/{id}','GoodsController@goodsdetails');



});