<?php
defined('BASEPATH') or exit('Error');

class Subject extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('admin/Subject_m');
		$this->load->library('form_validation','','fv');

		if(!$this->ss->aname)
		{
			redirect('admin/Login');
		}
	}

	function index($id=FALSE)
	{
		$subcat['my_subcat']=$this->Subject_m->get_subcat_m();
		
		if($id!=FALSE)
			$subcat['scd']=$id;
		$this->load->view('admin/subject',$subcat);
	}

	function get_data($scd=FALSE)
	{
		$sdata=$this->Subject_m->get_data_m($scd);

		foreach($sdata as $sd)
		{
			$sd->SubjectStatus=$sd->SubjectStatus==1?"Active":"Block";
			$sd->SubDate=get_time_ago(strtotime($sd->SubCreatedDate));
			$sd->Date=date('d', strtotime(str_replace('-','/', $sd->SubCreatedDate)))." ".date('M', strtotime(str_replace('-','/', $sd->SubCreatedDate)))." ".date('Y', strtotime(str_replace('-','/', $sd->SubCreatedDate)));
		}

		echo json_encode(['aaData'=>$sdata]);
	}

	function toggle_status($scd)
	{
		$sid=[
			'SubjectId'=>$scd
		];

		$this->Subject_m->toggle_status_m($sid);
	}

	function add_data($scd=FALSE)
	{
		$this->fv->set_rules('inssubname','Subject Name','trim|required|max_length[25]|alpha_numeric_spaces');

		if($this->fv->run()==FALSE)
		{
			$data=NULL;
			if($scd)
				$data['scd']=$scd;

			$this->load->view('admin/subject',$data);
		}
		else
		{
			$cd=[
				'SubjectName'=>$this->input->post('inssubname'),
				'SubCategoryId'=>$scd!=FALSE?$scd:$this->input->post('inssub'),
				'SubAddByAdminId'=>$this->ss->id
			];
			
			$this->Subject_m->add_data_m($cd);
			if(!isset($scd))
			{
				redirect('admin/Subject');
			}
			else
			{
				redirect('admin/Subject/'.$scd);			
			}
		}
	}

	function get_update_data($id,$sid=FALSE)
	{
		$scid=[
			'SubjectId'=>$id
		];

		$upsd['upsd']=$this->Subject_m->get_update_data_m($scid);
		$upsd['subcat']=$this->Subject_m->get_subcat_m();
	
		if($sid!=FALSE)
			$upsd['scd']=$sid;

		$this->load->view('admin/subject',$upsd);
	}

	function update_data($scid,$scd=FALSE)
	{
		$this->fv->set_rules('upsubname','Subject Name','trim|required|max_length[25]|alpha_numeric_spaces');

		if($this->fv->run()==FALSE)
		{
			$this->get_update_data($scid,$scd);
		}
		else
		{
			$osd=[
				'SubjectId'=>$scid
			];

			$nsd=[
				'SubjectName'=>$this->input->post('upsubname'),
				'SubCategoryId'=>$this->input->post('upsub')
			];

			/*
			echo "<pre>";
			print_r($nsd);
			die("abc");*/

			$this->Subject_m->update_data_m($osd,$nsd);
			if(!isset($scd))
			{
				redirect('admin/Subject');
			}
			else
			{
				redirect('admin/Subject/'.$scd);	
			}
		}
	}
}
?>