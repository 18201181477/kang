<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<base href="<?=base_url('public/admin').'/'?>">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<link rel="stylesheet" type="text/css" href="css/css.css" />
<script type="text/javascript" src="js/jquery.min.js"></script>
</head>
<body>
	<div id="pageAll">
		<div class="pageTop">
			<div class="page">
				<img src="img/coin02.png" /><span><a href="#">首页</a>&nbsp;-&nbsp;<a
					href="javascript:;">管理员管理</a>&nbsp;-&nbsp;<a
					href="<?=site_url('admin/Qx/index')?>">权限查看</a></span>&nbsp;-&nbsp;新增权限
			</div>
		</div>
		<div class="page ">
			<!-- 上传广告页面样式 -->
			<div class="banneradd bor">
				<div class="baTop">
					<span>上传权限</span>
				</div>
				<form action="" method="post">
				<div class="baBody">
					<div class="bbD">
						权限名称：<input type="text" name="qx_name" class="input1" />
					</div>
					<div class="bbD">
						上级菜单：<select name="qx_pid" class="input1 last">
							<option data-level="-1" value="0">顶级菜单</option>
							<?php foreach($arr as $v){?>
								<option data-level="<?=$v['level']?>" value="<?=$v['qx_id']?>"><?php 
								$str=str_repeat('---', $v['level']);
								echo $str.$v['qx_name'];
								?></option>
							<?php
							}?>
						</select>
					</div>
					<div class="bbD">
						菜单级别：<input readonly="" type="text" name="qx_unit" value="1" class="input1 unit" />
					</div>
					<div id="show" style="display:none">
						<div class="bbD">
							控制器名：<input type="text" name="qx_controller" class="input1" />
						</div>
						<div class="bbD">
							方法名称：<input type="text" name="qx_action" class="input1" />
						</div>
					</div>
					<div class="bbD">
						是否显示：<label><input type="radio" name="is_show" value="1" checked="checked" />展示</label> <label><input
							type="radio" name="is_show" value="0" />不展示</label>
					</div>
					<div class="bbD">
						<p class="bbDP">
							<button class="btn_ok btn_yes">提交</button>
							<a class="btn_ok btn_no" href="#">取消</a>
						</p>
					</div>
				</div>
				</form>
			</div>

			<!-- 上传广告页面样式end -->
		</div>
	</div>
</body>
</html>
<script type="text/javascript">
	$(".last").change(function(){
		//得到值 如果为顶级菜单
		var obj=$(this);
		var status=obj.val();
		if(status == 0)
		{
			$("#show").hide();
		}
		else
		{
			$("#show").show();
		}
		var num=obj.find("option:selected").data('level');
		$(".unit").val(num/1+2);
	})
</script>