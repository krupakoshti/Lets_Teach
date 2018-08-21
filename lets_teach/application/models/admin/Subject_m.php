<?php
defined('BASEPATH') or exit('Error');

class Subject_m extends CI_Model
{

	function __construct()
	{
		parent::__construct();
	}

	function get_subcat_m()
	{
		$subcat=$this->db
				->get('tblsubcategory')
				->result();
		return $subcat;
	}

	function toggle_status_m($scid)
	{
		$this->db->set('SubjectStatus','1-SubjectStatus',false)
		->where($scid)
		->update('tblsubject');
	}

	function get_data_m($scid=FALSE)
	{
		if($scid)
			$this->db->where(['s.SubCategoryId'=>$scid]);
		$data=$this->db->select('*')
			->from('tblsubject s')
			->join('tblsubcategory sc','s.SubCategoryId=sc.SubCategoryId')
			->join('tblAdmin a','s.SubAddByAdminId=a.AdminId')
			->get()
			->result();

			return $data;
	}

	function add_data_m($scd)
	{
		$this->db->insert('tblsubject',$scd);
	}

	function get_update_data_m($scd)
	{
		$upsd=$this->db->select('*')
		->from('tblsubject s')
		->join('tblsubcategory c','s.SubCategoryId=c.SubCategoryId','left')
		->where($scd)
		->get()
		->result();

		return $upsd;
	}

	function update_data_m($osd,$nsd)
	{
		$this->db->set($nsd)
		->where($osd)
		->update('tblsubject');
	}
}
?>