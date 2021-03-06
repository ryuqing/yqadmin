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
					<div class="breadcrumbs" id="breadcrumbs">
						<script type="text/javascript">
							try{ace.settings.check('breadcrumbs' , 'fixed')}catch(e){}
						</script>

						<ul class="breadcrumb">
							<li>
								<i class="ace-icon fa fa-home home-icon"></i>
								<a href="">首页</a>
							</li>

							<li>
								<a href="#">控制台</a>
							</li>
							<li class="active">日志查看</li>
						</ul><!-- /.breadcrumb -->
					</div>

					<!-- /section:basics/content.breadcrumbs -->
					<div class="page-content">
						<include file="Public/set" />

						<!-- /section:settings.box -->
						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->
								<div class="row">

									<div id="accordion-sysinfo" class="accordion-style1 panel-group col-sm-3">
												<div class="panel panel-default">
													<div class="panel-heading">
														<h4 class="panel-title">
															<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion-sysinfo" href="#sysinfo">
																<i class="ace-icon fa fa-angle-down bigger-110" data-icon-hide="ace-icon fa fa-angle-down" data-icon-show="ace-icon fa fa-angle-right"></i>
																&nbsp;站点信息
															</a>
														</h4>
													</div>

													<div class="panel-collapse collapse in" id="sysinfo">
														<div class="panel-body">
															<p>PHP版本：<?php echo PHP_VERSION ?>，MySQL版本：</p>
															<p>服务器：<?php echo php_uname('s');?></p>
															<p>PHP运行方式：<?php echo php_sapi_name();?></p>
															<p>服务器IP：<?php echo GetHostByName($_SERVER['SERVER_NAME']);?></p>
															<p>程序版本：&nbsp;&nbsp;<a href="javascript:;" id="update">检查更新</a>&nbsp;&nbsp;<span id="upmsg"></span></p>

														</div>
													</div>
												</div>
									</div>
									<div id="accordion" class="accordion-style1 panel-group col-sm-5">
												<div class="panel panel-default">
													<div class="panel-heading">
														<h4 class="panel-title">
															<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
																<i class="ace-icon fa fa-angle-down bigger-110" data-icon-hide="ace-icon fa fa-angle-down" data-icon-show="ace-icon fa fa-angle-right"></i>
																&nbsp;官方消息
															</a>
														</h4>
													</div>

													<div class="panel-collapse collapse in" id="collapseOne">
														<div id="officialnews" class="panel-body">
															<ul>
															</ul>
														</div>
													</div>
												</div>
									</div>
									<div id="Facebook-info" class="accordion-style1 panel-group col-sm-4">
												<div class="panel panel-default">
													<div class="panel-heading">
														<h4 class="panel-title">
															<a class="accordion-toggle" data-toggle="collapse" data-parent="#Facebook-info" href="#Facebook">
																<i class="ace-icon fa fa-angle-down bigger-110" data-icon-hide="ace-icon fa fa-angle-down" data-icon-show="ace-icon fa fa-angle-right"></i>
																&nbsp;提交反馈
															</a>
														</h4>
													</div>

													<div class="panel-collapse collapse in" id="Facebook">
														<div class="panel-body">
															<form class="form-horizontal" id="form" method="post" action="{:U('facebook/add',array('act'=>'update'))}">
															<div class="space-4"></div>
															<div class="form-group">
															
																<div class="col-sm-12">
																	<textarea name="content" id="content" placeholder="请输入您反馈内容,您的支持是我们前进的最大动力！" class="col-xs-5 col-sm-12" rows="3"></textarea>
																	<span class="help-inline col-xs-12 col-sm-7">
																		<span class="middle"></span>
																	</span>
																</div>
															</div>
															<div class="col-md-offset-2 col-md-9">
																<button class="btn btn-info submit" type="button">
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

														</div>
													</div>
												</div>
									</div>
								</div>		
								<table class="table table-striped table-bordered">
									<thead>
										<tr>
											<th class="center">#</th>
											<th>用户</th>
											<th>时间</th>
											<th>IP</th>
											<th class="col-xs-7">日志内容</th>
										</tr>
									</thead>
									<tbody>
									<volist name="list" id="val">
										<tr>
											<td>{$val['id']}</td>
											<td>{$val['name']}</td>
											<td>{$val['t']|date="Y-m-d H:i:s",###}</td>
											<td>{$val['ip']}</td>
											<td>{$val['log']}</td>
										</tr>
									</volist>
									</tbody>
								</table>
								{$page}
								<!-- PAGE CONTENT ENDS -->
							</div><!-- /.col -->
						</div><!-- /.row -->
					</div><!-- /.page-content -->
				</div>
			</div><!-- /.main-content -->
			@include('layouts.footer')
		</div><!-- /.main-container -->
@endsection