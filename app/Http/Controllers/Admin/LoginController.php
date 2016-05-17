<?php

namespace App\Http\Controllers\Admin;
use App\Http\Model\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Crypt;
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
            $user = User::first();
            if($user->user != $input['user'] || $user->password != md5($input['password'])) {
                return back()->with('msg','用户名或者密码错误！');
            }
            session(['user'=>$user]);
            return redirect('admin/index');
        }else{
            return view('admin.login');
        }

    }

    public function  logout(){
        session(['user' => null ]);
        return redirect('admin/index');
    }
    public function code()
    {
        $code = new \Code;
        $code->make();
    }

}
