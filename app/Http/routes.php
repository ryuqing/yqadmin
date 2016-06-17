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
Route::group(['middleware' => ['web','admin.login']], function() {
	Route::get('/admin/index', 'Admin\IndexController@index');
	Route::get('/admin/menu/index', 'Admin\MenuController@index');
	Route::get('/admin/menu/edit', 'Admin\MenuController@edit');
});