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
//
Route::get('/', function () {
    return view('welcome');
});
//Route::get('/goods','GoodsController@goods');
//Route::post('/addDo','GoodsController@addDo');
//Route::match(['get','post'],'/goods','GoodsController@goods');
//Route::match(['get','post'],'/addDo','GoodsController@addDo');
//Route::any('/addDo/{id?}/{name?}','GoodsController@addDo')->where(['id'=>'\d','name'=>'\w']);

//品牌的路由
Route::any('/brand/create','BrandController@create')->middleware("is_login");
Route::post('/brand/store','BrandController@store')->middleware("is_login");
Route::get('/brand/index','BrandController@index')->middleware("is_login");
Route::get('/brand/destroy/{id?}','BrandController@destroy')->middleware("is_login");
Route::get('/brand/edit/{id?}','BrandController@edit')->middleware("is_login");
Route::post('/brand/update/{id?}','BrandController@update')->middleware("is_login");
//学生的路由
Route::any('/student/create','StudentController@create');
Route::any('/student/store','StudentController@store');
Route::any('/student/index','StudentController@index');
//分类的路由
Route::any('/Category/create','CategoryController@create')->middleware("is_login");
Route::post('/category/store','CategoryController@store')->middleware("is_login");
Route::get('/category/index','CategoryController@index')->middleware("is_login");
Route::post('/category/index','CategoryController@index')->middleware("is_login");
Route::get('/category/destroy/{id?}','categoryController@destroy')->middleware("is_login");
Route::get('/category/edit/{id?}','categoryController@edit')->middleware("is_login");
Route::post('/category/update/{id?}','categoryController@update')->middleware("is_login");
//小区的路由 Area
Route::any('/area/create','AreaController@create');
Route::post('/area/store','AreaController@store');
Route::get('/area/index','AreaController@index');
//商品的路由 Goods
Route::prefix("goods")->middleware("is_login")->group(function (){
    Route::any('create','GoodsController@create');
    Route::post('store','GoodsController@store');
    Route::get('index','GoodsController@index');
    Route::get('destroy/{id?}','GoodsController@destroy');
    Route::get('edit/{id?}','GoodsController@edit');
    Route::post('update/{id?}','GoodsController@update');
});
//管理员的路由 admin
Route::prefix("admin")->middleware("is_login")->group(function (){
    Route::any('create','AdminController@create');
    Route::post('store','AdminController@store');
    Route::get('index','AdminController@index');
    Route::get('destroy/{id?}','AdminController@destroy');
    Route::get('edit/{id?}','AdminController@edit');
    Route::post('update/{id?}','AdminController@update');
});
//新闻的路由 admin
Route::prefix("xw")->middleware("is_login")->group(function (){
    Route::any('create','XwController@create');
    Route::any('aj','XwController@index');
    Route::post('store','XwController@store');
    Route::get('index','XwController@index');
    Route::get('destroy/{id?}','XwController@destroy');
    Route::get('edit/{id?}','XwController@edit');
    Route::post('update/{id?}','XwController@update');
});
//文章的路由 wz
Route::prefix("wz")->middleware("is_login")->group(function (){
    Route::any('create','WzController@create');
    Route::any('aja','WzController@aja');
    Route::any('aj','WzController@index');
    Route::post('store','WzController@store');
    Route::get('index','WzController@index');
    Route::get('destroy/{id?}','WzController@destroy');
    Route::get('edit/{id?}','WzController@edit');
    Route::post('update/{id?}','WzController@update');
});
//前台首页
Route::any('/','Index\IndexController@index');
Route::domain("www.blog.com")->group(function (){

//登陆的路由
Route::any('/login/login','LoginController@login');
Route::any('/login/loginDo','LoginController@loginDo');
//主页面
Route::any('/login/index','LoginController@index')->middleware("is_login");
//退出
Route::any('/login/quit','LoginController@quit')->middleware("is_login");



//前台登陆
Route::any('/login','Index\IndexController@login');
//前台登陆执行
Route::any('/loginDo','Index\IndexController@loginDo');
//前台注册
Route::any('/reg','Index\IndexController@reg');
//前台注册执行
Route::any('/regDo','Index\IndexController@regDo');
//前台注册ajax发送手机验证码
Route::any('/ajatel','Index\IndexController@ajatel');
//前台注册ajax发送邮箱验证码
Route::any('/ajaemail','Index\IndexController@ajaemail');
//前台退出
Route::any('/regdele','Index\IndexController@regdele');
//前台所有商品
Route::any('/prolist','Index\IndexController@prolist');
//前台商品详情
Route::any('/proinfo/{id?}','Index\IndexController@proinfo');
//前台商品添加购物车
Route::any('/cart','Index\CartController@cart');
//前台商品购物车列表
Route::any('/cartList','Index\CartController@cartList');
//前台商品购物车列表总价
Route::any('/getMoney','Index\CartController@getMoney');
//前台商品订单添加
Route::any('/pay','Index\CartController@pay');
//前台商品订单
Route::any('/payDo','Index\CartController@payDo');
//前台我的
Route::any('/wd','Index\CartController@wd');
//前台收获地址管理
Route::any('/address','Index\CartController@address');
//前台收获地区ajax
Route::any('/addresAja','Index\CartController@addresAja');
//前台执行添加收货地址
Route::any('/addressDo','Index\CartController@addressDo');
//前台收货地址展示
Route::any('/addaddres','Index\CartController@addaddres');
//前台支付接口
Route::any('/alipay/{id}','Index\CartController@alipay');
//前台
Route::any('/return_url','Index\CartController@return_url');
//前台
Route::any('/notify_url','Index\CartController@notify_url');

});



//
//Auth::routes();
//
//Route::get('/home', 'HomeController@index')->name('home');
