<?php
	defined('BASEPATH') or exit('Error');

	class Teacher_m extends CI_Model
	{
		
		function __construct()
		{
			parent::__construct();
		}

		function get_tutor_m($tid=FALSE)
		{
			if(!$this->ss->type)
			{
				$this->db->where(['t.TutorId !='=>$this->ss->id]);
			}
		
			if($tid)
			{
				$this->db->where(['TutorId'=>$tid]);
			}

			$data=$this->db
					->select('*')
					->from('tbltutor t')
					->join('tbluser u','t.UserId=u.UserId')
					->join('tblcity c','t.CityId=c.CityId')
					->join('tblstate s','c.StateId=s.StateId')
					->get()
					->result();

			return $data;
		}

		function get_course_m($tid)
		{
			$data=$this->db->where(['TutorId'=>$tid])
							->select('*')
							->from('tblcourse')
							->get()
							->result();

			return $data;
		}

		function get_article_m($tid)
		{
			$data=$this->db->where(['TutorId'=>$tid])
							->select('*')
							->from('tblarticle')
							->get()
							->result();

			return $data;	
		}

		function get_subscribe_m($tid)
		{
			$data=$this->db->where(['TutorId'=>$tid])
							->select('*')
							->from('tblsubscribe sub')
							->join('tblstudent s','sub.StudentId=s.StudentId')
							->get()
							->result();

			return $data;
		}

		function chk_follow_m($tid)
		{
			$data=$this->db
					->select('*')
					->from('tblsubscribe')
					->where(['TutorId'=>$tid,'StudentId'=>$this->ss->id])
					->get()
					->result();

			return $data;
		}

		function follow_m($sd)
		{
			$this->db->insert('tblsubscribe',$sd);
		}

		function unfollow_m($tid)
		{
			$this->db->where(['TutorId'=>$tid,'StudentId'=>$this->ss->id])
					->delete('tblsubscribe');
		}

		function add_notif($c_notif)
		{
			$this->db->insert('tblnotification',$c_notif);
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
	}
?>