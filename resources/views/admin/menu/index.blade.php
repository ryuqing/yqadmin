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
								<div class="row">
								<div class="cf">
									<a class="btn btn-info" href="{{url('admin/menu/add')}}" value="">新增</a>
								</div>
								<div class="space-4"></div>
									<form id="form" method="post" action="{:U('del')}">
										<table class="table table-striped table-bordered table-hover">
										<thead>
											<tr>
												<th class="center"><input class="check-all" type="checkbox" value=""></th>
												<th>菜单名称</th>
												<th>链接</th>
												<th>ICON</th>
												<th class="center">状态</th>
												<th>排序</th>
												<th class="center">操作</th>
											</tr>
										</thead>
										<tbody>
										@foreach ($list as $list)
											<tr>
												<td class="center">
													<input class="ids" type="checkbox" name="ids[]" value="{$val['id']}">
												</td>
												<td>{{$list['title']}}</td>
												<td>{{$list['name']}}</td>
												<td><i class="{{$list['icon']}}"></i></td>
												<td class="center">@if($list['islink'] == 1)显示@else隐藏@endif</td>
												<td>{{$list['o']}}</td>
												<td class="center"><a href="edit?id={{$list['id']}}">修改</a>&nbsp;<a class="del" href="javascript:;" val="{{url('admin/menu/del')}}?ids={$list['id']}" title="删除">删除</a></td>
											</tr>
											@if(isset($list['children']))
												@foreach ($list['children'] as $v)
												<tr>
													<td class="center">
														<input class="ids" type="checkbox" name="ids[]" value="{{$v['id']}}">
													</td>
													<td>┗━{{$v['title']}}</td>
													<td>{{$v['name']}}</td>
													<td><i class="{{$v['icon']}}"></i></td>
													<td class="center">@if($v['islink'] == 1)显示@else隐藏@endif</td>
													<td>{{$v['o']}}</td>
													<td class="center"><a href="edit?id={{$v['id']}}">修改</a>&nbsp;<a class="del" href="javascript:;" val="{{url('admin/menu/del')}}?ids={{$v['id']}}" title="删除">删除</a></td>
												</tr>
												@if(isset($v['children']))
													@foreach($v['children'] as $vv)
													<tr>
														<td class="center">
															<input class="ids" type="checkbox" name="ids[]" value="{{$vv['id']}}">
														</td>
														<td>&nbsp;&nbsp;&nbsp;&nbsp;┗━{{$vv['title']}}</td>
														<td>{{$vv['name']}}</td>
														<td><i class="{{$vv['icon']}}"></i></td>
														<td class="center">@if($v['islink'] == 1)显示@else隐藏@endif</td>
														<td>{{$vv['o']}}</td>
														<td class="center"><a href="edit?id={{$vv['id']}}">修改</a>&nbsp;<a class="del" href="javascript:;" val="{{url('admin/menu/del')}}?ids={$vv['id']" title="删除">删除</a></td>
													</tr>
													@endforeach
												@endif
												@endforeach
											@endif
										@endforeach
										</tbody>
									</table>
									</form>
									<div class="cf">
										<input id="submit" class="btn btn-info" type="button" value="删除">
									</div>
								{$page}
								</div>
								<!-- PAGE CONTENT ENDS -->
							</div><!-- /.col -->
						</div><!-- /.row -->
					</div><!-- /.page-content -->
				</div>
			</div><!-- /.main-content -->
			@include('layouts.footer')
		</div><!-- /.main-container -->
@endsection