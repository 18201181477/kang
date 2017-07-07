<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Buycar extends Home_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Cat_model');
		$this->load->model('GoodsAttr_model');
		$this->load->model('UserAddress_model');
		$this->load->model('Region_model');
		$this->load->model('OrderInfo_model');
		$this->load->model('OrderGoods_model');
		$this->load->model('Product_model');
		$this->config->load('conf');
	}
	
	/**
	 * 展示整体页面
	 */
	public function index()
	{
		$id=$this->session->userdata('user_id');
		if(empty($id))
		{
			redirect('Regist/login');//判断是否登录
		}
		$res=$this->Cat_model;
		$sql="select * from ci_goods g INNER JOIN ci_cat c on c.goods_id=g.goods_id INNER JOIN ci_product cp  on cp.attr_list=c.goods_attr_id  where c.user_id=$id";
		$data=$res->sql($sql);
		if(!empty($data))
		{
			foreach($data as $k=>$v)
			{
				$goods_id[$k]=$v['goods_id'];
				$norms[$v['cat_id']]=$v['goods_attr_id'];
			}
			//得到属性
			$goods_id=array_unique($goods_id);
			//查商品属性表中的属性
			$ga=$this->GoodsAttr_model;
			$num=0;
			foreach($norms as $key=>$val)
			{
				$goods_id=$data[$num]['goods_id'];
				$sql="select ga.attr_value,ga.goods_attr_id,a.attr_name from ci_goods_attr ga INNER JOIN ci_attribute a on ga.attr_id=a.attr_id where ga.goods_id=$goods_id and ga.attr_type=0 or ga.goods_attr_id in($val)";
				$attr[$key]=$ga->sql($sql);
				$num++;
			}
			foreach($data as $k=>$v)
			{
				foreach($attr as $key=>$val)
				{
					if($v['cat_id'] == $key)
					{
						$data[$k]['norms']=$val;
					}
				}
			}
		}
		
		$this->load->vars('data',$data);
		// print_r($data);die;
		$arr['car']=$data;
		$this->session->set_userdata($arr);
		$this->load->view('Buycar');
	}

	/**
	 * 订单2界面
	 */
	public function index2()
	{
		//拿到session数组
		$data=$this->session->userdata('car');
		// print_r($data);die;
		$id=$this->session->userdata('user_id');//拿到用户id
		// echo "<pre>";
		// print_r($data);die;
		if(empty($data))//判断有没有购物车session值,没有回去存一下
		{
			redirect('Buycar/index');
		}
		$address=$this->session->userdata('address');
		if(empty($address))//先判断有没有默认地址
		{
			//在查找数据库中有没有地址
			$site=$this->UserAddress_model;
			$site->map=array('user_id'=>$id);
			$siteData=$site->getOne();
			if(!$siteData)
			{
				$url=site_url('Address/index');
				echo "<script>alert('请先添加收货地址');location.href='".$url."'</script>";
			}
			$this->session->set_userdata('address',$siteData);//把地址存进session中
		}
		//从session值拿到地址
		$arr=$this->session->userdata('address');
		$res=$this->Region_model;

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

		$this->load->vars('data',$data);
		$this->load->view('Buycar_two');
	}

	/**
	 * 订单3界面
	 */
	public function index3()
	{
		$id=$this->session->userdata('user_id');
		//从session值拿到地址
		$address=$this->session->userdata('address');
		//从session值拿到购物车的的值
		$car=$this->session->userdata('car');
		// print_r($_SESSION);
		// print_r($car);die;
		$arr['order_sn']=date('YmdHis').rand(1,99999999);
		$arr['user_id']=$id;
		$arr['order_status']=1;
		$arr['shipping_status']=0;
		$arr['pay_status']=0;
		//得到商品的总金额
		$goods=$this->session->userdata('car');
		// print_r($goods);die;
		$goods_amount=0;
		foreach($goods as $v)
		{
			$goods_amount+=$v['goods_price']*$v['goods_number'];
		}
		$arr['goods_amount']=$goods_amount;
		$arr['shipping_fee']=10;
		$arr['shipping_status']=0;
		// $arr['money_paid']=0;
		$arr['order_amount']=$goods_amount+10;
		$arr['add_time']=date('Y-m-d H:i:s');
		$arr['consignee']=$address['consignee'];
		$arr['country']=$address['country'];
		$arr['province']=$address['province'];
		$arr['city']=$address['city'];
		$arr['district']=$address['district'];
		$arr['address']=$address['address'];
		$arr['zipcode']=$address['zipcode'];
		$arr['mobile']=$address['mobile'];
		$res=$this->OrderInfo_model;
		$info=$res->returnID($arr);
		if($info)//订单表成功
		{
			$od=$this->OrderGoods_model;
			//入库订单商品表
			foreach($car as $k=>$v)
			{
				$data['order_id']=$info;
				$data['goods_id']=$v['goods_id'];
				$data['goods_name']=$v['goods_name'];
				$data['goods_sn']=$v['goods_sn'];
				$data['product_id']=$v['product_id'];
				$data['buy_number']=$v['goods_number'];
				$data['market_price']=$v['market_price'];
				$data['goods_price']=$v['goods_price'];
				$str='';
				$attr_id='';
				foreach($v['norms'] as $key=>$val)
				{
					$str.=$val['attr_name'].':'.$val['attr_value'].'|';
					$attr_id.=','.$val['goods_attr_id'];
				}
				$attr_id=trim($attr_id,',');
				$data['goods_attr']=$str;
				$data['goods_attr_id']=$attr_id;
				$result=$od->addOne($data);
				if(!$result)
				{
					$url=site_url('Address/index2');
					echo "<script>alert('订单异常');location.href='".$url."'</script>";
				}

				//清空购物车表&&修改库存值
				//修改库存值
				$pr=$this->Product_model;
				$nowSKU=$v['SKU']-$v['goods_number'];
				if($nowSKU<0)
				{
					$url=site_url('Address/index2');
					echo "<script>alert('库存不足,sorry');location.href='".$url."'</script>";
				}
				$array=array('SKU'=>$nowSKU);
				$pr->map=array('goods_id'=>$v['goods_id'],'attr_list'=>$v['attr_list']);
				$isNot=$pr->updateOne($array);
				if(!$isNot)
				{
					$url=site_url('Address/index2');
					echo "<script>alert('订单有误');location.href='".$url."'</script>";
				}
			}//foreach
			
			
			$this->session->set_userdata('order',$arr);
			$this->pay();//调用支付方法

		}//if
		else
		{
			redirect('Buycar/index2');
		}
	}


	/**
	 * ajax修改库存
	 */
	public function ajaxNumber()
	{
		$data=$this->input->get();
		$res=$this->Cat_model;
		$res->map=array('cat_id'=>$data['cat_id']);
		$arr=array('goods_number'=>$data['goods_number']);
		$result=$res->updateOne($arr);
		if($result)
		{
			//更新session值
			$arr=$this->session->userdata('car');
			foreach($arr as &$v)
			{
				if($v['cat_id'] == $data['cat_id'])
				{
					$v['goods_number']=$data['goods_number'];
				}
			}
			$data['car']=$arr;
			$this->session->set_userdata($data);
			echo 1;
		}
		else
		{
			echo 0;
		}

	}


	/**
	 * 支付宝支付
	 */
	private function pay()
	{
		$order=$this->session->userdata('order');
		$car=$this->session->userdata('car');
		//合作身份者id，以2088开头的16位纯数字
		$alipay_config['partner']		= $this->config->item('partner');
		//收款支付宝账号
		$alipay_config['seller_email']	= $this->config->item('seller_email');
		//安全检验码，以数字和字母组成的32位字符
		$alipay_config['key']			= $this->config->item('key');
		//↑↑↑↑↑↑↑↑↑↑请在这里配置您的基本信息↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑
		//签名方式 不需修改
		$alipay_config['sign_type']    = strtoupper('MD5');
		//字符编码格式 目前支持 gbk 或 utf-8
		//$alipay_config['input_charset']= strtolower('utf-8');
		//ca证书路径地址，用于curl中ssl校验
		//请保证cacert.pem文件在当前文件夹目录中
		$alipay_config['cacert']    = getcwd().'\\cacert.pem';
		//访问模式,根据自己的服务器是否支持ssl访问，若支持请选择https；若不支持请选择http
		$alipay_config['transport']    = 'http';
		// ******************************************************配置 end*************************************************************************************************************************

		// ******************************************************请求参数拼接 start*************************************************************************************************************************
		$parameter = array(
		    "service" => "create_direct_pay_by_user",
		    "partner" => $alipay_config['partner'], // 合作身份者id
		    "seller_email" => $alipay_config['seller_email'], // 收款支付宝账号
		    "payment_type"	=> '1', // 支付类型
		    "notify_url"	=> "http://bw.com133.com/notify_url.php", // 服务器异步通知页面路径
		    "return_url"	=> site_url('Buycar/pay_do'), // 页面跳转同步通知页面路径
		    "out_trade_no"	=> $order['order_sn'], // 商户网站订单系统中唯一订单号
		    "subject"	=> '亢清阳', // 订单名称
		    "total_fee"	=> "0.01", // 付款金额
		    "body"	=> "", // 订单描述 可选
		    "show_url"	=> "", // 商品展示地址 可选
		    "anti_phishing_key"	=> "", // 防钓鱼时间戳  若要使用请调用类文件submit中的query_timestamp函数
		    "exter_invoke_ip"	=> "", // 客户端的IP地址
		    "_input_charset"	=> 'utf-8', // 字符编码格式
		);
		// 去除值为空的参数
		foreach ($parameter as $k => $v) {
		    if (empty($v)) {
		        unset($parameter[$k]);
		    }
		}
		// 参数排序
		ksort($parameter);
		reset($parameter);
		// 拼接获得sign
		$str = "";
		foreach ($parameter as $k => $v) {
		    if (empty($str)) {
		        $str .= $k . "=" . $v;
		    } else {
		        $str .= "&" . $k . "=" . $v;
		    }
		}
		$parameter['sign'] = md5($str . $alipay_config['key']);
		$parameter['sign_type'] = $alipay_config['sign_type'];
		$sHtml = "<form id='alipaysubmit' name='alipaysubmit' action='https://mapi.alipay.com/gateway.do?_input_charset=utf-8' method='get'>";
		foreach ($parameter as $k => $v) {
		    $sHtml.= "<input type='hidden' name='" . $k . "' value='" . $v . "'/>";
		}

		$sHtml = $sHtml."<script>document.forms['alipaysubmit'].submit();</script>";

		// ******************************************************模拟请求 end*************************************************************************************************************************
		

		echo $sHtml;
	}
	public function pay_do()
	{
		$order=$this->session->userdata('order');
		$data=$_GET;
		$sign=$data['sign'];
		$sign_type=$data['sign_type'];
		unset($data['sign']);
		unset($data['sign_type']);
		// 参数排序
		ksort($data);
		reset($data);
		// 拼接获得sign
		$str = "";
		foreach ($data as $k => $v) {
		    if (empty($str)) {
		        $str .= $k . "=" . $v;
		    } else {
		        $str .= "&" . $k . "=" . $v;
		    }
		}
		
		$sign2 = $sign_type($str.$this->config->item('key'));
		if($sign == $sign2)
		{
			$res=$this->OrderInfo_model;
			$res->map=array('order_sn'=>$order['order_sn']);
			$array=array('pay_status'=>1);
			$res->updateOne($array);//修改支付状态
			//删除购物车信息
			$db=$this->Cat_model;
			$db->map=array('user_id'=>$this->session->userdata('user_id'));
			$db->delData();
			$this->session->unset_userdata('car');
			$this->load->view('Buycar_three');
		}
		else
		{
			echo "<script>alert('订单被修改');</script>";
			$this->load->view('Buycar_three');
		}	
	}
		
}
?>