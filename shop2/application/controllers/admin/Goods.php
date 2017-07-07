<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Goods extends MY_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Category_model');
		$this->load->model('Brand_model');
		$this->load->model('GoodsType_model');
		$this->load->model('Attr_model');
		$this->load->model('Goods_model');
		$this->load->model('GoodsAttr_model');
		$this->load->model('Product_model');
		$this->load->model('GoodsGallery_model');
		$this->load->library('image_lib');
	}

	/**
	 * 展示页面
	 */
	public function index()
	{
		//查询当前表
		$res=$this->Goods_model;
		$data=$res->getList();
		$this->load->vars('data',$data);
		// print_r($data);
		$this->load->view('admin/Goods/index');
	}

	/**
	 * 展示商品增加页面
	 */
	public function insert()
	{
		if(IS_POST)
		{
			echo "<pre>";
			$data=$this->input->post();
			foreach($_FILES['goods_photo']['name'] as $k=>$v)
			{
				$goods_photo[$k]['name']=$v;
				$goods_photo[$k]['type']=$_FILES['goods_photo']['type'][$k];
				$goods_photo[$k]['tmp_name']=$_FILES['goods_photo']['tmp_name'][$k];
				$goods_photo[$k]['error']=$_FILES['goods_photo']['error'][$k];
				$goods_photo[$k]['size']=$_FILES['goods_photo']['size'][$k];
				// $_FILES['goods_photo'.$k]=$goods_photo;
			}
			// print_r($goods_photo);die;

			// $url=base_url('Uploads/admin').'/'.'0fe108146dd820c66fd7ae76ca6a4e4b.png';
			// $new_url=base_url('Uploads/admin/thumb');
			// //缩略图
			// $config['image_library'] = 'gd2';
			// $config['source_image'] = "$url";
			// $config['create_thumb'] = TRUE;
			// $config['maintain_ratio'] = TRUE;
			// $config['dynamic_output']=TRUE;
			// $config['width'] = 30;
			// $config['height'] = 20;
			// $config['new_image']="$new_url";
			// $config['thumb_marker']='_thumb';
			// $this->load->library('image_lib',$config); 
			// if(!$this->image_lib->resize())
			// {
			// 	echo $this->image_lib->display_errors();
			// }
			// else
			// {
			// 	echo $new_url;
			// }
			
			//使用goodsModel表
			$goods=$this->Goods_model;
			$goods_img=$this->addFile('goods_img');
			if(!is_array($goods_img))
			{
				echo $goods_img;die;
			}
			//调用文件上传
			$data['goods_img']=$goods_img['file_name'];
			// 添加商品表
			$addGoods=$goods->getcloumn($data);//先过滤字段
			$goods_id=$goods->returnID($addGoods);
			if($goods_photo[0]['error']!=4)
			{
				foreach($goods_photo as $k=>$v)//多文件上传
				{
					if(!is_array($v))
					{
						echo 'You did not select a file to upload.';die;
					}
					$_FILES[$k]=$v;
					$img[$k]['original_img']=$this->addFile($k)['file_name'];
					$img[$k]['img_desc']=$data['img_desc'][$k];
					$img[$k]['goods_id']=$goods_id;
				}
				$res=$this->GoodsGallery_model;
				$res->addMore($img);
			}
			

			//添加属性表(参数)
			$goodsAttr=$this->GoodsAttr_model;
			if(isset($data['attr_argument']))//存在
			{
				foreach($data['attr_argument'] as $k=>$v)
				{
					$addAttr[$k]['attr_id']=$data['attr_argument_id'][$k];
					$addAttr[$k]['attr_value']=$v;
					$addAttr[$k]['attr_type']=0;
					$addAttr[$k]['goods_id']=$goods_id;//改一下
				}
				// print_r($addAttr);die;
				$goodsAttr->addMore($addAttr);//入库参数
			}

			//添加属性表(规格)
			if(isset($data['attr_value']))//检测是否存在
			{
				foreach($data['attr_value'] as $k=>$v)
				{
					$str='';
					foreach($v as $kk=>$vv)
					{
						$adAttr[$k][$kk]['attr_id']=$data['attr_id'][$k][$kk];
						$adAttr[$k][$kk]['attr_value']=$vv;
						$adAttr[$k][$kk]['attr_type']=1;
						$adAttr[$k][$kk]['goods_id']=$goods_id;//一会该
					}
				}
				// print_r($adAttr);
				$array=array();
				foreach ($adAttr as $key => $val) 
				{
					foreach ($val as $kkk => $vvv) 
					{
						$array[$kkk][]=$val[$kkk];
					}
				}
				foreach($array as $k=>$v)
				{
					$str='';
					foreach($v as $kk=>$vv)
					{
						$str.=','.$goodsAttr->returnID($vv);//入库规格
					}
					$str=substr($str,1);
				// 	//入库product表
					$product['SKU']=$data['SKU'][$k];
					$product['goods_sn']=$data['goods_sn'][$k];
					$product['attr_list']=$str;
					$product['goods_price']=$data['goods_price'][$k];
					$product['goods_id']=$goods_id;//一会改
					$sku=$this->Product_model;
					$sku->addOne($product);
				}
			}

			redirect('admin/Goods/index');
		}
		else
		{
			//得到分类数据
			$cate=$this->Category_model;
			$cateData=$cate->getList();
			$cateData=$this->getData($cateData);
			$this->load->vars('cate',$cateData);//发送分类

			//得到类型数据
			$type=$this->GoodsType_model;
			$typeData=$type->getList();
			$this->load->vars('type',$typeData);//发送类型

			//得到品牌数据
			$brand=$this->Brand_model;
			$brandData=$brand->getList();
			$this->load->vars('brand',$brandData);//发送品牌

			$this->load->view('admin/Goods/insert');
		}
		
	}


	/**
	 * ajax点类型查找属性值
	 */
	public function attr()
	{
		$data=$this->input->get();
		$res=$this->Attr_model;//使用attr_model层
		$res->map=$data;
		$data=$res->getList();
		$arr=array();
		foreach($data as $v)
		{
			if($v['attr_type'] == 1)
			{
				$arr['norms'][]=$v;
			}
			if($v['attr_type'] == 0)
			{
				$arr['argument'][]=$v;
			}
		}
		echo json_encode($arr);

	}


	/**
	 * ajax即点即改商品名字
	 */
	public function ajaxName()
	{
		$data=$this->input->get();
		$res=$this->Goods_model;
		$res->map=array('goods_id'=>$data['goods_id']);
		$arr=array('goods_name'=>$data['goods_name']);
		$result=$res->updateOne($arr);
		if($result)
		{
			echo 1;
		}
		else
		{
			echo 0;
		}
	}


	/**
	 * ajax即点即改
	 */
	public function ajaxGai()
	{
		//接受
		$data=$this->input->get();
		$res=$this->Goods_model;
		$res->map=array('goods_id'=>$data['goods_id']);
		if($data['status'] == 0)
		{
			$arr=array('is_on_sale'=>$data['is_show']);
		}
		if($data['status'] == 1)
		{
			$arr=array('is_best'=>$data['is_show']);
		}
		if($data['status'] == 2)
		{
			$arr=array('is_new'=>$data['is_show']);
		}
		if($data['status'] == 3)
		{
			$arr=array('is_hot'=>$data['is_show']);
		}
		$result=$res->updateOne($arr);
	
		if($result)
		{
			echo 1;
		}
		else
		{
			echo 0;
		}
	}


}
?>