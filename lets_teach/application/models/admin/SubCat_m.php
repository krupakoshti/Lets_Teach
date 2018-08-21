<?php
defined('BASEPATH') or exit('Error');

class SubCat_m extends CI_Model
{

	function __construct()
	{
		parent::__construct();
	}

	function get_cat_m()
	{
		$cat=$this->db
				->get('tblcategory')
				->result();
		return $cat;
	}

	function toggle_status_m($scid)
	{
		$this->db->set('SubCategoryStatus','1-SubCategoryStatus',false)
		->where($scid)
		->update('tblsubcategory');
	}

	function get_data_m($scid=FALSE)
	{
		if($scid)
			$this->db->where(['sc.CategoryId'=>$scid]);
		$data=$this->db->select('*')
			->from('tblsubcategory sc')
			->join('tblcategory c','sc.CategoryId=c.CategoryId')
			->join('tblAdmin a','sc.SubCatAddByAdminId=a.AdminId')
			->get()
			->result();

			return $data;
	}

	function add_data_m($scd)
	{
		$this->db->insert('tblsubcategory',$scd);
	}

	function get_update_data_m($scd)
	{
		$upscd=$this->db->select('*')
		->from('tblsubcategory sc')
		->join('tblcategory c','sc.CategoryId=c.CategoryId','left')
		->where($scd)
		->get()
		->result();

		return $upscd;
	}

	function update_data_m($oscd,$nscd)
	{
		$this->db->set($nscd)
		->where($oscd)
		->update('tblsubcategory');
	}
}
?>