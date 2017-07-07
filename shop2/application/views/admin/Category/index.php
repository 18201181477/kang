<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<base href="<?=base_url('public/admin').'/'?>">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="css/css.css" />
<style type="text/css">
.name{
    text-align: left;
    border: 1px solid #dcdbdb;
}
.gai,.cat_name{
	cursor: pointer;
}
.hide{
	display: none;
}
.open,.close{
	cursor:pointer;
	color:red;
}
.text{
	width:80px;
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
					href="javascript:;">商品管理</a>&nbsp;-</span>&nbsp;分类查看&nbsp;-&nbsp;<a
					href="<?=site_url('admin/Category/insert')?>">新增分类</a>
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
							<td width="200px" class="tdColor">分类名称</td>
							<td width="125px" class="tdColor">keywords</td>
							<td width="155px" class="tdColor">品牌描述</td>
							<td width="175px" class="tdColor">排序</td>
							<td width="190px" class="tdColor">is_nav</td>
							<td width="130px" class="tdColor">是否显示</td>
							<td width="130px" class="tdColor">path</td>
							<td width="130px" class="tdColor">parent_id</td>
							<td width="130px" class="tdColor">filter_attr</td>
							<td width="130px" class="tdColor">操作</td>
						</tr>
						<tbody id="div">
							<?php foreach($data as $k=>$v){?>
							<tr align="left" data-id="<?=$v['cat_id']?>" data-pid="<?=$v['parent_id']?>" height="40" class="<?php 
								if($v['level'] != '')
								{
									echo 'hide';
								}
							?>">
								<td><?=$v['cat_id']?></td>
								<td class="name">
									<?php 
									$id=$v['cat_id'];
									echo $v['level'];
									echo '<span data-id='.$id.' class="open-close open">↓</span>';
									echo "<span class='cat_name'>".$v['cat_name']."</span>";
									echo "<input data-id=$id type='hidden' class='text'>";
									?>
								</td>
								<td><?=$v['keywords']?></td>
								<td><?=$v['cat_desc']?></td>
								<td><?=$v['sort']?></td>
								<td><?=$v['is_nav']?></td>
								<td data-id=<?=$v['cat_id']?>>
								<span>
									<?php 
										if($v['is_show'] == 1)
										{
											echo "<span class='gai' data-show=1>√</span>";
										}
										else
										{
											echo "<span class='gai' data-show=0>×</span>";
										}
									?>
								</span>
								</td>
								<td><?=$v['path']?></td>
								<td><?=$v['parent_id']?></td>
								<td><?=$v['filter_attr']?></td>
								<td>
									<a href="javascript:;"><img class="operation" src="img/update.png"></a> 
								<a data-id="<?=$v['cat_id']?>" class="ajaxDel" href="javascript:;"><img class="operation delban" src="img/delete.png"></a>
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
				       <!-- <input class="num" type="hidden" value="<?=$num?>"> -->
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
	//树状结构
	$(document).on('click','.open',function(){
		//获取当前id值
		var obj=$(this);
		var id=obj.data('id');
		$("tr[data-pid="+id+"]").removeClass('hide');
		obj.html('↑').removeClass('open').addClass('close');
	})
	$(document).on('click','.close',function(){
		//获取id
		var id=$(this).data('id');
		$(this).html('↓').removeClass('close').addClass('open');
		closeTag(id)
	})
	function closeTag(id)
	{
		//让pid=id的隐藏起来
		var obj=$("tr[data-pid='"+id+"']");
		for(var i=0;i<obj.length;i++)
		{
			obj.eq(i).addClass('hide');//影藏
			obj.eq(i).find('.open-close').html('↓').removeClass('close').addClass('open');
			//查找当前子集分类下的id
			var child_id=obj.eq(i).find('.open-close').data("id");
			//
			var child=$("tr[data-pid='"+child_id+"']");
			if(child.length>0)
			{
				closeTag(child_id)
			}
		}
	}
	
	//改分类名
	$(".cat_name").click(function(){
		var obj=$(this);
		var cat_name=obj.html();
		//让span消失
		obj.hide();
		//让文本框显示出来
		obj.next().prop('type','text').val(cat_name).focus();
	})
	$(document).on('blur','.text',function(){
		var obj=$(this);
		var cat_name=obj.val();
		var cat_id=obj.data('id');
		if(cat_name == obj.prev().html())
		{
			//让span显示
			obj.prev().show().html(cat_name);
			obj.prop('type','hidden');
			return false;
		}
		var url="<?=site_url('admin/Category/ajaxName')?>";
		$.ajax({
			type:'get',
			url:url,
			data:{cat_id:cat_id,cat_name:cat_name},
			success:function(e)
			{
				if(e == 0)
				{
					alert('修改失败');
					return false;
				}
				//让span显示
				obj.prev().show().html(cat_name);
				obj.prop('type','hidden');
			}
		})
	})

	//ajax删除
	$(".ajaxDel").click(function(){
		var obj=$(this);
		var cat_id=obj.data('id');
		var pid=$("tr[data-pid="+cat_id+"]");
		if(pid.length != 0)
		{
			alert('该分类下有子类，不予删除');
			return false;
		}
		var url="<?=site_url('admin/Category/ajaxDel')?>";
		$.ajax({
			type:'get',
			url:url,
			data:{cat_id:cat_id},
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