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

        return view('admin.menu.index')->with('list', $list);
    }
}
