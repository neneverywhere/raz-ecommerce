<?php
	class m_cart extends CI_model{
		function __construct(){        
		parent::__construct();
		$this->load->library('Session');
		$this->load->database();
		}  //function construct

		public function ProductName($id){
			$sql="SELECT Product_Name FROM product WHERE Product_ID=$id";
			$query = $this->db->query($sql);
			$row = $query->row();
			return $row->Product_Name;
		}

		public function ProductPrice($id){
			$sql="SELECT Product_Price FROM product WHERE Product_ID=$id";
			$query = $this->db->query($sql);
			$row = $query->row();
			return $row->Product_Price;
		}

		public function ProductImage($id){
			$sql="SELECT Product_Image FROM product WHERE Product_ID=$id";
			$query = $this->db->query($sql);
			$row = $query->row();
			return $row->Product_Image;
		}

	}
?>