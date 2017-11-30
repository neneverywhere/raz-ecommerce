<?php
	class m_gallery extends CI_model{
		function __construct(){        
		parent::__construct();
		$this->load->library('Session');
		$this->load->database();
		}  //function construct

		public function CGallery(){
			$query = $this->db->count_all_results('gallery');
			return $query;
		}

		public function ListGallery($offset,$perpage){
			$sql = "SELECT * FROM gallery ORDER BY Gallery_Date DESC LIMIT $offset,$perpage";
			$query = $this->db->query($sql);
			return $query->result_array();
		}

		public function AddGallery(){
			if (isset($_POST["item"]) && array_filter($_POST["item"])!=array()){ // Kiểm tra input ko rỗng
			$gallery_array = array_filter($_POST["item"]); // Lấy dãy gallery
			$gallery_array = implode($gallery_array, ',');}; // implode thành chuỗi cắt nhau bởi dấu ","

			$Name = $this->input->post('name');
			$Alias = ($this->m_gallery->changeTitle($Name));
			$Link = 'gallery/'.($this->m_gallery->changeTitle($Name));
			$Image = $this->input->post('image');
			$Status = $this->input->post('status');
			$Des = $this->input->post('des');
			date_default_timezone_set('Asia/Ho_Chi_Minh');
			$Date = date('Y-m-d H:i:s');

			$sql = "INSERT INTO gallery (Gallery_Name,Gallery_Image,Gallery_Alias,Gallery_Link,Gallery_Des,Gallery_Status,													Gallery_Date,Gallery_Content) 
					VALUES ('$Name','$Image','$Alias','$Link','$Des',$Status,'$Date','$gallery_array')";
			$this->db->query($sql);
		}

		public function DeleteGallery($params){
			settype($params, 'int');
			$sql="DELETE FROM gallery WHERE Gallery_ID = $params";
			$this->db->query($sql);
		}

		public function DetailGallery($params){
			settype($params, 'int');
			$sql="SELECT * FROM gallery WHERE Gallery_ID = $params";
			$query = $this->db->query($sql);
			return $query ->row_array();
		}

		public function UpdateGallery($params){
			settype($params,'int');
			if (isset($_POST["item"]) && array_filter($_POST["item"])!=array()){ // Kiểm tra input ko rỗng
			$gallery_array = array_filter($_POST["item"]); // Lấy dãy gallery
			$gallery_array = implode($gallery_array, ',');}; // implode thành chuỗi cắt nhau bởi dấu ","

			$Name = $this->input->post('name');
			$Alias = ($this->m_gallery->changeTitle($Name));
			$Link = 'gallery/'.($this->m_gallery->changeTitle($Name));
			$Image = $this->input->post('image');
			$Status = $this->input->post('status');
			$Des = $this->input->post('des');
			date_default_timezone_set('Asia/Ho_Chi_Minh');
			$Date = date('Y-m-d H:i:s');

			$sql = "UPDATE gallery SET Gallery_Name='$Name',Gallery_Image='$Image',Gallery_Alias='$Alias',Gallery_Link='$Link',
									   Gallery_Des='$Des',Gallery_Status=$Status,Gallery_Date='$Date',Gallery_Content='$gallery_array'
								   WHERE Gallery_ID=$params";
			$this->db->query($sql);
		}
	}
?>