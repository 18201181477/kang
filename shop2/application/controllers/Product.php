<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends Home_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Goods_model');
		$this->load->model('GoodsAttr_model');
		$this->load->model('Attr_model');
		$this->load->model('GoodsGallery_model');
		$this->load->model('Product_model');
		$this->load->model('Cat_model');
		$this->load->model('User_model');
	}
	
	/**
	 * 展示详情页面
	 */
	public function index($id)
	{
		$goods=$this->Goods_model;
		$goods->map=array('goods_id'=>$id);
		$data=$goods->getOne();
		$this->load->vars('data',$data);//发送单个商品数据
		$img=$this->GoodsGallery_model;
		$img->map=array('goods_id'=>$id);
		$img=$img->getList();
		
		$this->load->vars('img',$img);
		$attr=$this->GoodsAttr_model;//商品类型
		$attr->map=array('goods_id'=>$id);
		$arr=$attr->getList();//参数
		// foreach($arr as $k=>$v)
		// {
		// 	foreach($arr as $kk=>$vv)
		// 	{
		// 		if($v['attr_value'] == $vv['attr_value'] && $k!=$kk)
		// 		{
		// 			unset($arr[$k]);
		// 		}
		// 	}
		// }
		foreach($arr as $k=>$v)
		{
			$attrID[]=$v['attr_id'];
		}
		//去重
		$tmp=array_flip($attrID);
		$attrID2=array_flip($tmp);
		$str='';
		foreach($attrID2 as $v)
		{
			$str.=','.$v;
		}
		$str=substr($str,1);

		$res=$this->Attr_model;//类型表
		$res->map="attr_id in($str)";
		$attrName=$res->getFieldOne('attr_id','attr_name','attr_type');
		foreach($attrName as $k=>$v)
		{
			if($v['attr_type'] == 1)
			{
				$Name['norms'][]=$v;
			}
			else
			{
				$Name['argument'][]=$v;
			}
		}
		foreach($Name as $k=>&$v)
		{
			foreach($v as $kk=>&$vv)
			{
				foreach($arr as $key=>$val)
				{
					if($val['attr_id'] == $vv['attr_id'])
					{
						$vv['value'][]=$val;
					}
				}
			}
		}
		// print_r($Name);
		$this->load->vars('haha',$Name);
		//查询sku表
		// $sku=$this->Product_model;
		// $sku->map=array('goods_id'=>$id);
		// $skuData=$sku->getOne();
		// $this->load->vars('sku',$skuData);
		$this->load->view('product');
		// print_r($Name);
		// print_r($Name);
		// $arr=array_combine($attrID,$arr);
		// print_r($arr);
		// print_r($attrID);


		// if(!empty($argument))
		// {
		// 	//拿到attr_id的值
		// 	foreach($argument as $k=>$v)
		// 	{
		// 		$attrID[$k]=$v['attr_id'];
		// 	}
		// 	$tmp=array_flip($attrID);
		// 	$attrID=array_flip($tmp);
		// 	//拿到属性名字
		// 	$str='';
		// 	foreach($attrID as $k=>$v)
		// 	{
		// 		$str.=','.$v;
		// 	}
		// 	$str=substr($str,1);
		// 	$res=$this->Attr_model;
		// 	$res->map="attr_id in($str)";
		// 	$argumentName=$res->getList();
		// 	print_r($argumentName);
		// 	$this->load->vars('argumentName',$argumentName);//发送参数名字
		// }
	


		// $attr->map=array('goods_id'=>$id,'attr_type'=>1);//规格
		// $norms=$attr->getList();
		// $this->load->vars('norms',$norms);//发送规格
		// // print_r($norms);
		// //拿到attr_id的值
		// foreach($norms as $k=>$v)
		// {
		// 	$attrID[$k]=$v['attr_id'];
		// }
		// $tmp=array_flip($attrID);
		// $attrID=array_flip($tmp);


		// //拿到规格名字
		// $str='';
		// foreach($attrID as $k=>$v)
		// {
		// 	$str.=','.$v;
		// }
		// $str=substr($str,1);
		// $res=$this->Attr_model;
		// $res->map="attr_id in($str)";
		// $name=$res->getList();
		// // print_r($name);
		// $this->load->vars('name',$name);//发送规格名字
		
	}

	
	/**
	 * ajax判断有没有该库存
	 */
	public function ajaxDian()
	{
		$goods_id=$this->input->get('goods_id');
		$val=$this->input->get('val');
		$res=$this->Product_model;
		$res->map="goods_id = $goods_id and attr_list = '$val'";
		$one=$res->getOne();
		if($one)
		{
			echo json_encode($one);
		}
		else
		{
			echo 0;
		}
	}


	/**
	 * ajax添加购物车表
	 */
	public function ajaxInsert()
	{
		//判断有没有用户登录
		$name=$this->session->userdata('user_name');
		if(!isset($name))
		{
			echo 0;die;
		}
		$id=$this->session->userdata('user_id');
		$data=$this->input->get();
		$sum=explode('|',$data['sum']);
		//拼接条件查询商品价格
		$product=$this->Product_model;
		$map=array(
			'product_id'=>$sum[0],
			'goods_sn'=>$sum[1],
			);
		$product->map=$map;
		$tmp=$product->getOne();
		$data['goods_price']=$tmp['goods_price'];
		$data['product_id']=$sum[0];
		$data['goods_sn']=$sum[1];
		$data['goods_name']=$sum[2];
		$data['user_id']=$id;
		unset($data['sum']);

		$cat=$this->Cat_model;
		$cat->map=array_merge($map,array('user_id'=>$id));
		$status=$cat->getOne();
		if($status)//查到了代表已加入这个货品数量直接加数量
		{
			$number=array('goods_number'=>$status['goods_number']+$data['goods_number']);
			$info=$cat->updateOne($number);
			if($info)
			{
				$cat->map=array('user_id'=>$id);
				$haha=$cat->getList();
				$price=0;
				$num=0;
				foreach($haha as $k=>$v)
				{
					$goods_id[$k]=$v['goods_id'];
					$price=$price+$v['goods_price']*$v['goods_number'];
					$num=$num+$v['goods_number'];
				}
				// $goods_id=array_unique($goods_id);
				// $num=count($goods_id);//总计多少种
				$sum=count($haha);//总计多少件
				$array['content']=array($sum,$num,$price);
			}
			else
			{
				$array['error']=0;
				$array['content']='添加购物车失败';
			}
		}
		else
		{
			$result=$cat->addOne($data);
			if($result)
			{
				$cat->map=array('user_id'=>$id);
				$haha=$cat->getList();
				$price=0;
				$num=0;
				foreach($haha as $k=>$v)
				{
					$goods_id[$k]=$v['goods_id'];
					$price=$price+$v['goods_price']*$v['goods_number'];
					$num=$num+$v['goods_number'];
				}
				// $goods_id=array_unique($goods_id);
				// $num=count($goods_id);//总计多少种
				$sum=count($haha);//总计多少件
				$array['content']=array($sum,$num,$price);
			}
			else
			{
				$array['error']=0;
				$array['content']='添加购物车失败';
			}
		}
		echo json_encode($array);
	}

	/**
	 * ajax登录
	 */
	public function ajaxLogin()
	{
		$data=$this->input->get();
		$res=$this->User_model;
		$data['user_pwd']=md5($data['user_pwd']);
		$res->map=$data;
		$result=$res->getOne();
		if($result)
		{
			$this->session->set_userdata($result);
			echo 1;
		}
		else
		{
			echo 0;
		}
	}

}
?>