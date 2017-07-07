<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Model extends CI_Model 
{
	public $map=array();
	protected $table='';
	function __construct()
	{
		parent::__construct();
	}

	//查询全部数据
	public function getList($num=null,$limit=null,$like=null)
	{
		if($num != null)
		{
			$this->db->limit($num,$limit);
		}
		if($like != null)
		{
			$this->db->like($like);
		}
		return $this->db->where($this->map)->get($this->table)->result_array();
	}
	// 得到一条数据
	public function getOne()
	{
		return $this->db->where($this->map)->get($this->table)->row_array();
	}
	//添加一条数据
	public function addOne($data)
	{
		return $this->db->insert($this->table,$data); 
	}
	//添加一条数据并返回id值
    public function returnID($data)
    {
    	$this->db->insert($this->table,$data);
    	return $this->db->insert_id();
    }
    //添加多条数据
    public function addMore($data)
    {
    	return $this->db->insert_batch($this->table,$data);
    }
	//得到总数据数
	public function getCount()
	{
		return $this->db->where($this->map)->count_all_results($this->table);
	}
	//修改字段(单条)
	public function alter($array,$arr)
	{
		$this->db->set($array);
		$this->db->where($arr);
		return $this->db->update($this->table);
	}
	//修改字段(单条)
	public function updateOne($arr)
	{
		$this->db->set($arr);
		return $this->db->where($this->map)->update($this->table);
	}
	//修改数据(多个数据)
	public function updateMore($data)
	{
		return $this->db->where($this->map)->update($this->table,$data);
	}
	//删除数据
	public function delData()
	{
		return $this->db->where($this->map)->delete($this->table);
	}

	/**
	 * 过滤字段
	 */
    public  function getcloumn($data){
        //得到数据表中的全部字段
        $arr=$this->db->list_fields($this->table);
        foreach($data as $k=>$v){
            if(!in_array($k,$arr)){
                //
                unset($data[$k]);
            }
        }
        //
        return $data;
    }

    //得到某条数据
    public function getFieldOne($cloumn,$cloumn2=null,$cloumn3=null)
    {
    	$this->db->select($cloumn);
    	if($cloumn2!=null)
    	{
    		$this->db->select($cloumn2);
    	}
    	if($cloumn3!=null)
    	{
    		$this->db->select($cloumn3);
    	}
    	return $this->db->where($this->map)->get($this->table)->result_array();
    }

   	//查询数据or条件的
   	public function orData()
   	{
   		return $this->db->or_where($this->map)->get($this->table)->result_array();
   	}

   	//给sql查
   	public function sql($sql)
   	{
   		return $this->db->query($sql)->result_array();
   	}
	
}
?>