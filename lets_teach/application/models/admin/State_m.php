<?php
defined('BASEPATH') or exit('Error');

class State_m extends CI_Model
{

	function __construct()
	{
		parent::__construct();
	}

	function get_data_m()
	{
		$data=$this->db->get('tblstate')
		->result();

		return $data;
	}

	function add_data_m($sd)
	{
		$this->db->insert('tblstate',$sd);
	}

	function get_update_data_m($sd)
	{
		$upsd=$this->db->where($sd)
		->get('tblstate')
		->result();

		return $upsd;
	}

	function update_data_m($osd,$nsd)
	{
		$this->db->set($nsd)
		->where($osd)
		->update('tblstate');
	}
}
?>