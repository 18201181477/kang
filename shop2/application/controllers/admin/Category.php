<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends MY_Controller 
{
	private $data=array();
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Category_model');
	}

	/**
	 * 分类展示
	 */
	public function index()
	{
		$res=$this->Category_model;
		$data=$res->getList();
		$arr=$this->getData($data);
		//发送
		$this->load->vars('data',$arr);
		$this->load->view('admin/Category/index');
	}

	/**
	 * 新增分类
	 */
	public function insert()
	{
		if(IS_POST)
		{
			$data=$this->input->post();
			$res=$this->Category_model;//选择model
			$result=$res->addOne($data);
			if($result)
			{
				redirect('admin/Category/index');
			}
			else
			{
				redirct('admin/Category/insert');
			}
		}
		else
		{
			$res=$this->Category_model;
			$data=$res->getList();
			$arr=$this->getData($data);
			//发送arr
			$this->load->vars('data',$arr);

			$this->load->view('admin/Category/insert');
		}
		
	}

	/**
	 * ajax即点即改分类名字
	 */
	public function ajaxName()
	{
		$data=$this->input->get();
		$res=$this->Category_model;
		$res->map=array('cat_id'=>$data['cat_id']);
		$arr=array('cat_name'=>$data['cat_name']);
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
	 * ajax删除
	 */
	public function ajaxDel()
	{
		$data=$this->input->get();
		$res=$this->Category_model;
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