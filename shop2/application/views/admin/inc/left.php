<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<base href="<?=base_url('public/admin').'/'?>">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>首页左侧导航</title>
<link rel="stylesheet" type="text/css" href="css/public.css" />
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/public.js"></script>
<head></head>

<body id="bg">
	<!-- 左边节点 -->
	<div class="container">

		<div class="leftsidebar_box">
			<a href="<?=site_url('admin/Index/main')?>" target="main"><div class="line">
					<img src="img/coin01.png" />&nbsp;&nbsp;首页
		</div></a>
			<!-- <dl class="system_log">
			<dt><img class="icon1" src="img/coin01.png" /><img class="icon2"src="img/coin02.png" />
				首页<img class="icon3" src="img/coin19.png" /><img class="icon4" src="img/coin20.png" /></dt>
		</dl> -->
			<?php 
			foreach($menu as $k=>$v){	
			?>
			<dl class="system_log">
				<dt>
					<img class="icon1" src="<?=$v['open_img']?>" /><img class="icon2"
						src="<?=$v['close_img']?>" /><?=$v['qx_name']?><img class="icon3"
						src="img/coin19.png" /><img class="icon4"
						src="img/coin20.png" />
				</dt>
				<?php
				foreach($v['child'] as $kk=>$vv){
					$url=$vv['qx_controller'].'/'.$vv['qx_action'];
					$url=site_url("$url");
					// echo $url;
				?>
				<dd>
					<img class="coin11" src="img/coin111.png" /><img class="coin22"
						src="img/coin222.png" /><a class="cks" href="<?=$url?>"
						target="main"><?=$vv['qx_name']?></a><img class="icon5" src="img/coin21.png" />
				</dd>
				<?php
				}?>
			</dl>
			<?php
			}?>
			
			
		</div>

	</div>
</body>
</html>
