<?php
	defined('BASEPATH') or exit('Error');

	class Home extends CI_Controller
	{
		
		function __construct()
		{
			parent::__construct();

			$this->load->model('Home_m');
		}

		function index()
		{
			$data['badge']=$this->Home_m->badge_m();
			$data['course']=$this->Home_m->course_m();
			$data['article']=$this->Home_m->article_m();
			$data['tot_course']=$this->Home_m->tot_course_m();
			$data['tot_article']=$this->Home_m->tot_article_m();
			$data['tot_stud']=$this->Home_m->tot_stud_m();
			$data['tot_tutor']=$this->Home_m->tot_tutor_m();

			/*echo "<pre>";
			print_r($data['course']);
			print_r($data['count_c']);
			die();*/

			$this->load->view('home',$data);
		}

		function get_name()
		{
			if($this->ss->type)
			{
				$u=$this->Home_m->get_stud_m();
				$this->ss->set_userdata('name',$u[0]->StudentName);
				$this->ss->set_userdata('id',$u[0]->StudentId);
			}
			else
			{
				$u=$this->Home_m->get_tutor_m();	
				$this->ss->set_userdata('name',$u[0]->TutorName);
				$this->ss->set_userdata('id',$u[0]->TutorId);
			}
			echo $this->ss->name;
		}
	}
?>