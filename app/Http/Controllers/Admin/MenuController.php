<?php
/*
*功能说明：后台菜单
*
*/
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Model\Admin;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

class MenuController extends ComController
{
    public function index()
    {
        $list = DB::table('auth_rule')->select('id','title','pid','name','icon', 'o','islink')->orderBy('o', 'asc')->get();

        $list = $this->switch_array($list);
        $list = $this->getMenu($list);

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

    //保存数据
    public function store() 
    {
        $input = Input::except('_token'); //除了token数据之外

        //数据验证、保存
        $rules = [
            'title' => 'required',
            'pid'   => 'required',
        ];
        $message = [
            'title.required' => '分类名称不能为空',
        ];
        $validator = Validator::make($input, $rules, $message);
        if($validator->passes()) {
            $res = Admin\Menu::create($input);
            if($res){
                return redirect('admin/menu/index');
            }
        }else {
            return back()->withErrors($validator);
        }
    }

    public function add()
    {
        $MenuTree = DB::table('auth_rule')->orderBy('o', 'asc')->get();
        $MenuTree = $this->switch_array($MenuTree);
        $menuTree = $this->getMenu($MenuTree);
        return view('admin/menu/add')->with('menuTree', $menuTree);
    }

    public function del()
    {
        $id = $_GET['ids'];
        $res = Admin\Menu::where('id', $id)->delete();
        if($res) {
            echo '删除成功';
        }

    }

}
