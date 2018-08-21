<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Message extends CI_Controller 
	{
			public function __construct()
			{
				parent::__construct();
				$this->load->model('Message_m','mm');
			}
			public function index()
			{
				$data['badge']=$this->mm->badge_m();
				$data['allsender']=$this->mm->get_all_user_sender();
				$data['allreceiver']=$this->mm->get_all_user_receiver();
				$data2=array();

				foreach($data['allreceiver'] as $key)
				{

					if($key->ReceiverId==$this->ss->id)
					{
						$data2[]=$key->SenderId;
					}
				}
				
				$chat_data=array();
				foreach ($data['allsender'] as $key ) 
				{
					$chat_data[$key->ReceiverId]=$key->MsgCreatedDate;
					//$chat_data[$key->seendate]=$key->seendate;
				}
				foreach ($data['allreceiver'] as $key) 
				{
					$chat_data[$key->SenderId]=$key->MsgCreatedDate;
					//$chat_data[$key->seendate]=$key->seendate;
				}
				arsort($chat_data);
				
				foreach ($chat_data as $key => $value) 
				{
					$data1[]=$key;
				}
				
				if(isset($data1))
				{
					$data['unseen']=$this->mm->get_user_m($data1);
				}

				 /*echo "<pre>";
				 print_r($data);
				 die();*/
				$this->load->view('message',$data);
			}/*
			public function index()
			{
				$data['alluser']=$this->mm->get_all_user_m();
				//$data['recentchat']=$this->mm->recent_chat();
				$this->load->view('messeging',$data);
			}*/

			public function add_msgs($msg,$id)
			{
	/*			$ad=array(
							'senderID'=>$this->ss->uid,
							'receiverID'=>$id,
							'message'=>$msg
						);*/
				$this->mm->insert_msg($msg,$id);
		
			}
			/*public function get_user()
			{
				$data['alluser']=$this->mm->get_all_user_m();
				//<li class="active"><a href="#home" data-toggle="tab">Home</a></li>
				foreach ($data['alluser'] as $key) 
				{
					?>
					
					<li onclick="getuser(this.value)">
						<a href="#<?php echo $key->UserID; ?>"  data-toggle="tab">

							<?php echo $key->UserName;?>
							<?php
							if($key->UserType==1)
							{
							?>
							<span class="pull-right"><?php echo "STUDENT";?></span>
							<?php
							}
							else
							{
								
							?>
							<span class="pull-right"><?php echo "TUTOR";?></span>
							<?php
							}
							?>			
						</a>		
					</li>
					
					<?php
				}
				//$this->load->view('messeging',$data);
			}*/
			public function get_user_chat($id)
			{
				$data['userchart']=$this->mm->get_user_chat_m($id);
				
				$data1=$this->mm->get_user_name($id);
				/*echo "<pre>";
				print_r($data1);
				die();
				*/foreach ($data1 as $key) {
					$username=$key->username;
					$userimage=$key->profilepic;
				}
				?>
				<div class="heading" style=" z-index:-1;background-color:#f0ad4e;padding:10px;box-shadow:3px 5px 7px rgba(0,0,0,.2);width:100%;border-radius:4px;">
						
					<ul class="head">
						<li><h4 style="font-weight:bold;font-family:calibri;"><?php echo $username;?></h4></li>
					</ul>
				</div>
				<div class="" style="padding:10px;height:400px;overflow:hidden;overflow-y:scroll;">				                	
					<div id="" style="z-index:1;" > 		
					<?php
					foreach ($data['userchart'] as $key) 
					{

						if($key->SenderId==$this->ss->uid)
						{
						?>

							<div class="col-md-12">
								<span class="pull-right"><img style="margin-top:7px;width:30px;border-radius:50%;" src="<?php echo base_url('resource/common/image/'.$this->ss->pic)?>"></span>
								<div class="pull-right" style="background-color:#f0ad4e;z-index:1;border-radius:25px;color:black;padding:2px 7px 2px 10px;word-break:break-all; margin-top:9px;margin-right:20px;">								
									<ul class="head">
										<li style=""><?php echo urldecode($key->Message); ?></li>
									</ul>
								</div>
							</div>
						<?php
						}
						elseif($key->ReceiverId==$this->ss->uid)
						{
					?>
							<div class="col-md-12">
								<span class="pull-left"><img style="margin-top:7px;width:30px;border-radius:50%;" src="<?php echo base_url('resource/common/image/'.$this->ss->pic)?>"></span>
								<div class="pull-left" style="z-index:1;background-color:white;padding:2px 10px 2px 7px;border-radius:25px;box-shadow:0 0 10px rgba(0,0,0,.2);word-break:break-all;margin-top:9px;margin-left:20px;">
									<ul class="head">
										<li><?php echo urldecode($key->Message); ?></li>
									</ul>
								</div>
							</div>
					<?php
						}
					}
					?>
					</div>
				</div>

				<?php
			}
			/*public function get_new_chat()
			{
				$data=$this->mm->get_new_chat_follower();
				$data=$this->mm->get_new_chat_following();
				?>
					<ul id="userlist" class="nav nav-tabs tabs-left">
				<?php
				foreach ($data as $key)
				{
				?>
				<li class="id1" value="<?php echo $key->UserID; ?>" onclick="myFunction1(this.value);" style="width:100%;padding:0;margin:0;">
														<a href="#" style="margin:0;padding:5px 0 5px 0;"><option href="#<?php echo $key->UserID;?>" data-toggle="tab" style="width:100%;padding:0;margin:0;">
															<img  style="height:50px;width:50px;border-radius:50%;margin:0 10px 0 10px;" src="<?php echo base_url('resource/admin/image/'.$key->profilepic);?>"></span>
															<span><b style="color: #121313 ;"><?php echo $key->UserName;?></b></span>
															<?php
															if($key->UserType==1)
															{
															?>
																<span style="color: #5e6269 ;">STUDENT</span>
															<?php
															}
															else
															{
															?>
																<span style="color: #5e6269 ;">TUTOR</span>
															<?php
															}
															?>			
															</option>
														</a>
													</li>
				<?php

				}
				?>
			</ul>
				<?php
			}*/
	}
?>
