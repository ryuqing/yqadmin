<?php 
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

/**
* 后台首页控制器
*/

class IndexController extends Controller
{
	public function index()
	{
		echo 'AdminIndex'; 
	}	

	public function login()
	{
		session(['admin' => 1]);
		echo '<h1>login</h>';
	}
}