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
					href="javascript:;">类型管理</a>&nbsp;-</span>&nbsp;属性查看&nbsp;-&nbsp;<a
					href="javascript:;" class='add'>新增属性</a>
			</div>
		</div>

		<div class="page">
			<!-- topic页面样式 -->
			<div class="conform">
					<div class="cfD">
						当前类型：
						<select id="type">
						<?php foreach($arr as $v){?>
							<option value="<?=$v['type_id']?>" <?php
								if($this->uri->segment(4) == $v['type_id'])
								{
									echo "selected";
								}
							?>>
								<?=$v['type_name']?>
							</option>
						<?php
						}?>
						</select>
					</div>
				</div>
				
				<!-- topic表格 显示 -->
				<div class="conShow">
					<table border="1" width="100%" cellspacing="0" cellpadding="0">
						<tr>
							<td width="66px" class="tdColor tdC">序号</td>
							<td width="200px" class="tdColor">属性名称</td>
							<td width="200px" class="tdColor">属性值</td>
							<td width="200px" class="tdColor">规格/参数</td>
							<td width="200px" class="tdColor">排序</td>
							<td width="130px" class="tdColor">操作</td>
						</tr>
						<tbody id="div">
						<?php foreach($data as $k=>$v){?>
						<tr height="40">
							<td><?=$v['attr_id']?></td>
							<td><?=$v['attr_name']?></td>
							<td><?=$v['attr_values']?></td>
							<td>
								<?php 
									if($v['attr_type'] == 1)
									{
										echo "规格";
									}
									else
									{
										echo "参数";
									}
								?>
							</td>
							<td><?=$v['sort']?></td>
							<td>
								<a href="javascript:;"><img class="operation" src="img/update.png"></a> 
								<a data-id="<?=$v['attr_id']?>" class="ajaxDel" href="javascript:;"><img class="operation delban" src="img/delete.png"></a>
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