<?php
	defined('BASEPATH') or exit('Error');

	class Home_m extends CI_Model
	{
		
		function __construct()
		{
			parent::__construct();
		}

		function get_stud_m()
		{
			return $this->db
					->where(['UserId'=>$this->ss->uid])
					->select('*')
					->from('tblstudent')
					->get()
					->result();
		}

		function get_tutor_m()
		{
			return $this->db
					->where(['UserId'=>$this->ss->uid])
					->select('*')
					->from('tbltutor')
					->get()
					->result();
		}

		function badge_m()
		{
			if($this->ss->type)
			{
				$this->db->where(['NotifStatus'=>0,'StudentId'=>$this->ss->id]);
			}
			else
			{
				$this->db->where(['NotifStatus'=>0,'TutorId'=>$this->ss->id]);
			}

			return $this->db->select('*')
							->from('tblnotification')
							->get()
							->result();
		}

		function course_m()
		{
			/*$this->db->select('avg(rating) as rating')
					->from('tblrating')
					->where('productid','`p`.`productid`',false)
			$sub=$this->db->get_compiled_select();*/

			return $this->db->from('tblcourseenrollment ce')
							->limit(4)
							->select('*,count(ce.CourseId) as cid')
							->join('tblcourse c','ce.CourseId=c.CourseId')
							->join('tbltutor t','c.TutorId=t.TutorId')
							->group_by('c.CourseId')
							->order_by('cid','desc')
							->get()
							->result();
		}

		function article_m()
		{
			return $this->db->from('tblarticlelike al')
							->select('*,count(al.ArticleId) as aid')
							->join('tblarticle a','al.ArticleId=a.ArticleId')
							->join('tbltutor t','a.TutorId=t.TutorId')
							->group_by('a.ArticleId')
							->order_by('aid','desc')
							->get()
							->result();
		}

		function tot_course_m()
		{
			$data=$this->db->get('tblcourse')
					->result();

			$c_data=count($data);

			return $c_data;
		}

		function tot_article_m() 
		{
			$data=$this->db->get('tblarticle')
					->result();

			$c_data=count($data);

			return $c_data;
		}

		function tot_stud_m()
		{
			$data=$this->db->get('tblstudent')
					->result();

			$c_data=count($data);

			return $c_data;
		}

		function tot_tutor_m()
		{
			$data=$this->db->get('tbltutor')
					->result();

			$c_data=count($data);

			return $c_data;
		}
	}
?>