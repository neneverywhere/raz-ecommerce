<?php
	class m_news extends CI_model{
		function __construct(){        
		parent::__construct();
		$this->load->library('Session');
		$this->load->database();
		}  //function construct

		public function DetailNews($params){
			$params = trim($params);
			$sql="SELECT * FROM news WHERE News_Alias='$params' AND News_Status=1";
			$query = $this->db->query($sql);
			return $query ->row_array();
		}

		public function CheckLink($cal){ // Hàm kiểm tra Catalog
			$sql="SELECT * FROM news_catalog WHERE News_Catalog_Alias='$cal'";
			$query = $this->db->query($sql);
			$query = $query->num_rows();
			if($query>0) return true;
			else return false;
		}

		public function GetCal($params){ // Hàm lấy Catalog Alias
			$sql="SELECT News_Catalog_Alias FROM news_catalog WHERE News_Catalog_ID 
				  IN (SELECT News_Catalog_ID FROM news WHERE News_Alias='$params')";
			$query = $this->db->query($sql);
			$row = $query->row();
			return $row->News_Catalog_Alias;
		}



		public function Title($params){
			$sql="SELECT News_Title FROM news WHERE News_Alias='$params'";
			$query = $this->db->query($sql);
			$row = $query ->row();
			return $row->News_Title;
		}

		public function Keyword($params){
			$sql="SELECT News_Keyword FROM news WHERE News_Alias='$params'";
			$query = $this->db->query($sql);
			$row = $query ->row();
			return $row->News_Keyword;
		}

		public function Description($params){
			$sql="SELECT News_Description FROM news WHERE News_Alias='$params'";
			$query = $this->db->query($sql);
			$row = $query ->row();
			return $row->News_Description;
		}

		public function Webcrumb(){
			$webcrumb = $this->uri->segment_array();
			$webcrumb = array(
			"1" => array(
				'name' => $this->GetNameCatalog($this->uri->segment(2)),
				'link' => base_url().$this->uri->segment(1).'/'.$this->uri->segment(2),
			),
			/*"2" => array(
				'name' => $this->GetName($this->uri->segment(3)),
				'link' => base_url().$this->uri->segment(1).'/'.$this->uri->segment(2).'/'.$this->uri->segment(3),
			),*/
			);
			return $webcrumb;
		}

		public function GetNameCatalog($params){
			$sql="SELECT News_Catalog_Name FROM news_catalog WHERE News_Catalog_Alias='$params'";
			$query = $this->db->query($sql);
			$row = $query ->row();
			return $row->News_Catalog_Name;
		}

		public function GetName($params){
			$params = explode('.', $params);
			$params = $params[0];
			$sql="SELECT News_Name FROM news WHERE News_Alias='$params'";
			$query = $this->db->query($sql);
			$row = $query ->row();
			return $row->News_Name;
		}

		public function GetLink($id){
			$sql = "SELECT News_Catalog_Link FROM news_catalog WHERE News_Catalog_ID=$id";
			$query = $this->db->query($sql);
			$row = $query->row();
			return $row->News_Catalog_Link;
		}

		public function SimilarNews($params){
			$sql = "SELECT * FROM news WHERE News_Catalog_ID 
					IN(SELECT News_Catalog_ID FROM news WHERE News_Alias = '$params') 
					ORDER BY News_Date DESC";
			$query = $this->db->query($sql);
			return $query ->result_array();
		}

	}
?>