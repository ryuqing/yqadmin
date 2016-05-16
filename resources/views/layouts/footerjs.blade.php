		<!-- basic scripts -->

		<!--[if !IE]> -->
		<script type="text/javascript">
			window.jQuery || document.write("<script src='{{asset('resources/views/admin/style/js/jquery.js')}}'>"+"<"+"/script>");
		</script>

		<!-- <![endif]-->
		<script type="text/javascript">
			if('ontouchstart' in document.documentElement) document.write("<script src='{{asset('resources/views/admin/style/js/jquery.mobile.custom.js')}}'>"+"<"+"/script>");
		</script>
		<script src="{{asset('resources/views/admin/style/js/bootstrap.js')}}"></script>
		<!-- page specific plugin scripts -->
		<script charset="utf-8" src="{{asset('resources/views/admin/style/kindeditor/kindeditor-min.js')}}"></script>
		<script charset="utf-8" src="{{asset('resources/views/admin/style/kindeditor/lang/zh_CN.js')}}"></script>
		<script src="{{asset('resources/views/admin/style/js/bootbox.js')}}"></script>
		<!-- ace scripts -->
		<script src="{{asset('resources/views/admin/style/js/ace/elements.scroller.js')}}"></script>
		<script src="{{asset('resources/views/admin/style/js/ace/elements.colorpicker.js')}}"></script>
		<script src="{{asset('resources/views/admin/style/js/ace/elements.fileinput.js')}}"></script>
		<script src="{{asset('resources/views/admin/style/js/ace/elements.typeahead.js')}}"></script>
		<script src="{{asset('resources/views/admin/style/js/ace/elements.wysiwyg.js')}}"></script>
		<script src="{{asset('resources/views/admin/style/js/ace/elements.spinner.js')}}"></script>
		<script src="{{asset('resources/views/admin/style/js/ace/elements.treeview.js')}}"></script>
		<script src="{{asset('resources/views/admin/style/js/ace/elements.wizard.js')}}"></script>
		<script src="{{asset('resources/views/admin/style/js/ace/elements.aside.js')}}"></script>
		<script src="{{asset('resources/views/admin/style/js/ace/ace.js')}}"></script>
		<script src="{{asset('resources/views/admin/style/js/ace/ace.ajax-content.js')}}"></script>
		<script src="{{asset('resources/views/admin/style/js/ace/ace.touch-drag.js')}}"></script>
		<script src="{{asset('resources/views/admin/style/js/ace/ace.sidebar.js')}}"></script>
		<script src="{{asset('resources/views/admin/style/js/ace/ace.sidebar-scroll-1.js')}}"></script>
		<script src="{{asset('resources/views/admin/style/js/ace/ace.submenu-hover.js')}}"></script>
		<script src="{{asset('resources/views/admin/style/js/ace/ace.widget-box.js')}}"></script>
		<script src="{{asset('resources/views/admin/style/js/ace/ace.settings.js')}}"></script>
		<script src="{{asset('resources/views/admin/style/js/ace/ace.settings-rtl.js')}}"></script>
		<script src="{{asset('resources/views/admin/style/js/ace/ace.settings-skin.js')}}"></script>
		<script src="{{asset('resources/views/admin/style/js/ace/ace.widget-on-reload.js')}}"></script>
		<script src="{{asset('resources/views/admin/style/js/ace/ace.searchbox-autocomplete.js')}}"></script>

<!-- inline scripts related to this page -->
<script type="text/javascript">
	$(function(){

		$("#officialnews ul").html('<div class="ace-icon fa fa-spinner fa-spin orange"></div>');
		$.ajax({
			type: 'GET',
			url: '{$Think.CONFIG.NEWS_URL}?callback=?',
			success :function(data){
				$("#officialnews ul").html("");
				$.each(data.news, function(i,news){
					$("#officialnews ul").append("<li>"+news.pre+"<a href=\""+news.url+"\" title=\""+news.title+"\" target=\"_blank\">"+news.title+"</a>"+news.time+"</li>");
				});
			},
			error: function(){
				$("#officialnews ul").html("服务器不可用，请稍后再试！");
			},
			dataType: 'json'
		});

		$("#update").click(function(){

			$("#upmsg").html("");
			$("#upmsg").addClass("ace-icon fa fa-refresh fa-spin blue");
			$.ajax({
				type: 'GET',
				url: '{$Think.CONFIG.UPDATE_URL}?v=版本1&callback=?',
				success :function(json){
					if(json.result=='no'){
						$("#upmsg").html("目前还没有适合您当前版本的更新！").removeClass();
					}else if(json.result=='yes'){
						$("#upmsg").html("检查到新版本 "+json.ver+"，请前往“系统设置”->“<a  href=\"{:U('Update/update')}\">在线升级</a>”").removeClass();
					}
				},
				error: function(){
					$("#upmsg").html("悲剧了，网络故障，请稍后再试！").removeClass();
				},
				dataType: 'json'
			});

		});
	})
	$(function() {
		$(".btn-info.submit").click(function(){
			var content = $("#content").val();
			if(content==''){
				bootbox.dialog({
					title: '友情提示：',
					message: "反馈内容必须填写。",
					buttons: {
						"success" : {
							"label" : "确定",
							"className" : "btn-danger"
						}
					}
				});
				return;
			}

			$("#form").submit();
		});
	});


</script>