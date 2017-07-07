<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller 
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('Qx_model');//加载一下权限
		$this->load->model('AdminRole_model');
		$this->load->model('Role_model');
		$this->load->model('RoleQx_model');
		$this->load->model('Admin_model');
		define('AID',$this->session->userdata('admin_id'));
		if(!AID)
		{
			redirect('admin/Login/index');
		}

		$data=$this->checkQx();
		if(AID==1)
		{
			$this->menu();
		}
		else
		{
			$controller=$this->router->class;
			
				$result=$this->checkQx();
				// var_dump($result);
				if($result === false)
				{
					// echo 555;
					redirect('admin/Index/main');
				}
				else
				{
					$data=$this->sortData($result);
					$this->load->vars('menu',$data);
				}
				// //验证权限
				// if($this->checkQx() === false)
				// {
				// 	redirect('admin/Index/show');
				// }
				// else
				// {
				// 	$data=$this->sortData($this->checkQx());
				// 	$this->load->vars('menu',$data);
				// }
			
		}	
	}

	/**
	 * 文件上传
	 */
	public function addFile($filename)
	{
		$config['upload_path'] = './Uploads/admin';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size'] = '0';
		$config['max_width'] = '0';
		$config['max_height'] = '0';
		$config['encrypt_name']=TRUE;
		$this->load->library('upload', $config);
		$this->upload->initialize($config);
		$result=$this->upload->do_upload($filename);
		if($result)
		{
			return $this->upload->data();
		}
		else
		{
			return $this->upload->display_errors();
		}
	}


	/**
	 * 递归处理数组
	 */
	public function getData($data,$pid=0,$level='')
	{
		static $arr=array();
		foreach($data as $k=>$v)
		{
			if($v['parent_id'] == $pid)
			{
				$v['level']=$level;
				$arr[]=$v;
				$this->getData($data,$v['cat_id'],$level.'---');
			}
		}
		return $arr;
	}

	public function getQx($data,$qx_pid=0,$level=0)
	{
		static $arr=array();
		foreach($data as $k=>$v)
		{
			if($v['qx_pid'] == $qx_pid)
			{
				$v['level']=$level;
				$arr[]=$v;
				$this->getQx($data,$v['qx_id'],$level+1);
			}
		}
		return $arr;
	}
	
	/**
	 * 递归处理数组
	 */
	private function sortData($data,$qx_pid=0)
	{
		$arr=array();
		// print_r($data);
		foreach($data as $k=>$v)
		{
			if($v['qx_pid'] == $qx_pid)
			{
				$v['child']=$this->sortData($data,$v['qx_id']);
				$arr[]=$v;
			}
		}
		return $arr;
	}
	//处理左侧导航
	private function menu()
	{
		$res=$this->Qx_model;
		$menu=$res->getList();
		$menu=$this->sortData($menu);
		$this->load->vars('menu',$menu);
	}

	/**
	 * 验证权限
	 */
	private function checkQx()
	{
		//查询用户角色
		$ar=$this->AdminRole_model;//实例化用户角色关系表
		$ar->map=array('aid'=>AID);
		$roleID=$ar->getFieldOne('rid');//角色id
		if(empty($roleID))
		{
			return false;
		}
		$str='';
		foreach($roleID as $v)
		{
			$str.=','.$v['rid'];
		}
		$str=substr($str,1);
		//查询角色权限关系表
		$rq=$this->RoleQx_model;
		$rq->map="role_id in($str)";
		$qxID=$rq->getFieldOne('qx_id');
		if(empty($qxID))
		{
			return false;
		}
		foreach($qxID as $k=>$v)
		{
			$tmp[$k]=$v['qx_id'];
		}
		//去重
		$centent=array_flip($tmp);
		$tmp=array_flip($centent);
		$str='';
		foreach($tmp as $v)
		{
			$str.=','.$v;
		}
		$str=substr($str,1);
		//使用权限
		$qx=$this->Qx_model;
		$qx->map="qx_id in($str)";
		$data=$qx->getList();

		// return $data;
		// print_r($data);

		$controller=$this->uri->segment(1).'/'.$this->router->class;
		$action=$this->router->method;
		foreach($data as $v)
		{
			if($v['qx_controller'] == $controller && $v['qx_action'] == $action)
			{
				return $data;
			}
		}
		return false;

	}
	
}

class Home_Controller extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Category_model');
		$this->cate();
	}
	protected function cate()
	{
		$res=$this->Category_model;
		$data=$res->getList();
		$data=$this->sortData($data);
		$this->load->vars('menu',$data);
	}
	
	/**
	 * 递归处理数组
	 */
	public function sortData($data,$pid=0)
	{
		$arr=array();
		// print_r($data);
		foreach($data as $k=>$v)
		{
			if($v['parent_id'] == $pid)
			{
				$v['child']=$this->sortData($data,$v['cat_id']);
				$arr[]=$v;
			}
		}
		return $arr;
	}

}
?>