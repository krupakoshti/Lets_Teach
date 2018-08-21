<?php
defined('BASEPATH') or exit('Error');

class Login extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('admin/Login_m');
//$this->load->helper('form');
		$this->load->library('form_validation','','fv');

		if($this->ss->aname)
		{
			redirect('admin/Admin');
		}

	}

	function index()
	{
		$this->load->view('admin/login');
	}

	function do_login()
	{
		$log=$this->input->post('logemail');

		if(preg_match("/^[a-zA-Z][a-zA-Z0-9]{2,}@[a-z]{3,}\.[a-zA-Z]{3,}$/",$log))
		{
			$this->fv->set_rules('logemail','Email Id or UserName','trim|required|max_length[25]|min_length[5]|valid_email');
		}
		else
		{
			$this->fv->set_rules('logemail','Email Id or UserName','trim|required|max_length[25]|min_length[5]|alpha_dash');
		}

		$this->fv->set_rules('logpwd','Password','trim|required|max_length[25]|min_length[5]|alpha_dash');

		if($this->fv->run()==FALSE)
		{
			$this->load->view('admin/login');
		}
		else
		{
			if(preg_match("/^[a-zA-Z][a-zA-Z0-9]{2,}@[a-z]{3,}\.[a-zA-Z]{3,}$/",$log))
			{
				$ad=[
					'EmailId'=>$this->input->post('logemail'),
					'Password'=>$this->input->post('logpwd')
				];
			}
			else
			{
				$ad=[
					'UserName'=>$this->input->post('logemail'),
					'Password'=>$this->input->post('logpwd')
				];	
			}

			$a=$this->Login_m->do_login_m($ad);

			if(count($a)==1)
			{
				if($a[0]->AdminStatus==1)
				{
					$this->ss->set_userdata('id',$a[0]->AdminId);
					$this->ss->set_userdata('aname',$a[0]->AdminName);
					$this->ss->set_userdata('img',$a[0]->AdminImage);
					$this->ss->set_userdata('level',$a[0]->AdminLevel);

					if($a[0]->AdminLevel==0)
					{
						redirect('admin/Admin');
					}
					else
					{
						redirect('admin/Tutor');
					}
				}
				else
				{
					$ad['error']="You Are Blocked By Admin";
					$this->load->view('admin/login',$ad);
				}
			}
			else
			{
				$ad['error']="Invaild Email OR Password";
				$this->load->view('admin/login',$ad);
			}
		}
	}
}
?>