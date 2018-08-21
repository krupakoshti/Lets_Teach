<?php
defined('BASEPATH') or exit('Error');

class Admin extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('admin/Admin_m');
		$this->load->library('form_validation','','fv');

		if(!$this->ss->aname)
		{
			redirect('admin/Login');
		}

		if($this->ss->level==1)
		{
			redirect('admin/Tutor');
		}

		$set['upload_path']='./resources/common/images/';
		$set['allowed_types']='jpg|png|gif|jpeg';

		$this->load->library('upload',$set,'up');
	}

	function index()
	{
		$this->load->view('admin/data');
	}

	function get_data()
	{
		$d=$this->Admin_m->get_data_m();
		//$data=132;

		foreach ($d as $key) {
			$data=null;
			$where=null;
			$where["AdminId"]=$key->AddedByAdminId;
			$data=$this->Admin_m->AddedAdmin($where);
			$key->AddedByAdminId=$data[0]->AdminName;
		}
		foreach($d as $ad)
		{
			$ad->AdminStatus=$ad->AdminStatus==1?"Active":"Block";
			$ad->AddDate=get_time_ago(strtotime($ad->AdminAddedDate));
			$ad->Date=date('d', strtotime(str_replace('-','/', $ad->AdminAddedDate)))." ".date('M', strtotime(str_replace('-','/', $ad->AdminAddedDate)))." ".date('Y', strtotime(str_replace('-','/', $ad->AdminAddedDate)));
		}

		echo json_encode(['aaData'=>$d]);
	}

	function toggle_status($ad)
	{
		$aid=[
			'AdminId'=>$ad
		];

		$this->Admin_m->toggle_status_m($aid);
	}

	function add_data()
	{
		$this->fv->set_rules('insadname','Name','trim|required|max_length[25]|min_length[5]|alpha_numeric_spaces');
		$this->fv->set_rules('insaduname','User Name','trim|required|max_length[25]|min_length[5]|alpha_dash|is_unique[tbladmin.UserName]');
		$this->fv->set_rules('insademail','Email Id','trim|required|max_length[25]|min_length[5]|valid_email|is_unique[tbladmin.EmailId]');
		$this->fv->set_rules('insadpwd','Password','trim|required|max_length[25]|min_length[5]|alpha_dash');
		$this->fv->set_rules('insadcpwd','Confirm Password','trim|required|max_length[25]|min_length[5]|alpha_dash|matches[insadpwd]');
		$this->fv->set_rules('insadcno','Contact Number','trim|required|exact_length[10]|numeric');
		$this->fv->set_rules('insadlevel','Admin Level','trim|required|regex_match[/^[01]$/]');

		if($this->fv->run()==FALSE)
		{
			//die(validation_errors());
			$this->load->view('admin/data');
			//die("hello");	
		}
		else
		{
			$ad=[
				'AdminName'=>$this->input->post('insadname'),
				'UserName'=>$this->input->post('insaduname'),
				'EmailId'=>$this->input->post('insademail'),
				'Password'=>$this->input->post('insadpwd'),
				'ContactNo'=>$this->input->post('insadcno'),
				'AdminLevel'=>$this->input->post('insadlevel'),
				'AddedByAdminId'=>$this->ss->id
			];


			if($this->up->do_upload('insadimg'))
			{
				$id=$this->up->data();
				$ad['AdminImage']=$id['file_name'];
			}
/*
			echo "<pre>";
			print_r($ad);
			die("hello");*/

			$this->Admin_m->add_data_m($ad);
			redirect('admin/Admin');
		}
	}

	function get_update_data()
	{
		$aid=$this->ss->id;

		$adata=[
			'AdminID'=>$aid
		];

		$upad['upad']=$this->Admin_m->get_update_data_m($adata);

		$this->load->view('admin/profile',$upad);

	}

	function update_info($aid)
	{
		$this->fv->set_rules('upadname','Name','trim|required|max_length[25]|min_length[5]|alpha_numeric_spaces');
		$this->fv->set_rules('upaduname','User Name','trim|required|max_length[25]|min_length[5]|alpha_dash');
		$this->fv->set_rules('upademail','Email Id','trim|required|max_length[25]|min_length[5]|valid_email');
		$this->fv->set_rules('upadcno','Contact Number','trim|required|exact_length[10]|numeric');

		if($this->fv->run()==FALSE)
		{
			$this->get_update_data($aid);	
		}
		else
		{
			$oad=[
				'AdminId'=>$aid
			];

			$nad=[
				'AdminName'=>$this->input->post('upadname'),
				'UserName'=>$this->input->post('upaduname'),
				'EmailId'=>$this->input->post('upademail'),
				'ContactNo'=>$this->input->post('upadcno')
			];

			$this->ss->set_userdata('aname',$nad['AdminName']);
			$this->Admin_m->update_info_m($oad,$nad);

			redirect('admin/Admin');
		}

	}

	function update_pwd($aid)
	{
		$this->fv->set_rules('upadopwd','Password','trim|required|max_length[25]|min_length[5]|alpha_dash');
		$this->fv->set_rules('upadnpwd','Password','trim|required|max_length[25]|min_length[5]|alpha_dash');
		$this->fv->set_rules('upadncpwd','Confirm Password','trim|required|max_length[25]|min_length[5]|matches[upadnpwd]');
		$adata=[
			'AdminId'=>$aid
		];


		$data['upad']=$this->Admin_m->get_update_data_m($adata);
		if($this->fv->run()==FALSE)
		{
			$this->get_update_data($aid);
		}
		elseif($data['upad'][0]->Password!=$this->input->post('upadopwd'))
		{
			$data['error']="Input Proper Password";
			$this->load->view('admin/profile',$data);
		}
		else
		{
			$oad=[
				'AdminId'=>$aid
			];

			$nad=[
				'Password'=>$this->input->post('upadnpwd')
			];
			$this->Admin_m->update_pwd_m($oad,$nad);

			redirect('admin/Admin');
		}

	}

	function update_propic($aid)
	{
		$oad=[
				'AdminId'=>$aid
			];

		if($this->up->do_upload('upadimg'))
		{
			$id=$this->up->data();
			$nad['AdminImage']=$id['file_name'];
			$this->ss->set_userdata('img',$nad['AdminImage']);
			$this->Admin_m->update_propic_m($oad,$nad);

			redirect('admin/Admin');
		}
			
	}
}
?>