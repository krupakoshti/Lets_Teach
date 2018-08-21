<?php
	class Message_m extends CI_Model
	 {
		public function __construct()
		{
			parent::__construct();
			//$this->load->database();
		}
		public function get_all_user_sender()
		{
			if($this->ss->type==1)
			{
					$userid=$this->ss->id;
			}
			else
			{
					$userid=$this->ss->id;
			}
			$stype=$this->ss->type;
			$where= "SenderId=$userid and SenderType=$stype and MsgCreatedDate=(select max(MsgCreatedDate) FROM tblmessage m2 WHERE m1.SenderId = m2.SenderId and m1.ReceiverId = m2.ReceiverId)";
			$this->db->where($where);
			$this->db->group_by('ReceiverId','DESC');
			$data=$this->db->get('tblmessage m1');
			return $data->result();
		}
		public function get_all_user_receiver()
		{
			if($this->ss->type==1)
			{
					$userid=$this->ss->id;
			}
			else
			{
					$userid=$this->ss->id;
			}
			$stype=$this->ss->type;
			$where= "ReceiverId=$userid and ReceiverType=$stype and MsgCreatedDate=(select max(MsgCreatedDate) FROM tblmessage m2 WHERE m1.SenderId = m2.SenderId and m1.ReceiverId = m2.ReceiverId)  GROUP BY SenderId DESC";
			$this->db->where($where);
			$data=$this->db->get('tblmessage m1');
			return $data->result();
		}
		public function get_user_m($id)
		{
			$this->db->where_in('UserId',$id);
			$data=$this->db->get('tbluser');
			return $data->result();
		}
		/*public function get_all_user_m()
		{
			$this->db->where('UserID!=',$this->ss->userid);
			$data=$this->db->get('tbluser');
			return $data->result();
		}*/
		/*public function recent_chat()
		{
			$userid=$this->ss->userid;
			$where="`senderid`=$userid";
			$this->db->where($where);
			$this->db->group_by('senderid');
			$data=$this->db->get('tblchat')->result();
			/*print_r($data);
			die();
			return $data->result();
		}*/
		
		public function get_user_chat_m($id)
		{
			$sid=$this->ss->uid;
			$where="SenderId=$sid AND ReceiverId=$id OR SenderId=$id AND ReceiverId=$sid";
			$this->db->where($where);
			$this->db->order_by('MsgCreatedDate','ASC');

			return $this->db->get('tblmessage')->result();
			
		}
		public function insert_msg($msg,$ad)
		{
			$this->db->set('Message',$msg);
			$this->db->set('ReceiverId',$ad);
			$this->db->set('SenderId',$this->ss->uid);
			$this->db->insert('tblmessage');
		}
		public function get_user_name($id)
		{
			$this->db->select('*');
			$this->db->where('UserId',$id);
			return $this->db->get('tbluser')->result();
		}
		public function get_new_chat_follower()
		{
			$this->db->where('FollowerID',$this->ss->userid);
			$this->db->join('tbluser','tbluser.UserID=tblfollow.FollowingID');
			$data=$this->db->get('tblfollow');
			return $data->result();
		}
		public function get_new_chat_following()
		{
			$this->db->where('FollowingID',$this->ss->userid);
			$this->db->join('tbluser','tbluser.UserID=tblfollow.FollowerID');
			$data=$this->db->get('tblfollow');
			return $data->result();
		}

		function badge_m()
		{
			if($this->ss->type)
			{
				$this->db->where(['NotifStatus'=>0,'StudentId'=>$this->ss->id]);
			}
			else
			{
				$this->db->where(['NotifStatus'=>0,'TutorId'=>$this->ss->id]);
			}

			return $this->db->select('*')
							->from('tblnotification')
							->get()
							->result();
		}
	}
?>