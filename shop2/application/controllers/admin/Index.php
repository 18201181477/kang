<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Index extends MY_Controller 
{

	
	/**
	 * 展示整体页面
	 */
	public function show()
	{
		
		// print_r($_SESSION);
		$this->load->view('admin/Index/index');
	}

	/**
	 * 引用头部
	 */
	public function head()
	{
		$this->load->view('admin/inc/head');
	}

	/**
	 * 展示左部
	 */
	public function left()
	{
		$this->load->view('admin/inc/left');
	}

	/**
	 * 展示main
	 */
	public function main()
	{
		$this->load->view('admin/Index/main');
	}
}
?>
