<?php
defined('BASEPATH') or exit('Error');

class State extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('admin/State_m');
		$this->load->library('form_validation','','fv');

		if(!$this->ss->aname)
		{
			redirect('admin/Login');
		}
	}

	function index()
	{
		$this->load->view('admin/state');
	}

	function get_data()
	{
		$sd=$this->State_m->get_data_m();


		echo json_encode(['aaData'=>$sd]);
	}

	function add_data()
	{
		$this->fv->set_rules('insstname','State Name','trim|required|max_length[25]|min_length[2]|alpha_numeric_spaces');

		if($this->fv->run()==FALSE)
		{
			//die(validation_errors());
			$this->load->view('admin/state');
			//die("hello");	
		}
		else
		{
			$sd=[
				'StateName'=>$this->input->post('insstname'),
			];

/*
			echo "<pre>";
			print_r($ad);
			die("hello");*/

			$this->State_m->add_data_m($sd);
			redirect('admin/State');
		}
	}

	function get_update_data($sid)
	{
		$sd=[
			'StateID'=>$sid
		];

		$upsd['upsd']=$this->State_m->get_update_data_m($sd);
/*
		echo "<pre>";
		print_r($upcd);
		die("hello");*/

		$this->load->view('admin/state',$upsd);
	}

	function update_data($sid)
	{
		$this->fv->set_rules('upstname','State Name','trim|required|max_length[25]|min_length[2]|alpha_numeric_spaces');

		if($this->fv->run()==FALSE)
		{
			$this->get_update_data($sid);	
		}
		else
		{
			$osd=[
				'StateId'=>$sid
			];

			$nsd=[
				'StateName'=>$this->input->post('upstname')
			];

			$this->State_m->update_data_m($osd,$nsd);

			redirect('admin/State');
		}
	}
}
?>