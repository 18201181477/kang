<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Role extends MY_Controller 
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Role_model');
	}
	/**
	 * 展示整体页面
	 */
	public function index()
	{
		$res=$this->Role_model;
		$data=$res->getList();
		$this->load->vars('data',$data);
		// print_r($_SESSION);
		$this->load->view('admin/Role/index');
	}

}
?>
