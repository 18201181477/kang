<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Regist extends Home_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('User_model');
	}
	
	/**
	 * 展示注册页面
	 */
	public function index()
	{
		if(IS_POST)
		{
			$data=$this->input->post();
			$data['user_pwd']=md5($data['user_pwd']);
			$res=$this->User_model;
			$result=$res->addOne($data);
			if($result)
			{
				redirect('Index/index');
			}
			else
			{
				redirect('Regist/index');
			}
		}
		else
		{
			$this->load->view('regist');
		}
		
	}

	/**
	 * 登录界面
	 */
	public function login()
	{
		if(IS_POST)
		{
			$data=$this->input->post();
			$data['user_pwd']=md5($data['user_pwd']);
			$res=$this->User_model;
			$res->map=$data;
			$result=$res->getOne();
			if($result)
			{
				$this->session->set_userdata($result);
				redirect('Index/index');
			}
			else
			{
				redirect('Regist/login');
			}
		}
		else
		{
			$this->load->view('login');
		}
		
	}

	
}
?>
