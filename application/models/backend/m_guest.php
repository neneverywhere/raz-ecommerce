<?php
	class m_guest extends CI_model{
		function __construct(){        
		parent::__construct();
		$this->load->library('Session');
		$this->load->database();
		}  //function construct 

		public function CGuest(){
			$query = $this->db->count_all_results('guest');
			return $query;
		}

		public function ListGuestInfo($offset,$perpage){
			$sql = "SELECT * FROM guest ORDER BY Guest_Date_Submit DESC LIMIT $offset,$perpage";
			$query = $this->db->query($sql);
			return $query ->result_array();
		}

		public function DeleteGuest($params){
			settype($params,"int");
			$sql="DELETE FROM guest WHERE Guest_ID = $params";
			$this->db->query($sql);
		}
	}
?>