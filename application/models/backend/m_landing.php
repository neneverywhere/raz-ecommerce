<?php
	class m_landing extends CI_model{
		function __construct(){        
		parent::__construct();
		$this->load->library('Session');
		$this->load->database();
		}  //function construct 

		public function ListLanding(){
			$sql="SELECT * FROM news_landing ORDER BY News_Landing_Type, News_Landing_Date DESC";
			$query = $this->db->query($sql);
			return $query ->result_array();
		}

		public function AddLanding(){
			//Tiếp nhận dữ liệu
			$Name = $this->input->post('name');
			$Alias = ($this->m_landing->changeTitle($Name));
			$Link = 'landing/'.($this->m_landing->changeTitle($Name)).'.html';
			$Image = $this->input->post('image');
			$Status = $this->input->post('status');
			$Des = $this->input->post('des');
			$Content = $this->input->post('content');
			date_default_timezone_set('Asia/Ho_Chi_Minh');
			$Type = $this->input->post('type');
			$Date = date('Y-m-d H:i:s');

			// Kiểm tra dữ liệu
			settype($Status, 'int');
			settype($Type, 'int');
			$Name = trim(strip_tags($Name));
			$Link = trim(strip_tags($Link));

			// Thêm dữ liệu
			$sql = "INSERT INTO news_landing (News_Landing_Name, News_Landing_Alias, News_Landing_Image, News_Landing_Link, News_Landing_Des, News_Landing_Content, News_Landing_Status, News_Landing_Type, News_Landing_Date)
					VALUES ('$Name', '$Alias', '$Image', '$Link', '$Des', '$Content', $Status, $Type, '$Date')";
			$this->db->query($sql);
		}

		public function DeleteLanding($params){
			settype($params,"int");
			$sql="DELETE FROM news_landing WHERE News_Landing_ID = $params";
			$this->db->query($sql);
		}

		public function DetailLanding($params){
			settype($params,"int");
			$sql="SELECT * FROM news_landing WHERE News_Landing_ID = $params";
			$query = $this->db->query($sql);
			return $query ->row_array();
		}

		public function UpdateLanding($params){
			//Tiếp nhận dữ liệu
			$Name = $this->input->post('name');
			$Alias = ($this->m_landing->changeTitle($Name));
			$Link = 'landing/'.($this->m_landing->changeTitle($Name)).'.html';
			$Image = $this->input->post('image');
			$Status = $this->input->post('status');
			$Des = $this->input->post('des');
			$Content = $this->input->post('content');
			date_default_timezone_set('Asia/Ho_Chi_Minh');
			$Type = $this->input->post('type');
			$Date = date('Y-m-d H:i:s');

			// Kiểm tra dữ liệu
			settype($Status, 'int');
			settype($Type, 'int');
			settype($params, 'int');
			$Name = trim(strip_tags($Name));
			$Link = trim(strip_tags($Link));

			// Thêm dữ liệu
			$sql = "UPDATE news_landing SET News_Landing_Name='$Name', News_Landing_Alias='$Alias', News_Landing_Image='$Image', 
											News_Landing_Link='$Link', News_Landing_Des='$Des', News_Landing_Content='$Content', 
											News_Landing_Status=$Status, News_Landing_Type=$Type, News_Landing_Date='$Date'
					WHERE News_Landing_ID=$params";
			$this->db->query($sql);
		}

	}


?>