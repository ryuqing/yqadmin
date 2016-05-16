<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Input;

require_once('resources\org\code\code.class.php');
class LoginController extends ComController
{
    public function login()
    {
        if($input = Input::all()){
            $code = new \Code;
            $_code = $code->get();
            if(strtoupper($input['verify'])!=$_code){
                return back()->with('msg','验证码错误');
            }
            echo '验证码正确';
        }
        return view('admin.login');
    }

    public function code()
    {
        $code = new \Code;
        $code->make();
    }

    public function get_code()
    {
        $code = new \Code;
        echo $code->get();
    }
}
