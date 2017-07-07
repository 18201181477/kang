
<?php
require_once('public/top.php');
?>
<div class="m_top_bg">
    <div class="top">
        <div class="m_logo"><a href="Index.html"><img src="images/logo1.png" /></a></div>
        <div class="m_search">
            <form>
                <input type="text" value="" class="m_ipt" />
                <input type="submit" value="搜索" class="m_btn" />
            </form>                      
            <span class="fl"><a href="#">咖啡</a><a href="#">iphone 6S</a><a href="#">新鲜美食</a><a href="#">蛋糕</a><a href="#">日用品</a><a href="#">连衣裙</a></span>
        </div>
        <div class="i_car">
            <div class="car_t">购物车 [ <span>3</span> ]</div>
            <div class="car_bg">
                <!--Begin 购物车未登录 Begin-->
                <div class="un_login">还未登录！<a href="Login.html" style="color:#ff4e00;">马上登录</a> 查看购物车！</div>
                <!--End 购物车未登录 End-->
                <!--Begin 购物车已登录 Begin-->
                <ul class="cars">
                    <li>
                        <div class="img"><a href="#"><img src="images/car1.jpg" width="58" height="58" /></a></div>
                        <div class="name"><a href="#">法颂浪漫梦境50ML 香水女士持久清新淡香 送2ML小样3只</a></div>
                        <div class="price"><font color="#ff4e00">￥399</font> X1</div>
                    </li>
                    <li>
                        <div class="img"><a href="#"><img src="images/car2.jpg" width="58" height="58" /></a></div>
                        <div class="name"><a href="#">香奈儿（Chanel）邂逅活力淡香水50ml</a></div>
                        <div class="price"><font color="#ff4e00">￥399</font> X1</div>
                    </li>
                    <li>
                        <div class="img"><a href="#"><img src="images/car2.jpg" width="58" height="58" /></a></div>
                        <div class="name"><a href="#">香奈儿（Chanel）邂逅活力淡香水50ml</a></div>
                        <div class="price"><font color="#ff4e00">￥399</font> X1</div>
                    </li>
                </ul>
                <div class="price_sum">共计&nbsp; <font color="#ff4e00">￥</font><span>1058</span></div>
                <div class="price_a"><a href="<?=site_url('Buycar/index')?>">去购物车结算</a></div>
                <!--End 购物车已登录 End-->
            </div>
        </div>
    </div>
</div>
<!--End Header End--> 
<div class="i_bg bg_color">
    <!--Begin 用户中心 Begin -->
	<div class="m_content">
   		<div class="m_left">
        	<div class="left_n">管理中心</div>
            <div class="left_m">
            	<div class="left_m_t t_bg1">订单中心</div>
                <ul>
                	<li><a href="Member_Order.html">我的订单</a></li>
                    <li><a href="Member_Address.html" class="now">收货地址</a></li>
                    <li><a href="#">缺货登记</a></li>
                    <li><a href="#">跟踪订单</a></li>
                </ul>
            </div>
            <div class="left_m">
            	<div class="left_m_t t_bg2">会员中心</div>
                <ul>
                	<li><a href="Member_User.html">用户信息</a></li>
                    <li><a href="Member_Collect.html">我的收藏</a></li>
                    <li><a href="Member_Msg.html">我的留言</a></li>
                    <li><a href="Member_Links.html">推广链接</a></li>
                    <li><a href="#">我的评论</a></li>
                </ul>
            </div>
            <div class="left_m">
            	<div class="left_m_t t_bg3">账户中心</div>
                <ul>
                	<li><a href="Member_Safe.html">账户安全</a></li>
                    <li><a href="Member_Packet.html">我的红包</a></li>
                    <li><a href="Member_Money.html">资金管理</a></li>
                </ul>
            </div>
            <div class="left_m">
            	<div class="left_m_t t_bg4">分销中心</div>
                <ul>
                	<li><a href="Member_Member.html">我的会员</a></li>
                    <li><a href="Member_Results.html">我的业绩</a></li>
                    <li><a href="Member_Commission.html">我的佣金</a></li>
                    <li><a href="Member_Cash.html">申请提现</a></li>
                </ul>
            </div>
        </div>
		<div class="m_right">
            <p></p>
            <div class="mem_tit">收货地址</div>
			<div class="address">
            	<div class="a_close"><a href="#"><img src="images/a_close.png" /></a></div>
            	<table border="0" class="add_t" align="center" style="width:98%; margin:10px auto;" cellspacing="0" cellpadding="0">
                  <tr>
                    <td colspan="2" style="font-size:14px; color:#ff4e00;">杨杨公司</td>
                  </tr>
                  <tr>
                    <td align="right" width="80">收货人姓名：</td>
                    <td><?=$arr['consignee']?></td>
                  </tr>
                  <tr>
                    <td align="right">配送区域：</td>
                    <td><?=$arr['str']?></td>
                  </tr>
                  <tr>
                    <td align="right">详细地址：</td>
                    <td><?=$arr['address']?></td>
                  </tr>
                  <tr>
                    <td align="right">手机：</td>
                    <td><?=$arr['mobile']?></td>
                  </tr>
                  <tr>
                    <td align="right">电话：</td>
                    <td><?=$arr['mobilephone']?></td>
                  </tr>
                  <tr>
                    <td align="right">电子邮箱：</td>
                    <td><?=$arr['email']?></td>
                  </tr>
                </table>
				
                <p align="right">
                <?php
                if($arr['status'] == 1)
                {
                  echo '<a href="" style="color:#ff4e00;">取消默认</a>';
                }
                else
                {
                  echo '<a href="" style="color:#ff4e00;">设为默认</a>';
                }
                ?>
                	&nbsp; &nbsp; &nbsp; &nbsp; <a href="#" style="color:#ff4e00;">编辑</a>&nbsp; &nbsp; &nbsp; &nbsp; 
                </p>

            </div>
            <div class="mem_tit">
              <a href="#"><img src="images/add_ad.gif" /></a>
            </div>
            <table border="0" class="add_tab" style="width:930px;"  cellspacing="0" cellpadding="0">
              <tr>
                <td width="135" align="right">配送地区</td>
                <td colspan="3" style="font-family:'宋体';">
                	<select class="kk" num="1" name="country" style="background-color:#f6f6f6;">
                      <option value="-1" selected="selected">请选择...</option>
                      <?php foreach($data as $v){?>
                        <option  value="<?=$v['region_id']?>" ><?=$v['region_name']?></option>
                      <?php
                      }?>
                    </select>
                	<select class="kk" num="2" name="province">
                      <option value="0" selected="selected">请选择...</option>
                    </select>
                    <select class="kk" num="3" name="city">
                      <option value="0" selected="selected">请选择...</option>
                    </select>
                    <select class="kk" num="4" name="district">
                      <option value="0" selected="selected">请选择...</option>
                    </select>
                    （必填）
                </td>
              </tr>
              <tr>
                <td align="right">收货人姓名</td>
                <td style="font-family:'宋体';"><input type="text" name="consignee" placeholder="姓名" class="add_ipt" />（必填）</td>
                <td align="right">电子邮箱</td>
                <td style="font-family:'宋体';"><input type="text" name="email" placeholder="12345678@qq.com" class="add_ipt" />（必填）</td>
              </tr>
              <tr>
                <td align="right">详细地址</td>
                <td style="font-family:'宋体';"><input name="address" type="text" placeholder="世外桃源" class="add_ipt" />（必填）</td>
                <td align="right">邮政编码</td>
                <td style="font-family:'宋体';"><input name="zipcode" type="text" placeholder="610000" class="add_ipt" /></td>
              </tr>
              <tr>
                <td align="right">手机</td>
                <td style="font-family:'宋体';"><input name="mobile" type="text" placeholder="1361234587" class="add_ipt" />（必填）</td>
                <td align="right">电话</td>
                <td style="font-family:'宋体';"><input name="mobilephone" type="text" placeholder="028-12345678" class="add_ipt" /></td>
              </tr>
               <tr>
                <td align="right">是否为默认地址</td>
                <td style="font-family:'宋体';"><input name="status" value="1" type="radio" />是<input name="status" checked="" value="0" type="radio" />否</td>
              </tr>
            </table>
           	<p align="right">
            	<a href="javascript:;">删除</a>&nbsp; &nbsp; <a href="javascript:;" class="add_b">确认</a>
            </p> 
           

            
        </div>
    </div>
	<!--End 用户中心 End--> 
<?php
require_once('public/foot.php');
?>
<script type="text/javascript">
    $(document).on('change','.kk',function(){
      var obj=$(this);
      //得到id值
      var region_id=obj.val();
      $.ajax({
            type:'get',
            url:"<?=site_url('Address/ajax')?>",
            data:{'parent_id':region_id},
            dataType:'json',
            success:function(e)
            {
                obj.next().html('');
                obj.next().append('<option value="-1" selected="selected">请选择...</option>');
                $.each(e,function(k,v){
                  obj.next().append('<option value="'+v.region_id+'">'+v.region_name+'</option>')
                })
                obj.next().nextAll().html('<option value="-1" selected="selected">请选择...</option>');
                // alert(obj.attr('num'));
                // for(var i=obj.attr('num')/1+1;i<=4;i++)
                // {
                //   $(".kk").eq(i).html('<option value="0" selected="selected">请选择...</option>');
                // }
            }
        })
    })
    $(".add_b").click(function(){
      var arr={};
      arr['country']=$('.kk[name="country"]').val();
      arr['province']=$('.kk[name="province"]').val();
      arr['city']=$('.kk[name="city"]').val();
      arr['district']=$('.kk[name="district"]').val();
      arr['consignee']=$("input[name='consignee']").val();
      arr['email']=$("input[name='email']").val();
      arr['address']=$("input[name='address']").val();
      arr['zipcode']=$("input[name='zipcode']").val();
      arr['mobile']=$("input[name='mobile']").val();
      arr['mobilephone']=$("input[name='mobilephone']").val();
      arr['status']=$("input[name='status']").val();
      console.log(arr);
      $.ajax({
          type:'get',
          url:"<?=site_url('Address/ajaxAdd')?>",
          data:arr,
          success:function(e)
          {
            if(e == 0)
            {
              alert('添加失败');
              return false;
            }
            alert('添加地址成功');
          }
      })
    })
</script>
