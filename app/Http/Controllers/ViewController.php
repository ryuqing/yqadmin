<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class ViewController extends Controller
{
    public function index()
    {	
    	$data = [
    		'name' => 'ryq',
    		'age' => 28,
    		'money' => 6666666
    	];
    	$title = '后盾网视频课程开课了';
    	//1、return view('my_laravel', $data); //view 直接输出
    	//$name = '博客';
    	//2、return view('my_laravel')->with('name', $name); //view 层之间输出
    	//3
    	return view('my_laravel', compact('data', 'title'));

    }
}
