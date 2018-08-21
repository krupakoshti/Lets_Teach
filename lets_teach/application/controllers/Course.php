<?php
	defined('BASEPATH') or exit('Error');

	class Course extends CI_Controller
	{
		
		function __construct()
		{
			parent::__construct();

			$this->load->model('Course_m');
			$this->load->library('form_validation','','fv');

			$set['upload_path']='./resources/common/images/';
			$set['allowed_types']='jpg|png|gif|jpeg';
			$this->load->library('upload',$set,'up');
			
			$vd['upload_path']='./resources/common/videos/';
			$vd['allowed_types']='mp4';
			$vd['max_size'] = '104857600';
			$this->load->library('upload',$vd,'upvd');
		}

		function index($type=FALSE,$id=false)
		{
			$data['badge']=$this->Course_m->badge_m();
			$data['course']=$this->Course_m->get_data_m($type,$id);
			$data['cdata']=$this->Course_m->get_cat_m();

			foreach ($data['cdata'] as $key)
			{
				$key->subdata=$this->Course_m->get_subcat_m($key->CategoryId);

				foreach ($key->subdata as $key2)
				{
					$key2->sdata=$this->Course_m->get_subject_m($key2->SubCategoryId);					
				}
			}
/*
				echo "<pre>";
				print_r($data['cdata']);
				die();*/

			$this->load->view('course',$data);

		}

		function get_course($cid)
		{
			$data['badge']=$this->Course_m->badge_m();
			$data['course']=$this->Course_m->get_course_m($cid);
			$data['video']=$this->Course_m->get_video_m($cid);
			$data['review']=$this->Course_m->get_review_m($cid);
			$data['ques']=$this->Course_m->get_ques_m($cid);
			$data['tot_rate']=count($data['review']);
			$data['rate_card']=$this->Course_m->get_avg_rate_m($cid);
			$data['chk_enroll']=$this->Course_m->chk_enroll_m($cid);
			$data['relate']=$this->Course_m->related_post_m($data['course'][0]->SubjectId);
			$data['total']=count($data['relate']);
			/*
			echo "<pre>";
			print_r($data['relate']);
			die();*/

			$this->load->view('courseinfo',$data);
		}

		function add_review($cid)
		{
			
			$ud=[
				'CourseId'=>$cid,
				'StudentId'=>$this->ss->id
			];
				
			$c1=$this->Course_m->check_review_m($ud);
			$cnt=count($c1);
			
			if($cnt==1)
			{
				$up_rate=[
					'Rating'=>$this->input->post('abc'),
					'Review'=>$this->input->post('txtreview'),
					'ReviewCreatedDate'=>date("Y-m-d h:i:s")
				];

				$this->Course_m->update_review_m($up_rate,$ud);
			}
			else
			{
				$rd=[
				'Rating'=>$this->input->post('abc'),
				'Review'=>$this->input->post('txtreview'),
				'CourseId'=>$cid,
				'StudentId'=>$this->ss->id
				];
			
				$this->Course_m->add_review_m($rd);
			}

			$c_data=$this->Course_m->get_course_m($cid);
			$c_url=site_url('/Course/get_course/'.$cid);
			$c_title=$c_data[0]->CourseTitle;

			$c_notif=[
				'TutorId'=>$c_data[0]->TutorId,
				'StudentId'=>$this->ss->id,
				'UserType'=>0,
				'Notification'=>"give review on your course <a href=$c_url>$c_title</a>"
			];

			if($c_data[0]->TutorName!=$this->ss->name)
			{
				$this->Course_m->add_notif($c_notif);
			}

			$this->get_course($cid);

			redirect('Course/get_course/'.$cid);		
		}

		function get_ques($qid)
		{
			$data['q']=$this->Course_m->get_ques2_m($qid);

			$this->load->view('course',$data);
		}

		function add_ans($qid,$cid)
		{
			$qid=[
				'CourseQuesId'=>$qid
			];

			$qd=[
				'Answer'=>$this->input->post('txtans')
			];

			$this->Course_m->add_ans_m($qid,$qd);	

			redirect('Course/get_course/'.$cid);
		}

		function add_ques($cid)
		{
			$qd=[
				'CourseId'=>$cid,
				'StudentId'=>$this->ss->id,
				'Question'=>$this->input->post('txtques')
			];

			$c_data=$this->Course_m->get_course_m($cid);
			$c_url=site_url('/Course/get_course/'.$cid);
			$c_title=$c_data[0]->CourseTitle;

			$c_notif=[
				'TutorId'=>$c_data[0]->TutorId,
				'StudentId'=>$this->ss->id,
				'UserType'=>0,
				'Notification'=>"asked question on your course <a href=$c_url>$c_title</a>"
			];

			$this->Course_m->add_ques_m($qd);

			if($c_data[0]->TutorName!=$this->ss->name)
			{
				$this->Course_m->add_notif($c_notif);
			}

			redirect('Course/get_course/'.$cid);
		}

		function enroll($cid)
		{
			$data=$this->Course_m->chk_enroll_m($cid);

			if(count($data)>0)
			{
				$this->Course_m->disenroll_m($cid);

				echo '<button class="btn" style="background-color: #F1C40F; color: white; font-size: 20px; padding: 1 1 1 1;">Subscribe</button>';
			}
			else
			{
				$ed=[
					'CourseId'=>$cid,
					'StudentId'=>$this->ss->id
				];

				$c_data=$this->Course_m->get_course_m($cid);
				$c_url=site_url('/Course/get_course/'.$cid);
				$c_title=$c_data[0]->CourseTitle;

				$c_notif=[
					'TutorId'=>$c_data[0]->TutorId,
					'StudentId'=>$this->ss->id,
					'UserType'=>0,
					'Notification'=>"subscribed to your course <a href=$c_url>$c_title</a>"
				];

				$this->Course_m->enroll_m($ed);	

				if($c_data[0]->TutorName!=$this->ss->name)
				{
					$this->Course_m->add_notif($c_notif);
				}

				echo '<button class="btn" style="background-color: #F1C40F; color: white; font-size: 20px; padding: 1 1 1 1;">Unsubscribe</button>';
			}
		}

		function add_view()
		{
			$data['badge']=$this->Course_m->badge_m();
			$data['sub']=$this->Course_m->get_subject_m();

			$this->load->view('add_course',$data);
		}

		function add_course()
		{
			$this->fv->set_rules('institle','Course Title','trim|required|max_length[25]|min_length[5]|alpha_numeric_spaces');
			$this->fv->set_rules('insdesc','Description','trim|required|max_length[5000]|min_length[100]');
			$this->fv->set_rules('inssub','Select Subject','trim|required|greater_than[0]');
			$this->fv->set_message('greater_than', 'You Must Select A Subject');

			if($this->fv->run()==FALSE)
			{
				$data['badge']=$this->Course_m->badge_m();
				$data['sub']=$this->Course_m->get_subject_m();
				$this->load->view('add_course',$data);
			}
			else
			{
				$course=[
					'CourseTitle'=>$this->input->post('institle'),
					'Description'=>$this->input->post('insdesc'),
					'TutorId'=>$this->ss->id,
					'SubjectId'=>$this->input->post('inssub')
				];

				if($this->up->do_upload('insimg'))
				{
					$id=$this->up->data();
					$course['Thumbnail']=$id['file_name'];
				}	

				$this->Course_m->add_course_m($course);

				redirect('/Course');
			}
		}

		function update_desc($cid)
		{
			$cd=[
				'CourseId'=>$cid
			];

			$desc=[
				'Description'=>$this->input->post('txtdesc')
			];

			$this->Course_m->update_desc_m($cd,$desc);

			redirect('/Course/get_course/'.$cid);
		}

		function update_img($cid)
		{
			$cd=[
				'CourseId'=>$cid
			];

			if($this->up->do_upload('art_img'))
			{
				$id=$this->up->data();
				$nad['Thumbnail']=$id['file_name'];
				$this->Course_m->update_img_m($cd,$nad);

				redirect('/Course/get_course/'.$cid);
			}
		}

		function add_video($cid)
		{
			$vdata=[
				'VideoName'=>$this->input->post('vd_title'),
				'CourseId'=>$cid,
				'VideoDescription'=>$this->input->post('vddesc')
			];

			if($this->upvd->do_upload('art_vd'))
			{
				$id=$this->upvd->data();
				$vdata['VideoURL']=$id['file_name'];

				$this->Course_m->add_video_m($vdata);

				redirect('/Course/get_course/'.$cid);
			}	
		}

		function get_up_video($vid)
		{
			$vdata=[
				'CourseVideoId'=>$vid
			];

			$vdata['vd']=$this->Course_m->get_up_video_m($vdata);
			
			echo '<form method="post" action="'.site_url("/Course/update_video/".$vdata['vd'][0]->CourseVideoId).'">
					<div class="modal-body">
						<input type="text" class="form-control" name="vdtitle" id="vdtitle" placeholder="Video Title" style="font-size: 15px; margin-bottom: 2rem;" value="'.$vdata['vd'][0]->VideoName.'">
						<textarea class="form-control" rows="5" name="vd_desc" id="vd_desc" style="font-size: 15px; margin-bottom: 2rem;">'.$vdata['vd'][0]->VideoDescription.'</textarea>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						<button type="submit" class="btn" style="background-color: #F1C40F; color: white;">Update</button>
					</div>
					</form>';
		}

		function update_video($vid)
		{
			$cd=[
				'CourseVideoId'=>$vid
			];

			$desc=[
				'VideoName'=>$this->input->post('vdtitle'),
				'VideoDescription'=>$this->input->post('vd_desc')
			];

			$this->Course_m->update_video_m($cd,$desc);
			$id=$this->Course_m->get_cid_m($cd);

			redirect('/Course/get_course/'.$id[0]->CourseId);
		}
	}
?>


