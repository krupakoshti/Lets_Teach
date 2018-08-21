<?php
	defined('BASEPATH') or exit('Error');

	class Student_m extends CI_Model
	{
		
		function __construct()
		{
			parent::__construct();
		}

		function get_data_m()
		{
			$data=$this->db
			->select('*')
			->from('tblstudent s')
			->join('tbluser u','s.UserId=u.UserId','left')
			->join('tblcity c','s.CityId=c.CityId','left')
			->join('tblstate st','c.StateId=st.StateId','left')
			->get()
			->result();
/*
			echo "<pre>";
			print_r($data);
			die("hello");*/

			return $data;
		}

		function toggle_status_m($uid)
		{
			$this->db->set('UserStatus','1-UserStatus',false)
			->where($uid)
			->update('tbluser');
		}


		function get_student_m($sid)
		{
			$data=$this->db
			->select('*')
			->from('tblstudent s')
			->join('tbluser u','s.UserId=u.UserId','left')
			->join('tblcity c','s.CityId=c.CityId','left')
			->join('tblstate st','c.StateId=st.StateId','left')
			->where(['s.StudentId'=>$sid])
			->get()
			->result();

			return $data;
		}

		function get_subscribe_m($sid)
		{
			$data=$this->db
			->select('*')
			->from('tblsubscribe s')
			->join('tbltutor t','s.TutorId=t.TutorId')
			->where(['StudentId'=>$sid])
			->get()
			->result();

			return $data;
		}

		function get_enroll_m($sid)
		{
			$data=$this->db
			->select('*')
			->from('tblcourseenrollment e')
			->join('tblcourse c','e.CourseId=c.CourseId','left')
			->join('tblstudent s','e.StudentId=s.StudentId','left')
			->where(['s.StudentId'=>$sid])
			->get()
			->result();

			return $data;
		}
	}
?>