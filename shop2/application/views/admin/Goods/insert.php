
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<base href="<?=base_url('public/insert').'/'?>">
<title>DouPHP 管理中心 - 系统设置 </title>
<meta name="Copyright" content="Douco Design." />
<base href="<?=base_url('upload/index').'/'?>">
<link href="css/public.css" rel="stylesheet" type="text/css">
<style type="text/css">
  .add,.addPhoto{
    cursor: pointer;
    color: blue;
  }
  .del,.delPhoto{
    cursor:pointer;
    color: red;
  }
</style>
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/global.js"></script>
<script type="text/javascript" src="js/jquery.tab.js"></script>
</head>
<body>
<div class="mainBox" style="height:auto!important;height:550px;min-height:550px;">
    <h3>新增商品</h3>
    <script type="text/javascript">
     
     $(function(){ $(".idTabs").idTabs(); });
     
    </script>
    <div class="idTabs">
      <ul class="tab">
        <li><a href="#main">基本信息</a></li>
        <li><a href="#display">详细描述</a></li>
        <li><a href="#defined">其他信息</a></li>
        <li><a href="#attr">商品属性</a></li>
        <li><a href="#gui">商品规格</a></li>
        <li><a href="#photo">商品相册</a></li>
      </ul>


      <div class="items">
       <form action="" method="post" enctype="multipart/form-data">
        <div id="main">
        <table width="100%" border="0" cellpadding="8" cellspacing="0" class="tableBasic">
         <tr>
           <th width="131">名称</th>
           <th>内容</th>
         </tr>
                  <tr>
          <td align="right">商品名称</td>
          <td>
                      <input type="text" name="goods_name" size="80" class="inpMain" />
                                </td>
         </tr>
         <tr>
          <td align="right">商品标题</td>
          <td>
                      <input type="text" name="title" size="80" class="inpMain" />
                                </td>
         </tr>
                  <tr>
          <td align="right">商品货号</td>
          <td>
                      <input type="text" name="goods_snsn" size="80" class="inpMain" />
                                </td>
         </tr>
                  <tr>
          <td align="right">所属分类</td>
          <td>
              <select name="cat_id" class="inpMain" />
              <option value="0">---请选择---</option>
              <?php foreach($cate as $v){?>
                <option
                <?php
                  if($v['level']=='---' || $v['level']=='')
                  {
                    echo "disabled";
                  }
                ?>
                value="<?=$v['cat_id']?>"> <?=$v['level'].$v['cat_name']?></option>
              <?php
              }?>
              </select>
          </td>
         </tr>
                  <tr>
          <td align="right">所属品牌</td>
          <td>
              <select name="brand_id" class="inpMain" />
              <option value="0">---请选择---</option>
              <?php foreach($brand as $v){?>
              <option value="<?=$v['brand_id']?>"><?=$v['brand_name']?></option>
              <?php
              }?>
              </select>
          </td>
         </tr>
                  <tr>
          <td align="right">市场价</td>
          <td>
                      <input type="text" name="market_price" size="80" class="inpMain" />
                               </td>
         </tr>
                  <tr>
          <td align="right">本店价</td>
          <td>
                      <input type="text" name="shop_price" size="80" class="inpMain" />
                                </td>
         </tr>
          <tr>
          <td align="right">上传图片</td>
          <td>
            <input type="file" name="goods_img" size="80" class="inpMain" />
          </td>
         </tr>
                  
        </table>
        </div>



        <div id="display">
        <table width="100%" border="0" cellpadding="8" cellspacing="0" class="tableBasic">
          <script id="editor" name="goods_desc" type="text/plain" style="width:1024px;height:500px;"></script>
        </table>
        </div>



        <div id="defined">
        <table width="100%" border="0" cellpadding="8" cellspacing="0" class="tableBasic">
           <tr>
             <th width="131">名称</th>
             <th>内容</th>
           </tr>
                                        <tr>
             <td align="right">商品库存</td>
             <td>
              <input type="text" name="gooods_number" value="" size="80" class="inpMain" />
                         </td>
            </tr>
                      <tr>
             <td align="right">是否上架</td>
             <td>
              <label for="site_closed_0">
              <input type="radio" name="is_on_sale" id="site_closed_0" value="0" checked="true">
              否</label>
             <label for="site_closed_1">
              <input type="radio" name="is_on_sale" id="site_closed_1" value="1">
              是</label>
                         </td>
            </tr>
            <tr>
           <td align="right">是否热卖</td>
           <td>
            <label for="site_closed_0">
            <input type="radio" name="is_hot" id="site_closed_0" value="0" checked="true">
            否</label>
           <label for="site_closed_1">
            <input type="radio" name="is_hot" id="site_closed_1" value="1">
            是</label>
                       </td>
          </tr>
          <tr>
           <td align="right">是否新品</td>
           <td>
            <label for="site_closed_0">
            <input type="radio" name="is_new" id="site_closed_0" value="0" checked="true">
            否</label>
           <label for="site_closed_1">
            <input type="radio" name="is_new" id="site_closed_1" value="1">
            是</label>
                       </td>
          </tr>
          <tr>
           <td align="right">是否精品</td>
           <td>
            <label for="site_closed_0">
            <input type="radio" name="is_best" id="site_closed_0" value="0" checked="true">
            否</label>
           <label for="site_closed_1">
            <input type="radio" name="is_best" id="site_closed_1" value="1">
            是</label>
                       </td>
          </tr>
          <tr>
             <td align="right">排序</td>
             <td>
              <input type="text" name="sort" value="50" size="80" class="inpMain" />
                         </td>
            </tr>
        </table>
        </div>


        <div id="attr">
        <table width="100%" border="0" cellpadding="8" cellspacing="0" class="tableBasic">
          <tr>
           <th width="131">名称</th>
           <th>参数</th>
          </tr>
          <tr>
            <td align="right">所属类型</td>
            <td>
              <select name="type_id" class="type" class="inpMain" />
              <option value="0">---请选择---</option>
              <?php foreach($type as $v){?>
                <option value="<?=$v['type_id']?>"><?=$v['type_name']?></option>
              <?php
              }?>
              </select>
            </td>
          </tr>
          <tbody id="div"></tbody>
         <!--  <tr>
             <td align="right">排序</td>
             <td>
              <input type="text" name="defined[article]" value="" size="80" class="inpMain" />
             </td>
          </tr> -->
        </table>
        </div>


        <div id="gui">
        <table width="100%" border="0" cellpadding="8" cellspacing="0" class="tableBasic">
          <tr>
           <th width="131">名称</th>
           <th>规格</th>
          </tr>
          <tbody id="norms"></tbody>
        </table>
        </div>

        <div id="photo">
        <table width="100%" border="0" cellpadding="8" cellspacing="0" class="tableBasic">
          <tr>
           <th width="131">名称</th>
           <th>图片</th>
          </tr>
          <tr>
            <td align="right">上传相册</td>
            <td>
              <input type="file" name="goods_photo[]" size="80" class="inpMain" />&nbsp;&nbsp;<span class="addPhoto">[+]</span>
              <input type="text" placeholder="简短描述" name="img_desc[]" size="80" class="inpMain" />
            </td>
         </tr>
          <!-- <tbody id="tbody"></tbody> -->
        </table>
        </div>

                <div id="mail">
        <table width="100%" border="0" cellpadding="8" cellspacing="0" class="tableBasic">
                <table width="100%" border="0" cellpadding="8" cellspacing="0" class="tableBasic">
         <tr>
          <td width="131"></td>
          <td>
           <input class="btn" type="submit" value="提交" />
          </td>
         </tr>
        </table>
        </form>
      </div>
    </div>
   </div>
 </div>
 <div class="clear"></div>
<div id="dcFooter">
 <div id="footer">
  <div class="line"></div>
  <ul>
   版权所有 © 2013-2015 漳州豆壳网络科技有限公司，并保留所有权利。
  </ul>
 </div>
</div><!-- dcFooter 结束 -->
<div class="clear"></div> </div>
</body>
</html>
<script type="text/javascript" charset="utf-8" src="<?=base_url('public/ueditor').'/'?>ueditor.config.js"></script>
<script type="text/javascript" charset="utf-8" src="<?=base_url('public/ueditor').'/'?>ueditor.all.min.js"> </script>
<!--建议手动加在语言，避免在ie下有时因为加载语言失败导致编辑器加载失败-->
<!--这里加载的语言文件会覆盖你在配置项目里添加的语言类型，比如你在配置项目里配置的是英文，这里加载的中文，那最后就是中文-->
<script type="text/javascript" charset="utf-8" src="<?=base_url('public/ueditor').'/'?>lang/zh-cn/zh-cn.js"></script>
<script type="text/javascript">
  //实例化编辑器
  //建议使用工厂方法getEditor创建和引用编辑器实例，如果在某个闭包下引用该编辑器，直接调用UE.getEditor('editor')就能拿到相关的实例
  var ue = UE.getEditor('editor');
</script>
<script type="text/javascript">
  $(".type").change(function(){
    var obj=$(this);
    var type_id=obj.val();
    var url="<?=site_url('admin/Goods/attr')?>";
    //发送ajax
    $.ajax({
      type:'get',
      url:url,
      dataType:'json',
      data:{type_id:type_id},
      success:function(e)
      {
       
        $("#div").html('');
        $("#norms").html('')
        //将参数追加到属性栏
        if("argument" in e)
        {
          $.each(e.argument,function(k,v){
            var tr=$('<tr></tr>');
            tr.append('<td align="right">'+v.attr_name+'</td>');
            var td=$('<td></td>');
            td.append('<input name="attr_argument[]" type="text" value="" size="10" class="inpMain" />');
            // attr_value的值分割为数组
            var attr_values=v.attr_values.split("\r\n");
            var select=$('<select name="attr_argument_id[]" class="select"></select>');
            select.append('<option value="">---请选择---</option>');
            $.each(attr_values,function(kk,vv){
              var option='<option value="'+v.attr_id+'" name="'+vv+'">'+vv+'</option>';
              select.append(option);
            })
            td.append(select);
            tr.append(td);
            $("#div").append(tr);
          })
        }

        if("norms" in e)
        {
          // num=0;
          $.each(e.norms,function(k,v){
            var tr=$('<tr></tr>');
            tr.append('<td align="right">'+v.attr_name+'</td>');
            var td=$('<td></td>');
            td.append('<input name="attr_value['+k+'][]" type="text" value="" size="10" class="inpMain" />');
            // attr_value的值分割为数组
            var attr_values=v.attr_values.split("\r\n");
            var select=$('<select name="attr_id['+k+'][]" class="select"></select>');
            select.append('<option value="">---请选择---</option>');
            $.each(attr_values,function(kk,vv){
              var option='<option value="'+v.attr_id+'" name="'+vv+'">'+vv+'</option>';
              select.append(option);
            })
            td.append(select);
            tr.append(td);
            $("#norms").append(tr);
          })
          var tr=$('<tr></tr>');
          tr.append('<td></td>');
          tr.append('<td>价格:<input name="goods_price[]" type="text" size="10" class="inpMain" />&nbsp;&nbsp;&nbsp;&nbsp;库存:<input name="SKU[]" type="text" value="" size="10" class="inpMain" />&nbsp;&nbsp;&nbsp;&nbsp;货号:<input name="goods_sn[]" type="text" value="" size="10" class="inpMain" />&nbsp;&nbsp;&nbsp;<span class="add">[+]</span>');
          $('#norms').append(tr)
        }

 
      }//success的括号
    })
  })

  //复制
  $(document).on('click','.add',function(){
    var sku=$(this).parents('#norms').clone();
    //查找加号换为减号
    sku.find('.add').replaceWith('<span class="del">[-]</span>');
    $(this).parents('#norms').after(sku)
  })

  //删除
  $(document).on('click','.del',function(){
    $(this).parents('#norms').remove();
  })

  $(document).on('change','.select',function(){//将下拉框的值插入文本框
    // console.log($(this).find('option'))
    // var id=$(this).val();
    var attr_value=$(this).find('option:selected').attr('name')
    // console.log(attr_value)
    $(this).parents('td').find('input').val(attr_value);
  })

  //添加相册
  $(document).on('click','.addPhoto',function(){
    var obj=$(this).parent().parent();
    //加号变减号
    var value=obj.clone();
    value.find('.addPhoto').replaceWith('<span class="delPhoto">[-]</span>')
    obj.after(value);
    // console.log(photo)
  })
  //删除相册
  $(document).on('click','.delPhoto',function(){
    $(this).parent().parent().remove();
  })
</script>