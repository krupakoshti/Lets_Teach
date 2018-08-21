<?php
	defined('BASEPATH') or exit('Error');

	class Course_m extends CI_Model
	{
		
		function __construct()
		{
			parent::__construct();
		}

		function get_data_m($type,$id)
		{
			if($type=="cat")
			{

				$this->db->where(['cat.CategoryId'=>$id]);
			}
			elseif ($type=="subcat") 
			{
				$this->db->where(['sc.SubCategoryId'=>$id]);
			}
			elseif ($type=="sub") 
			{
				$this->db->where(['s.SubjectId'=>$id]);
			}

			$data=$this->db
						->select('*')
						->from('tblcourse c')
						->order_by('CreatedDate','desc')
						->join('tbltutor t','c.TutorId=t.TutorId')
						->join('tblsubject s','c.SubjectId=s.SubjectId')
						->join('tblsubcategory sc','s.SubCategoryId=sc.SubCategoryId')
						->join('tblcategory cat','sc.CategoryId=cat.CategoryId')
						->get()
						->result();

			foreach ($data as $key)
			{
				$key->totalrate=$this->db
				->select_avg('Rating')
				->from('tblcoursereview r')
				->join('tblcourse c','r.CourseId=c.CourseId','left')
				->where(['c.CourseId'=>$key->CourseId])
				->get()
				->result();

				$key->countrate=$this->db->where(['CourseId'=>$key->CourseId])
				->from('tblcoursereview')
				->count_all_results();
			}

			return $data;
		}

		function get_cat_m()
		{
			return $this->db
			->order_by('CategoryName','asc')
			->from('tblcategory')
			->get()
			->result();
		}

		function get_subcat_m($sid)
		{
			return $this->db
			->order_by('SubCategoryName','asc')
			->from('tblsubcategory')
			->where(['CategoryId'=>$sid])
			->get()
			->result();
		}

		function get_subject_m($sid=FALSE)
		{
			if($sid)
			{
				$this->db->where(['SubCategoryId'=>$sid]);	
			}
			return $this->db
			->order_by('SubjectName','asc')
			->from('tblsubject')
			->get()
			->result();
		}

		function get_course_m($cid)
		{
			$data=$this->db->where(['c.CourseId'=>$cid])
						->select('*')
						->from('tblcourse c')
						->join('tbltutor t','c.TutorId=t.TutorId')
						->join('tblsubject s','c.SubjectId=s.SubjectId')
						->join('tblsubcategory sc','sc.SubCategoryId=s.SubCategoryId')
						->join('tblcategory cat','sc.CategoryId=cat.CategoryId')
						->get()
						->result();
	
			foreach ($data as $key)
			{
				$key->totalrate=$this->db
				->select_avg('Rating')
				->from('tblcoursereview r')
				->join('tblcourse c','r.CourseId=c.CourseId','left')
				->where(['c.CourseId'=>$key->CourseId])
				->get()
				->result();

				$key->countrate=$this->db->where(['CourseId'=>$key->CourseId])
				->from('tblcoursereview')
				->count_all_results();

				$key->countstud=$this->db->where(['CourseId'=>$key->CourseId])
				->from('tblcourseenrollment')
				->count_all_results();
			}

			return $data;
		}

		function get_video_m($cid)
		{
			$data=$this->db->where(['CourseId'=>$cid])
					->get('tblcoursevideos')
					->result();

			return $data;
		}

		function get_review_m($cid)
		{
			$data=$this->db->where(['r.CourseId'=>$cid])
					->select('*')
					->order_by('ReviewCreatedDate','desc')
					->from('tblcoursereview r')
					->join('tblstudent s','r.StudentId=s.StudentId')
					->get()
					->result();

			return $data;	
		}

		function check_review_m($ud)
		{
			return $this->db->where($ud)
						 	->get('tblcoursereview')
					 	 	->result();
		}
		function update_review_m($up_rate,$ud)
		{
				$this->db->where($ud)
						->set($up_rate)
						->update('tblcoursereview');	
		}

		function get_avg_rate_m($cid)
		{
			$data=$this->db->where(['CourseId'=>$cid])
							->select('Rating,count(Rating) as crt')
							->group_by('Rating')
							->order_by('Rating','desc')
							->get('tblcoursereview')
							->result_array();
			return $data;
		}

		function get_ques_m($cid)
		{
			$data=$this->db->where(['q.CourseId'=>$cid])
					->select('*')
					->order_by('QuesCreatedDate','desc')
					->from('tblcoursequestion q')
					->join('tblstudent s','q.StudentId=s.StudentId')
					->get()
					->result();

			return $data;	
		}

		function chk_enroll_m($cid)
		{
			$data=$this->db
					->select('*')
					->from('tblcourseenrollment')
					->where(['CourseId'=>$cid,'StudentId'=>$this->ss->id])
					->get()
					->result();

			return $data;
		}

		function get_ques2_m($qid)
		{
			$data=$this->db->where(['CourseQuesId'=>$qid])
						->select('*')
						->from('tblcoursequestion')
						->get()
						->result();

			return $data;
		}

		function add_review_m($rd)
		{
			$this->db->insert('tblcoursereview',$rd);
		}

		function add_ans_m($qid,$qd)
		{
			$this->db->set($qd)
					->where($qid)
					->update('tblcoursequestion');
		}

		function add_ques_m($qd)
		{
			$this->db->insert('tblcoursequestion',$qd);
		}

		function enroll_m($ed)
		{
			$this->db->insert('tblcourseenrollment',$ed);
		}

		function disenroll_m($cid)
		{
			$this->db->where(['CourseId'=>$cid,'StudentId'=>$this->ss->id])
					->delete('tblcourseenrollment');
		}

		function add_course_m($cd)
		{
			$this->db->insert('tblcourse',$cd);
		}

		function related_post_m($sid)
		{
			$data=$this->db->select('*')
						->from('tblcourse a')
						->where(['a.SubjectId'=>$sid])
						->join('tbltutor t','a.TutorId=t.TutorId')
						->get()
						->result();

			return $data;

		}

		function update_desc_m($ad,$desc)
		{
			$this->db->set($desc)
					->where($ad)
					->update('tblcourse');
		}

		function update_img_m($ad,$nad)
		{
			$this->db->set($nad)
					->where($ad)
					->update('tblcourse');
		}

		function add_video_m($vdata)
		{
			$this->db->insert('tblcoursevideos',$vdata);	
		}

		function get_up_video_m($vdata)
		{
			$data=$this->db->where($vdata)
						->get('tblcoursevideos')
						->result();

			return $data;
		}

		function update_video_m($cd,$desc)
		{
			$this->db->set($desc)
					->where($cd)
					->update('tblcoursevideos');

			
		}

		function get_cid_m($vid)
		{
			$id=$this->db->select('CourseId')
					->where($vid)
					->from('tblcoursevideos')
					->get()
					->result();
			return $id;
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
