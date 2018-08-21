<?php
	defined('BASEPATH') or exit('Error');

	class Forgot_pwd extends CI_Controller
	{
		
		function __construct()
		{
			parent::__construct();

			$this->load->model('Forgot_pwd_m');
		}

		function index()
		{
			$this->load->view('forgot_pwd');
		}

		function forgot_pwd_c()
		{
		    $uname=[
		    	'UserName'=>$this->input->post('txtuname')
			];

		    $findemail = $this->Forgot_pwd_m->ForgotPassword($uname);
		    
		    if (count($findemail)>0) 
		    {
		        $this->Forgot_pwd_m->sendpassword($findemail);
		    } 
		    else 
		    {
		        redirect('/Forgot_pwd');
		    }
		}
	}

?>