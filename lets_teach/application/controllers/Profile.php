<?php
	defined('BASEPATH') or exit('Error');

	class Profile extends CI_Controller
	{
		
		function __construct()
		{
			parent::__construct();

			$this->load->model('Profile_m');
			$this->load->library('form_validation','','fv');

			if(!$this->ss->uid)
			{
				redirect('Login');
			}


			$set['upload_path']='./resources/common/images/';
			$set['allowed_types']='jpg|png|gif|jpeg';

			$this->load->library('upload',$set,'up');
		}

		function index()
		{
			$data['badge']=$this->Profile_m->badge_m();
			$data['user']=$this->Profile_m->get_data_m();

			if($this->ss->type)
			{
				$data['enroll']=$this->Profile_m->get_enroll_m();
				$data['like']=$this->Profile_m->get_like_m();
				$data['comm']=$this->Profile_m->get_comment_m();
				$data['ques']=$this->Profile_m->get_ques_m();
				$data['sub']=$this->Profile_m->get_subscriber_m();
			}
			else
			{
				$data['course']=$this->Profile_m->get_course_m();
				$data['article']=$this->Profile_m->get_article_m();
				$data['sub']=$this->Profile_m->get_subscriber_m();
			}

			/*echo "<pre>";
			print_r($data['user']);
			die();*/

			$this->load->view('profile',$data);
		}

		function get_city($id)
		{
			$cid=[
				'StateId'=>$id
			];

			$city=$this->Profile_m->get_city_m($cid);
			
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

		function get_update_data()
		{
			$upuser['badge']=$this->Profile_m->badge_m();
			$upuser['upad']=$this->Profile_m->get_update_data_m();
			$upuser['state']=$this->Profile_m->get_state_m();


			$this->load->view('editprofile',$upuser);

		}

		function update_info($uid)
		{
			
			$this->fv->set_rules('upname','Name','trim|required|max_length[25]|min_length[5]|alpha_numeric_spaces');
			
			if($this->ss->type)
			{
				$this->fv->set_rules('upemail','Email Id','trim|required|max_length[25]|min_length[5]|valid_email');
			}
			else
			{
				$this->fv->set_rules('upemail','Email Id','trim|required|max_length[25]|min_length[5]|valid_email');	
			}
			$this->fv->set_rules('upcno','Contact Number','trim|required|exact_length[10]|numeric');
			$this->fv->set_rules('insweb','Website Link','trim|min_length[5]');
			$this->fv->set_rules('insfb','Facebook Link','trim|min_length[5]');
			$this->fv->set_rules('instwitter','Twitter Link','trim|min_length[5]');
			$this->fv->set_rules('insgp','Google Plus Link','trim|min_length[5]');
			$this->fv->set_rules('insin','Linkedin Link','trim|min_length[5]');
			$this->fv->set_rules('upcity','Select City','trim|required|greater_than[0]',['greater_than'=>'You Must Select A City']);
			$this->fv->set_rules('upstate','Select State','trim|required|greater_than[0]',['greater_than'=>'You Must Select A State']);

			if($this->fv->run()==FALSE)
			{
				$this->get_update_data();	
			}
			else
			{
				if($this->ss->type)
				{	
					$oad=[
						'StudentId'=>$uid
					];

					$nad=[
						'StudentName'=>$this->input->post('upname'),
						'EmailId'=>$this->input->post('upemail'),
						'ContactNo'=>$this->input->post('upcno'),
						'CityId'=>$this->input->post('upcity')
					];

					$this->ss->set_userdata('name',$nad['StudentName']);
					$this->Profile_m->update_studinfo_m($oad,$nad);
				}
				else
				{
					$oad=[
						'TutorId'=>$uid
					];

					$nad=[
						'TutorName'=>$this->input->post('upname'),
						'EmailId'=>$this->input->post('upemail'),
						'ContactNo'=>$this->input->post('upcno'),
						'WebsiteLink'=>$this->input->post('insweb'),
						'FacebookLink'=>$this->input->post('insfb'),
						'TwitterLink'=>$this->input->post('instwitter'),
						'GoogleplusLink'=>$this->input->post('insgp'),
						'LinkedinLink'=>$this->input->post('insin'),
						'CityId'=>$this->input->post('upcity')
					];

					$this->ss->set_userdata('name',$nad['TutorName']);
					$this->Profile_m->update_tutorinfo_m($oad,$nad);
				}

				redirect('/Profile');
			}

		}

		function update_pwd($uid)
		{
			$this->fv->set_rules('upopwd','Password','trim|required|max_length[25]|min_length[3]|alpha_dash');
			$this->fv->set_rules('upnpwd','Password','trim|required|max_length[25]|min_length[5]|alpha_dash');
			$this->fv->set_rules('upcpwd','Confirm Password','trim|required|max_length[25]|min_length[5]|alpha_dash|matches[upnpwd]');

			$data['upad']=$this->Profile_m->get_update_data_m();
			if($this->fv->run()==FALSE)
			{
				$this->get_update_data();
			}
			elseif($data['upad'][0]->Password!=$this->input->post('upopwd'))
			{
				$data['error']="Input Proper Password";
				$this->load->view('editprofile',$data);
			}
			else
			{
				$oad=[
					'UserId'=>$aid
				];

				$nad=[
					'Password'=>$this->input->post('upnpwd')
				];
				$this->Profile_m->update_pwd_m($oad,$nad);

				redirect('/Profile');
			}

		}

		function update_img($aid)
		{
			if($this->ss->type)
			{
				$oad=[
						'StudentId'=>$aid
					];

				if($this->up->do_upload('upimg'))
				{
					$id=$this->up->data();
					$nad['StudentImage']=$id['file_name'];
					$this->Profile_m->update_studinfo_m($oad,$nad);

					redirect('/Profile');
				}
			}
			else
			{
				$oad=[
						'TutorId'=>$aid
					];

				if($this->up->do_upload('upimg'))
				{
					$id=$this->up->data();
					$nad['TutorImage']=$id['file_name'];
					$this->Profile_m->update_tutorinfo_m($oad,$nad);

					redirect('/Profile');
				}	
			}	
		}
	}
?>