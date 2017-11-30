<?php
	class m_news_catalog extends CI_model{
		function __construct(){        
		parent::__construct();
		$this->load->library('Session');
		$this->load->database();
		}  //function construct 

		public function ListNewsCatalog(){
			$sql="SELECT * FROM news_catalog ORDER BY News_Catalog_Order";
			$query = $this->db->query($sql);
			return $query ->result_array();
		}

		public function DetailNewsCatalog($params){
			settype($params,'int');
			$sql="SELECT * FROM news_catalog WHERE News_Catalog_ID = $params";
			$query = $this->db->query($sql);
			return $query->row_array();
		}

		public function AddNewsCatalog(){
			//Tiếp nhận dữ liệu
			$Name = $this->input->post('name');
			$Des = $this->input->post('des');
			$Alias = $this->changeTitle($Name);
			$Order = $this->input->post('order');
			$Status = $this->input->post('status');
			$Hot = $this->input->post('hot');
			if(empty($this->input->post('link'))) {
				$Link = 'tin-tuc/'.($this->changeTitle($Name));
			}else $Link = 'tin-tuc/'.$this->input->post('link');

			if(empty($this->input->post('title'))) {
				$Title = $Name;
			}else $Title = $this->input->post('title');

			$Keyword = $this->input->post('keyword');
			$Description = $this->input->post('description');

			//Kiểm tra dữ liệu
			settype($Order,"int");
			settype($Status,"int");
			settype($Hot,"int");
			$Name = trim(strip_tags($Name));
			$Link = trim(strip_tags($Link));
			//Chèn dữ liệu vào database
			$sql="INSERT INTO news_catalog (News_Catalog_Name,News_Catalog_Des,News_Catalog_Alias,News_Catalog_Link, News_Catalog_Hot,
											News_Catalog_Order,News_Catalog_Status,News_Catalog_Title,News_Catalog_Keyword,News_Catalog_Description)
				VALUES ('$Name','$Des','$Alias','$Link',$Hot,$Order, $Status,'$Title','$Keyword','$Description')";
			$this->db->query($sql);
		}

		public function EditNewsCatalog($params){
			//Tiếp nhận dữ liệu
			$Name = $this->input->post('name');
			$Des = $this->input->post('des');
			$Alias = $this->changeTitle($Name);
			$Order = $this->input->post('order');
			$Status = $this->input->post('status');
			$Hot = $this->input->post('hot');
			if(empty($this->input->post('link'))) {
				$Link = 'tin-tuc/'.($this->changeTitle($Name));
			}else $Link = 'tin-tuc/'.$this->input->post('link');

			if(empty($this->input->post('title'))) {
				$Title = $Name;
			}else $Title = $this->input->post('title');

			$Keyword = $this->input->post('keyword');
			$Description = $this->input->post('description');

			//Kiểm tra dữ liệu
			settype($Order,"int");
			settype($Status,"int");
			settype($params,"int");
			settype($Hot,"int");
			$Name = trim(strip_tags($Name));
			$Link = trim(strip_tags($Link));
			//Chèn dữ liệu vào database
			$sql="UPDATE news_catalog SET News_Catalog_Name = '$Name',News_Catalog_Des = '$Des',News_Catalog_Alias = '$Alias',
										  News_Catalog_Link = '$Link',News_Catalog_Order = $Order,News_Catalog_Status = $Status,
										  News_Catalog_Title = '$Title', News_Catalog_Keyword = '$Keyword', News_Catalog_Description = '$Description',
										  News_Catalog_Hot = $Hot
						WHERE News_Catalog_ID = $params";
			$this->db->query($sql);
		}

		public function DeleteNewsCatalog($params){
			settype($params,"int");
			$sql="DELETE FROM news_catalog WHERE News_Catalog_ID=$params";
			$this->db->query($sql);
		}
	}
?>