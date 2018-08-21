<?php
	defined('BASEPATH') or exit('Error');

	class Notifs extends CI_Controller
	{
		
		function __construct()
		{
			parent::__construct();

			if(!$this->ss->uid)
			{
				redirect('Login');
			} 

			$this->load->model('Notifs_m');
		}

		function index()
		{
			$data['badge']=$this->Notifs_m->badge_m();
			$data['nd']=$this->Notifs_m->get_notif();
			$data['update']=$this->Notifs_m->update_notif_m();


			foreach ($data['nd'] as $key) 
			{
				$key->Date=get_time_ago(strtotime($key->NotifCreatedDate));
			}

			/*echo "<pre>";
			print_r($data);
			die();*/
			
			$this->load->view('notifs',$data);
		}

		function mark_as_read()
		{

		}
	}

?>