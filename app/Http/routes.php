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

Route::get('dbtest', 'Dbtest@index');
Route::get('inilze', 'Admin\ComController@_initialize');

/**后台路由**/
Route::get('index', 'Admin\IndexController@index');
Route::any('admin/login', 'Admin\LoginController@login'); //把login独立出来
Route::get('admin/logout', 'Admin\LoginController@logout'); //
Route::get('admin/code', 'Admin\LoginController@code');

/****后台路由群组****/
Route::group(['prefix' => 'admin', 'namespace' => 'Admin','middleware' => ['web','admin.login']], function() {
	Route::get('/index', 'IndexController@index');
	Route::get('/menu/index', 'MenuController@index');
	Route::get('/menu/add', 'MenuController@add');
	Route::get('/menu/edit', 'MenuController@edit');
	Route::get('/menu/del', 'MenuController@del');
	Route::post('/menu/store', 'MenuController@store');

	//像上面增删改查不可能一个一个路由写，所以用资源路由
	Route::resource('user', 'UserController');

});