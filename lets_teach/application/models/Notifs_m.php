	<?php
	defined('BASEPATH') or exit('Error');

	class Notifs_m extends CI_Model
	{
		
		function __construct()
		{
			parent::__construct();
		}

		function get_notif()
		{
			if($this->ss->type)
			{
				$data=$this->db->where(['n.StudentId'=>$this->ss->id,'n.UserType'=>1])
						->select('*')
						->order_by('n.NotifCreatedDate','desc')
						->from('tblnotification n')
						->join('tbltutor t','n.TutorId=t.TutorId')
						->get()
						->result();
			}
			else
			{
				$data=$this->db->where(['n.TutorId'=>$this->ss->id,'n.UserType'=>0])
						->select('*')
						->order_by('n.NotifCreatedDate','desc')
						->from('tblnotification n')
						->join('tblstudent s','n.StudentId=s.StudentId')
						->get()
						->result();
			}

			return $data;
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

		function update_notif_m()
		{
			if($this->ss->type)
			{
				$this->db->where(['StudentId'=>$this->ss->id]);
			}
			else
			{
				$this->db->where(['TutorId'=>$this->ss->id]);
			}

			return $this->db->set('NotifStatus',1)
							->update('tblnotification');
		}
	}
?>