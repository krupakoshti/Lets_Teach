<?php
defined('BASEPATH') or exit('Error');

class Article extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('admin/Article_m');

		if(!$this->ss->aname)
		{
			redirect('admin/Login');
		} 
	}

	function index($id=FALSE)
	{
		if($id!=FALSE)
		{
			$this->get_article($id);
		}
		else
		{
			$this->load->view('admin/article');
		}
	}

	function get_data()
	{
		$d=$this->Article_m->get_data_m();

		foreach($d as $ad)
		{
			$ad->ArticleStatus=$ad->ArticleStatus==1?"Active":"Block";
			$ad->ArticleDate=get_time_ago(strtotime($ad->ArticleCreatedDate));
			$ad->Date=date('d', strtotime(str_replace('-','/', $ad->ArticleCreatedDate)))." ".date('M', strtotime(str_replace('-','/', $ad->ArticleCreatedDate)))." ".date('Y', strtotime(str_replace('-','/', $ad->ArticleCreatedDate)));
		}

		echo json_encode(['aaData'=>$d]);
	}

	function toggle_status($ad)
	{
		$aid=[
			'ArticleId'=>$ad
		];

		$this->Article_m->toggle_status_m($aid);
	}

	function get_article($aid)
	{
		$d['adata']=$this->Article_m->get_article_m($aid);
		$d['ldata']=$this->Article_m->get_like_m($aid);
		$d['cdata']=$this->Article_m->get_comment_m($aid);
		

		/*echo "<pre>";
		print_r($d['rdata']);
		die();*/

		foreach($d['cdata'] as $ad)
		{
			$ad->CommentStatus=$ad->CommentStatus==1?"Active":"Block";
		}

		$this->load->view('admin/articleinfo',$d);
	}

	function comment_toggle_status($cd,$cid)
	{
		$aid=[
			'ArticleCommentId'=>$cd
		];
		$this->Article_m->comment_toggle_status_m($aid);
		redirect('admin/Article/get_article/'.$cid);
	}
}
?>
