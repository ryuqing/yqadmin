<!DOCTYPE html>
<html lang="zh-CN">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>控制台-Yqadmin</title>
		<meta name="keywords" content="" />
		<meta name="description" content="" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
		<link rel="stylesheet" href="{{asset('resources/views/admin/style/css/bootstrap.css')}}" />
		<link rel="stylesheet" href="{{asset('resources/views/admin/style/css/font-awesome.css')}}" />
		<link rel="stylesheet" href="{{asset('resources/views/admin/style/css/ace-fonts.css')}}">
		<link rel="stylesheet" href="{{asset('resources/views/admin/style/css/ace.css')}}" class="ace-main-stylesheet" id="main-ace-style" />
   		<script type="text/javascript" src="{{asset('resources/views/admin/style/js/ace-extra.js')}}"></script>
</head>
<body class="no-skin">
@yield('content')
@include('layouts.footerjs')
		<!-- inline scripts related to this page -->
		<script type="text/javascript">
		$(function(){
			$(".check-all").click(function(){
				$(".aids").prop("checked", this.checked);
			});
			$(".aids").click(function(){
				var option = $(".ids");
				option.each(function(i){
					if(!this.checked){
						$(".check-all").prop("checked", false);
						return false;
					}else{
						$(".check-all").prop("checked", true);
					}
				});
			});
			$("#submit").click(function(){
				bootbox.confirm({
					title: "系统提示",
					message: "是否要删除所选文章？", 
					callback:function(result){
						if(result){
							$("#form").submit();
						}
					},
					buttons: {
						"cancel" : {"label" : "取消"},
						"confirm" : {
								"label" : "确定",
								"className" : "btn-danger"
							}
					}
				});
			});
			$(".del").click(function(){
				var url = $(this).attr('val');
				bootbox.confirm({
					title: "系统提示",
					message: "是否要该文章？", 
					callback:function(result){
						if(result){
							window.location.href = url;
						}
					},
					buttons: {
						"cancel" : {"label" : "取消"},
						"confirm" : {
								"label" : "确定",
								"className" : "btn-danger"
							}
					}
				});
			});
		})
		</script>
</body>
</html>