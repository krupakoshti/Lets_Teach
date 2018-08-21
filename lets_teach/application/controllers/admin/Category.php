<?php
defined('BASEPATH') or exit('Error');

class Category extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('admin/Category_m');
		$this->load->library('form_validation','','fv');

		if(!$this->ss->aname)
		{
			redirect('admin/Login');
		}
	}

	function index()
	{
		$this->load->view('admin/category');
	}

	function get_data()
	{
		$d=$this->Category_m->get_data_m();

		foreach($d as $cd)
		{
			$cd->CategoryStatus=$cd->CategoryStatus==1?"Active":"Block";
			$cd->CatDate=get_time_ago(strtotime($cd->CatCreatedDate));
			$cd->Date=date('d', strtotime(str_replace('-','/', $cd->CatCreatedDate)))." ".date('M', strtotime(str_replace('-','/', $cd->CatCreatedDate)))." ".date('Y', strtotime(str_replace('-','/', $cd->CatCreatedDate)));
		}

		echo json_encode(['aaData'=>$d]);
	}

	function toggle_status($cd)
	{
		$cid=[
			'CategoryId'=>$cd
		];

		$this->Category_m->toggle_status_m($cid);
	}

	function add_data()
	{
		$this->fv->set_rules('inscatname','Category Name','trim|required|max_length[25]|min_length[2]|alpha_numeric_spaces');

		if($this->fv->run()==FALSE)
		{
			//die(validation_errors());
			$this->load->view('admin/category');
			//die("hello");	
		}
		else
		{
			$cd=[
				'CategoryName'=>$this->input->post('inscatname'),
				'CatAddByAdminId'=>$this->ss->id
			];

/*
			echo "<pre>";
			print_r($ad);
			die("hello");*/

			$this->Category_m->add_data_m($cd);
			redirect('admin/Category');
		}
	}

	function get_update_data($aid)
	{
		$cd=[
			'CategoryID'=>$aid
		];

		$upcd['upcd']=$this->Category_m->get_update_data_m($cd);
/*
		echo "<pre>";
		print_r($upcd);
		die("hello");*/

		$this->load->view('admin/category',$upcd);
	}

	function update_data($cid)
	{
		$this->fv->set_rules('upcatname','Category Name','trim|required|max_length[25]|min_length[2]|alpha_numeric_spaces');

		if($this->fv->run()==FALSE)
		{
			$this->get_update_data($cid);	
		}
		else
		{
			$ocd=[
				'CategoryId'=>$cid
			];

			$ncd=[
				'CategoryName'=>$this->input->post('upcatname')
			];

			$this->Category_m->update_data_m($ocd,$ncd);

			redirect('admin/Category');
		}
	}
}
?>