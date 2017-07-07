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
					href="javascript:;">商品管理</a>&nbsp;-</span>&nbsp;品牌查看&nbsp;-&nbsp;<a
					href="<?=site_url('admin/Brand/insert')?>">新增品牌</a>
			</div>
		</div>

		<div class="page">
			<!-- topic页面样式 -->
			<div class="topic">
				<div class="connoisseur">
					<div class="conform">
						<div class="cfD">
						品牌名称：
						<input placeholder="请输入……" class="timeInput" type="text">
						<button style="cursor:pointer" class="button ajaxSearch">搜索</button>
						</div>
					</div>
				
				<!-- topic表格 显示 -->
				<div class="conShow">
					<table border="1" width="100%" cellspacing="0" cellpadding="0">
						<tr>
							<td width="66px" class="tdColor tdC">序号</td>
							<td width="200px" class="tdColor">品牌名称</td>
							<td width="125px" class="tdColor">logo</td>
							<td width="155px" class="tdColor">品牌描述</td>
							<td width="175px" class="tdColor">官网</td>
							<td width="190px" class="tdColor">排序</td>
							<td width="130px" class="tdColor">是否显示</td>
							<td width="130px" class="tdColor">操作</td>
						</tr>
						<tbody id="div">
						<?php foreach($data as $k=>$v){?>
						<tr height="40">
							<td><?=$v['brand_id']?></td>
							<td><?=$v['brand_name']?></td>
							<td>
								<input data-id="<?=$v['brand_id']?>" style="display:none" class="file" type="file">
								<img class="img" src="<?=base_url('Uploads/admin').'/'.$v['brand_logo']?>" height="50px" width="50px">
							</td>
							<td><?=$v['brand_desc']?></td>
							<td><?=$v['site_url']?></td>
							<td><?=$v['sort']?></td>
							<td data-id=<?=$v['brand_id']?>>
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
							<td>
								<a harf="javascript:;"><img class="operation" src="img/update.png"></a> 
								<a href="javascript:;" ><img class="operation delban" src="img/delete.png"></a>
							</td>
						</tr>
						<?php
						}?>
						</tbody>
					</table>
					<div class="paging">
					<a class="ha" href="javascript:;"><?=$num.'/'.$sum?></a>
				       <button status='1' class="ajaxPage">首页</button>
				       <button status='2' class="ajaxPage">上一页</button>
				       <button status='3' class="ajaxPage">下一页</button>
				       <button status='4' class="ajaxPage">尾页</button>
				       <input class="num" type="hidden" value="<?=$num?>">
				       <input class="sum" type="hidden" value="<?=$sum?>">
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
	//ajax搜索
	$(".ajaxSearch").click(function(){
		var obj=$(this);
		var brand_name=obj.prev().val();
		var url="<?=site_url('admin/Brand/index')?>";
		$.ajax({
			type:'get',
			url:url,
			dataType:'json',
			data:{brand_name:brand_name},
			success:function(e)
			{
				var img="<?=base_url('Uploads/admin').'/'?>";
				// $(".num").val(e.num);
				// $(".num").html(e.num+'/'+sum);
				$(".sum").val(e.sum);
				$(".num").val(e.num);
				$(".ha").html(e.num+'/'+e.sum);
				$("#div").html('')
				$.each(e.centent,function(k,v){
					var tr=$('<tr height="40"></tr>');
					tr.append('<td>'+v.brand_id+'</td>');
					tr.append('<td>'+v.brand_name+'</td>');
					tr.append('<td><input data-id="'+v.brand_id+'" style="display:none" class="file" type="file"><img class="img" src="'+img+v.brand_logo+'" height="50px" width="50px"></td>');
					tr.append('<td>'+v.brand_desc+'</td>');
					tr.append('<td>'+v.site_url+'</td>');
					tr.append('<td>'+v.sort+'</td>');
					var is_show=v.is_show==1?'<span class="gai" data-show=1>√</span>':'<span class="gai" data-show=0>×</span>';
					tr.append('<td data-id='+v.brand_id+'><span>'+is_show+'</span></td>');
					tr.append('<td><a href="javascript:;"><img class="operation" src="img/update.png"></a><a href="javascript:;"><img class="operation delban" src="img/delete.png"></a></td>');
					$("#div").append(tr);
					
				})
			}
		})
	})
	//即点即改
	$(document).on('click','.gai',function(){
		//获取is_show
		var obj=$(this);
		var is_show=obj.data('show');
		var brand_id=obj.parent().parent().data('id');
		if(is_show == 0)
		{
			is_show=1;
		}
		else
		{
			is_show=0;
		}
		var url="<?=site_url('admin/Brand/ajaxGai')?>";
		$.ajax({
			type:'get',
			url:url,
			data:{is_show:is_show,brand_id:brand_id},
			success:function(e)
			{
				if(e == 0)
				{
					alert('修改失败');
					return false;
				}
				if(is_show == 0)
				{
					obj.parent().html('<span class="gai" data-show=0>×</span>');
				}
				if(is_show == 1)
				{
					obj.parent().html('<span class="gai" data-show=1>√</span>');
				}
			}
		})
	})
	$('.ajaxPage').click(function(){
		var obj=$(this);
		//得到当前页
		var num=$(".num").val();
		var brand_name=$(".ajaxSearch").prev().val();
		var sum=$(".sum").val();
		var status=obj.attr('status');
		if(status == 1)//首页
		{
			num=1;
		}
		if(status == 2)//上一页
		{
			num=num-1;
		}
		if(status == 3)//下一页
		{
			num=num/1+1;
		}
		if(status == 4)//尾页
		{
			num=sum;
		}
		if(num < 1)
		{
			num=1;
		}
		if(num>sum)
		{
			num=sum;
		}
		var url="<?=site_url('admin/Brand/index')?>";
		$.ajax({
			type:'get',
			url:url,
			dataType:'JSON',
			data:{num:num,brand_name:brand_name},
			success:function(e)
			{
				var img="<?=base_url('Uploads/admin').'/'?>";
				$(".num").val(e.num);
				$(".ha").html(e.num+'/'+sum);
				
				$("#div").html('')
				$.each(e.centent,function(k,v){
					var tr=$('<tr height="40"></tr>');
					tr.append('<td>'+v.brand_id+'</td>');
					tr.append('<td>'+v.brand_name+'</td>');
					tr.append('<td><input data-id="'+v.brand_id+'" style="display:none" class="file" type="file"><img class="img" src="'+img+v.brand_logo+'" height="50px" width="50px"></td>');
					tr.append('<td>'+v.brand_desc+'</td>');
					tr.append('<td>'+v.site_url+'</td>');
					tr.append('<td>'+v.sort+'</td>');
					var is_show=v.is_show==1?'<span class="gai" data-show=1>√</span>':'<span class="gai" data-show=0>×</span>';
					tr.append('<td data-id='+v.brand_id+'><span>'+is_show+'</span></td>');
					tr.append('<td><a href="javascript:;"><img class="operation" src="img/update.png"></a><a href="javascript:;"><img class="operation delban" src="img/delete.png"></a></td>');
					$("#div").append(tr);
				})
				$(".sum").val(e.sum);
			}
		})

	})

	//ajax图片修改
	 $(document).on('click','.img',function(){
	    $(this).prev().trigger('click');
	  })
	//文件域发生改变触发事件
    $(document).on('change','.file',function(){
    //想办法吧图片文件传到后台
    //申明一个表单对象
    var form=new FormData();
    var file=$(this);
    console.log(file)
    var id=file.data('id');
    form.append('brand_logo',file[0].files[0]);
    form.append('brand_id',id);
	var url="<?=site_url('admin/Brand/ajaxImg')?>";
    //发送ajax
    $.ajax({
      type:'post',
      url:url,
      data:form,
      cache:false,
      contentType:false,
      processData:false,
      success:function(e)
      {
        if(e == 0)
        {
          alert('图片修改失败');
          return false;
        }
      	file.next().prop('src',"<?=base_url('Uploads/admin').'/'?>"+e);
      }
    })
    console.log(file[0].files[0]);
  })
</script>
</html>