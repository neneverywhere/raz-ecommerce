<?php
	class m_product extends CI_model{
		function __construct(){        
		parent::__construct();
		$this->load->library('Session');
		$this->load->database();
		}  //function construct

		public function CheckLink($cal){
			$sql="SELECT * FROM product_catalog WHERE Product_Catalog_Alias='$cal'";
			$query = $this->db->query($sql);
			$query = $query->num_rows();
			if($query>0) return true;
			else return false;
		}

		public function GetCal($params){
			$sql="SELECT Product_Catalog_Alias FROM product_catalog WHERE Product_Catalog_ID 
				  IN (SELECT Product_Catalog_ID FROM product WHERE Product_Alias='$params')";
			$query = $this->db->query($sql);
			$row = $query->row();
			return $row->Product_Catalog_Alias;
		}

		public function DetailProduct($params){
			$params = trim($params);
			$sql="SELECT * FROM product WHERE Product_Alias='$params'";
			$query = $this->db->query($sql);
			return $query ->row_array();
		}

		public function Title($params){
			$sql = "SELECT Product_Title FROM product WHERE Product_Alias='$params'";
			$query = $this->db->query($sql);
			$row = $query->row();
			return $row->Product_Title;
		}

		public function Keyword($params){
			$sql = "SELECT Product_Keyword FROM product WHERE Product_Alias='$params'";
			$query = $this->db->query($sql);
			$row = $query->row();
			return $row->Product_Keyword;
		}

		public function Description($params){
			$sql = "SELECT Product_Description FROM product WHERE Product_Alias='$params'";
			$query = $this->db->query($sql);
			$row = $query->row();
			return $row->Product_Description;
		}

		public function SimilarProduct($params){
			$sql = "SELECT * FROM product WHERE Product_Catalog_ID
					IN(SELECT Product_Catalog_ID FROM product WHERE Product_Alias = '$params') 
					ORDER BY Product_Date DESC";
			$query = $this->db->query($sql);
			$query = $query->result_array();
			foreach ($query as &$key) {
				$key['Product_Link'] = base_url().$this->GetLinkCatalog($key['Product_Catalog_ID']).'/'.$key['Product_Alias'].'.html';
			}
			return $query;
		}

		public function Webcrumb(){
			$webcrumb = array(
			"1" => array(
				'name' => $this->GetNameCatalog($this->uri->segment(2)),
				'link' => base_url().$this->uri->segment(1).'/'.$this->uri->segment(2),
			),
			"2" => array(
				'name' => $this->GetName($this->uri->segment(3)),
				'link' => '',
			));
			return $webcrumb;
		}

		public function GetNameCatalog($params){
			$sql="SELECT Product_Catalog_Name FROM product_catalog WHERE Product_Catalog_Alias='$params'";
			$query = $this->db->query($sql);
			$row = $query ->row();
			return $row->Product_Catalog_Name;
		}

		public function GetName($params){
			$params = explode('.html', $params);
			$params = $params[0];

			$sql="SELECT Product_Name FROM product WHERE Product_Alias='$params'";
			$query = $this->db->query($sql);
			$row = $query ->row();
			return $row->Product_Name;
		}

		public function GetLinkCatalog($id){
			$sql="SELECT Product_Catalog_Link FROM product_catalog WHERE Product_Catalog_ID='$id'";
			$query = $this->db->query($sql);
			$row = $query ->row();
			return $row->Product_Catalog_Link;
		}
	}
?>