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
					href="javascript:;">类型管理</a>&nbsp;-&nbsp;<a
					href="<?=site_url('admin/Attr/index')?>">属性查看</a></span>&nbsp;-&nbsp;新增属性
			</div>
		</div>
		<div class="page ">
			<!-- 上传广告页面样式 -->
			<div class="banneradd bor">
				<div class="baTop">
					<span>上传属性</span>
				</div>
				<form action="" method="post">
				<div class="baBody">
					<div class="bbD">
						&nbsp;&nbsp;属性名称：<input type="text" name="attr_name" class="input1" />
					</div>
					<div class="bbD">
						&nbsp;所属类型：
						<select name="type_id" id="type" class="input1">
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
					<div class="bbD">
					    规格/参数：<label><input type="radio" name="attr_type" value="1" checked="checked" />规格</label> <label><input
							type="radio" name="attr_type" value="0" />参数</label>
					</div>
					<div class="bbD">
						&nbsp;&nbsp;录入方式：<label><input type="radio" name="input_type" value="1"  />手动录入</label> <label><input
							type="radio" name="input_type" checked="checked" value="0" />下拉选择</label>
					</div>
					<div class="bbD">
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;排序：<input name="sort" value="50" class="input2"
							type="text" />
					</div>
					<div class="bbD">
					 可选值列表：<textarea cols="40" rows="8" placeholder='多个值请以回车键分开' name="attr_values"></textarea>
					</div>
					<div class="bbD">
						<p class="bbDP">
							<button class="btn_ok btn_yes">提交</button>
							<input type="reset" class="btn_ok btn_no" value="取消">
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