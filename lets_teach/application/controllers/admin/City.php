<?php
defined('BASEPATH') or exit('Error');

class City extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('admin/City_m');
		$this->load->library('form_validation','','fv');

		if(!$this->ss->aname)
		{
			redirect('admin/Login');
		}
	}

	function index($id=FALSE)
	{
		$st['my_st']=$this->City_m->get_state_m();
		
		if($id!=FALSE)
			$st['cd']=$id;
		$this->load->view('admin/city',$st);
	}

	function get_data($cd=FALSE)
	{
		$cdata=$this->City_m->get_data_m($cd);
		echo json_encode(['aaData'=>$cdata]);
	}

	function add_data($cd=FALSE)
	{
		$this->fv->set_rules('inscityname','City Name','trim|required|max_length[25]|min_length[2]|alpha_numeric_spaces');

		if($this->fv->run()==FALSE)
		{
			$data=NULL;
			if($cd)
				$data['cd']=$cd;

			$this->load->view('admin/city',$data);
		}
		else
		{
			$cdata=[
				'CityName'=>$this->input->post('inscityname'),
				'StateId'=>$cd!=FALSE?$cd:$this->input->post('insstate'),
			];
			
			$this->City_m->add_data_m($cdata);
			if(!isset($cd))
			{
				redirect('admin/City');
			}
			else
			{
				redirect('admin/City/'.$cd);			
			}
		}
	}

	function get_update_data($id,$cd=FALSE)
	{
		$cid=[
			'CityId'=>$id
		];

		$upcd['upcd']=$this->City_m->get_update_data_m($cid);
		$upcd['st']=$this->City_m->get_state_m();
	
		if($cd!=FALSE)
			$upcd['cd']=$cd;

		$this->load->view('admin/city',$upcd);
	}

	function update_data($id,$cd=FALSE)
	{
		$this->fv->set_rules('upcityname','City Name','trim|required|max_length[25]|min_length[2]|alpha_numeric_spaces');

		if($this->fv->run()==FALSE)
		{
			$this->get_update_data($id,$cd);
		}
		else
		{
			$ocd=[
				'CityId'=>$id
			];

			$ncd=[
				'CityName'=>$this->input->post('upcityname'),
				'StateId'=>$this->input->post('upstate')
			];

			/*
			echo "<pre>";
			print_r($nscd);
			die("abc");*/

			$this->City_m->update_data_m($ocd,$ncd);
			if(!isset($cd))
			{
				redirect('admin/City');
			}
			else
			{
				redirect('admin/City/'.$cd);	
			}
		}
	}
}
?>