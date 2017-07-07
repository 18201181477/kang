<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Brand extends MY_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Brand_model');
	}

	/**
	 * 展示品牌
	 */
	public function index()
	{
		//加载配置类
		$this->config->load('conf');
		$res=$this->Brand_model;//用品牌model
		$page_num=$this->config->item('page_num');//每页显示的条数
		$num=$this->uri->segment(4)?$this->uri->segment(4):1;//当前页
		$brand_name=$this->input->get('brand_name')?$this->input->get('brand_name'):null;
		//求出偏移量
		$limit=($num-1)*$page_num;
		$res->map="brand_name like '%$brand_name%'";
		$count=$res->getCount();//求数据总条数
		//求总页数
		$sum=ceil($count/$page_num);
		$url=site_url('admin/Brand/index');
		if(IS_AJAX)
		{
			//接受当前页
			$num=$this->input->get('num')?$this->input->get('num'):1;
			//求出偏移量
			$limit=($num-1)*$page_num;
			$arr['num']=$num;
			$arr['centent']=$res->getList($page_num,$limit);
			$arr['sum']=$sum;
			echo json_encode($arr);die;
		}
		else
		{
			$this->load->library('pagination');
			$config['base_url'] = $url;
			$config['total_rows'] = $count;
			$config['per_page'] = $page_num; 
			$config['first_link'] = '第一页';
			$config['last_link'] = '最后一页';
			$config['use_page_numbers']=TRUE;
			$this->pagination->initialize($config); 
			$page=$this->pagination->create_links();
			$this->load->vars('page',$page);//分页
			$data=$res->getList($page_num,$limit);
		}
		//发送总页数
		$this->load->vars('sum',$sum);
		//发送当前页
		$this->load->vars('num',$num);
		$this->load->vars('data',$data);
		$this->load->view('admin/Brand/index');	
	}

	/**
	 * 展示添加品牌
	 */
	public function insert()
	{

		if(IS_POST)
		{
			$data=$this->input->post();
			$file=$this->addFile('brand_logo');
			$data['brand_logo']=$file['file_name'];
			$res=$this->Brand_model;
			$result=$res->addOne($data);
			if($result)
			{
				redirect('admin/Brand/index');
			}
			else
			{
				redirect('admin/Brand/insert');
			}
		}
		else
		{
			$this->load->view('admin/Brand/insert');
		}
	
	}

	/**
	 * ajax即点即改
	 */
	public function ajaxGai()
	{
		//接受
		$data=$this->input->get();
		$res=$this->Brand_model;
		$array=array(
			'is_show'=>$data['is_show']
			);//更新的字段
		$arr=array(
			'brand_id'=>$data['brand_id']
			);//where条件
		$result=$res->alter($array,$arr);
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
	 * ajax图片修改
	 */
	public function ajaxImg()
	{
		//接受ID
		$brand_id=$this->input->post('brand_id');
		$brand_logo=$this->addFile('brand_logo');
		$res=$this->Brand_model;
		$res->map=array('brand_id'=>$brand_id);
		$arr=array('brand_logo'=>$brand_logo['file_name']);
		$result=$res->updateOne($arr);
		if($result)
		{
			echo $brand_logo['file_name'];
		}
		else
		{
			echo 0;
		}
	}
}
?>