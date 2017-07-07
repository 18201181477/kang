<!--引入头部-->
<?php
require_once('public/top.php');
require_once('public/menu.php');
?>

<div class="i_bg bg_color">
	<div class="i_ban_bg">
		<!--Begin Banner Begin-->
    	<div class="banner">    	
            <div class="top_slide_wrap">
                <ul class="slide_box bxslider">
                    <li><img src="images/ban1.jpg" width="740" height="401" /></li>
                    <li><img src="images/ban1.jpg" width="740" height="401" /></li> 
                    <li><img src="images/ban1.jpg" width="740" height="401" /></li> 
                </ul>	
                <div class="op_btns clearfix">
                    <a href="#" class="op_btn op_prev"><span></span></a>
                    <a href="#" class="op_btn op_next"><span></span></a>
                </div>        
            </div>
        </div>
        <script type="text/javascript">
        //var jq = jQuery.noConflict();
        (function(){
            $(".bxslider").bxSlider({
                auto:true,
                prevSelector:jq(".top_slide_wrap .op_prev")[0],nextSelector:jq(".top_slide_wrap .op_next")[0]
            });
        })();
        </script>
        <!--End Banner End-->
        <div class="inews">
        	<div class="news_t">
            	<span class="fr"><a href="#">更多 ></a></span>新闻资讯
            </div>
            <ul>
            	<li><span>[ 特惠 ]</span><a href="#">掬一轮明月 表无尽惦念</a></li>
            	<li><span>[ 公告 ]</span><a href="#">好奇金装成长裤新品上市</a></li>
            	<li><span>[ 特惠 ]</span><a href="#">大牌闪购 · 抢！</a></li>
            	<li><span>[ 公告 ]</span><a href="#">发福利 买车就抢千元油卡</a></li>
            	<li><span>[ 公告 ]</span><a href="#">家电低至五折</a></li>
            </ul>
            <div class="charge_t">
            	话费充值<div class="ch_t_icon"></div>
            </div>
            <form>
            <table border="0" style="width:205px; margin-top:10px;" cellspacing="0" cellpadding="0">
              <tr height="35">
                <td width="33">号码</td>
                <td><input type="text" value="" class="c_ipt" /></td>
              </tr>
              <tr height="35">
                <td>面值</td>
                <td>
                	<select class="jj" name="city">
                      <option value="0" selected="selected">100元</option>
                      <option value="1">50元</option>
                      <option value="2">30元</option>
                      <option value="3">20元</option>
                      <option value="4">10元</option>
                    </select>
                    <span style="color:#ff4e00; font-size:14px;">￥99.5</span>
                </td>
              </tr>
              <tr height="35">
                <td colspan="2"><input type="submit" value="立即充值" class="c_btn" /></td>
              </tr>
            </table>
            </form>
        </div>
    </div>

    <!--Begin 热门商品 Begin-->
    <div class="i_t mar_10">
        <span class="fl">热门商品</span>
        <span class="i_mores fr"><a href="javascript:void(0)">更多</a></span>
    </div>
    <div class="like">  
        <div id="featureContainer1">
            <div id="feature1">
                <div id="block1">
                    <div id="botton-scroll1" style="visibility: visible; overflow: hidden; position: relative; z-index: 2; left: 0px; width: 1200px;">
                        <ul class="featureUL" style="margin: 0px; padding: 0px; position: relative; list-style-type: none; z-index: 1; width: 3600px; left: -2400px;">
                           <?php foreach($hot as $v){?>
                            <li class="featureBox" style="overflow: hidden; float: left; width: 238px; height: 228px;">
                                <div class="box">
                                    <div class="imgbg">
                                        <a href="<?=site_url('Product/index').'/'.$v['goods_id']?>"><img width="160" height="136" src="<?=base_url('Uploads/admin').'/'.$v['goods_img']?>"></a>
                                    </div>                                        
                                    <div class="name">
                                        <a href="<?=site_url('Product/index')?>">
                                        <h2><?=$v['goods_name']?></h2>
                                        <?=$v['title']?>
                                        </a>
                                    </div>
                                    <div class="price">
                                        <font>￥<span><?=$v['shop_price']?></span></font> &nbsp; 30R
                                    </div>
                                </div>
                            </li>
                        <?php
                        }?>
                        </ul>
                    </div>
                </div>
                <a href="javascript:void();" class="l_prev">Previous</a>
                <a href="javascript:void();" class="l_next">Next</a>
            </div>
        </div>
    </div>    
    <!--END 热门商品 END -->

    <!--Begin 限时特卖 Begin-->
    <!--
    <div class="i_t mar_10">
    	<span class="fl">限时特卖</span>
        <span class="i_mores fr"><a href="#">更多</a></span>
    </div>
    <div class="content">

        <div class="sell_right">
        	<div class="sell_1">
            	<div class="s_img"><a href="#"><img src="images/tm_1.jpg" width="185" height="155" /></a></div>
            	<div class="s_price">￥<span>89</span></div>
                <div class="s_name">
                	<h2><a href="#">沙宣洗发水</a></h2>
                    倒计时：<span>1200</span> 时 <span>30</span> 分 <span>28</span> 秒
                </div>
            </div>
            <div class="sell_2">
            	<div class="s_img"><a href="#"><img src="images/tm_2.jpg" width="185" height="155" /></a></div>
            	<div class="s_price">￥<span>289</span></div>
                <div class="s_name">
                	<h2><a href="#">德芙巧克力</a></h2>
                    倒计时：<span>1200</span> 时 <span>30</span> 分 <span>28</span> 秒
                </div>
            </div>
            <div class="sell_b1">
            	<div class="sb_img"><a href="#"><img src="images/tm_b1.jpg" width="242" height="356" /></a></div>
            	<div class="s_price">￥<span>289</span></div>
                <div class="s_name">
                	<h2><a href="#">东北大米</a></h2>
                    倒计时：<span>1200</span> 时 <span>30</span> 分 <span>28</span> 秒
                </div>
            </div>

            <div class="sell_3">
            	<div class="s_img"><a href="#"><img src="images/tm_3.jpg" width="185" height="155" /></a></div>
            	<div class="s_price">￥<span>289</span></div>
                <div class="s_name">
                	<h2><a href="#">迪奥香水</a></h2>
                    倒计时：<span>1200</span> 时 <span>30</span> 分 <span>28</span> 秒
                </div>
            </div>
            <div class="sell_4">
            	<div class="s_img"><a href="#"><img src="images/tm_4.jpg" width="185" height="155" /></a></div>
            	<div class="s_price">￥<span>289</span></div>
                <div class="s_name">
                	<h2><a href="#">美妆</a></h2>
                    倒计时：<span>1200</span> 时 <span>30</span> 分 <span>28</span> 秒
                </div>
            </div>
            <div class="sell_b2">
            	<div class="sb_img"><a href="#"><img src="images/tm_b2.jpg" width="242" height="356" /></a></div>
            	<div class="s_price">￥<span>289</span></div>
                <div class="s_name">
                	<h2><a href="#">美妆</a></h2>
                    倒计时：<span>1200</span> 时 <span>30</span> 分 <span>28</span> 秒
                </div>
            </div>
            <div class="sell_1">
                <div class="s_img"><a href="#"><img src="images/tm_1.jpg" width="185" height="155" /></a></div>
                <div class="s_price">￥<span>89</span></div>
                <div class="s_name">
                    <h2><a href="#">沙宣洗发水</a></h2>
                    倒计时：<span>1200</span> 时 <span>30</span> 分 <span>28</span> 秒
                </div>
            </div>
            <div class="sell_2">
                <div class="s_img"><a href="#"><img src="images/tm_2.jpg" width="185" height="155" /></a></div>
                <div class="s_price">￥<span>289</span></div>
                <div class="s_name">
                    <h2><a href="#">德芙巧克力</a></h2>
                    倒计时：<span>1200</span> 时 <span>30</span> 分 <span>28</span> 秒
                </div>
            </div>            
        </div>
    </div>
    -->
    <!--End 限时特卖 End-->
    <?php 
    $num=1;
    foreach($menu as $v){?>
    <div class="content mar_20">
    	<img src="images/mban_1.jpg" width="1200" height="110" />
    </div>
	<!--Begin 进口 生鲜 Begin-->
    
    <div class="i_t mar_10">
    	<span data-id="<?=$v['cat_id']?>" status="0" class="floor_num"><?=$num?>F</span>
    	<span class="fl"><?=$v['cat_name']?></span> 
        <?php foreach($v['child'] as $v){?>               
        <span class="i_mores fr"><a href="#"><?=$v['cat_name']?></a>&nbsp; &nbsp; &nbsp; 
        <?php
        }?>
    </div>
    <div class="content">
        <div class="fresh_mid">
        	<ul>
            	<!-- <li>
                	<div class="name"><a href="#">新鲜美味  进口美食</a></div>
                    <div class="price">
                    	<font>￥<span>198.00</span></font> &nbsp; 26R
                    </div>
                    <div class="img"><a href="#"><img src="images/fre_1.jpg" width="185" height="155" /></a></div>
                </li>       -->                                                
            </ul>
        </div>
    </div>    
    <!--End 进口 生鲜 End-->
    <?php
    $num++;
    }?>
    
    <!--End 数码家电 End-->
    <!--Begin 猜你喜欢 Begin-->
    <div class="i_t mar_10">
    	<span class="fl">猜你喜欢</span>
    </div>    
    <div class="like">        	
        <div id="featureContainer1">
            <div id="feature1">
                <div id="block1">
                    <div id="botton-scroll1">
                        <ul class="featureUL">
                            <li class="featureBox">
                                <div class="box">
                                    <div class="imgbg">
                                        <a href="#"><img src="images/hot1.jpg" width="160" height="136" /></a>
                                    </div>                                        
                                    <div class="name">
                                        <a href="#">
                                        <h2>德国进口</h2>
                                        德亚全脂纯牛奶200ml*48盒
                                        </a>
                                    </div>
                                    <div class="price">
                                        <font>￥<span>189</span></font> &nbsp; 26R
                                    </div>
                                </div>
                            </li>
                            <li class="featureBox">
                                <div class="box">
                                    <div class="imgbg">
                                        <a href="#"><img src="images/hot2.jpg" width="160" height="136" /></a>
                                    </div>                                        
                                    <div class="name">
                                        <a href="#">
                                        <h2>iphone 6S</h2>
                                        Apple/苹果 iPhone 6s Plus公开版
                                        </a>
                                    </div>
                                    <div class="price">
                                        <font>￥<span>5288</span></font> &nbsp; 25R
                                    </div>
                                </div>
                            </li>
                            <li class="featureBox">
                                <div class="box">
                                    <div class="imgbg">
                                        <a href="#"><img src="images/hot3.jpg" width="160" height="136" /></a>
                                    </div>                                        
                                    <div class="name">
                                        <a href="#">
                                        <h2>倩碧特惠组合套装</h2>
                                        倩碧补水组合套装8折促销
                                        </a>
                                    </div>
                                    <div class="price">
                                        <font>￥<span>368</span></font> &nbsp; 18R
                                    </div>
                                </div>
                            </li>
                            <li class="featureBox">
                                <div class="box">
                                    <div class="imgbg">
                                        <a href="#"><img src="images/hot4.jpg" width="160" height="136" /></a>
                                    </div>                                        
                                    <div class="name">
                                        <a href="#">
                                        <h2>品利特级橄榄油</h2>
                                        750ml*4瓶装组合 西班牙原装进口
                                        </a>
                                    </div>
                                    <div class="price">
                                        <font>￥<span>280</span></font> &nbsp; 30R
                                    </div>
                                </div>
                            </li>
                            <li class="featureBox">
                                <div class="box">
                                    <div class="imgbg">
                                        <a href="#"><img src="images/hot4.jpg" width="160" height="136" /></a>
                                    </div>                                        
                                    <div class="name">
                                        <a href="#">
                                        <h2>品利特级橄榄油</h2>
                                        750ml*4瓶装组合 西班牙原装进口
                                        </a>
                                    </div>
                                    <div class="price">
                                        <font>￥<span>280</span></font> &nbsp; 30R
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <a class="l_prev" href="javascript:void();">Previous</a>
                <a class="l_next" href="javascript:void();">Next</a>
            </div>
        </div>
    </div>
    <!--End 猜你喜欢 End-->
    
<?php
require_once('public/foot.php');
?>
<script type="text/javascript">
        //延迟加载
        //定义全局数组
        var arr = [];
        for(var i=0;i<$('.floor_num').size();i++)
        {
            //获取开始位置
            var starts = parseInt($('.floor_num').eq(i).offset().top)-400;
            //获取结束位置
            var end = parseInt($('.floor_num').eq(i).parent().next().innerHeight())+starts;
            //收集到对象中
            var obj = {
                'starts':starts,
                'end':end
            };
            arr.push(obj);
        }
        //在javascript中在函数外定义一个变量如果想在函数里使用   
        $(window).scroll(function(){
            // alert(1)
            //获取当前滚动条的高度
            var scr=$(this).scrollTop();
            // alert(scr)
            for(var i=0;i<arr.length;i++){
                if(scr>arr[i].starts && scr<arr[i].end){
                    $(".floor_num").eq(i).trigger("click");
                }
            }
        });

        $('.floor_num').click(function(){
            var obj=$(this);
            
            var cat_id=obj.data('id');
            var status=obj.attr('status');
            if(status == 0)
            {
                var url="<?=site_url('Index/ajaxSearch')?>";
                obj.attr('status',1);
                $.ajax({
                    type:'get',
                    url:url,
                    data:{cat_id:cat_id},
                    dataType:'json',
                    success:function(e)
                    {
                        var newUrl="<?=base_url('Uploads/admin').'/'?>";
                        obj.parent().next().find('ul').html('');
                        $.each(e,function(k,v){
                            var goods_id=v.goods_id;
                            var href="<?=site_url('Product/index').'/'?>"+goods_id;
                            var str_start='<li>';
                            var str1='<div class="name"><a href="'+href+'">'+v.goods_name+'</a></div>';
                            var str2='<div class="price"><font>￥<span>'+v.shop_price+'</span></font> &nbsp; 26R</div>';
                            var str3='<div class="img"><a href="'+href+'"><img src="'+newUrl+v.goods_img+'" width="185" height="155" /></a></div>'
                            var str_end='</li>';
                            obj.parent().next().find('ul').append(str_start+str1+str2+str3+str_end);
                            // li.append('<div class="name"><a href="#">'+v.goods_name+'</a></div>');
                            // li.append('<div class="price"><font>￥<span>'+v.shop_price+'</span></font> &nbsp; 26R</div>')
                            // li.append('<div class="img"><a href="#"><img src="'+newUrl+v.goods_img+'" width="185" height="155" /></a></div>');
                            // $(".ul").append(li);
                        })
                    }
                })
            }
            else
            {
                return false;
            }
        })
</script>