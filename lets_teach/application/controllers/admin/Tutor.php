<?php
	defined('BASEPATH') or exit('Error');

	class Tutor extends CI_Controller
	{
		
		function __construct()
		{
			parent::__construct();
			$this->load->model('admin/Tutor_m');

			if(!$this->ss->aname)
		{
			redirect('admin/Login');
		}
		}

		function index($id=FALSE)
		{	
			if($id!=FALSE)
			{
				$this->get_tutor($id);
			}
			else
			{	
				$this->load->view('admin/tutor');
			}
		}

		function get_data()
		{
			$data=$this->Tutor_m->get_data_m();

			foreach ($data as $d) {
				$d->UserStatus=$d->UserStatus==1?"Active":"Block";
			}

			echo json_encode(['aaData'=>$data]);
		}

		function get_tutor($id)
		{
			$d['tdata']=$this->Tutor_m->get_tutor_m($id);
			$d['adata']=$this->Tutor_m->get_article_m($id);
			$d['ldata']=$this->Tutor_m->get_likes_m($id);
			$d['cdata']=$this->Tutor_m->get_course_m($id);
			$d['sdata']=$this->Tutor_m->get_subscribe_m($id);
/*
			echo "<pre>";
			print_r($d['ldata']);
			die();*/

			$this->load->view('admin/tutorprofile',$d);
		}

		function toggle_status($ud)
		{
			$uid=[
				'UserId'=>$ud
			];

			$this->Tutor_m->toggle_status_m($uid);
		}
	}
?>