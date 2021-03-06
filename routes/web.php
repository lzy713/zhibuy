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




//后台登录
Route::get('/admin/login','Admin\LoginController@login');
Route::post('/admin/dologin','Admin\LoginController@doLogin');
//退出
Route::get('/admin/outLogin','Admin\LoginController@outLogin');	

//验证码
Route::get('/admin/captcha','Admin\LoginController@captcha');

//上传接口
Route::post('/admin/upload/upimg','Admin\UploadController@upimg');


//后台栏目管理
Route::group(['prefix'=>'admin','namespace'=>'Admin','middleware'=>'admin'],function(){

	//后台首页
	Route::get('index','IndexController@index');	

	

	//后台栏目管理
	Route::get('menu/createup','MenuController@createup');//多图上传测试
	Route::resource('menu','MenuController');

	//修改状态
	Route::post('role/status','RoleController@status');
	//角色管理
	Route::resource('role','RoleController');

	
	//修改密码
	Route::get('admin/pass/{id}','AdminController@adminPass');
	Route::post('admin/passup','AdminController@passup');
	//修改状态
	Route::post('admin/status','AdminController@status');
	//管理员管理
	Route::resource('admin','AdminController');

	//广告分类管理
	Route::resource('classposter','ClassPosterController');
	//广告内容管理
	Route::resource('poster','PosterController');


























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
	Route::get('orders','OrdersController@orderList');
	//添加订单页
	Route::get('order/addOrder','OrdersController@addOrder');
	//添加订单
	Route::post('order/add','OrdersController@add');

	//订单详情页
	Route::get('order/orderDetail/{id}','OrdersController@orderDetail');
	//修改订单页
	Route::get('order/editOrder/{id}','OrdersController@editOrder');
	//修改订单
	Route::post('order/updateOrder/{id}','OrdersController@updateOrder');

	/**
	 * 订单Ajax
	 */
	//点击发货
	Route::get('order/statusAjax','OrderAjaxController@statusAjax');
	//点击删除
	Route::get('order/deleteAjax','OrderAjaxController@deleteAjax');
	//判断订单是否可编辑
	Route::get('order/editAjax','OrderAjaxController@editAjax');


	//评论列表
	Route::resource('comments','CommentsController');




















	//后台--贾晓博
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
	//登录页面
	Route::get('login','LoginController@login');

	//登录页面验证码
	Route::get('login/code','LoginController@captcha');

	//发送ajax
	Route::post('login/loguser','LoginController@loguser');


	//注册页面
	Route::get('register','RegisterController@register');
	Route::post('regist','RegisterController@regist');





















	//登录页的忘记密码
	Route::get('login/reset','LoginController@reset');


	//忘记密码安全验证
	Route::post('forget','LoginController@forget');
	Route::get('pass/forgetPassword','LoginController@forgetPassword');


	//忘记密码输入手机短信
	Route::post('note','LoginController@note');

	//修改新密码页面
	Route::post('newnote','LoginController@newnote');


	//密码重新设置
	Route::post('resetword','LoginController@resetword');


	//密码修改成功
	Route::post('passwordsucce','LoginController@succe');

	












	Route::get('/','IndexController@cateslist');
	Route::get('/goodsfind','IndexController@goodsfind');

	Route::get('/goodslist/{id}','GoodsController@show');
	Route::get('/goodsdetails/{id}','GoodsController@goodsdetails');

	









	//注册页面
	Route::get('register','RegisterController@register');
	Route::post('regist','RegisterController@regist');

	
	//注册页表单验证
	Route::get('register/checkuser','RegisterController@checkuser');


	//手机获取短信验证码
	Route::get('register/checkphone','RegisterController@checkphone');
	//短信验证码验证
	Route::get('register/code','RegisterController@code');


	//测评

	Route::get('ceping','CepingController@evalua');

	Route::get('details/{nid}','CepingController@details');
	

   	//公告介绍页面
	Route::get('introduce/{id}','CepingController@detail');









//评论页
Route::get('comments/{id}','CommentsController@index');












Route::get('/','IndexController@cateslist');
Route::get('/goodslist/{id}','GoodsController@show');
Route::get('/goodsdetails/{id}','GoodsController@goodsdetails');


























});



Route::group(['namespace'=>'Home','middleware'=>'login'],function(){

	//个人中心
	Route::get('login/self_auth','LoginController@self');

	//修改保存个人信息
	Route::post('login/have_auth/{id}','LoginController@save');








	/**
	 * 购物车
	 */
	Route::resource('shopCart','shopCartController');
	Route::get('order','shopCartController@order');

	//加入购物车
	Route::get('addCart/{gid}','shopCartController@addCart');
	//加入成功页
	Route::get('successCart','shopCartController@successCart');





	//个人中心修改账号密码页面
	Route::get('login/safe','LoginController@safe');

	//修改密码
	Route::get('login/safe_auth','LoginController@changePass');


	//地址
	Route::resource('address','AddressController');	


	//我的订单
	Route::get('myorder','OrderController@orderList');
	//修改订单状态
	Route::get('myorder/statusAjax/{id}','OrderController@statusAjax');
	//前台删除订单
	Route::get('myorder/flagAjax/{id}','OrderController@flagAjax');
	//订单详情
	Route::get('myorder/orderDetail/{number}','OrderController@orderDetail');
	Route::post('myorders','OrderController@orderList');

	//收货地址页
	Route::get('myaddress','AddressController@index');

	//删除地址
	Route::get('delAjax/{id}','AddressController@delAjax');
	//修改地址
	Route::get('editAjax/{id}','AddressController@editAjax');
	
	//我的收藏
	Route::get('mycollection','CollectionController@index');
	Route::get('shoucang/{id}','CollectionController@add');
	Route::get('delshoucang/{id}','CollectionController@delete');




	
	//退出登录
	Route::get('login/loginout','LoginController@loginout');


	//提交评论
	Route::post('addComments','CommentsController@addComments');

	//回复评论
	Route::post('addUreply','CommentsController@addUreply');

	//评论点赞
	Route::post('addnum/{id}','CommentsController@addnum');


});





























