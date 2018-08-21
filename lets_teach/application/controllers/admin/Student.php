<?php
	defined('BASEPATH') or exit('Error');

	class Student extends CI_Controller
	{
		
		function __construct()
		{
			parent::__construct();
			$this->load->model('admin/Student_m');

			if(!$this->ss->aname)
		{
			redirect('admin/Login');
		}
		}

		function index($id=FALSE)
		{

			if($id!=FALSE)
			{
				$this->get_student($id);
			}
			else
			{	
				$this->load->view('admin/student');
			}
		}

		function get_data()
		{
			$data=$this->Student_m->get_data_m();

			foreach ($data as $d) {
				$d->UserStatus=$d->UserStatus==1?"Active":"Block";
			}

			echo json_encode(['aaData'=>$data]);
		}

		function toggle_status($ud)
		{
			$uid=[
				'UserId'=>$ud
			];

			$this->Student_m->toggle_status_m($uid);
		}

		
		function get_student($id)
		{
			$d['sdata']=$this->Student_m->get_student_m($id);
			$d['fdata']=$this->Student_m->get_subscribe_m($id);
			$d['edata']=$this->Student_m->get_enroll_m($id);
/*
			echo "<pre>";
			print_r($d['sdata']);
			die();*/
				
			$this->load->view('admin/studentprofile',$d);
		}
	}
?>