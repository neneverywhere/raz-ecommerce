<?php
	class m_home extends CI_model{
		function __construct(){        
		parent::__construct();
		$this->load->library('Session');
		$this->load->database();
		}  //function construct

		public function slider(){
			$sql = "SELECT * FROM slider WHERE Slider_Status=1 ORDER BY Slider_Order";
			$query = $this->db->query($sql);
			return $query->result_array();
		}

		public function Catalog(){
			$sql = "SELECT * FROM product_catalog WHERE Product_Catalog_Status=1 AND Product_Catalog_Hot=1  ORDER BY Product_Catalog_Order";
			$query = $this->db->query($sql);
			return $query->result_array();
		}

		public function Title(){
			$sql = "SELECT Title FROM config";
			$query = $this->db->query($sql);
			$row = $query->row();
			return $row->Title;
		}

		public function Keyword(){
			$sql = "SELECT Keyword FROM config";
			$query = $this->db->query($sql);
			$row = $query->row();
			return $row->Keyword;
		}

		public function Description(){
			$sql = "SELECT Description FROM config";
			$query = $this->db->query($sql);
			$row = $query->row();
			return $row->Description;
		}

	}
?>