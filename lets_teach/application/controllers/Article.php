<?php
	defined('BASEPATH') or exit('Error');

	class Article extends CI_Controller
	{
		
		function __construct()
		{
			parent::__construct();

			$this->load->model('Article_m');
			$this->load->library('pagination');
			$this->load->library('form_validation','','fv');

			$set['upload_path']='./resources/common/images/';
			$set['allowed_types']='jpg|png|gif|jpeg';

			$this->load->library('upload',$set,'up');
		}

		function index($type=FALSE,$id=false,$aid=FALSE)
		{
			$data['badge']=$this->Article_m->badge_m();
			$data['adata']=$this->Article_m->get_article_m($type,$id);
			$adatacount=$this->Article_m->get_article_count_m($id);
			$data['cdata']=$this->Article_m->get_cat_m();

			foreach ($data['cdata'] as $key)
			{
				$key->subdata=$this->Article_m->get_subcat_m($key->CategoryId);

				foreach ($key->subdata as $key2)
				{
					$key2->sdata=$this->Article_m->get_subject_m($key2->SubCategoryId);					
				}
			}

			$config['base_url'] = site_url("Article");
			$config['total_rows'] = $adatacount;
			$config['per_page'] = 10;
			$config['use_page_numbers'] = TRUE;
			$config['num_links'] = $adatacount;
			$config['cur_tag_open'] = '<li class="page-item active"><a class="page-link active">';
			$config['cur_tag_close'] = '</a></li>';
			$config['num_tag_open'] = '<li class="page-item">';
			$config['num_tag_close'] = '</li>';
			$config['next_link'] = '>';
			$config['next_tag_open'] = '<li class="page-item">';
			$config['next_tag_close'] = '</li>';
			$config['prev_link'] = '<';
			$config['prev_tag_open'] = '<li class="page-item">';
			$config['prev_tag_close'] = '</li>';

			$this->pagination->initialize($config);

			if($this->uri->segment(3))
			{
				$page = ($this->uri->segment(3));
			}
			else
			{
				$page = 1;
			}

			$str_links = $this->pagination->create_links();
			$data["links"] = explode('&nbsp;',$str_links );

			$this->load->view('article',$data);
		}

		function get_article($aid)
		{
			$data['badge']=$this->Article_m->badge_m();
			$this->Article_m->update_views($aid);
			$id=$this->Article_m->get_studid_m($this->ss->uid);
			$data['adata']=$this->Article_m->get_article_info_m($aid);
			$data['cdata']=$this->Article_m->get_comment_m($aid);
			$data['relate']=$this->Article_m->related_post_m($aid,$data['adata'][0]->SubjectId);
			$data['total']=count($data['relate']);

			/*echo "<pre>";
			print_r($data['relate']);
			die();*/

			if(!empty($id)) 
			{
				$ldata=$this->Article_m->liked_m($aid,$id[0]->StudentId);

				if(count($ldata)>0)
				{
					$data['flag']="liked";
				}
				else
				{
					$data['flag']="notliked";
				}
			}

		
			$this->load->view('articleinfo',$data);
		}

		function add_comment($aid)
		{
			$id=$this->Article_m->get_studid_m($this->ss->uid);

			$c=[
				'ArticleComment'=>$this->input->post('txtcomment'),
				'ArticleId'=>$aid,
				'StudentId'=>$id[0]->StudentId
			];

			$art_data=$this->Article_m->get_article_info_m($aid);
			$art_url=site_url('/Article/get_article/'.$aid);
			$art_title=$art_data[0]->ArticleTitle;

			$art_notif=[
				'TutorId'=>$art_data[0]->TutorId,
				'StudentId'=>$this->ss->id,
				'UserType'=>0,
				'Notification'=>"has commented on your article <a href=$art_url>$art_title</a>"
			];

			/*echo "<pre>";
			print_r($art_notif);
			die();*/

			$this->Article_m->add_comment_m($c);

			if($art_data[0]->TutorName!=$this->ss->name)
			{
				$this->Article_m->add_notif($art_notif);
			}

			redirect('Article/get_article/'.$aid);
		}


		function article_like($aid)
		{
			$id=$this->Article_m->get_studid_m($this->ss->uid);
			/*echo '<pre>';
			print_r($id);
			die('helo');*/
			$ldata=$this->Article_m->liked_m($aid,$id[0]->StudentId);	

			$add=[
				'ArticleId'=>$aid,
				'StudentId'=>$id[0]->StudentId
			];

			$art_data=$this->Article_m->get_article_info_m($aid);
			$art_url=site_url('/Article/get_article/'.$aid);
			$art_title=$art_data[0]->ArticleTitle;

			$art_notif=[
				'TutorId'=>$art_data[0]->TutorId,
				'StudentId'=>$this->ss->id,
				'UserType'=>0,
				'Notification'=>"has liked on your article <a href=$art_url>$art_title</a>"
			];

			if(count($ldata)>0)
			{
				$this->Article_m->unlike($add);
			}
			else
			{
				$this->Article_m->like($add);

				if($art_data[0]->TutorName!=$this->ss->name)
				{
					$this->Article_m->add_notif($art_notif);
				}
			}

			$ldata2=$this->Article_m->liked_m($aid,$id[0]->StudentId);	
			$adata=$this->Article_m->get_article_info_m($aid);
			$icon=count($ldata)>0?"fa fa-heart-o":"fa fa-heart"; 			
			echo '<i class="'.$icon.' user" style="color: red; font-size: 25px;"></i>'.$adata[0]->totallike;
			//redirect('Article/get_article/'.$aid);
		}

		function add_view()
		{
			$data['badge']=$this->Article_m->badge_m();	
			$data['sub']=$this->Article_m->get_subject_m();

			$this->load->view('add_article',$data);
		}

		function add_article()
		{
			$this->fv->set_rules('institle','Article Title','trim|required|max_length[25]|min_length[5]|alpha_numeric_spaces');
			$this->fv->set_rules('insdesc','Description','trim|required|max_length[5000]|min_length[100]');
			$this->fv->set_rules('inssub','Select Subject','trim|required|greater_than[0]');
				$this->fv->set_message('greater_than', 'You Must Select A Subject');

			if($this->fv->run()==FALSE)
			{
				$data['badge']=$this->Article_m->badge_m();	
				$data['sub']=$this->Article_m->get_subject_m();
				$this->load->view('add_article',$data);
			}
			else
			{
				$id=$this->Article_m->get_tutorid_m($this->ss->uid);

				$article=[
					'ArticleTitle'=>$this->input->post('institle'),
					'Description'=>$this->input->post('insdesc'),
					'TutorId'=>$id[0]->TutorId,
					'SubjectId'=>$this->input->post('inssub')
				];

				if($this->up->do_upload('insartimg'))
				{
					$id=$this->up->data();
					$article['ArticleImage']=$id['file_name'];
				}	

				$this->Article_m->add_article_m($article);

				redirect('/Article');
			}
		}

		function update_desc($aid)
		{
			$ad=[
				'ArticleId'=>$aid
			];

			$desc=[
				'Description'=>$this->input->post('txtdesc')
			];

			/*echo "<pre>";
			print_r($ad);
			print_r($desc);
			die();*/

			$this->Article_m->update_desc_m($ad,$desc);

			redirect('/Article/get_article/'.$aid);

			/*$data=$this->Article_m->get_article_info_m($aid);

			echo '<p style="text-indent: 50px; font-size: 17px; text-align: justify;">'.$data[0]->Description.'</p>';*/
		}

		function update_img($aid)
		{
			$ad=[
				'ArticleId'=>$aid
			];

			if($this->up->do_upload('art_img'))
			{
				$id=$this->up->data();
				$nad['ArticleImage']=$id['file_name'];
				$this->Article_m->update_img_m($ad,$nad);

				redirect('/Article/get_article/'.$aid);
			}
		}
	}
?>

