<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Qx extends MY_Controller 
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Qx_model');
	}
	/**
	 * 展示整体页面
	 */
	public function index()
	{
		$res=$this->Qx_model;
		$data=$res->getList();
		$data=$this->getQx($data);
		$this->load->vars('data',$data);
		// print_r($_SESSION);
		$this->load->view('admin/Qx/index');
	}

	/**
	 * 新增权限
	 */
	public function insert()
	{
		if(IS_POST)
		{
			// echo "<pre>";
			$data=$this->input->post();
			$res=$this->Qx_model;
			$res->addOne($data);
			redirect('admin/Qx/index');
		}
		else
		{
			$res=$this->Qx_model;
			$data=$res->getList();
			$arr=$this->getQx($data,$qx_pid=0);
			$this->load->vars('arr',$arr);
			$this->load->view('admin/Qx/insert');
		}
		
	}

}
?>
