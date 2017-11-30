<?php
	class m_search extends CI_model{
		function __construct(){        
		parent::__construct();
		$this->load->library('Session');
		$this->load->database();
		}  //function construct

		public function Search(){
			$key =  $this->input->post('key');
			$sql = "SELECT * FROM product WHERE Product_Name LIKE '%$key%'";
			$query = $this->db->query($sql);
			return $query ->result_array();
		}

		public function GetLinkCatalog($id){
			$sql="SELECT Product_Catalog_Link FROM product_catalog WHERE Product_Catalog_ID='$id'";
			$query = $this->db->query($sql);
			$row = $query ->row();
			return $row->Product_Catalog_Link;
		}

	}
?>