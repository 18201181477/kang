<div class="top">
    <div class="logo"><a href="Index.html"><img src="images/logo.png" /></a></div>
    <div class="search">
      <form>
          <input type="text" value="" class="s_ipt" />
            <input type="submit" value="搜索" class="s_btn" />
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
<!--End Header End--> 
<!--Begin Menu Begin-->
<div class="menu_bg">
  <div class="menu">
      <!--Begin 商品分类详情 Begin-->    
      <div class="nav">
          <div class="nav_t">全部商品分类</div>
            <div class="leftNav" <?php if($this->router->class == 'Index' && $this->router->method == 'index') 
            {
              echo 'style="display:block;"';
            }
            else
            {
              echo 'style="display:none;"';
            }
            ?> >
                <ul>   
                <?php foreach($menu as $v){?>   
                    <li>
                      <div class="fj">
                          <span class="n_img"><span></span><img src="images/nav1.png" /></span>
                            <span class="fl"><?=$v['cat_name']?></span>
                        </div>
                        
                        <div class="zj">
                            <div class="zj_l">
                                <?php foreach($v['child'] as $vv){?>
                                <div class="zj_l_c">
                                    <h2><?=$vv['cat_name']?></h2>
                                    <?php foreach($vv['child'] as $val){?>
                                    <a href="#"><?=$val['cat_name']?></a>|    
                                    <?php
                                    }?>
                                </div> 
                                <?php
                                }?>
                            </div>
                            <div class="zj_r">
                                <a href="#"><img src="images/n_img1.jpg" width="236" height="200" /></a>
                                <a href="#"><img src="images/n_img2.jpg" width="236" height="200" /></a>
                            </div>
                        </div>
                      
                    </li>
                <?php
                }?>             
                </ul>            
            </div>
        </div>  
        <!--End 商品分类详情 End-->                                                     
      <ul class="menu_r">                                                                                                                                               
          <li><a href="Index.html">首页</a></li>
            <li><a href="Food.html">美食</a></li>
            <li><a href="Fresh.html">生鲜</a></li>
            <li><a href="HomeDecoration.html">家居</a></li>
            <li><a href="SuitDress.html">女装</a></li>
            <li><a href="MakeUp.html">美妆</a></li>
            <li><a href="Digital.html">数码</a></li>
            <li><a href="GroupBuying.html">团购</a></li>
        </ul>
        <div class="m_ad">中秋送好礼！</div>
    </div>
</div>
<!--End Menu End--> 
