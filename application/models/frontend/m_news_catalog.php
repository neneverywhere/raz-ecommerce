<?php
	class m_news_catalog extends CI_model{
		function __construct(){        
		parent::__construct();
		$this->load->library('Session');
		$this->load->database();
		}  //function construct

		public function CNews($params){
			$sql="SELECT * FROM news WHERE News_Catalog_ID IN (SELECT News_Catalog_ID FROM news_catalog WHERE News_Catalog_Alias='$params')";
			$query = $this->db->query($sql);
			return $query->num_rows();
		}

		public function ListNews($params,$offset,$perpage){
			$sql="SELECT * FROM news WHERE News_Catalog_ID IN (SELECT News_Catalog_ID FROM news_catalog WHERE News_Catalog_Alias='$params')
				  AND News_Status=1 ORDER BY News_Date DESC LIMIT $offset,$perpage";
			$query = $this->db->query($sql);
			$query = $query->result_array();
			foreach ($query as &$key) {
				$key['News_Link'] = base_url().$this->GetLink($key['News_Catalog_ID']).'/'.$key['News_Alias'].'.html';
				$key['News_Des'] = $this->CutArray($key['News_Des'],1000);
			}
			return $query;
		}

		public function Title($params){
			$sql = "SELECT News_Catalog_Title FROM news_catalog WHERE News_Catalog_Alias='$params'";
			$query = $this->db->query($sql);
			$row = $query->row();
			return $row->News_Catalog_Title;
		}

		public function Keyword($params){
			$sql = "SELECT News_Catalog_Keyword FROM news_catalog WHERE News_Catalog_Alias='$params'";
			$query = $this->db->query($sql);
			$row = $query->row();
			return $row->News_Catalog_Keyword;
		}

		public function Description($params){
			$sql = "SELECT News_Catalog_Description FROM news_catalog WHERE News_Catalog_Alias='$params'";
			$query = $this->db->query($sql);
			$row = $query->row();
			return $row->News_Catalog_Description;
		}


		public function Webcrumb(){
			$webcrumb = $this->uri->segment_array();
			$webcrumb = array(
			"1" => array(
				'name' => $this->GetNameCatalog($this->uri->segment(2)),
				'link' => base_url().$this->uri->segment(1).'/'.$this->uri->segment(2),
			));
			return $webcrumb;
		}

		public function GetNameCatalog($params){
			$sql="SELECT News_Catalog_Name FROM news_catalog WHERE News_Catalog_Alias='$params'";
			$query = $this->db->query($sql);
			$row = $query ->row();
			return $row->News_Catalog_Name;
		}

		public function GetLink($id){
			$sql = "SELECT News_Catalog_Link FROM news_catalog WHERE News_Catalog_ID=$id";
			$query = $this->db->query($sql);
			$row = $query->row();
			return $row->News_Catalog_Link;
		}

		public function sidebar($params){
			$sidebar = array();
			$sql = "SELECT * FROM news WHERE News_Status=1 AND News_Catalog_ID IN (SELECT News_Catalog_ID FROM news_catalog WHERE News_Catalog_Alias='$params') ORDER BY News_Date DESC LIMIT 10";
			$query = $this->db->query($sql);
			$query = $query->result_array();
			foreach ($query as &$key) {
				$key['News_Link'] = base_url().$this->GetLink($key['News_Catalog_ID']).'/'.$key['News_Alias'].'.html';
			}
			$sidebar['news'] = $query;

			$sql = "SELECT * FROM news_catalog WHERE News_Catalog_Status=1 ORDER BY News_Catalog_Order";
			$query = $this->db->query($sql);
			$query = $query->result_array();
			foreach ($query as &$key) {
				$key['News_Catalog_Link'] = base_url().$key['News_Catalog_Link'];
			}
			$sidebar['catalog'] = $query;

			return $sidebar;
		}
	}
?>