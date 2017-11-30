<?php
	class m_footer extends CI_model{
		function __construct(){        
		parent::__construct();
		$this->load->database();
		}  //function construct 

		public function Footer(){
			$sql = "SELECT * FROM contact";
			$query = $this->db->query($sql);
			return $query->row_array();
		}

		public function FooterLogo(){
			$sql = "SELECT FLogo FROM config";
			$query = $this->db->query($sql);
			$row = $query->row();
			return $row->FLogo;
		}

		public function MenuFooter(){
			$sql = "SELECT * FROM menu WHERE Menu_Status = 1 AND Menu_Parent_ID = 15 ORDER BY Menu_Order";
			$query = $this->db->query($sql);
			return $query->result_array();
		}
	}
?>