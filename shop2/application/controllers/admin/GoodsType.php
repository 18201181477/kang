<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class GoodsType extends MY_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('GoodsType_model');
	}

	/**
	* 展示商品类型
	*/
	public function index()
	{
		$res=$this->GoodsType_model;
		$data=$res->getList();
		$this->load->vars('data',$data);
		$this->load->view('admin/GoodsType/index');
	}

	/**
	 * 添加类型
	 */
	public function insert()
	{
		if(IS_POST)
		{
			$data=$this->input->post();
			$res=$this->GoodsType_model;
			$result=$res->addOne($data);
			if($result)
			{
				redirect('admin/GoodsType/index');
			}
			else
			{
				redirect('admin/GoodsType/insert');
			}
		}
		else
		{
			$this->load->view('admin/GoodsType/insert');
		}
	}

	/**
	 * 类型修改
	 */
	public function update($id)
	{
		$res=$this->GoodsType_model;
		if(IS_POST)
		{
			$data=$this->input->post();
			$res->map=array('type_id'=>$id);
			$result=$res->updateMore($data);
			redirect('admin/GoodsType/index');
		}
		else
		{
			$res->map=array('type_id'=>$id);
			$data=$res->getOne();
			$this->load->vars('data',$data);
			$this->load->view('admin/GoodsType/update');
		}
	}
}
?>