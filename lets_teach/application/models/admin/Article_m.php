<?php
defined('BASEPATH') or exit('Error');

class Article_m extends CI_Model
{

	function __construct()
	{
		parent::__construct();
	}

	function toggle_status_m($aid)
	{
		$this->db->set('ArticleStatus','1-ArticleStatus',false)
		->where($aid)
		->update('tblarticle');
	}

	function get_data_m()
	{
		$data=$this->db
		->select('*')
		->from('tblarticle a')
		->join('tbltutor t','a.TutorId=t.TutorId')
		->join('tblsubject s','a.SubjectId=s.SubjectId','left')
		->get()
		->result();

		return $data;
	}

	function get_article_m($aid)
	{
		$data=$this->db
		->select('*')
		->from('tblarticle a')
		->join('tbltutor t','a.TutorId=t.TutorId','left')
		->join('tblsubject s','a.SubjectId=s.SubjectId','left')
		->where(['a.ArticleId'=>$aid])
		->get()
		->result();

		return $data;
	} 

	function get_like_m($aid)
	{
		$data=$this->db
		->select('*')
		->from('tblarticlelike al')
		->join('tblstudent s','al.StudentId=s.StudentId','left')
		->join('tblarticle a','al.ArticleId=a.ArticleId','left')
		->where(['a.ArticleId'=>$aid])
		->get()
		->result();

		return $data;
	}

	function get_comment_m($aid)
	{
		$data=$this->db
		->select('*')
		->from('tblarticlecomment ac')
		->join('tblstudent s','ac.StudentId=s.StudentId','left')
		->join('tblarticle a','ac.ArticleId=a.ArticleId','left')
		->where(['a.ArticleId'=>$aid])
		->get()
		->result(); 	

		return $data;
	}

	function comment_toggle_status_m($aid)
	{
		$this->db->set('CommentStatus','1-CommentStatus',false)
		->where($aid)
		->update('tblarticlecomment');
	}
}
?>