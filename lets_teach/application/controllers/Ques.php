<?php
defined('BASEPATH') or exit('Error');

class Ques extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('Ques_m');
		$this->load->library('form_validation','','fv');

		if(!$this->ss->uid)
		{
			redirect('Login');
		}
	}

	
	function index($id=FALSE)
	{
		$data['badge']=$this->Ques_m->badge_m();
		$data['qdata']=$this->Ques_m->get_data_m();
		
		if($id!=FALSE)
		{
			$this->get_ques($id);
		}
		else
		{	
			$this->load->view('quesans',$data);
		}
	}


	function get_data()
	{
		
		$d=$this->Ques_m->get_data_m();
	}

	function get_ques($id)
	{
		$d['badge']=$this->Ques_m->badge_m();
		$d['qdata']=$this->Ques_m->get_ques_m($id);
		$d['adata']=$this->Ques_m->get_ans_m($id);
		$this->load->view('quesansinfo',$d);
	}

	function add_ans($qid)
	{
		$id=$this->Ques_m->get_id_m();

		$q=[
			'QuesId'=>$qid,
			'Answer'=>$this->input->post('txtans'),
			'TutorId'=>$id[0]->TutorId
		];

		$this->Ques_m->add_ans_m($q);

		redirect('Ques/get_ques/'.$qid);
	}

	function add_view()
	{
		$data['badge']=$this->Ques_m->badge_m();
		$data['sub']=$this->Ques_m->get_subject_m();

		$this->load->view('add_ques',$data);
	}

	function add_ques()
	{
		$this->fv->set_rules('insdesc','Question','trim|required|max_length[5000]|min_length[10]');
		$this->fv->set_rules('inssub','Select Subject','trim|required|greater_than[0]');
		$this->fv->set_message('greater_than', 'You Must Select A Subject');

		if($this->fv->run()==FALSE)
		{
			$data['sub']=$this->Ques_m->get_subject_m();
			$this->load->view('add_ques',$data);
		}
		else
		{
			$ques=[
				'Question'=>$this->input->post('insdesc'),
				'StudentId'=>$this->ss->id,
				'SubjectId'=>$this->input->post('inssub')
			];

			$this->Ques_m->add_ques_m($ques);

			redirect('/Ques');
		}
	}
}
?>
