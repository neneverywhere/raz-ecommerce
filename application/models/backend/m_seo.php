<?php
	class m_seo extends CI_model{
		function __construct(){        
		parent::__construct();
		$this->load->library('Session');
		$this->load->database();
		}  //function construct 

		public function ListCode(){
			$sql = "SELECT Code_Header, Code_Tracking FROM config";
			$query = $this->db->query($sql);
			return $query->row_array();
		}

		public function UpdateCode(){
			$CodeHead = addslashes(trim($this->input->post('codeheader')));
			$CodeTrack = addslashes(trim($this->input->post('codetracking')));

			$sql="UPDATE config SET Code_Header = '$CodeHead', Code_Tracking = '$CodeTrack'";
			$this->db->query($sql);
		}

	}
?>