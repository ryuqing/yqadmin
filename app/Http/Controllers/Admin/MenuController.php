<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\DB;

class MenuController extends ComController
{
    public function index()
    {
        $list = DB::table('auth_rule')->select('id','title','pid','name','icon', 'o','islink')->orderBy('o', 'asc')->get();

        $list = $this->switch_array($list);
        $list = $this->getMenu($list);
        //print_r($list);
        return view('admin.menu.index')->with('list', $list);
    }

    public function edit()
    {
    	$id = $_GET['id'];
        $thisMenuTree = DB::table('auth_rule')->orderBy('o', 'asc')->get();
        $thisMenuTree = $this->switch_array($thisMenuTree);
        $menuTree = $this->getMenu($thisMenuTree);
        $cateInfo = DB::table('auth_rule')->where('id', $id)->first();
    	return view('admin.menu.edit')->with('cateInfo', $cateInfo)->with('menuTree', $menuTree);
    }
}
