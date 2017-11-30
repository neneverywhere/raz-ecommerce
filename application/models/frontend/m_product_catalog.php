<?php
	class m_product_catalog extends CI_model{
		function __construct(){        
		parent::__construct();
		$this->load->library('Session');
		$this->load->database();
		}  //function construct

		public function CProduct($params){
			$sql="SELECT * FROM product WHERE Product_Catalog_ID IN (SELECT Product_Catalog_ID FROM product_catalog WHERE Product_Catalog_Alias='$params')";
			$query = $this->db->query($sql);
			return $query->num_rows();
		}

		public function Check($params){
			settype($params, 'int');{
			$sql = "SELECT * FROM product_catalog WHERE Product_Catalog_Status=1 AND Product_Catalog_ID_Parent=$params 
					ORDER BY Product_Catalog_Order";
			$query = $this->db->query($sql);
			$query = $query->result_array();
			if (count($query) > 0) return true;
			else return false;
			}
		}


		public function ListProduct($params,$offset,$perpage){
			$id = $this->GetIDCatalog($params);
			$check = $this->Check($id);

			if($check==false){
				$sql="SELECT * FROM product WHERE Product_Catalog_ID=$id
					  AND Product_Status=1 ORDER BY Product_Date DESC LIMIT $offset,$perpage";
				$query = $this->db->query($sql);
				$query = $query ->result_array();
				foreach ($query as &$key) {
					$key['Product_Link'] = base_url().$this->GetLinkCatalog($key['Product_Catalog_ID']).'/'.$key['Product_Alias'].'.html';
				}
				return $query;
			}else{
				$sql="SELECT * FROM product WHERE Product_Catalog_ID IN (SELECT Product_Catalog_ID FROM product_catalog WHERE Product_Catalog_ID_Parent=$id AND Product_Catalog_Status=1) AND Product_Status=1 ORDER BY Product_Date DESC LIMIT $offset,$perpage";
				$query = $this->db->query($sql);
				$query = $query ->result_array();
				foreach ($query as &$key) {
					$key['Product_Link'] = base_url().$this->GetLinkCatalog($key['Product_Catalog_ID']).'/'.$key['Product_Alias'].'.html';
				}
				return $query;
			}

		}

		public function Des($params){
			$sql = "SELECT Product_Catalog_Des FROM product_catalog WHERE Product_Catalog_Alias='$params'";
			$query = $this->db->query($sql);
			$row = $query->row();
			return $row->Product_Catalog_Des;
		}

		public function Title($params){
			$sql = "SELECT Product_Catalog_Title FROM product_catalog WHERE Product_Catalog_Alias='$params'";
			$query = $this->db->query($sql);
			$row = $query->row();
			return $row->Product_Catalog_Title;
		}

		public function Keyword($params){
			$sql = "SELECT Product_Catalog_Keyword FROM product_catalog WHERE Product_Catalog_Alias='$params'";
			$query = $this->db->query($sql);
			$row = $query->row();
			return $row->Product_Catalog_Keyword;
		}

		public function Description($params){
			$sql = "SELECT Product_Catalog_Description FROM product_catalog WHERE Product_Catalog_Alias='$params'";
			$query = $this->db->query($sql);
			$row = $query->row();
			return $row->Product_Catalog_Description;
		}

		public function sidebar(){
			$sql="SELECT *  FROM product_catalog WHERE Product_Catalog_ID_Parent=0 AND Product_Catalog_Status=1 ORDER BY Product_Catalog_Order";
			$query = $this->db->query($sql);
			$query = $query->result_array();
			$catalog = array();
			$catalog = $query;
			foreach ($catalog as &$key) {
				$params = $key['Product_Catalog_ID'];
				$sql="SELECT *  FROM product_catalog WHERE Product_Catalog_ID_Parent=$params AND Product_Catalog_Status=1 ORDER BY Product_Catalog_Order";
				$query = $this->db->query($sql);
				$query = $query->result_array();
				$key['child'] = $query;
			}
			return $catalog;
		}

		public function Webcrumb(){
			$webcrumb = array(
			"1" => array(
				'name' => $this->GetNameCatalog($this->uri->segment(2)),
				'link' => base_url().$this->uri->segment(1).'/'.$this->uri->segment(2),
			));
			return $webcrumb;
		}

		public function GetNameCatalog($params){
			$sql="SELECT Product_Catalog_Name FROM product_catalog WHERE Product_Catalog_Alias='$params'";
			$query = $this->db->query($sql);
			$row = $query ->row();
			return $row->Product_Catalog_Name;
		}

		public function GetIDCatalog($params){
			$sql="SELECT Product_Catalog_ID FROM product_catalog WHERE Product_Catalog_Alias='$params'";
			$query = $this->db->query($sql);
			$row = $query ->row();
			return $row->Product_Catalog_ID;
		}

		public function GetLinkCatalog($id){
			$sql="SELECT Product_Catalog_Link FROM product_catalog WHERE Product_Catalog_ID='$id'";
			$query = $this->db->query($sql);
			$row = $query ->row();
			return $row->Product_Catalog_Link;
		}

	}
?>