<?php
	defined('BASEPATH') or exit('Error');

	class Profile_m extends CI_Model
	{
		
		function __construct()
		{
			parent::__construct();
		}

		function get_data_m()
		{
			$this->db->where(['u.UserId'=>$this->ss->uid])
					->select('*')
					->from('tbluser u');


			if($this->ss->type)
			{
				$this->db->join('tblstudent s','u.UserId=s.UserId');
				$this->db->join('tblcity c','s.CityId=c.CityId');
				$this->db->join('tblstate st','c.StateId=st.StateId');
			}
			else
			{
				$this->db->join('tbltutor t','u.UserId=t.UserId');
				$this->db->join('tblcity c','t.CityId=c.CityId');
				$this->db->join('tblstate st','c.StateId=st.StateId');

				
			}

			$data=$this->db->get()
			->result();

			if($this->ss->type)
			{
				foreach ($data as $key) 
				{
					$key->totaltutor=$this->db->where(['StudentId'=>$key->StudentId])
					->from('tblsubscribe')
					->count_all_results();
				}
			}
			else
			{
				foreach ($data as $key) 
				{
					$key->totalstud=$this->db->where(['TutorId'=>$key->TutorId])
					->from('tblsubscribe')
					->count_all_results();
				}	
			}

			return $data;
		}

		function get_course_m()
		{
			$data=$this->db->where(['TutorId'=>$this->ss->id])
					->select('*')	
					->order_by('CourseTitle','asc')
					->from('tblcourse')
					->get()
					->result();

			foreach ($data as $key) 
			{
				$key->enroll=$this->db->where(['CourseId'=>$key->CourseId])
				->from('tblcourseenrollment')
				->count_all_results();
			}

			foreach ($data as $key)
			{
				$key->rate=$this->db
				->select_avg('Rating')
				->from('tblcoursereview r')
				->join('tblcourse c','r.CourseId=c.CourseId','left')
				->where(['c.CourseId'=>$key->CourseId])
				->get()
				->result();
			}

			/*echo "<pre>";
			print_r($data);
			die();*/

			return $data;
		}

		function get_article_m()
		{
			$data=$this->db->where(['a.TutorId'=>$this->ss->id])
					->select('*')	
					->order_by('ArticleTitle','asc')
					->from('tblarticle a')
					->join('tblsubject s','a.SubjectId=s.SubjectId')
					->get()
					->result();

			foreach ($data as $key) 
			{
				$key->like=$this->db->where(['ArticleId'=>$key->ArticleId])
				->from('tblarticlelike')
				->count_all_results();

				$key->comment=$this->db->where(['ArticleId'=>$key->ArticleId])
				->from('tblarticlecomment')
				->count_all_results();
			}

			return $data;

		}

		function get_subscriber_m()
		{
			if($this->ss->type)
			{
				$this->db->where(['sb.StudentId'=>$this->ss->id]);
				$this->db->join('tbltutor s','sb.TutorId=s.TutorId');
				$this->db->order_by('Tutorname','asc');

			}
			else
			{
				$this->db->where(['sb.TutorId'=>$this->ss->id]);
				$this->db->join('tblstudent s','sb.StudentId=s.StudentId');
				$this->db->order_by('Studentname','asc');
			}

			$data=$this->db
					->select('*')
					->from('tblsubscribe sb')
					->join('tbluser u','s.UserId=u.UserId')
					->join('tblcity c','s.CityId=c.CityId')
					->join('tblstate st','c.StateId=st.StateId')
					->get()
					->result();

			return $data;
		}

		function get_enroll_m()
		{
			$data=$this->db->where(['e.StudentId'=>$this->ss->id])
						->select('*')
						->order_by('c.CourseTitle','asc')
						->from('tblcourseenrollment e')
						->join('tblcourse c','e.CourseId=c.CourseId')
						->join('tbltutor t','c.TutorId=t.TutorId')
						->get()
						->result();

			return $data;
		}

		function get_like_m()
		{
			$data=$this->db->where(['l.StudentId'=>$this->ss->id])
							->select('*')
							->from('tblarticlelike l')
							->join('tblarticle a','l.ArticleId=a.ArticleId')
							->join('tblsubject s','a.SubjectId=s.SubjectId')
							->get()
							->result();

			return $data;
		}

		function get_comment_m()
		{
			$data=$this->db->where(['StudentId'=>$this->ss->id])
							->select('*')
							->from('tblarticlecomment')
							->get()
							->result();

			return $data;
		}

		function get_ques_m()
		{
			$data=$this->db->where(['StudentId'=>$this->ss->id])
							->select('*')
							->from('tblformques')
							->get()
							->result();

			return $data;
		}

		function get_state_m()
		{
			$data=$this->db
						->get('tblstate')
						->result();

			return $data;
		}

		function get_city_m($sid)
		{
			$data=$this->db
						->where($sid)
						->get('tblcity')
						->result();

			return $data;
		}

		function get_update_data_m()
		{
			$this->db->where(['u.UserId'=>$this->ss->uid])
			->select('*')
			->from('tbluser u');

			if($this->ss->type)
			{
				$this->db->join('tblstudent s','u.UserId=s.UserId');
				$this->db->join('tblcity c','s.CityId=c.CityId');
				$this->db->join('tblstate st','c.StateId=st.StateId');
			}
			else
			{
				$this->db->join('tbltutor t','u.UserId=t.UserId');
				$this->db->join('tblcity c','t.CityId=c.CityId');
				$this->db->join('tblstate st','c.StateId=st.StateId');
			}

			$upad=$this->db->get()
			->result();

			return $upad;
		}

		function update_studinfo_m($oad,$nad)
		{
			$this->db->set($nad)
			->where($oad)
			->update('tblstudent');
		}

		function update_tutorinfo_m($oad,$nad)
		{
			$this->db->set($nad)
			->where($oad)
			->update('tbltutor');
		}

		function update_pwd_m($oad,$nad)
		{
			$this->db->set($nad)
			->where($oad)
			->update('tbluser');
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