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

/**临时路由**/

Route::get('index', 'Admin\IndexController@index');

/****后台路由****/
Route::group(['middleware' => ['web']], function() {
	Route::any('admin/login', 'Admin\LoginController@login'); //把login独立出来
	Route::get('admin/code', 'Admin\LoginController@code');
});