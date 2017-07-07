<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Attr extends MY_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Attr_model');
	}

	/**
	 * 展示属性页面
	 * @return [type] [description]
	 */
	public function index()
	{
		//接收type_id的值
		$type_id=$this->uri->segment(4)?$this->uri->segment(4):1;
		// echo $type_id;die;
		//查询数据
		$res=$this->Attr_model;
		$res->map=array('type_id'=>$type_id);
		$data=$res->getList();

		//查询全部的商品类型
		$this->load->model('GoodsType_model');
		$type=$this->GoodsType_model;
		$arr=$type->getList();
		$this->load->vars('arr',$arr);//发送类型
		
		$this->load->vars('data',$data);
		$this->load->view('admin/Attr/index');
	}


	/**
	 * 添加属性页面
	 */
	public function insert()
	{
		if(IS_POST)
		{
			$data=$this->input->post();
			$res=$this->Attr_model;
			$result=$res->addOne($data);
			$type_id=$data['type_id'];
			if($result)
			{
				redirect("admin/Attr/index/$type_id");
			}
			else
			{
				redirect('admin/Attr/insert');
			}
		}
		else
		{
			$type_id=$this->uri->segment(4);
			//查询全部的商品类型
			$this->load->model('GoodsType_model');
			$type=$this->GoodsType_model;
			$arr=$type->getList();

			//发送
			$this->load->vars('arr',$arr);
			$this->load->vars('arr',$arr);//发送类型
			$this->load->view('admin/Attr/insert');	
		}
	}


	/**
	 * ajax查询
	 */
	public function ajaxSearch()
	{
		$data=$this->input->get();
		//查询数据
		$res=$this->Attr_model;
		$res->map=$data;
		$arr=$res->getList();
		echo json_encode($arr);
	}

	/**
	 * ajax删除
	 */
	public function ajaxDel()
	{
		$data=$this->input->get();
		$res=$this->Attr_model;
		$res->map=$data;
		$result=$res->delData();
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