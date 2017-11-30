<?php
	class m_bill extends CI_model{
		function __construct(){        
		parent::__construct();
		$this->load->library('Session');
		$this->load->database();
		}  //function construct 

		public function CBill(){
			$query = $this->db->count_all_results('bill');
			return $query;
		}

		public function ListBill($offset,$perpage){
			$sql = "SELECT * FROM bill ORDER BY Bill_Date_Book DESC LIMIT $offset,$perpage";
			$query = $this->db->query($sql);
			return $query ->result_array();
		}

		public function ListBillDetail($params){
			$sql = "SELECT * FROM bill_detail WHERE Bill_ID=$params";
			$query = $this->db->query($sql);
			return $query ->result_array();
		}

		public function DeleteBill($params){
			settype($params,"int");
			$sql="DELETE FROM bill WHERE Bill_ID = $params";
			$this->db->query($sql);
		}
	}
?>