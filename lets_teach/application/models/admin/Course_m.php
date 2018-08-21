<?php
defined('BASEPATH') or exit('Error');

class Course_m extends CI_Model
{

	function __construct()
	{
		parent::__construct();
	}

	function toggle_status_m($cid)
	{
		$this->db->set('CourseStatus','1-CourseStatus',false)
		->where($cid)
		->update('tblcourse');
	}

	function get_data_m()
	{
		$data=$this->db
		->select('*')
		->from('tblcourse c')
		->join('tbltutor t','c.TutorId=t.TutorId')
		->join('tblsubject s','c.SubjectId=s.SubjectId','left')
		->get()
		->result();

		return $data;
	}

	function get_course_m($cid)
	{
		$data=$this->db
		->select('*')
		->from('tblcourse c')
		->join('tbltutor t','c.TutorId=t.TutorId','left')
		->join('tblsubject s','c.SubjectId=s.SubjectId','left')
		->where(['c.CourseId'=>$cid])
		->get()
		->result();

		return $data;
	}

	function get_video_m($cid)
	{
		$data=$this->db
		->select('*')
		->from('tblcoursevideos v')
		->join('tblcourse c','v.CourseId=c.CourseId','left')
		->where(['c.CourseId'=>$cid])
		->get()
		->result();

		return $data;	
	}

	function video_toggle_status_m($vid)
	{
		$this->db->set('VideoStatus','1-VideoStatus',false)
		->where($vid)
		->update('tblcoursevideos');
	}

	function get_review_m($rid)
	{
		$data=$this->db
		->select('*')
		->from('tblcoursereview r')
		->join('tblcourse c','r.CourseId=c.CourseId','left')
		->join('tblstudent s','r.StudentId=s.StudentId','left')
		->where(['c.CourseId'=>$rid])
		->get()
		->result();

		foreach ($data as $key) 
		{
			$key->totalrating=$this->db
			->select_avg('Rating')
			->from('tblcoursereview r')
			->join('tblcourse c','r.CourseId=c.CourseId','left')
			->where(['c.CourseId'=>$rid])
			->get()
			->result();
		}
/*
		echo "<pre>";
		print_r($data);
		die();*/

		return $data;	
	}

	function review_toggle_status_m($rid)
	{
		$this->db->set('ReviewStatus','1-ReviewStatus',false)
		->where($rid)
		->update('tblcoursereview');
	}

	function get_enroll_m($cid)
	{
		$data=$this->db
		->select('*')
		->from('tblcourseenrollment e')
		->join('tblcourse c','e.CourseId=c.CourseId','left')
		->join('tblstudent s','e.StudentId=s.StudentId','left')
		->where(['c.CourseId'=>$cid])
		->get()
		->result();

		return $data;
	}

	function get_ques_m($cid)
	{
		$data=$this->db
		->select('*')
		->from('tblcoursequestion q')
		->join('tblcourse c','q.CourseId=c.CourseId','left')
		->join('tblstudent s','q.StudentId=s.StudentId','left')
		->where(['c.CourseId'=>$cid])
		->get()
		->result();

		return $data;
	}

	function ques_toggle_status_m($qid)
	{
		$this->db->set('QuesStatus','1-QuesStatus',false)
		->where($qid)
		->update('tblcoursequestion');
	}
}
?>
