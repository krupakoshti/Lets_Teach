<?php
defined('BASEPATH') or exit('Error');

class Category_m extends CI_Model
{

	function __construct()
	{
		parent::__construct();
	}

	function toggle_status_m($cid)
	{
		$this->db->set('CategoryStatus','1-CategoryStatus',false)
		->where($cid)
		->update('tblcategory');
	}

	function get_data_m()
	{
		$data=$this->db
		->select('*')
		->from('tblcategory c')
		->join('tblAdmin a','c.CatAddByAdminId=a.AdminId')
		->get()
		->result();

		return $data;
	}

	function add_data_m($cd)
	{
		$this->db->insert('tblcategory',$cd);
	}

	function get_update_data_m($cd)
	{
		$upcd=$this->db->where($cd)
		->get('tblcategory')
		->result();

		return $upcd;
	}

	function update_data_m($ocd,$ncd)
	{
		$this->db->set($ncd)
		->where($ocd)
		->update('tblcategory');
	}
}
?>