<?php
	defined('BASEPATH') or exit('Error');

	class Teacher extends CI_COntroller
	{
		
		function __construct()
		{
			parent::__construct();

			$this->load->model('Teacher_m');
		}

		function index()
		{
			$data['badge']=$this->Teacher_m->badge_m();
			$data['tutor']=$this->Teacher_m->get_tutor_m();

			$this->load->view('teacher',$data);
		}

		function get_tutor($tid)
		{
			$data['badge']=$this->Teacher_m->badge_m();
			$data['tutor']=$this->Teacher_m->get_tutor_m($tid);
			$data['course']=$this->Teacher_m->get_course_m($tid);
			$data['tot_course']=count($data['course']);
			$data['article']=$this->Teacher_m->get_article_m($tid);
			$data['tot_article']=count($data['article']);
			$data['sub']=$this->Teacher_m->get_subscribe_m($tid);
			$data['tot_sub']=count($data['sub']);
			$data['chk_sub']=$this->Teacher_m->chk_follow_m($tid);

			/*echo "<pre>";
			print_r($data['course']);
			print_r($data['tot_course']);
			die();*/

			$this->load->view('tutor_profile',$data);
		}

		function subscribe($tid)
		{
			$data=$this->Teacher_m->chk_follow_m($tid);

			if(count($data)>0)
			{
				$this->Teacher_m->unfollow_m($tid);

				echo '<button class="btn" style="background-color: #F1C40F; color: white; font-size: 20px; padding: 1 1 1 1;">Follow</button>';
			}
			else
			{
				$sd=[
					'TutorId'=>$tid,
					'StudentId'=>$this->ss->id
				];

				$c_data=$this->Teacher_m->get_tutor_m($tid);

				$c_notif=[
					'TutorId'=>$c_data[0]->TutorId,
					'StudentId'=>$this->ss->id,
					'UserType'=>0,
					'Notification'=>"started following you."
				];

				$this->Teacher_m->follow_m($sd);	

				if($c_data[0]->TutorName!=$this->ss->name)
				{
					$this->Teacher_m->add_notif($c_notif);
				}

				echo '<button class="btn" style="background-color: #F1C40F; color: white; font-size: 20px; padding: 1 1 1 1;">Unfollow</button>';
			}

		}
	}
?>