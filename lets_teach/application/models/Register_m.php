<?php
	defined('BASEPATH') or exit('Error');

	class Register_m extends CI_Model
	{
		
		function __construct()
		{
			parent::__construct();
		}

		function get_state_m()
		{
			$st=$this->db->get('tblstate')
			->result();

			return $st;
		}

		function get_city_m($cid)
		{
			return $this->db->where($cid)
			->get('tblcity')
			->result();
		}

		function add_user_m($ud)
		{
			$this->db->insert('tbluser',$ud);
		}

		function add_tutor_m($td)
		{
			$this->db->insert('tbltutor',$td);
		}

		function add_student_m($sd)
		{
			$this->db->insert('tblstudent',$sd);
		}
	}
?>