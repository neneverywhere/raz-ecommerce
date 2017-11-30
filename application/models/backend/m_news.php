<?php
	class m_news extends CI_model{
		function __construct(){        
		parent::__construct();
		$this->load->library('Session');
		$this->load->database();
		}  //function construct 

		// Hàm tính tổng record để phân trang
		public function countnews(){
        	$sql = "SELECT COUNT(*) FROM news";
        	$query = $this->db->query($sql);
        	return $query;
		}

		public function ListNewsCatalog(){
			$sql="SELECT * FROM news_catalog ORDER BY News_Catalog_Order";
			$query = $this->db->query($sql);
			return $query ->result_array();
		}

		// Đếm số record trong news để phân trang
		public function CNews(){
			$sql="SELECT * FROM news";
			$query = $this->db->query($sql);
			return $query ->result_array();
		}

		public function ListNews($offset,$perpage){
			$sql="SELECT * FROM news ORDER BY News_Date DESC LIMIT $offset,$perpage";
			$query = $this->db->query($sql);
			return $query ->result_array();
		}

		public function GetNameCatalog($params){
			$sql="SELECT News_Catalog_Name FROM news_catalog WHERE News_Catalog_ID=$params";
			$query = $this->db->query($sql);
			$row = $query ->row();
			if($row!=array()) return $row->News_Catalog_Name;
			else return '';
		}

		public function GetLinkCatalog($params){
			$sql="SELECT News_Catalog_Link FROM news_catalog WHERE News_Catalog_ID=$params";
			$query = $this->db->query($sql);
			$row = $query ->row();
			if($row!=array()) return $row->News_Catalog_Link;
			else return '';
		}

		public function AddNews(){
			//Tiếp nhận dữ liệu
			$IDCat = $this->input->post('parent');
			$Name = $this->input->post('name');
			$Alias = ($this->changeTitle($Name));
			$Image = $this->input->post('image');
			$Status = $this->input->post('status');
			$Hot = $this->input->post('hot');
			$Des = $this->input->post('des');
			$Content = $this->input->post('content');
			date_default_timezone_set('Asia/Ho_Chi_Minh');
			$Date = date('Y-m-d H:i:s');

			if(empty($this->input->post('title'))) {
				$Title = $Name;
			}else $Title = $this->input->post('title');

			$Keyword = $this->input->post('keyword');
			$Description = $this->input->post('description');

			// Kiểm tra dữ liệu
			settype($Status, 'int');
			settype($Hot, 'int');
			$Name = trim(strip_tags($Name));

			// Thêm dữ liệu
			$sql = "INSERT INTO news (News_Name, News_Catalog_ID, News_Alias, News_Image, News_Des, News_Content, News_Hot, News_Status, News_Date, News_Title, News_Keyword, News_Description)
					VALUES ('$Name', $IDCat, '$Alias', '$Image', '$Des', '$Content', $Hot, $Status, '$Date', '$Title',
							 '$Keyword', '$Description')";
			$this->db->query($sql);
		}

		public function DetailNews($params){
			$sql="SELECT * FROM news WHERE News_ID = $params";
			$query = $this->db->query($sql);
			return $query->row_array();
		}

		public function EditNews($param){
			//Tiếp nhận dữ liệu
			$IDCat = $this->input->post('parent');
			$Name = $this->input->post('name');
			$Alias = ($this->changeTitle($Name));
			$Image = $this->input->post('image');
			$Status = $this->input->post('status');
			$Hot = $this->input->post('hot');
			$Des = $this->input->post('des');
			$Content = $this->input->post('content');
			date_default_timezone_set('Asia/Ho_Chi_Minh');
			$Date = date('Y-m-d H:i:s');

			if(empty($this->input->post('title'))) {
				$Title = $Name;
			}else $Title = $this->input->post('title');

			$Keyword = $this->input->post('keyword');
			$Description = $this->input->post('description');

			// Kiểm tra dữ liệu
			settype($Status, 'int');
			settype($Hot, 'int');
			$Name = trim(strip_tags($Name));

			// Update dữ liệu
			$sql= "UPDATE news SET  News_Name = '$Name', News_Alias = '$Alias', News_Image = '$Image',
									News_Des = '$Des', News_Content = '$Content', News_Hot = $Hot,
									News_Status = $Status, News_Date = '$Date',
									News_Title = '$Title', News_Keyword = '$Keyword', News_Description = '$Description',
									News_Catalog_ID = $IDCat
					WHERE News_ID = $param";
			$this->db->query($sql);
		}

		public function DeleteNews($params){
			settype($params,"int");
			$sql="DELETE FROM news WHERE News_ID = $params";
			$this->db->query($sql);
		}
	}
?>