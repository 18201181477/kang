<!--头部-->
<?php
require_once('public/top.php');
require_once('public/menu.php');
?>
    <script type="text/javascript" src="js/jquery-1.8.2.min.js"></script>
    <script type="text/javascript" src="js/menu.js"></script>    
                
    <script type="text/javascript" src="js/n_nav.js"></script>   
    
    <script type="text/javascript" src="js/num.js">
        var jq = jQuery.noConflict();
    </script>     
    
    <script type="text/javascript" src="js/shade.js"></script>
<div class="i_bg">  
    <div class="content mar_20">
    	<img src="images/img1.jpg" />        
    </div>
    
    <!--Begin 第一步：查看购物车 Begin -->
    <div class="content mar_20">
    	<table border="0" class="car_tab" style="width:1200px; margin-bottom:50px;" cellspacing="0" cellpadding="0">
          <tr>
            <td class="car_th" width="490">商品名称</td>
            <td class="car_th" width="140">属性</td>
            <td class="car_th" width="150">购买数量</td>
            <td class="car_th" width="130">小计</td>
            <td class="car_th" width="140">返还积分</td>
            <td class="car_th" width="150">操作</td>
          </tr>
          <?php foreach($data as $v){?>
          <tr class="car_tr">
            <td>
            	<div class="c_s_img"><img src="<?=base_url('Uploads/admin').'/'.$v['goods_img']?>" width="73" height="73" /></div><?=$v['goods_name']?> 
            </td>
            <td align="center"><?php
            foreach($v['norms'] as $key=>$val)
            {
                echo $val['attr_name'].':'.$val['attr_value']."<br>";
            }
            ?></td>
            <td align="center">
            	<div max="<?=$v['SKU']?>" data-id="<?=$v['cat_id']?>" class="c_num">
                    <input type="button" value="" onclick="jianUpdate1(jq(this));" price="<?=$v['goods_price']?>" class="car_btn_1" />
                	<input type="text" value="<?=$v['goods_number']?>" price="<?=$v['goods_price']?>" class="car_ipt" />  
                    <input type="button" value="" price="<?=$v['goods_price']?>" onclick="addUpdate1(jq(this));" class="car_btn_2" />
                </div>
            </td>
            <td align="center" style="color:#ff4e00;">￥<span class="goods_price"><?=$v['goods_number']*$v['goods_price']?></span></td>
            <td align="center">26R</td>
            <td align="center"><a href="#">删除</a>&nbsp; &nbsp;<a href="#">加入收藏</a></td>
          </tr>
          <?php
          }?>
          <tr height="70">
          	<td colspan="6" style="font-family:'Microsoft YaHei'; border-bottom:0;">
            	<label class="r_rad"><input type="checkbox" name="clear" checked="checked" /></label><label class="r_txt">清空购物车</label>
                <span class="fr">商品总价：<b style="font-size:22px; color:#ff4e00;">￥<span class="sum"></span></b></span>
            </td>
          </tr>
          <tr valign="top" height="150">
          	<td colspan="6" align="right">
            	<a href="javascript:;"><img src="images/buy1.gif" /></a>&nbsp; &nbsp; <a href="<?=site_url('Buycar/index2')?>"><img src="images/buy2.gif" /></a>
            </td>
          </tr>
        </table>
        
    </div>
	<!--End 第一步：查看购物车 End--> 
    
    
    <!--Begin 弹出层-删除商品 Begin-->
    <div id="fade" class="black_overlay"></div>
    <div id="MyDiv" class="white_content">             
        <div class="white_d">
            <div class="notice_t">
                <span class="fr" style="margin-top:10px; cursor:pointer;" onclick="CloseDiv('MyDiv','fade')"><img src="images/close.gif" /></span>
            </div>
            <div class="notice_c">
           		
                <table border="0" align="center" style="font-size:16px;" cellspacing="0" cellpadding="0">
                  <tr valign="top">
                    <td>您确定要把该商品移除购物车吗？</td>
                  </tr>
                  <tr height="50" valign="bottom">
                    <td><a href="#" class="b_sure">确定</a><a href="#" class="b_buy">取消</a></td>
                  </tr>
                </table>
                    
            </div>
        </div>
    </div>    
    <!--End 弹出层-删除商品 End-->
    
    
<?php
require_once('public/foot.php');
?>
<script type="text/javascript">
    a();
    $(".car_ipt").change(function(){
        var obj=$(this);
        var cat_id=obj.parent().data('id');
        var number=obj.val();
        var price=obj.attr('price');
        $.ajax({
            type:'get',
            url:"<?=site_url('Buycar/ajaxNumber')?>",
            data:{'cat_id':cat_id,'goods_number':number},
            success:function(e)
            {
                if(e == 0)
                {
                    alert('修改购买量失败');
                    return false;
                }
            }
        })
        obj.parent().parent().next().find('.goods_price').html(number*price);
        a();

    })

    $(".car_btn_1,.car_btn_2").click(function(){
        var obj=$(this);
        var cat_id=obj.parent().data('id');
        var number=obj.parent().find('.car_ipt').val();
        var price=obj.attr('price');
        $.ajax({
            type:'get',
            url:"<?=site_url('Buycar/ajaxNumber')?>",
            data:{'cat_id':cat_id,'goods_number':number},
            success:function(e)
            {
                if(e == 0)
                {
                    alert('修改购买量失败');
                    return false;
                }
            }
        })
        $(this).parent().parent().next().find('.goods_price').html(number*price);
        a();
    })
    function a()
    {
        var haha=$(".goods_price");
        var sumPrice=0;
        $.each(haha,function(k,v){
            sumPrice=sumPrice+parseInt(haha.eq(k).html());
        })
        $(".sum").html(sumPrice)
    }
</script>