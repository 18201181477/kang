<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Address extends Home_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Region_model');
		$this->load->model('UserAddress_model');
	}
	
	/**
	 * 展示整体页面
	 */
	public function index()
	{
		//展示顶级分类
		$res=$this->Region_model;
		$res->map=array('parent_id'=>0);
		$data=$res->getList();
		$this->load->vars('data',$data);

		//查找地址
		$id=$this->session->userdata('user_id');
		if(empty($id))
		{
			$url=site_url('Regist/login');
			echo "<script>alert('请先登录');location.href='".$url."'</script>";
		}
		$address=$this->UserAddress_model;
		$arr=$address->getOne();
		// die;
		$res->map=array('region_id'=>$arr['country']);
		$a=$res->getOne();
		$res->map=array('region_id'=>$arr['province']);
		$b=$res->getOne();
		$res->map=array('region_id'=>$arr['city']);
		$c=$res->getOne();
		$res->map=array('region_id'=>$arr['district']);
		$d=$res->getOne();
		$str=$a['region_name'].$b['region_name'].$c['region_name'].$d['region_name'];
		$arr['str']=$str;
		$this->load->vars('arr',$arr);
		$this->load->view('memberAddress');
	}

	/**
	 * 地区联动
	 */
	public function ajax()
	{
		$data=$this->input->get();
		$res=$this->Region_model;
		$res->map=$data;
		$data=$res->getList();
		echo json_encode($data);
	}

	/**
	 * ajax添加地址
	 */
	public function ajaxAdd()
	{
		$data=$this->input->get();
		$data['user_id']=$this->session->userdata('user_id');
		$res=$this->UserAddress_model;
		$result=$res->addOne($data);
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
