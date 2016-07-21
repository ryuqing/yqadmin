@extends('layouts.admin')
@section('content')
	@include('layouts.header')
		<div class="main-container" id="main-container">
			<script type="text/javascript">
				try{ace.settings.check('main-container' , 'fixed')}catch(e){}
			</script>

			@include('layouts.sidebar')
			<div class="main-content">
				<div class="main-content-inner">
					<!-- #section:basics/content.breadcrumbs -->
					<include file="Public/breadcrumbs" />

					<!-- /section:basics/content.breadcrumbs -->
					<div class="page-content">
						<include file="Public/set" />

						<!-- /section:settings.box -->
						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->
									<form class="form-horizontal" action="{{url('admin/menu/store')}}" method="post">
									{{csrf_field()}}
									<div class="form-group">
										<label class="col-sm-1 control-label no-padding-right" for="form-field-10"> 上级菜单 </label>
										<div class="col-sm-9">
										<select id="pid" name="pid" class="rcol-xs-10 col-sm-5">
												<option value="0">顶级菜单</option>
											@foreach($menuTree as $list)
												<option value="{{$list['id']}}">{{$list['title']}}</option>
												@if(isset($list['children']))
													@foreach($list['children'] as $childMenu)
													<option value="{{$childMenu['id']}}">&nbsp;&nbsp;┗━{{$childMenu['title']}}</option>
													@endforeach
												@endif
											@endforeach
										</select>
										<span class="help-inline col-xs-12 col-sm-7">
												<span class="middle"></span>
											</span>
										</div>
									</div>
									<div class="space-4"></div>
									<div class="form-group">
										<label class="col-sm-1 control-label no-padding-right" for="form-field-1"> 菜单名称 </label>
										<div class="col-sm-9">
											<input type="text" name="title" id="title" class="rcol-xs-10 col-sm-5" value="">
											<span class="help-inline col-xs-12 col-sm-7">
												<span class="middle"></span>
											</span>
										</div>
									</div>

									<div class="space-4"></div>
									<div class="form-group">
										<label class="col-sm-1 control-label no-padding-right" for="form-field-2"> 链接 </label>
										<div class="col-sm-9">
											<input type="text" name="name" id="name" placeholder="链接，如：Index/index" class="col-xs-10 col-sm-5" value="">
											<span class="help-inline col-xs-12 col-sm-7">
												<span class="middle"></span>
											</span>
										</div>
									</div>

									<div class="space-4"></div>
									<div class="form-group">
										<label class="col-sm-1 control-label no-padding-right" for="form-field-2"> ICON图标 </label>
										<div class="col-sm-9">
											<input type="text" name="icon" id="icon" placeholder="ICON图标" class="col-xs-10 col-sm-5" value="">
											<span class="help-inline col-xs-12 col-sm-7">
												<span class="middle"></span>
											</span>
										</div>
									</div>
									<div class="space-4"></div>
									<div class="form-group">
										<label class="col-sm-1 control-label no-padding-right" for="form-field-2"> 显示状态 </label>
										<div class="control-label no-padding-left col-sm-1">
											<label>
												<input name="islink" id="islink" checked="checked" value="1" class="ace ace-switch ace-switch-2" type="checkbox" />
												<span class="lbl"></span>
											</label>
										</div>
										<span class="help-inline col-xs-12 col-sm-7">
												<span class="middle"></span>
										</span>
									</div>
									<div class="space-4"></div>
									<div class="form-group">
										<label class="col-sm-1 control-label no-padding-right" for="form-field-2"> 排序 </label>
										<div class="col-sm-9">
											<input type="text" name="o" id="o" placeholder="" class="col-xs-10 col-sm-5" value="">
											<span class="help-inline col-xs-12 col-sm-7">
												<span class="middle">越小越靠前</span>
											</span>
										</div>
									</div>
									<div class="space-4"></div>
									<div class="form-group">
										<label class="col-sm-1 control-label no-padding-right" for="form-field-2"> 页面提示</label>
										<div class="col-sm-9">
											<textarea name="tips" id="tips" placeholder="页面提示" class="col-xs-10 col-sm-5" rows="5"></textarea>
											<span class="help-inline col-xs-12 col-sm-7">
												<span class="middle"></span>
											</span>
										</div>
									</div>
									<div class="space-4"></div>
									<div class="col-md-offset-2 col-md-9">
										<button class="btn btn-info" type="submit">
											<i class="icon-ok bigger-110"></i>
											提交
										</button>

										&nbsp; &nbsp; &nbsp;
										<button class="btn" type="reset">
											<i class="icon-undo bigger-110"></i>
											重置
										</button>
									</div>
								</form>
								<!-- PAGE CONTENT ENDS -->
							</div><!-- /.col -->
						</div><!-- /.row -->
					</div><!-- /.page-content -->
				</div>
			</div><!-- /.main-content -->
			<include file="Public/footer" />
			
		</div><!-- /.main-container -->

		<include file="Public/footerjs" />
		<!-- inline scripts related to this page -->
		<script type="text/javascript">
		$(function(){
			var editor = KindEditor.create('textarea[name="tips"]',{
				resizeType : 1,
				allowPreviewEmoticons : false,
				allowImageUpload : false,
				items : [
					'fontname', 'fontsize', '|', 'forecolor', 'hilitecolor', 'bold', 'italic', 'underline',
					'removeformat', '|', 'justifyleft', 'justifycenter', 'justifyright', 'insertorderedlist',
					'insertunorderedlist', '|', 'emoticons','link']
			});
			$(".btn.btn-info").click(function(){
			var title = $("#title").val();
			if(title == ''){
				bootbox.alert({  
					buttons: {  
					   ok: {  
							label: '确定',  
							className: 'btn-myStyle'  
						}  
					},  
					message: '菜单名称不能为空。',
					title: "友情提示",  
				});  
				return false;
			}
			})
		})
		
		</script>

	</body>
</html>
