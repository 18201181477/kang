<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Index extends Home_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Category_model');
		$this->load->model('Goods_model');
	}
	
	/**
	 * 展示整体页面
	 */
	public function index()
	{
		$goods=$this->Goods_model;//商品
		$goods->map=array(
			'is_on_sale'=>1,
			'is_hot'=>1
			);
		$hot=$goods->getList();
		$this->load->vars('hot',$hot);
		$this->load->view('index');
	}


	/**
	 * ajax延迟查询
	 */
	public function ajaxSearch()
	{
		$cat_id=$data=$this->input->get('cat_id');
		//获取所有分类
		$res=$this->Category_model;
		$data=$res->getList();
		$arr=$this->getSon($data,$cat_id);
		$str='';
		foreach($arr as $v)
		{
			$str.=','.$v;
		}
		$str=substr($str,1);
		$goods=$this->Goods_model;
		$goods->map="cat_id in($str)";
		$goodsData=$goods->getList();
		echo json_encode($goodsData);
	}
	
	/**
	 * 返回当前分类下的所有子集分类
	 */
	private function getSon($data,$pid=0)
	{
		$arr=array();
		foreach($data as $v)
		{
			if($v['parent_id'] == $pid)
			{
				$arr[]=$v['cat_id'];
				$arr=array_merge($arr,$this->getSon($data,$v['cat_id']));
			}
		}
		
		return $arr;
	}

	
}
?>
