<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Qx_model extends MY_Model 
{
	protected $table='qx';
	public function getQxId()
	{
		$controller=$this->uri->segment(1).'/'.$this->uri->segment(2);
		$action=$this->uri->segment(3);
		$this->db->select('qx_id');
		return $this->db->where("qx_controller='$controller' and qx_action='$action'")->get($this->table)->row_array();
	}
}
?>