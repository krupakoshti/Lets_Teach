<?php
defined('BASEPATH') or exit('Error');

class City_m extends CI_Model
{

	function __construct()
	{
		parent::__construct();
	}

	function get_state_m()
	{
		$st=$this->db
				->get('tblstate')
				->result();
		return $st;
	}

	function get_data_m($sid=FALSE)
	{
		if($sid)
			$this->db->where(['c.StateId'=>$sid]);
		$data=$this->db->select('*')
			->from('tblcity c')
			->join('tblstate s','c.StateId=s.StateId')
			->get()
			->result();

		return $data;
	}

	function add_data_m($cd)
	{
		$this->db->insert('tblcity',$cd);
	}

	function get_update_data_m($cd)
	{
		$upscd=$this->db->select('*')
		->from('tblcity c')
		->join('tblstate s','c.StateId=s.StateId','left')
		->where($cd)
		->get()
		->result();

		return $upscd;
	}

	function update_data_m($ocd,$ncd)
	{
		$this->db->set($ncd)
		->where($ocd)
		->update('tblcity');
	}
}
?>