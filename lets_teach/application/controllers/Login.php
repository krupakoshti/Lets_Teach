<?php
	defined('BASEPATH') or exit('Error');

	class Login extends CI_Controller
	{
		
		function __construct()
		{
			parent::__construct();

			$this->load->model('Login_m');

			$this->load->library('form_validation','','fv');

			if($this->ss->uid)
			{
				redirect('Home');
			}
		}

		function index()
		{
			$this->load->view('login');
		}

		function do_login()
		{
			$this->fv->set_rules('logemail','UserName','trim|required|max_length[25]|min_length[5]|alpha_dash');
			$this->fv->set_rules('logpwd','Password','trim|required|max_length[25]|min_length[3]|alpha_dash');

			if($this->fv->run()==FALSE)
			{
				$this->load->view('login');
			}
			else
			{
				$ud=[
					'UserName'=>$this->input->post('logemail'),
					'Password'=>$this->input->post('logpwd')
				];	

				$u=$this->Login_m->do_login_m($ud);

				if(count($u)==1)
				{
					if($u[0]->UserStatus==1)
					{
						$this->ss->set_userdata('uid',$u[0]->UserId);
						$this->ss->set_userdata('uname',$u[0]->UserName);
						$this->ss->set_userdata('type',$u[0]->UserType);

						redirect('Home');
					}
					else
					{
						$ud['error']="You Are Been Blocked By Admin";
						$this->load->view('login',$ud);
					}
				}
				else
				{
					$ud['error']="Invalid Email OR Password";
					$this->load->view('login',$ud);
				}
			}
		}
	}
?>