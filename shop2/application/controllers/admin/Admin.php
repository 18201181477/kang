<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends MY_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Admin_model');
	}
	public function index()
	{
		//查询数据
		$res=$this->Admin_model;
		$data=$res->getList();
		$this->load->vars('data',$data);
		$this->load->view('admin/Admin/index');
	}
}
?>