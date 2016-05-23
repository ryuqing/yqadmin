<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\DB;

class MenuController extends ComController
{
    public function index()
    {
        $list = DB::table('auth_rule')->select('id','title','pid','name','icon')->orderBy('o', 'asc')->get();
        return view('admin.menu.index')->with('list', $list);
    }
}
