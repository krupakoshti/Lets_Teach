
<?php
defined('BASEPATH') or exit('Error');

class Ques_m extends CI_Model
{

	function __construct()
	{
		parent::__construct();
	}

	function get_data_m()
	{
		$data=$this->db
		->select('*')
		->from('tblformques q')
		->order_by('QuesCreatedDate','desc')
		->join('tblstudent s','q.StudentId=s.StudentId')
		->join('tbluser u','s.UserId=u.UserId')
		->join('tblsubject su','q.SubjectId=su.SubjectId')
		->get()
		->result();

		return $data;
	}
	
	function get_ques_m($cid)
	{
		$data=$this->db
		->select('*')
		->from('tblformques q')
		->join('tblstudent s','q.StudentId=s.StudentId')
		->join('tbluser u','s.UserId=u.UserId')
		->join('tblsubject su','q.SubjectId=su.SubjectId')
		->where(['q.QuesId'=>$cid])
		->get()
		->result();

		return $data;
	
	}

	function get_ans_m($cid)
	{	
		$data=$this->db
		->select('*')
		->from('tblformans a')
		->join('tbltutor t','a.TutorId=t.TutorId')
		->where(['a.QuesId'=>$cid])
		->get()
		->result();

		return $data;	
	}

	function get_id_m()
	{
		return $this->db
					->select('TutorId')
					->from('tbltutor')
					->where(['UserId'=>$this->ss->uid])
					->get()
					->result();
	}

	function add_ans_m($ans)
	{
		$this->db->insert('tblformans',$ans);
	}

	function get_subject_m($sid=FALSE)
	{
		return $this->db
		->order_by('SubjectName','asc')
		->from('tblsubject')
		->get()
		->result();
	}

	function add_ques_m($qd)
	{
		$this->db->insert('tblformques',$qd);
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

