<?php
	defined('BASEPATH') or exit('Error');

	class Tutor_m extends CI_Model
	{
		
		function __construct()
		{
			parent::__construct();
		}

		function get_data_m()
		{
			$data=$this->db
			->select('*')
			->from('tbltutor t')
			->join('tbluser u','t.UserId=u.UserId')
			->join('tblcity c','t.CityId=c.CityId','left')
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

		function get_tutor_m($tid)
		{
			$data=$this->db
			->select('*')
			->from('tbltutor t')
			->join('tbluser u','t.UserId=u.UserId')
			->join('tblcity c','t.CityId=c.CityId','left')
			->join('tblstate s','c.StateId=s.StateId','left')
			->where(['t.TutorId'=>$tid])
			->get()
			->result();

			return $data;
		}

		function get_article_m($tid)
		{
			$data=$this->db->where(['TutorId'=>$tid])
			->get('tblarticle')
			->result();

			foreach ($data as $key) 
			{
				$key->totallike=$this->db->where(array("ArticleId"=>$key->ArticleId))
				->from('tblarticlelike')
				->count_all_results();

				$key->totalcomment=$this->db->where(array("ArticleId"=>$key->ArticleId))
				->from('tblarticlecomment')
				->count_all_results();
			}
/*
			echo "<pre>";
			print_r($data);
			die();*/
			return $data;
		}

		function get_likes_m($tid)
		{
			$data=$this->db
			->select('s.*,al.ArticleId,t.TutorId')
			->from('tblstudent s')
			->join('tblarticlelike al','s.StudentId=al.StudentId','left')
			->join('tblarticle a','al.ArticleId=a.ArticleId','left')
			->join('tbltutor t','a.TutorId=t.TutorId','left')
			->where(['t.TutorId'=>$tid])
			->get()
			->result();

			return $data;
		}

		function get_course_m($tid)
		{
			$data=$this->db->where(['TutorId'=>$tid])
			->get('tblcourse')
			->result();

			return $data;	
		}


		function get_subscribe_m($tid)
		{
			$data=$this->db
			->select('*')
			->from('tblsubscribe s')
			->join('tblstudent st','s.StudentId=st.StudentId')
			->where(['TutorId'=>$tid])
			->get()
			->result();

			return $data;
		}
	}
?>