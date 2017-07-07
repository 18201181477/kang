<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<base href="<?=base_url('public/admin').'/'?>">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<style type="text/css">
	.name{
    text-align: left;
    border: 1px solid #dcdbdb;
}
</style>
<link rel="stylesheet" type="text/css" href="css/css.css" />
<script type="text/javascript" src="js/jquery.min.js"></script>
<!-- <script type="text/javascript" src="js/page.js" ></script> -->
</head>

<body>
	<div id="pageAll">
		<div class="pageTop">
			<div class="page">
				<img src="img/coin02.png" /><span><a href="<?=site_url('admin/Index/main')?>">首页</a>&nbsp;-&nbsp;<a
					href="javascript:;">管理员管理</a>&nbsp;-</span>&nbsp;权限查看&nbsp;-&nbsp;<a
					href="<?=site_url('admin/Qx/insert')?>">新增权限</a>
			</div>
		</div>

		<div class="page">
			<!-- topic页面样式 -->
			<div class="topic">
				
				<!-- topic表格 显示 -->
				<div class="conShow">
					<table border="1" width="100%" cellspacing="0" cellpadding="0">
						<tr>
							<td width="66px" class="tdColor tdC">序号</td>
							<td width="200px" class="tdColor">权限名称</td>
							<td width="200px" class="tdColor">控制器</td>
							<td width="200px" class="tdColor">方法</td>
							<td width="200px" class="tdColor">菜单级别</td>
							<td width="130px" class="tdColor">操作</td>
						</tr>
						<?php foreach($data as $v){?>
						<tr height="40px">
							<td><?=$v['qx_id']?></td>
							<td class="name">
								<?php
								$str=str_repeat('---',$v['level']);
								echo $str.$v['qx_name'];
								?>
							</td>
							<td><?=$v['qx_controller']?></td>
							<td><?=$v['qx_action']?></td>
							<td><?=$v['qx_unit']?></td>
							<td>
								<a href="javascript:;"><img class="operation" src="img/update.png"></a> 
								<a href="javascript:;"><img class="operation delban" src="img/delete.png"></a>
							</td>
						</tr>
						<?php
						}?>
					</table>
					<div class="paging">此处是分页</div>
				</div>
				<!-- topic 表格 显示 end-->
			</div>
			<!-- topic页面样式end -->
		</div>

	</div>


	<!-- 删除弹出框 -->
	<div class="banDel">
		<div class="delete">
			<div class="close">
				<a><img src="img/shanchu.png" /></a>
			</div>
			<p class="delP1">你确定要删除此条记录吗？</p>
			<p class="delP2">
				<a href="#" class="ok yes">确定</a><a class="ok no">取消</a>
			</p>
		</div>
	</div>
	<!-- 删除弹出框  end-->
</body>

<script type="text/javascript">
// 广告弹出框
$(".delban").click(function(){
  $(".banDel").show();
});
$(".close").click(function(){
  $(".banDel").hide();
});
$(".no").click(function(){
  $(".banDel").hide();
});
// 广告弹出框 end
</script>
</html>