<?php
	class m_filter extends CI_model{
		function __construct(){        
		parent::__construct();
		$this->load->library('Session');
		$this->load->database();
		}  //function construct 

		public function FillProduct(){
			$Name = $this->input->post('name');
			$Catalog = $this->input->post('catalog');
			$Hot = $this->input->post('hot');
			$Status = $this->input->post('status');

			if($Catalog!='') {$wh = "Product_Catalog_ID=$Catalog";}else $wh = "Product_Catalog_ID!=0";
			if($Hot!='') $wh .= " AND Product_Hot=$Hot";
			if($Status!='') $wh .= " AND Product_Status=$Status";
			if($Name!='') $wh .= " AND Product_Name LIKE '%$Name%'";

			$sql = "SELECT * FROM product WHERE $wh ORDER BY Product_Date DESC";
			$query = $this->db->query($sql);
			return $query ->result_array();
		}

		public function GetNameParent($id){
			settype($id, 'int');
			$sql = "SELECT Product_Catalog_Name FROM product_catalog WHERE Product_Catalog_ID = $id";
			$query = $this->db->query($sql);
			$row = $query ->row();
			if ($row!=array()) return $row->Product_Catalog_Name;
		}

		public function FillNews(){
			$Name = $this->input->post('name');
			$Catalog = $this->input->post('catalog');
			$Hot = $this->input->post('hot');
			$Status = $this->input->post('status');

			if($Catalog!='') {$wh = "News_Catalog_ID=$Catalog";}else $wh = "News_Catalog_ID!=0";
			if($Hot!='') $wh .= " AND News_Hot=$Hot";
			if($Status!='') $wh .= " AND News_Status=$Status";
			if($Name!='') $wh .= " AND News_Name LIKE '%$Name%'";

			$sql = "SELECT * FROM news WHERE $wh ORDER BY News_Date DESC";
			$query = $this->db->query($sql);
			return $query ->result_array();
		}

		public function GetNewsParent($id){
			settype($id, 'int');
			$sql = "SELECT News_Catalog_Name FROM news_catalog WHERE News_Catalog_ID = $id";
			$query = $this->db->query($sql);
			$row = $query ->row();
			if ($row!=array()) return $row->News_Catalog_Name;
		}

		public function FillProject(){
			$Name = $this->input->post('name');
			$Catalog = $this->input->post('catalog');
			$Hot = $this->input->post('hot');
			$Status = $this->input->post('status');

			if($Catalog!='') {$wh = "Project_Catalog_ID=$Catalog";}else $wh = "Project_Catalog_ID!=0";
			if($Hot!='') $wh .= " AND Project_Hot=$Hot";
			if($Status!='') $wh .= " AND Project_Status=$Status";
			if($Name!='') $wh .= " AND Project_Name LIKE '%$Name%'";

			$sql = "SELECT * FROM project WHERE $wh ORDER BY Project_Date DESC";
			$query = $this->db->query($sql);
			return $query ->result_array();
		}

		public function GetProjectParent($id){
			settype($id, 'int');
			$sql = "SELECT Project_Catalog_Name FROM project_catalog WHERE Project_Catalog_ID = $id";
			$query = $this->db->query($sql);
			$row = $query ->row();
			if ($row!=array()) return $row->Project_Catalog_Name;
		}

	}
?>