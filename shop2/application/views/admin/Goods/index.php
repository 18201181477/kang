<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<base href="<?=base_url('public/admin').'/'?>">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="css/css.css" />
<style type="text/css">
.gai,.name{
	cursor: pointer;
}
.text{
	width: 100px;
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
					href="javascript:;">商品管理</a>&nbsp;-</span>&nbsp;商品查看&nbsp;-&nbsp;<a
					href="<?=site_url('admin/Goods/insert')?>">新增商品</a>
			</div>
		</div>

		<div class="page">
			<!-- topic页面样式 -->
			
				
				<!-- topic表格 显示 -->
				<div class="conShow">
					<table border="1" width="100%" cellspacing="0" cellpadding="0">
						<tr>
							<td width="66px" class="tdColor tdC">序号</td>
							<td width="200px" class="tdColor">商品名称</td>
							<td width="200px" class="tdColor">货号</td>
							<td width="200px" class="tdColor">价格</td>
							<td width="200px" class="tdColor">上架</td>
							<td width="130px" class="tdColor">精品</td>
							<td width="130px" class="tdColor">新品</td>
							<td width="130px" class="tdColor">热销</td>
							<td width="130px" class="tdColor">排序</td>
							<td width="130px" class="tdColor">库存</td>
							<td width="130px" class="tdColor">操作</td>
						</tr>
							<tbody id="div">
						<?php foreach($data as $k=>$v){?>
						<tr height="40">
							<td><?=$v['goods_id']?></td>
							<td>
								<span class="name"><?=$v['goods_name']?></span>
								<input data-id="<?=$v['goods_id']?>" class="text" type="hidden">
							</td>
							<td><?=$v['goods_snsn']?></td>
							<td><?=$v['shop_price']?></td>
							<td data-id=<?=$v['goods_id']?>>
								<span>
									<?php 
										if($v['is_on_sale'] == 1)
										{
											echo "<span status='0' class='gai' data-show=1>√</span>";
										}
										else
										{
											echo "<span status='0' class='gai' data-show=0>×</span>";
										}
									?>
								</span>
							</td>
							<td data-id=<?=$v['goods_id']?>>
							<span>
								<?php 
									if($v['is_best'] == 1)
									{
										echo "<span status='1' class='gai' data-show=1>√</span>";
									}
									else
									{
										echo "<span status='1' class='gai' data-show=0>×</span>";
									}
								?>
							</span>
							</td>
							<td data-id=<?=$v['goods_id']?>>
							<span>
								<?php 
									if($v['is_new'] == 1)
									{
										echo "<span status='2' class='gai' data-show=1>√</span>";
									}
									else
									{
										echo "<span status='2' class='gai' data-show=0>×</span>";
									}
								?>
							</span>
							</td>
							<td data-id=<?=$v['goods_id']?>>
							<span>
								<?php 
									if($v['is_hot'] == 1)
									{
										echo "<span status='3' class='gai' data-show=1>√</span>";
									}
									else
									{
										echo "<span status='3' class='gai' data-show=0>×</span>";
									}
								?>
							</span>
							</td>
							<td><?=$v['sort']?></td>
							<td><?=$v['goods_number']?></td>
							<td>
								<a href="javascript:;"><img class="operation" src="img/update.png"></a> 
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
				       <input class="num" type="hidden" >
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
	//即点即查
	$('#type').change(function(){
		var obj=$(this);
		var type_id=obj.val();
		var url="<?=site_url('admin/Attr/ajaxSearch')?>";
		//发送ajax
		$.ajax({
			type:'get',
			url:url,
			dataType:'json',
			data:{type_id:type_id},
			success:function(e)
			{
				$('#div').html('');
				$.each(e,function(k,v){
					var tr=$('<tr height="40px"></tr>');
					tr.append('<td>'+v.attr_id+'</td>');
					tr.append('<td>'+v.attr_name+'</td>');
					tr.append('<td>'+v.attr_values+'</td>');
					var attr_type=v.attr_type==1?'规格':'参数';
					tr.append('<td>'+v.attr_type+'</td>');
					tr.append('<td>'+v.sort+'</td>');
					tr.append('<td><a href="javascript:;"><img class="operation" src="img/update.png"></a><a data-id='+v.attr_id+' class="ajaxDel" href="javascript:;"><img class="operation delban" src="img/delete.png"></a></td>');
					$('#div').append(tr);
				})
			}
		})
	})

	$('.add').click(function(){
		//得到
		var type_id=$("#type").val();
		location.href="<?=site_url('admin/Attr/insert').'/'?>"+type_id;
	})

	//ajax删除
	$(document).on('click','.ajaxDel',function(){
		var obj=$(this);
		var attr_id=obj.data('id');
		var url="<?=site_url('admin/Attr/ajaxDel')?>";
		$.ajax({
			type:'get',
			url:url,
			dataType:'json',
			data:{attr_id:attr_id},
			success:function(e)
			{
				if(e == 0)
				{
					alert('删除失败');
					return false;
				}
				obj.parent().parent().remove();
			}
		})
	})
</script>
</html>
<script type="text/javascript">
	//改商品名
	$(".name").click(function(){
		var obj=$(this);
		var goods_name=obj.html();
		//让span消失
		obj.hide();
		//让文本框显示出来
		obj.next().prop('type','text').val(goods_name).focus();
	})
	$(document).on('blur','.text',function(){
		var obj=$(this);
		var goods_name=obj.val();
		var goods_id=obj.data('id');
		if(goods_name == obj.prev().html())
		{
			//让span显示
			obj.prev().show().html(goods_name);
			obj.prop('type','hidden');
			return false;
		}
		var url="<?=site_url('admin/Goods/ajaxName')?>";
		$.ajax({
			type:'get',
			url:url,
			data:{goods_id:goods_id,goods_name:goods_name},
			success:function(e)
			{
				if(e == 0)
				{
					alert('修改失败');
					return false;
				}
				//让span显示
				obj.prev().show().html(goods_name);
				obj.prop('type','hidden');
			}
		})
	})

	//即点即改
	$(document).on('click','.gai',function(){
		//获取is_show
		var obj=$(this);
		//判断点的是什么
		var status=obj.attr('status');

		var is_show=obj.data('show');
		var goods_id=obj.parent().parent().data('id');
		if(is_show == 0)
		{
			is_show=1;
		}
		else
		{
			is_show=0;
		}
		var url="<?=site_url('admin/Goods/ajaxGai')?>";
		$.ajax({
			type:'get',
			url:url,
			data:{is_show:is_show,goods_id:goods_id,status:status},
			success:function(e)
			{
				if(e == 0)
				{
					alert('修改失败');
					return false;
				}
				if(is_show == 0)
				{
					obj.parent().html('<span status='+status+' class="gai" data-show=0>×</span>');
				}
				if(is_show == 1)
				{
					obj.parent().html('<span status='+status+' class="gai" data-show=1>√</span>');
				}
			}
		})
	})
</script>