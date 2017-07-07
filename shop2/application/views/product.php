<!--引入头部-->
<?php
require_once('public/top.php');
require_once('public/menu.php');
?>
    <link type="text/css" rel="stylesheet" href="css/style.css" />
    <!--[if IE 6]>
    <script src="js/iepng.js" type="text/javascript"></script>
        <script type="text/javascript">
           EvPNG.fix('div, ul, img, li, input, a'); 
        </script>
    <![endif]-->
    
    <script type="text/javascript" src="js/jquery-1.8.2.min.js"></script>
    <script type="text/javascript" src="js/menu.js"></script>    
            
    <script type="text/javascript" src="js/lrscroll_1.js"></script>   
     
    
    <script type="text/javascript" src="js/n_nav.js"></script>
    
    <link rel="stylesheet" type="text/css" href="css/ShopShow.css" />
    <link rel="stylesheet" type="text/css" href="css/MagicZoom.css" />
    <script type="text/javascript" src="js/MagicZoom.js"></script>
    
    <script type="text/javascript" src="js/num.js">
        var jq = jQuery.noConflict();
    </script>
        
    <script type="text/javascript" src="js/p_tab.js"></script>
    
    <script type="text/javascript" src="js/shade.js"></script>
    

<div class="i_bg">
    <div class="postion">
        <span class="fl">全部 > 美妆个护 > 香水 > 迪奥 > 迪奥真我香水</span>
    </div>    
    <div class="content">
                            
        <div id="tsShopContainer">
            <div id="tsImgS"><a href="<?=base_url('Uploads/admin').'/'.$data['goods_img']?>" title="Images" class="MagicZoom" id="MagicZoom"><img src="<?=base_url('Uploads/admin').'/'.$data['goods_img']?>" width="390" height="390" /></a></div>
            <div id="tsPicContainer">
                <div id="tsImgSArrL" onclick="tsScrollArrLeft()"></div>
                <div id="tsImgSCon">
                    <ul>
                        <li onclick="showPic(0)" rel="MagicZoom" class="tsSelectImg"><img src="<?=base_url('Uploads/admin').'/'.$data['goods_img']?>" tsImgS="<?=base_url('Uploads/admin').'/'.$data['goods_img']?>" width="79" height="79" /></li>
                        <?php $num=1; foreach($img as $v){?>
                        <li onclick="showPic(<?=$num?>)" rel="MagicZoom"><img src="<?=base_url('Uploads/admin').'/'.$v['original_img']?>" tsImgS="<?=base_url('Uploads/admin').'/'.$v['original_img']?>" width="79" height="79" /></li>
                        <?php
                        $num++;}?>
                    </ul>
                </div>
                <div id="tsImgSArrR" onclick="tsScrollArrRight()"></div>
            </div>
            <!-- <img class="MagicZoomLoading" width="16" height="16" src="images/loading.gif" alt="Loading..." />                -->
        </div>
        
        <div class="pro_des">
            <div class="des_name">
                <p><?=$data['goods_name']?></p>
                <?=$data['title']?>
            </div>
            <div class="des_price">
                本店价格：<b class="b">￥<?=$data['shop_price']?></b><br />

                <!-- 消费积分：<span>28R</span> -->
            </div>
            <?php
            if(isset($haha['norms']))
            {
            foreach($haha['norms'] as $k=>$v){?>
            <div class="des_choice">
                <span class="fl"><?=$v['attr_name']?>：</span>
                <ul>
                <?php
                foreach($v['value'] as $vv){?>
                    <li class="attr-sku" id="<?=$vv['goods_attr_id']?>"><?=$vv['attr_value']?><div class="ch_img"></div></li>
                <?php
                }?>
                </ul>
            </div>
            <?php
            } }?>
            
            <input type="hidden" id="sum">
            <div class="des_share">
                <div class="d_sh">
                    分享
                    <div class="d_sh_bg">
                        <a href="#"><img src="images/sh_1.gif" /></a>
                        <a href="#"><img src="images/sh_2.gif" /></a>
                        <a href="#"><img src="images/sh_3.gif" /></a>
                        <a href="#"><img src="images/sh_4.gif" /></a>
                        <a href="#"><img src="images/sh_5.gif" /></a>
                    </div>
                </div>
                <div class="d_care"><a onclick="ShowDiv('MyDiv3','fade3')">关注商品</a></div>
            </div>
            <div class="des_join">
                <div class="j_nums">
                    <input type="text" value="1" name="" class="n_ipt" />
                    <input type="button" value="" onclick="addUpdate(jq(this));" class="n_btn_1" />
                    <input type="button" value="" onclick="jianUpdate(jq(this));" class="n_btn_2" />   
                </div>
                <span>
                    <a class="shopping">
                        <img src="images/j_car.png" />
                    </a>
                </span>
            </div>            
        </div>    
        
        <div class="s_brand">
            <div class="s_brand_img"><img src="images/sbrand.jpg" width="188" height="132" /></div>
            <div class="s_brand_c"><a href="#">进入品牌专区</a></div>
        </div>    
        
        
    </div>
    <div class="content mar_20">
        <div class="l_history">
            <div class="fav_t">用户还喜欢</div>
            <ul>
                <li>
                    <div class="img"><a href="#"><img src="images/his_1.jpg" width="185" height="162" /></a></div>
                    <div class="name"><a href="#">Dior/迪奥香水2件套装</a></div>
                    <div class="price">
                        <font>￥<span>368.00</span></font> &nbsp; 18R
                    </div>
                </li>
                <li>
                    <div class="img"><a href="#"><img src="images/his_2.jpg" width="185" height="162" /></a></div>
                    <div class="name"><a href="#">Dior/迪奥香水2件套装</a></div>
                    <div class="price">
                        <font>￥<span>768.00</span></font> &nbsp; 18R
                    </div>
                </li>
                <li>
                    <div class="img"><a href="#"><img src="images/his_3.jpg" width="185" height="162" /></a></div>
                    <div class="name"><a href="#">Dior/迪奥香水2件套装</a></div>
                    <div class="price">
                        <font>￥<span>680.00</span></font> &nbsp; 18R
                    </div>
                </li>
                <li>
                    <div class="img"><a href="#"><img src="images/his_4.jpg" width="185" height="162" /></a></div>
                    <div class="name"><a href="#">Dior/迪奥香水2件套装</a></div>
                    <div class="price">
                        <font>￥<span>368.00</span></font> &nbsp; 18R
                    </div>
                </li>
                <li>
                    <div class="img"><a href="#"><img src="images/his_5.jpg" width="185" height="162" /></a></div>
                    <div class="name"><a href="#">Dior/迪奥香水2件套装</a></div>
                    <div class="price">
                        <font>￥<span>368.00</span></font> &nbsp; 18R
                    </div>
                </li>
            </ul>
        </div>
        <div class="l_list">            
            <div class="des_border">
                <div class="des_tit">
                    <ul>
                        <li class="current">推荐搭配</li>
                    </ul>
                </div>
                <div class="team_list">
                    <div class="img"><a href="#"><img src="images/mat_1.jpg" width="160" height="140" /></a></div>
                    <div class="name"><a href="#">倩碧补水组合套装8折促销</a></div>
                    <div class="price">
                        <div class="checkbox"><input type="checkbox" name="zuhe" checked="checked" /></div>
                        <font>￥<span>768.00</span></font> &nbsp; 18R
                    </div>
                </div>
                <div class="team_icon"><img src="images/jia_b.gif" /></div>
                <div class="team_list">
                    <div class="img"><a href="#"><img src="images/mat_2.jpg" width="160" height="140" /></a></div>
                    <div class="name"><a href="#">香奈儿邂逅清新淡香水50ml</a></div>
                    <div class="price">
                        <div class="checkbox"><input type="checkbox" name="zuhe" /></div>
                        <font>￥<span>749.00</span></font> &nbsp; 18R
                    </div>
                </div>
                <div class="team_icon"><img src="images/jia_b.gif" /></div>
                <div class="team_list">
                    <div class="img"><a href="#"><img src="images/mat_3.jpg" width="160" height="140" /></a></div>
                    <div class="name"><a href="#">香奈儿邂逅清新淡香水50ml</a></div>
                    <div class="price">
                        <div class="checkbox"><input type="checkbox" name="zuhe" checked="checked" /></div>
                        <font>￥<span>749.00</span></font> &nbsp; 18R
                    </div>
                </div>
                <div class="team_icon"><img src="images/equl.gif" /></div>
                <div class="team_sum">
                    套餐价：￥<span>1517</span><br />
                    <input type="text" value="1" class="sum_ipt" /><br />
                    <a href="#"><img src="images/z_buy.gif" /></a> 
                </div>
                
            </div>
            <div class="des_border">
                <div class="des_tit">
                    <ul>
                        <li class="current"><a href="#p_attribute">商品属性</a></li>
                        <li><a href="#p_details">商品详情</a></li>
                        <li><a href="#p_comment">商品评论</a></li>
                    </ul>
                </div>
               <div class="des_con" id="p_attribute">
                    
                    <table border="0" align="center" style="width:100%; font-family:'宋体'; margin:10px auto;" cellspacing="0" cellpadding="0">
                    
                    <?php if(isset($haha['argument'])){ foreach($haha['argument'] as $v){?>

                      <tr>
                        <td><?=$v['attr_name']?>：
                        <?php 
                        foreach($v['value'] as $val)
                        {
                            echo $val['attr_value'];
                        }
                        ?>
                        </td>
                      </tr>
                     <?php
                     }}?>
                    </table>                                                       
                </div>
            </div>  
            
            <div class="des_border" id="p_details">
                <div class="des_t">商品详情</div>
                <div class="des_con">
                    <table border="0" align="center" style="width:745px; font-size:14px; font-family:'宋体';" cellspacing="0" cellpadding="0">
                      <tr>
                        <td width="265"><img src="images/de1.jpg" width="206" height="412" /></td>
                        <td>
                            <b>迪奥真我香水(Q版)</b><br />
                            【商品规格】：5ml<br />
                            【商品质地】：液体<br />
                            【商品日期】：与专柜同步更新<br />
                            【商品产地】：法国<br />
                            【商品包装】：无外盒 无塑封<br />
                            【商品香调】：花束花香调<br />
                            【适用人群】：适合女性（都市白领，性感，有女人味的成熟女性）<br />
                        </td>
                      </tr>
                    </table>
                    
                    <p align="center">
                    <img src="images/de2.jpg" width="746" height="425" /><br /><br />
                    <img src="images/de3.jpg" width="750" height="417" /><br /><br />
                    <img src="images/de4.jpg" width="750" height="409" /><br /><br />
                    <img src="images/de5.jpg" width="750" height="409" />
                    </p>
                    
                </div>
            </div>  
            
            <div class="des_border" id="p_comment">
                <div class="des_t">商品评论</div>
                
                <table border="0" class="jud_tab" cellspacing="0" cellpadding="0">
                  <tr>
                    <td width="175" class="jud_per">
                        <p>80.0%</p>好评度
                    </td>
                    <td width="300">
                        <table border="0" style="width:100%;" cellspacing="0" cellpadding="0">
                          <tr>
                            <td width="90">好评<font color="#999999">（80%）</font></td>
                            <td><img src="images/pl.gif" align="absmiddle" /></td>
                          </tr>
                          <tr>
                            <td>中评<font color="#999999">（20%）</font></td>
                            <td><img src="images/pl.gif" align="absmiddle" /></td>
                          </tr>
                          <tr>
                            <td>差评<font color="#999999">（0%）</font></td>
                            <td><img src="images/pl.gif" align="absmiddle" /></td>
                          </tr>
                        </table>
                    </td>
                    <td width="185" class="jud_bg">
                        购买过雅诗兰黛第六代特润精华露50ml的顾客，在收到商品才可以对该商品发表评论
                    </td>
                    <td class="jud_bg">您可对已购买商品进行评价<br /><a href="#"><img src="images/btn_jud.gif" /></a></td>
                  </tr>
                </table>
                
                
                                
                <table border="0" class="jud_list" style="width:100%; margin-top:30px;" cellspacing="0" cellpadding="0">
                  <tr valign="top">
                    <td width="160"><img src="images/peo1.jpg" width="20" height="20" align="absmiddle" />&nbsp;向死而生</td>
                    <td width="180">
                        颜色分类：<font color="#999999">粉色</font> <br />
                        型号：<font color="#999999">50ml</font>
                    </td>
                    <td>
                        产品很好，香味很喜欢，必须给赞。 <br />
                        <font color="#999999">2015-09-24</font>
                    </td>
                  </tr>
                  <tr valign="top">
                    <td width="160"><img src="images/peo2.jpg" width="20" height="20" align="absmiddle" />&nbsp;就是这么想的</td>
                    <td width="180">
                        颜色分类：<font color="#999999">粉色</font> <br />
                        型号：<font color="#999999">50ml</font>
                    </td>
                    <td>
                        送朋友，她很喜欢，大爱。 <br />
                        <font color="#999999">2015-09-24</font>
                    </td>
                  </tr>
                  <tr valign="top">
                    <td width="160"><img src="images/peo3.jpg" width="20" height="20" align="absmiddle" />&nbsp;墨镜墨镜</td>
                    <td width="180">
                        颜色分类：<font color="#999999">粉色</font> <br />
                        型号：<font color="#999999">50ml</font>
                    </td>
                    <td>
                        大家都说不错<br />
                        <font color="#999999">2015-09-24</font>
                    </td>
                  </tr>
                  <tr valign="top">
                    <td width="160"><img src="images/peo4.jpg" width="20" height="20" align="absmiddle" />&nbsp;那*****洋 <br /><font color="#999999">（匿名用户）</font></td>
                    <td width="180">
                        颜色分类：<font color="#999999">粉色</font> <br />
                        型号：<font color="#999999">50ml</font>
                    </td>
                    <td>
                        下次还会来买，推荐。<br />
                        <font color="#999999">2015-09-24</font>
                    </td>
                  </tr>
                </table>

                    
                    
                <div class="pages">
                    <a href="#" class="p_pre">上一页</a><a href="#" class="cur">1</a><a href="#">2</a><a href="#">3</a>...<a href="#">20</a><a href="#" class="p_pre">下一页</a>
                </div>
                
            </div>
            
            
        </div>
    </div>
    
    
    <!--Begin 弹出层-请先登录 Begin-->
    <div id="fade" class="black_overlay"></div>
    <div id="MyDiv" class="white_content">             
        <div class="white_d">
            <div class="notice_t">
                <span class="fr" style="margin-top:10px; cursor:pointer;" onclick="CloseDiv('MyDiv','fade')"><img src="images/close.gif" /></span>
            </div>
            <div class="notice_c">
                
                <table cellspacing="0" cellpadding="0" border="0" style="width:370px; font-size:14px; margin-top:30px;">
              <tbody><tr valign="top" height="50">
                <td width="55">&nbsp;</td>
                <td>
                    <span style="font-size:24px;" class="fl">请先登录</span>
                    <span class="fr">还没有商城账号，<a style="color:#ff4e00;" href="http://www.shop2.com/index.php/Regist/index">立即注册</a></span>
                </td>
              </tr>
              <tr height="70">
                <td>用户名</td>
                <td><input type="text" class="l_user" value="" name="user_name"></td>
              </tr>
              <tr height="70">
                <td>密&nbsp; &nbsp; 码</td>
                <td><input type="password" class="l_pwd" value="" name="user_pwd"></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td style="font-size:12px; padding-top:20px;">
                    <span class="fl" style="font-family:'宋体';">
                        <label class="r_rad"><input type="checkbox"></label><label class="r_txt">请保存我这次的登录信息</label>
                    </span>
                    <span class="fr"><a style="color:#ff4e00;" href="">忘记密码</a></span>
                </td>
              </tr>
              <tr height="60">
                <td>&nbsp;</td>
                <td><input type="button" class="log_btn" value="登录"></td>
              </tr>
            </tbody></table>
                    
            </div>
        </div>
    </div>    
    <!--End 弹出层-登录 End-->
    <div id="fade2" class="black_overlay"></div>
    <div id="MyDiv2" class="white_content">             
        <div class="white_d">
            <div class="notice_t">
                <span class="fr" style="margin-top:10px; cursor:pointer;" onclick="CloseDiv('MyDiv','fade')"><img src="images/close.gif" /></span>
            </div>
            <div class="notice_c">
                
                <table border="0" align="center" style="margin-top:;" cellspacing="0" cellpadding="0">
                  <tr valign="top">
                    <td width="40"><img src="images/suc.png" /></td>
                    <td>
                        <span style="color:#3e3e3e; font-size:18px; font-weight:bold;">您已成功收藏该商品</span><br />
                        <a href="#">查看我的关注 >></a>
                    </td>
                  </tr>
                  <tr height="50" valign="bottom">
                    <td>&nbsp;</td>
                    <td><a href="#" class="b_sure">确定</a></td>
                  </tr>
                </table>
                    
            </div>
        </div>
    </div>    
    
    <!--Begin 弹出层-加入购物车 Begin-->
    <div id="fade1" class="black_overlay"></div>
    <div id="MyDiv1" class="white_content">             
        <div class="white_d">
            <div class="notice_t">
                <span class="fr" style="margin-top:10px; cursor:pointer;" onclick="CloseDiv_1('MyDiv1','fade1')"><img src="images/close.gif" /></span>
            </div>
            <div class="notice_c">
                
                <table border="0" align="center" style="margin-top:;" cellspacing="0" cellpadding="0">
                  <tr valign="top">
                    <td width="40"><img src="images/suc.png" /></td>
                    <td>
                        <span style="color:#3e3e3e; font-size:18px; font-weight:bold;">宝贝已成功添加到购物车</span><br />
                        购物车共有<span class="num"></span>种宝贝（<span class="sum"></span>件） &nbsp; &nbsp; 合计：<span class="price"></span>元
                    </td>
                  </tr>
                  <tr height="50" valign="bottom">
                    <td>&nbsp;</td>
                    <td><a href="<?=site_url('Buycar/index')?>" class="b_sure">去购物车结算</a><a href="javascript:;" onclick="CloseDiv_1('MyDiv1','fade1')" class="b_buy">继续购物</a></td>
                  </tr>
                </table>
                    
            </div>
        </div>
    </div>    
    <!--End 弹出层-加入购物车 End-->

    <!--Begin 收藏 Begin-->
    <div id="fade3" class="black_overlay"></div>
    <div id="MyDiv3" class="white_content">             
        <div class="white_d">
            <div class="notice_t">
                <span class="fr" style="margin-top:10px; cursor:pointer;" onclick="CloseDiv('MyDiv3','fade3')"><img src="images/close.gif" /></span>
            </div>
            <div class="notice_c">
                
                <table border="0" align="center" style="margin-top:;" cellspacing="0" cellpadding="0">
                  <tr valign="top">
                    <td width="40"><img src="images/suc.png" /></td>
                    <td>
                        <span style="color:#3e3e3e; font-size:18px; font-weight:bold;">您已成功收藏该商品</span><br />
                        <!-- <a href="#">查看我的关注 >></a> -->
                    </td>
                  </tr>
                  <tr height="50" valign="bottom">
                    <td>&nbsp;</td>
                    <td><a href="javascript:;" onclick="CloseDiv('MyDiv3','fade3')" class="b_sure">确定</a></td>
                  </tr>
                </table>
                    
            </div>
        </div>
    </div>    
    <!--End 收藏 End-->
    
     <!--Begin 选好规格 Begin-->
    <div id="fadegui" class="black_overlay"></div>
    <div id="MyDivgui" class="white_content">             
        <div class="white_d">
            <div class="notice_t">
                <span class="fr" style="margin-top:10px; cursor:pointer;" onclick="CloseDiv('MyDivgui','fadegui')"><img src="images/close.gif" /></span>
            </div>
            <div class="notice_c">
                
                <table border="0" align="center" style="margin-top:;" cellspacing="0" cellpadding="0">
                  <tr valign="top">
                    <td width="40"><img src="images/suc.png" /></td>
                    <td>
                        <span style="color:#3e3e3e; font-size:18px; font-weight:bold;">请选好规格</span><br />
                        <!-- <a href="#">查看我的关注 >></a> -->
                    </td>
                  </tr>
                  <tr height="50" valign="bottom">
                    <td>&nbsp;</td>
                    <td><a href="javascript:;" onclick="CloseDiv('MyDivgui','fadegui')" class="b_sure">确定</a></td>
                  </tr>
                </table>
                    
            </div>
        </div>
    </div>    
    <!--End 选好规格 End-->

      <!--Begin 没有库存 Begin-->
    <div id="fadenum" class="black_overlay"></div>
    <div id="MyDivnum" class="white_content">             
        <div class="white_d">
            <div class="notice_t">
                <span class="fr" style="margin-top:10px; cursor:pointer;" onclick="CloseDiv('MyDivnum','fadenum')"><img src="images/close.gif" /></span>
            </div>
            <div class="notice_c">
                
                <table border="0" align="center" style="margin-top:;" cellspacing="0" cellpadding="0">
                  <tr valign="top">
                    <td width="40"><img src="images/suc.png" /></td>
                    <td>
                        <span style="color:#3e3e3e; font-size:18px; font-weight:bold;">没有该货品</span><br />
                        <!-- <a href="#">查看我的关注 >></a> -->
                    </td>
                  </tr>
                  <tr height="50" valign="bottom">
                    <td>&nbsp;</td>
                    <td><a href="javascript:;" onclick="CloseDiv('MyDivnum','fadenum')" class="b_sure">确定</a></td>
                  </tr>
                </table>
                    
            </div>
        </div>
    </div>    
    <!--End 没有库存 End-->
<script src="js/ShopShow.js"></script>
<?php
require_once('public/foot.php');
?>
 <script type="text/javascript">
        // var data=sku.split(',');
        $('.des_choice li').click(function(){
            var goods_id="<?=$data['goods_id']?>";
            var obj=$(this);
            $(this).addClass('checked').siblings().removeClass('checked');
            var div=$(".des_choice");
            var li=$(".des_choice li");
            var val=[];
            //计数
            num=0;
            for(var i=0;i<li.length;i++)
            {
                if(li.eq(i).hasClass('checked')==true)
                {
                    val.push(li.eq(i).prop('id'));
                    num++;
                }

            }
            val=val.join(',');
            if(num == div.length)
            {
                $.ajax({
                    type:'get',
                    url:"<?=site_url('Product/ajaxDian')?>",
                    data:{'goods_id':goods_id,'val':val},
                    dataType:'json',
                    success:function(e)
                    {
                        $("#product_id").val('')
                        if(e==0)
                        {
                            ShowDiv('MyDivnum','fadenum')
                            $(".b").html('￥<?=$data["shop_price"]?></b><br />');
                            obj.removeClass('checked');
                            return false;
                        }
                        $(".b").html('￥'+e.goods_price);
                        $(".b").after('<br />货号：'+e.goods_sn);
                        $("#sum").val(e.product_id+'|'+e.goods_sn+'|'+"<?=$data['goods_name']?>");
                    }
                })
            }
        })

        $(".shopping").click(function(){
            var obj=$(this);
            var data={};
            var goods_id="<?=$data['goods_id']?>";
            var div=$(".des_choice");
            var li=$(".des_choice li");
            var val=[];
            //计数
            num=0;
            for(var i=0;i<li.length;i++)
            {
                if(li.eq(i).hasClass('checked')==true)
                {
                    val.push(li.eq(i).prop('id'));
                    num++;
                }
            }
            val=val.join(',');
            if(num == div.length)
            {
                //得到goods_id
                data['goods_id']="<?=$data['goods_id']?>";
                data['goods_attr_id']=val;
                data['sum']=$("#sum").val();
                data['goods_number']=$(".n_ipt").val();
                $.ajax({
                    type:'get',
                    url:"<?=site_url('Product/ajaxInsert')?>",
                    data:data,
                    dataType:'json',
                    success:function(e)
                    {
                        if(e==0)
                        {
                            ShowDiv('MyDiv','fade')
                            return false;
                        }
                        if(e.error==0)
                        {
                            alert('添加购物车失败');
                            return false;
                        }
                        $('.sum').html(e.content[1])
                        $('.num').html(e.content[0])
                        $('.price').html(e.content[2])
                        ShowDiv_1("MyDiv1","fade1");
                    }
                })
            }
            else
            {
                ShowDiv('MyDivgui','fadegui')
                return false;
            }
        })
        

        $(".log_btn").click(function(){
            var obj=$(this);
            var user_name=$('.l_user').val();
            var user_pwd=$(".l_pwd").val();
            $.ajax({
                type:'get',
                url:"<?=site_url('Product/ajaxLogin')?>",
                data:{user_name:user_name,user_pwd:user_pwd},
                success:function(e)
                {
                    if(e == 1)
                    {
                        CloseDiv('MyDiv','fade');
                    }
                }
            })
        })
</script>
