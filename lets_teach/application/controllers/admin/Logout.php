<?php
	defined('BASEPATH') or exit('Error');

	class Logout extends CI_Controller
	{
		
		function __construct()
		{
			parent::__construct();
			$this->ss->sess_destroy();
			redirect('admin/Login');
		}

		function index()
		{
			
		}
	}
?>