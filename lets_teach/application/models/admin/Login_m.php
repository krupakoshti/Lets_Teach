<?php
	defined('BASEPATH') or exit('Error');

	class Login_m extends CI_Model
	{
		
		function __construct()
		{
			parent::__construct();
		}

		function do_login_m($ad)
		{
			$a=$this->db->where($ad)
			->get('tbladmin')
			->result();

			return $a;
		}
	}
?>