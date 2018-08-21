<?php
	defined('BASEPATH') or exit('Error');

	class Register extends CI_Controller
	{
		
		function __construct()
		{
			parent::__construct();

			$this->load->model('Register_m');
			$this->load->library('form_validation','','fv');

			if($this->ss->uid)
			{
				redirect('Home');
			}
		}

		function index()
		{
			$st['sd']=$this->Register_m->get_state_m();

			$this->load->view('register',$st);
		}

		function get_city($id)
		{
			$cid=[
				'StateId'=>$id
			];

			$city=$this->Register_m->get_city_m($cid);
			
		?>
            <option value="0">SELECT CITY</option>
        <?php
            foreach ($city as $c) 
            {     
        ?>    
            <option value="<?=$c->CityId;?>"><?=$c->CityName;?></option>                   
        <?php
            }   
		}


		function add_user($type)
		{
			if($type==0)
			{
				$this->fv->set_rules('instuname','User Name','trim|required|max_length[25]|min_length[5]|alpha_numeric_spaces|is_unique[tbluser.UserName]');
				$this->fv->set_rules('instpwd','Password','trim|required|max_length[25]|min_length[5]|alpha_dash');
				$this->fv->set_rules('instcpwd','Confirm Password','trim|required|max_length[25]|min_length[5]|alpha_dash|matches[instpwd]');
				$this->fv->set_rules('instname','Name','trim|required|max_length[25]|min_length[5]|alpha_numeric_spaces');
				$this->fv->set_rules('instemail','Email Id','trim|required|max_length[25]|min_length[5]|valid_email|is_unique[tbltutor.EmailId]');
				$this->fv->set_rules('instcno','Contact Number','trim|required|exact_length[10]|numeric');
				$this->fv->set_rules('instweb','Website Link','trim|max_length[25]|min_length[5]|regex_match[/^www\.[a-z]*\.[a-z]{4}$/]');
				$this->fv->set_rules('instcity','Select City','trim|required|greater_than[0]',['greater_than'=>'You Must Select A City']);
				$this->fv->set_rules('inststate','Select State','trim|required|greater_than[0]',['greater_than'=>'You Must Select A State']);

				if($this->fv->run()==FALSE)
				{
					$st['sd']=$this->Register_m->get_state_m();
					$this->load->view('register',$st);
				}
				else
				{
					$tud=[
						'UserName'=>$this->input->post('instuname'),
						'Password'=>$this->input->post('instpwd'),
						'UserType'=>$type
					];

					$this->Register_m->add_user_m($tud);

					$this->ss->set_userdata('uid',$this->db->insert_id());
					$this->ss->set_userdata('uname',$this->input->post('instuname'));
					$this->ss->set_userdata('type',$type);

					$this->add_tutor($this->db->insert_id());
				}
				
			}
			else
			{

				$this->fv->set_rules('inssuname','User Name','trim|required|max_length[25]|min_length[5]|alpha_numeric_spaces|is_unique[tbluser.UserName]');
				$this->fv->set_rules('insspwd','Password','trim|required|max_length[25]|min_length[5]|alpha_dash');
				$this->fv->set_rules('insscpwd','Confirm Password','trim|required|max_length[25]|min_length[5]|alpha_dash|matches[insspwd]');
				$this->fv->set_rules('inssname','Name','trim|required|max_length[25]|min_length[5]|alpha_numeric_spaces');
				$this->fv->set_rules('inssemail','Email Id','trim|required|max_length[25]|min_length[5]|valid_email|is_unique[tblstudent.EmailId]');
				$this->fv->set_rules('insscno','Contact Number','trim|required|exact_length[10]|numeric');
				$this->fv->set_rules('insscity','Select City','trim|required|greater_than[0]');
				$this->fv->set_rules('inssstate','Select State','trim|required|greater_than[0]');
				
				if($this->fv->run()==FALSE)
				{
					$st['sd']=$this->Register_m->get_state_m();
					$this->load->view('register',$st);
				}
				else
				{
					$sud=[
						'UserName'=>$this->input->post('inssuname'),
						'Password'=>$this->input->post('insspwd'),
						'UserType'=>$type
					];

					$this->Register_m->add_user_m($sud);

					$this->ss->set_userdata('uid',$this->db->insert_id());
					$this->ss->set_userdata('uname',$this->input->post('inssuname'));
					$this->ss->set_userdata('type',$type);

					$this->add_student($this->db->insert_id());	
				}
			}

		}

		function add_tutor($uid)
		{
			$td=[
				'TutorName'=>$this->input->post('instname'),
				'EmailId'=>$this->input->post('instemail'),
				'ContactNo'=>$this->input->post('instcno'),
				'WebsiteLink'=>$this->input->post('instweb'),
				'CityId'=>$this->input->post('instcity'),
				'UserId'=>$uid
			];
			$this->Register_m->add_tutor_m($td);
			redirect(site_url('/Home'));
		}

		function add_student($uid)
		{
			$sd=[
				'StudentName'=>$this->input->post('inssname'),
				'EmailId'=>$this->input->post('inssemail'),
				'ContactNo'=>$this->input->post('insscno'),
				'CityId'=>$this->input->post('insscity'),
				'UserId'=>$uid
			];
			$this->Register_m->add_student_m($sd);
			redirect(site_url('/Home'));
		}
	}
?>