<?php
	class m_counter extends CI_model{
		function __construct(){        
		parent::__construct();
		$this->load->library('Session');
		$this->load->database();
		}  //function construct 

		public function CCounter(){
			$query = $this->db->count_all_results('counter');
			return $query;
		}

		public function CountVisited($offset,$perpage){
			$sql="SELECT * FROM counter ORDER BY Counter_Date DESC LIMIT $offset,$perpage";
			$query = $this->db->query($sql);
			return $query ->result_array();
		}

		public function CountOnline(){
			$tg = time();
			$tgnew = $tg - 300;
			$sql="SELECT * FROM counter WHERE Counter_Time>=$tgnew ORDER BY Counter_Date";
			$query = $this->db->query($sql);
			$query = $query->result_array();
			return $query;
		}
	}
?>