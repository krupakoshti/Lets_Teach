<?php
defined('BASEPATH') or exit('Error');

class QuesAns_m extends CI_Model
{

	function __construct()
	{
		parent::__construct();
	}

	function toggle_status_m($qid)
	{
		$this->db->set('QuesStatus','1-QuesStatus',false)
		->where($qid)
		->update('tblformques');
	}

	function get_data_m()
	{
		$data=$this->db
		->select('*')
		->from('tblformques q')
		->join('tblstudent s','q.StudentId=s.StudentId')
		->get()
		->result();

		return $data;
	}

	function get_ques_m($cid)
	{
		$data=$this->db
		->select('*')
		->from('tblformques q')
		->join('tblstudent s','q.StudentId=s.StudentId','left')
		->join('tbluser u','s.UserId=u.UserId','left')
		->where(['q.QuesId'=>$cid])
		->get()
		->result();

		return $data;
	}

	function get_ans_m($cid)
	{	
		$data=$this->db
		->select('*')
		->from('tblformans a')
		->join('tbltutor t','a.TutorId=t.TutorId','left')
		->where(['a.QuesId'=>$cid])
		->get()
		->result();

		return $data;	
	}

	function ans_toggle_status_m($aid)
	{
		$this->db->set('AnsStatus','1-AnsStatus',false)
		->where($aid)
		->update('tblformans');
	}
}
?>
