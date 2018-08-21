<?php
defined('BASEPATH') or exit('Error');

class Course extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('admin/Course_m');

		if(!$this->ss->aname)
		{
			redirect('admin/Login');
		} 
	}

	function index($id=FALSE)
	{
		if($id!=FALSE)
		{
			$this->get_course($id);
		}
		else
		{	
			$this->load->view('admin/course');
		}
	}

	function get_data()
	{
		$d=$this->Course_m->get_data_m();

		foreach($d as $cd)
		{
			$cd->CourseStatus=$cd->CourseStatus==1?"Active":"Block";
			$cd->CourseDate=get_time_ago(strtotime($cd->CreatedDate));
			$cd->Date=date('d', strtotime(str_replace('-','/', $cd->CreatedDate)))." ".date('M', strtotime(str_replace('-','/', $cd->CreatedDate)))." ".date('Y', strtotime(str_replace('-','/', $cd->CreatedDate)));
		}

		echo json_encode(['aaData'=>$d]);
	}

	function toggle_status($cd)
	{
		$cid=[
			'CourseId'=>$cd
		];

		$this->Course_m->toggle_status_m($cid);
	}

	function get_course($id)
	{
		$d['cdata']=$this->Course_m->get_course_m($id);
		$d['vdata']=$this->Course_m->get_video_m($id);
		$d['rdata']=$this->Course_m->get_review_m($id);
		$d['edata']=$this->Course_m->get_enroll_m($id);
		$d['qdata']=$this->Course_m->get_ques_m($id);

		/*echo "<pre>";
		print_r($d['rdata']);
		die();*/

		foreach($d['vdata'] as $ad)
		{
			$ad->VideoStatus=$ad->VideoStatus==1?"Active":"Block";
		}

		foreach($d['rdata'] as $ad)
		{
			$ad->ReviewStatus=$ad->ReviewStatus==1?"Active":"Block";
		}

		foreach($d['qdata'] as $ad)
		{
			$ad->QuesStatus=$ad->QuesStatus==1?"Active":"Block";
		}

		$this->load->view('admin/courseinfo',$d);
	}

	function video_toggle_status($vd,$cid)
	{
		$vid=[
			'CourseVideoId'=>$vd
		];
		$this->Course_m->video_toggle_status_m($vid);
		redirect('admin/Course/get_course/'.$cid);
	}

	function review_toggle_status($rd,$cid)
	{
		$rid=[
			'CourseReviewId'=>$rd
		];
		$this->Course_m->review_toggle_status_m($rid);
		redirect('admin/Course/get_course/'.$cid);
	}

	function ques_toggle_status($qd,$cid)
	{
		$qid=[
			'CourseQuesId'=>$qd
		];
		$this->Course_m->ques_toggle_status_m($qid);
		redirect('admin/Course/get_course/'.$cid);
	}
}
?>