<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Admin_model');
	}
	/**
	 * 展示登录页面
	 */
	public function index()
	{
		if(IS_POST)
		{
			
			//接收值
			$data=$this->input->post();
			// $this->check_verify($data['code']);
			if(!$this->check_verify($data['code']))
			{
				$url=site_url('admin/Login/index');
				echo "<script>alert('验证码错误');location.href='".$url."'</script>";
				// redirect('admin/Login/index');
			}
			else
			{

				//验证账号和密码是否正确
				$res=$this->Admin_model;
				$pwd=md5($data['password']);
				// echo $data['user_name'];
				$res->map=array(
					'admin_name'=>$data['admin_name'],
					'password'=>$pwd
					);
				$data=$res->getOne();
				if($data)
				{
					//存session
					$this->session->set_userdata($data);
					//登录成功
					redirect('admin/Index/show');
				}
				else
				{
					$url=site_url('admin/Login/index');
					echo "<script>alert('登录错误');location.href='".$url."'</script>";
					// redirect('admin/Login/index');
				}
			}
		}
		else
		{

			$this->load->view('admin/Login/login');
		}
		
	}


	/**
	 * 验证码(TP)
	 */
	public function verify()
	{
		//加载辅助
		$this->load->helper('verify');
		$config =    array(    
			'fontSize'    =>    30,    // 验证码字体大小    
			'length'      =>    3,     // 验证码位数    
			'useNoise'    =>    true, // 关闭验证码杂点
		);
		$code=new Verify($config);
		$code->entry();
	}

	/**
	 * 验证验证码
	 */
	private function check_verify($code, $id = '')
	{   
		$this->load->helper('verify');
		$verify = new Verify();    
		return $verify->check($code, $id);
	}

	/**
	 * 退出功能
	 */
	public function quit()
	{
		$this->session->unset_userdata('admin_id');
		// $url="site_url('admin/Login/index')";
		// echo "<script>location.href='".$url."'</script>";
		// echo 5;die;
		redirect('admin/Login/index');
	}

	
}
?>
