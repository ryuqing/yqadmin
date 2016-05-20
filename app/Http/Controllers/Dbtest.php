<?php

/**
 JUST FOR TEST
 **/
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\DB;

class Dbtest extends Controller
{
    public function index(){
        $rules = DB::table('auth_rule')->get(); //get获取所有的结果集
        $user  = DB::table('auth_rule')->where('id','18')->first();
        $value = DB::getTablePrefix();
        dd($value);

    }
}
