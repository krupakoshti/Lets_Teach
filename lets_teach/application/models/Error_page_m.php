<?php
	defined('BASEPATH') or exit('Error');

	class Error_page_m extends CI_Model
	{
		
		function __construct()
		{
			parent::__construct();
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