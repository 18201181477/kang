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
					href="javascript:;">品牌管理</a>&nbsp;-&nbsp;<a
					href="<?=site_url('admin/Brand/index')?>">品牌查看</a></span>&nbsp;-&nbsp;新增品牌
			</div>
		</div>
		<div class="page ">
			<!-- 上传广告页面样式 -->
			<div class="banneradd bor">
				<div class="baTop">
					<span>上传品牌</span>
				</div>
				<form action="" method="post" enctype="multipart/form-data">
				<div class="baBody">
					<div class="bbD">
						品牌名称：<input type="text" name="brand_name" class="input1" />
					</div>
					<div class="bbD">
						品牌官网：<input type="text" name="site_url" class="input1" />
					</div>
					<div class="bbD">
						品牌logo：
						<div class="bbDd">
							<div class="bbDImg">+</div>
							<input name="brand_logo" type="file" class="file" />
						</div>
					</div>
					<div class="bbD">
						是否显示：<label><input type="radio" name="is_show" value="1" checked="checked" />是</label> <label><input
							type="radio" name="is_show" value="0" />否</label>
					</div>
					<div class="bbD">
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;排序：<input name="sort" value="50" class="input2"
							type="text" />
					</div>
					<div class="bbD">
					 品牌描述：<textarea name="brand_name" class="input1"></textarea>
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