<?php
defined('BASEPATH') or exit('Error');

class SubCat extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('admin/SubCat_m');
		$this->load->library('form_validation','','fv');

		if(!$this->ss->aname)
		{
			redirect('admin/Login');
		}
	}

	function index($id=FALSE)
	{
		$cat['my_cat']=$this->SubCat_m->get_cat_m();
		
		if($id!=FALSE)
			$cat['scd']=$id;
		$this->load->view('admin/subcat',$cat);
	}

	function get_data($scd=FALSE)
	{
		$sdata=$this->SubCat_m->get_data_m($scd);
		foreach($sdata as $sd)
		{
			$sd->SubCategoryStatus=$sd->SubCategoryStatus==1?"Active":"Block";
			$sd->SubCatDate=get_time_ago(strtotime($sd->SubCatCreatedDate));
			$sd->Date=date('d', strtotime(str_replace('-','/', $sd->SubCatCreatedDate)))." ".date('M', strtotime(str_replace('-','/', $sd->SubCatCreatedDate)))." ".date('Y', strtotime(str_replace('-','/', $sd->SubCatCreatedDate)));
		}
		echo json_encode(['aaData'=>$sdata]);
	}

	function toggle_status($scd)
	{
		$scid=[
			'SubCategoryId'=>$scd
		];

		$this->SubCat_m->toggle_status_m($scid);
	}

	function add_data($scd=FALSE)
	{
		$this->fv->set_rules('inssubcatname','Sub-Category Name','trim|required|max_length[25]|alpha_numeric_spaces');

		if($this->fv->run()==FALSE)
		{
			$data=NULL;
			if($scd)
				$data['scd']=$scd;

			$this->load->view('admin/subcat',$data);
		}
		else
		{	
			$catid=$scd!=FALSE?$scd:$this->input->post('inscat');
			$cd=[
				'SubCategoryName'=>$this->input->post('inssubcatname'),
				'CategoryId'=>$catid,
				'SubCatAddByAdminId'=>$this->ss->id
			];
/*
			echo "<pre>";
			print_r($catid);
			die();*/
			
			$this->SubCat_m->add_data_m($cd);
			if(!isset($scd))
			{
				redirect('admin/SubCat');
			}
			else
			{
				redirect('admin/SubCat/'.$scd);			
			}
		}
	}

	function get_update_data($id,$sid=FALSE)
	{
		$scid=[
			'SubCategoryId'=>$id
		];

		$upscd['upscd']=$this->SubCat_m->get_update_data_m($scid);
		$upscd['cat']=$this->SubCat_m->get_cat_m();
	
		if($sid!=FALSE)
			$upscd['scd']=$sid;

		$this->load->view('admin/subcat',$upscd);
	}

	function update_data($scid,$scd=FALSE)
	{
		$this->fv->set_rules('upsubcatname','Sub-Category Name','trim|required|max_length[25]|alpha_numeric_spaces');

		if($this->fv->run()==FALSE)
		{
			$this->get_update_data($scid,$scd);
		}
		else
		{
			$oscd=[
				'SubCategoryId'=>$scid
			];

			$nscd=[
				'SubCategoryName'=>$this->input->post('upsubcatname'),
				'CategoryId'=>$this->input->post('upcat')
			];

			/*
			echo "<pre>";
			print_r($nscd);
			die("abc");*/

			$this->SubCat_m->update_data_m($oscd,$nscd);
			if(!isset($scd))
			{
				redirect('admin/SubCat');
			}
			else
			{
				redirect('admin/SubCat/'.$scd);	
			}
		}
	}
}
?>