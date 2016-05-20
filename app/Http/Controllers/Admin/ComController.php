<?php

/*初始化后台模块*/
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class ComController extends Controller
{
    public $USER;

    public function __construct()
    {
        $this->USER = session('user');
        $UID = $this->USER['uid'];
        $prefix = DB::getTablePrefix(); //get table prefix
       // $userinfo = DB::select("SELECT * FROM {$prefix}auth_group g left join {$prefix}auth_group_access a on g.id=a.group_id where a.uid=$UID");
        $current = DB::select("SELECT s.id,s.title,s.name,s.tips,s.pid,p.pid as ppid,p.title as ptitle FROM {$prefix}auth_rule s left join {$prefix}auth_rule p on p.id=s.pid where s.pid=0");

        $menu = DB::table('auth_rule')->select('id','title','pid','name','icon')->where('islink', '1')->get();

        $menu = $this->switch_array($menu);

        $menu = $this->getMenu($menu);
        view()->share('menus', $menu);
    }

    protected function getMenu($items, $id = 'id', $pid = 'pid', $son = 'children')
    {
        $tree = array();
        $tmpMap = array();

        foreach ($items as $item) {

            $tmpMap[$item[$id]] = $item;
        }

        foreach ($items as $item) {
            if (isset($tmpMap[$item[$pid]])) {
                $tmpMap[$item[$pid]][$son][] = &$tmpMap[$item[$id]];
            } else {
                $tree[] = &$tmpMap[$item[$id]];
            }
        }
        return $tree;
    }

    public function switch_array($arr){
        foreach ($arr as $key => $val) {
            $arr[$key] = is_object($val)?get_object_vars($val):$val;
        }
        return $arr;
    }

}
