<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<base href="<?=base_url('public/admin').'/'?>">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="css/css.css" />
<style type="text/css">
.gai{
	cursor: pointer;
}
</style>
<script type="text/javascript" src="js/jquery.min.js"></script>
<!-- <script type="text/javascript" src="js/page.js" ></script> -->
</head>

<body>
	<div id="pageAll">
		<div class="pageTop">
			<div class="page">
				<img src="img/coin02.png" /><span><a href="<?=site_url('admin/Index/main')?>">首页</a>&nbsp;-&nbsp;<a
					href="javascript:;">商品管理</a>&nbsp;-</span>&nbsp;类型查看&nbsp;-&nbsp;<a
					href="<?=site_url('admin/GoodsType/insert')?>">新增类型</a>
			</div>
		</div>

		<div class="page">
			<!-- topic页面样式 -->
			<div class="topic">
				<div class="connoisseur">
					<div class="conform">
					<form>
						<div class="cfD">
							<button style="cursor:pointer" class="button">搜索</button>
						</div>
					</form>
					</div>
				
				<!-- topic表格 显示 -->
				<div class="conShow">
					<table border="1" width="100%" cellspacing="0" cellpadding="0">
						<tr>
							<td width="66px" class="tdColor tdC">序号</td>
							<td width="200px" class="tdColor">类型名称</td>
							<td width="130px" class="tdColor">操作</td>
						</tr>
						<tbody id="div">
						<?php foreach($data as $k=>$v){?>
						<tr height="40">
							<td><?=$v['type_id']?></td>
							<td><?=$v['type_name']?></td>
							<td>
								<a href="<?=site_url('admin/Attr/index'.'/'.$v['type_id'])?>">查看属性</a>
								<a href="<?=site_url('admin/GoodsType/update').'/'.$v['type_id']?>"><img class="operation" src="img/update.png"></a> 
								<a href="javascript:;"><img class="operation delban" src="img/delete.png"></a>
							</td>
						</tr>
						<?php
						}?>
						</tbody>
					</table>
					<div class="paging">
				       <button status='1' class="ajaxPage">首页</button>
				       <button status='2' class="ajaxPage">上一页</button>
				       <button status='3' class="ajaxPage">下一页</button>
				       <button status='4' class="ajaxPage">尾页</button>
				       <input class="num" type="hidden" value="">
					</div>
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
	// //即点即改
	// $(document).on('click','.gai',function(){
	// 	//获取is_show
	// 	var obj=$(this);
	// 	var is_show=obj.data('show');
	// 	var brand_id=obj.parent().parent().data('id');
	// 	if(is_show == 0)
	// 	{
	// 		is_show=1;
	// 	}
	// 	else
	// 	{
	// 		is_show=0;
	// 	}
	// 	var url="<?=site_url('admin/Brand/ajaxGai')?>";
	// 	$.ajax({
	// 		type:'get',
	// 		url:url,
	// 		data:{is_show:is_show,brand_id:brand_id},
	// 		success:function(e)
	// 		{
	// 			if(e == 0)
	// 			{
	// 				alert('修改失败');
	// 				return false;
	// 			}
	// 			if(is_show == 0)
	// 			{
	// 				obj.parent().html('<span class="gai" data-show=0>×</span>');
	// 			}
	// 			if(is_show == 1)
	// 			{
	// 				obj.parent().html('<span class="gai" data-show=1>√</span>');
	// 			}
	// 		}
	// 	})
	// })
	// $('.ajaxPage').click(function(){
	// 	var obj=$(this);
	// 	//得到当前页
	// 	var num=$(".num").val();
		
	// 	var sum="<?=$sum?>";
	// 	var status=obj.attr('status');
	// 	if(status == 1)//首页
	// 	{
	// 		num=1;
	// 	}
	// 	if(status == 2)//上一页
	// 	{
	// 		num=num-1;
	// 	}
	// 	if(status == 3)//下一页
	// 	{
	// 		num=num/1+1;
	// 	}
	// 	if(status == 4)//尾页
	// 	{
	// 		num=sum;
	// 	}
	// 	if(num < 1)
	// 	{
	// 		num=1;
	// 	}
	// 	if(num>sum)
	// 	{
	// 		num=sum;
	// 	}
	// 	var url="<?=site_url('admin/Brand/index')?>";
	// 	$.ajax({
	// 		type:'get',
	// 		url:url,
	// 		dataType:'JSON',
	// 		data:{num:num},
	// 		success:function(e)
	// 		{
	// 			var img="<?=base_url('Uploads/admin').'/'?>";
	// 			$(".num").val(e.num);
	// 			$("#div").html('');
	// 			$.each(e.centent,function(k,v){
	// 				var tr=$('<tr height="40"></tr>');
	// 				tr.append('<td>'+v.brand_id+'</td>');
	// 				tr.append('<td>'+v.brand_name+'</td>');
	// 				tr.append('<td><img src="'+img+v.brand_logo+'" height="50px" width="50px"></td>');
	// 				tr.append('<td>'+v.brand_desc+'</td>');
	// 				tr.append('<td>'+v.site_url+'</td>');
	// 				tr.append('<td>'+v.sort+'</td>');
	// 				var is_show=v.is_show==1?'<span class="gai" data-show=1>√</span>':'<span class="gai" data-show=0>×</span>';
	// 				tr.append('<td data-id='+v.brand_id+'><span>'+is_show+'</span></td>');
	// 				tr.append('<td><a href="connoisseuradd.html"><img class="operation" src="img/update.png"></a><img class="operation delban" src="img/delete.png"></td>');
	// 				$("#div").append(tr);
	// 			})
	// 		}
	// 	})

	// })
</script>
</html>