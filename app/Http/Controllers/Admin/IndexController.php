<?php 
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

/*
* 后台首页控制器
*/

class IndexController extends ComController
{
	public function index()
	{
		return view('admin/index/index');
	}	

}