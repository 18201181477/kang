<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cat_model extends MY_Model 
{
	public function __construct()
	{
		parent::__construct();
		$this->table='cat';
	}
	public function getPrice($cloumn)
	{
		$this->db->select_sum($cloumn);
		return $this->db->where($this->map)->get($this->table)->row_array();
	}
	
}
?>