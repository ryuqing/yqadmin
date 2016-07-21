# Laravel 写的万能系统
进度：设计好了数据库，后台菜单实现了



#some notes
数据的增删改查:
1.blade.php from表单加上 {{csrf_field()}}
2.控制器里定义$rules和$messages数组 定义数据验证规则和提示信息.
3.再用$validator = Validator::make($input, $rules, $message); 查看是否验证通过$validator->passes();
