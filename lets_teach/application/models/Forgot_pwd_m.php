<?php
	defined('BASEPATH') or exit('Error');

	class Forgot_pwd_m extends CI_Model
	{
		
		function __construct()
		{
			parent::__construct();

			$config = Array(
			  'protocol' => 'smtp',
			  'smtp_host' => 'smtp.gmail.com',
			  'smtp_port' => 465,
			  'smtp_crypto' => 'ssl',
			  'smtp_user' => 'khushbootolat6@gmail.com', // change it to yours
			  'smtp_pass' => 'JackTITANICDawson@1120', // change it to yours
			  'mailtype' => 'html',
			  'charset' => 'iso-8859-1',
			  'wordwrap' => TRUE
			);

			$this->load->library('email', $config);
		}

		function ForgotPassword($email)
		{
			$type=$this->db->select('*')
							->from('tbluser')
							->where($email)
							->get()
							->result();

			if(!empty($type))
			{
				if($type[0]->UserType)
				{
					$query['type']=$type[0]->UserType;

					$query['email']=$this->db->select('EmailId,UserId')
								->from('tblstudent')
								->where(['UserId'=>$type[0]->UserId])
								->get()
								->result();

					return $query;
				}
				else
				{
					$query['type']=$type[0]->UserType;

					$query['email']=$this->db->select('EmailId,UserId')
								->from('tbltutor')
								->where(['UserId'=>$type[0]->UserId])
								->get()
								->result();
					return $query;
				}
			}		    
		}

		function sendpassword($data)
		{
			$type=$data['type'];
		    $email = $data['email'][0]->EmailId;
		    $uid=$data['email'][0]->UserId;

		    $query=$this->db->select('*')
		    				->from('tbluser')
		    				->where(['UserId'=>$uid])
		    				->get()
		    				->result();

		    /*echo "<pre>";
		    print_r($query);
		    die();*/

		    if (count($query)>0)
			{
		        $passwordplain = "";
		        $passwordplain  = rand(99999,999999);
		        $newpass = md5($passwordplain);
		        
		        $this->db->set('Password', $newpass);
		        $this->db->where('UserId', $uid);
		        $this->db->update('tbluser');

		        $mail_message='Dear '.$query[0]->UserName.','. "\r\n";
		        $mail_message.='Thanks for contacting regarding to forgot password,<br> Your <b>Password</b> is <b>'.$passwordplain.'</b>'."\r\n";
		        $mail_message.='<br>Please Update your password.';
		        $mail_message.='<br>Thanks & Regards';
		        $mail_message.='<br>Your company name';
		        require 'PHPMailerAutoload.php';
		        require 'class.phpmailer.php';
		        $mail = new PHPMailer;
		        $mail->IsSendmail();
		        $mail->isSMTP();
		        $mail->SMTPAuth = true;
		        $mail->Host = "hostname";
		        $subject = 'Testing Email';
		        $mail->AddAddress($email);
		        $mail->IsMail();
		        $mail->From = 'admin@***.com';
		        $mail->FromName = 'admin';
		        $mail->IsHTML(true);
		        $mail->Subject = $subject;
		        $mail->Body    = $mail_message;
		        $mail->Send();
		        if (!$mail->send()) {

		            echo "<script>alert('msg','Failed to send password, please try again!')</script>";
		        } else {

		            echo "<script>alert('msg','Password sent to your email!')</script>";
		        }
		        redirect('Login');
		    }
		    else
		    {

		        echo "<script>alert('msg','Email not found try again!')</script>";
		        redirect('Login');
		    }
		}
	}
?>