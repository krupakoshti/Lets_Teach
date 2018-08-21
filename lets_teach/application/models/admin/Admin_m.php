<?php
defined('BASEPATH') or exit('Error');

class Admin_m extends CI_Model
{

	function __construct()
	{
		parent::__construct();
	}

	function toggle_status_m($aid)
	{
		$this->db->set('AdminStatus','1-AdminStatus',false)
		->where($aid)
		->update('tbladmin');
	}

	function get_data_m()
	{
		$data=$this->db
		->where('AdminLevel','1',false)
		->get('tbladmin')
		->result();

		return $data;
	}
	
	function AddedAdmin($where)
	{
		$this->db->where($where);
		$data=$this->db->get('tbladmin');
		return $data->result();
	}

	function add_data_m($ad)
	{
		$this->db->insert('tbladmin',$ad);
	}

	function get_update_data_m($adata)
	{
		$upad=$this->db->where($adata)
		->get('tbladmin')
		->result();

		return $upad;
	}

	function update_info_m($oad,$nad)
	{
		$this->db->set($nad)
		->where($oad)
		->update('tbladmin');
	}

	function update_pwd_m($oad,$nad)
	{
		$this->db->set($nad)
		->where($oad)
		->update('tbladmin');
	}

	function update_propic_m($oad,$nad)
	{
		$this->db->set($nad)
		->where($oad)
		->update('tbladmin');
	}
}
?>