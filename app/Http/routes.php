<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/*这种方式是路由直接访问view*/
/*Route::get('/', function () { 
    return view('welcome');
});
Route::get('/view', 'ViewController@index');
*/
//2、Route::get('test', 'IndexController@index'); //控制器路由

Route::get('index', 'Admin\IndexController@index');

/****后台路由****/
//3、命名路由为生成 URL 或重定向提供了便利。
/*Route::get('user', ['as' => 'profile', function () {
	echo route('profile');
    return '<h1>命名路由</h1>';
}]);*/

//4、路由群组 访问uri = /admin/index
/*Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => ['web', 'admin.login']], function() {
	Route::get('index', 'IndexController@index');
	Route::resource('article', 'ArticleController'); //资源路由
});*/

/*5、RESTful 资源控制器
blog.hd/admin/article/create
blog.hd/admin/article/add/
blog.hd/admin/article/edit/
*/

//中间件
Route::group(['middleware' => ['web']], function() {
	Route::any('admin/login', 'Admin\LoginController@login'); //把login独立出来
	Route::get('admin/code', 'Admin\LoginController@code');
});