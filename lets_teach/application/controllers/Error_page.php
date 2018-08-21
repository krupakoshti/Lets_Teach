<?php
	defined('BASEPATH') or exit('Error');

	class Error_page extends CI_Controller
	{
		
		function __construct()
		{
			parent::__construct();

			$this->load->model('Error_page_m');
		}

		function index()
		{
			//$this->output->set_status_header('404');
			$data['badge']=$this->Error_page_m->badge_m();
			$this->load->view('error',$data);
		}


	}
?>