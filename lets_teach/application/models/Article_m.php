<?php
	defined('BASEPATH') or exit('Error');

	class Article_m extends CI_Model
	{
		
		function __construct()
		{
			parent::__construct();
		}

		function get_article_count_m($id)
		{
			return $this->db
			->select('count(*) AS count')
			->from('tblarticle a')
			->join('tbltutor t','a.TutorId=t.TutorId')
			->get()
			->result()[0]->count;
		}

		function get_article_m($type=FALSE,$id)
		{
			if($type=="cat")
			{

				$this->db->where(['c.CategoryId'=>$id]);
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
			->order_by('ArticleCreatedDate','desc')
			->from('tblarticle a')
			/*->limit('2',$aid)*/
			->join('tbltutor t','a.TutorId=t.TutorId')
			->join('tblsubject s','a.SubjectId=s.SubjectId')
			->join('tblsubcategory sc','s.SubCategoryId=sc.SubCategoryId')
			->join('tblcategory c','sc.CategoryId=c.CategoryId')
			->get()
			->result();

/*			echo "<pre>";
			print_r($data);
			die();
*/
			foreach ($data as $key) 
			{
				$key->totallike=$this->db->where(array("ArticleId"=>$key->ArticleId))
				->from('tblarticlelike')
				->count_all_results();

				$key->totalcomment=$this->db->where(array("ArticleId"=>$key->ArticleId))
				->from('tblarticlecomment')
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

		function get_article_info_m($aid)
		{
			$data=$this->db
			->select('*')
			->from('tblarticle a')
			->join('tbltutor t','a.TutorId=t.TutorId')
			->where(['ArticleId'=>$aid])
			->get()
			->result();

			foreach ($data as $key) 
			{
				$key->totallike=$this->db->where(['ArticleId'=>$key->ArticleId])
				->from('tblarticlelike')
				->count_all_results();

				$key->totalcomment=$this->db->where(['ArticleId'=>$key->ArticleId])
				->from('tblarticlecomment')
				->count_all_results();
			}

			return $data;
		}

		function update_views($aid)
		{
			$this->db->set('ArticleViews','1+ArticleViews',false)
			->where(['ArticleId'=>$aid])
			->update('tblarticle');
		}

		function get_comment_m($aid)
		{
			$data=$this->db->where(['ArticleId'=>$aid])
			->select('*')
			->from('tblarticlecomment c')
			->join('tblstudent s','c.StudentId=s.StudentId')
			->get()
			->result();

			return $data;
		}

		function add_comment_m($c)
		{
			$this->db->insert('tblarticlecomment',$c);
		}

		function get_studid_m($id)
		{
			return $this->db
					->select('StudentId')
					->from('tblstudent')
					->where(['UserId'=>$id])
					->get()
					->result();

		}

		function get_tutorid_m($id)
		{
			return $this->db
					->select('TutorId')
					->from('tbltutor')
					->where(['UserId'=>$id])
					->get()
					->result();

		}

		function like($add)
		{
			$this->db->insert('tblarticlelike',$add);
		}

		function unlike($del)
		{
			$this->db->where($del)
			->delete('tblarticlelike');
		}

		function liked_m($aid,$id)
		{
			return $this->db->select('ArticleLikeId')
			->from('tblarticlelike')
			->where(['ArticleId'=>$aid,'StudentId'=>$id])
			->get()
			->result();
		}

		function add_article_m($art)
		{
			$this->db->insert('tblarticle',$art);
		}

		function related_post_m($aid,$sid)
		{
			$data=$this->db->select('*')
						->from('tblarticle a')
						->where(['a.SubjectId'=>$sid])
						->where(['a.ArticleId !='=>$aid])
						->join('tbltutor t','a.TutorId=t.TutorId')
						->get()
						->result();

			return $data;

		}

		function update_desc_m($ad,$desc)
		{
			$this->db->set($desc)
					->where($ad)
					->update('tblarticle');
		}

		function update_img_m($ad,$nad)
		{
			$this->db->set($nad)
					->where($ad)
					->update('tblarticle');
		}

		function add_notif($art_notif)
		{
			$this->db->insert('tblnotification',$art_notif);
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