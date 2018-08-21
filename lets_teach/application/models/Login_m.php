<?php
	defined('BASEPATH') or exit('Error');

	class Login_m extends CI_Model
	{
		
		function __construct()
		{
			parent::__construct();
		}

		function do_login_m($ud)
		{
			$a=$this->db->where($ud)
			->get('tbluser')
			->result();

			return $a;
		}
	}
?>