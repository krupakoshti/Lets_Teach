<?php
defined('BASEPATH') or exit('Error');

class QuesAns extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('admin/QuesAns_m');

		if(!$this->ss->aname)
		{
			redirect('admin/Login');
		} 
	}

	function index($id=FALSE)
	{
		if($id!=FALSE)
		{
			$this->get_ques($id);
		}
		else
		{	
			$this->load->view('admin/quesans');
		}
	}

	function get_data()
	{
		$d=$this->QuesAns_m->get_data_m();

		foreach($d as $qd)
		{
			$qd->QuesStatus=$qd->QuesStatus==1?"Active":"Block";
			$qd->QuesDate=get_time_ago(strtotime($qd->QuesCreatedDate));
			$qd->Date=date('d', strtotime(str_replace('-','/', $qd->QuesCreatedDate)))." ".date('M', strtotime(str_replace('-','/', $qd->QuesCreatedDate)))." ".date('Y', strtotime(str_replace('-','/', $qd->QuesCreatedDate)));
		}

		echo json_encode(['aaData'=>$d]);
	}

	function toggle_status($qd)
	{
		$qid=[
			'QuesId'=>$qd
		];

		$this->QuesAns_m->toggle_status_m($qid);
	}

	function get_ques($id)
	{
		$d['qdata']=$this->QuesAns_m->get_ques_m($id);
		$d['adata']=$this->QuesAns_m->get_ans_m($id);
		
/*
		echo "<pre>";
		print_r($d['qdata']);
		die();*/

		foreach($d['adata'] as $ad)
		{
			$ad->AnsStatus=$ad->AnsStatus==1?"Active":"Block";
		}

		$this->load->view('admin/quesansinfo',$d);
	}

	function ans_toggle_status($ad,$cid)
	{
		$aid=[
			'AnsId'=>$ad
		];
		$this->QuesAns_m->ans_toggle_status_m($aid);
		redirect('admin/QuesAns/get_ques/'.$cid);
	}
}
?>
