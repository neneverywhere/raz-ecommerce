<?php
	class m_slideshow extends CI_model{
		function __construct(){        
		parent::__construct();
		$this->load->library('Session');
		$this->load->database();
		}  //function construct

		public function ListSlideshow(){
			$sql = "SELECT * FROM slider ORDER BY Slider_Order ASC , Slider_Date DESC";
			$query = $this->db->query($sql);
			return $query->result_array();
		}

		public function AddSlideshow(){
			// Tiếp nhận dữ liệu
			$Name = $this->input->post('name');
			$Order = $this->input->post('order');
			$Status = $this->input->post('status');
			if(empty($this->input->post('link'))) {
				$Link = '#!';
			}else $Link = $this->input->post('link');
			$Image = $this->input->post('image');
			$Caption = $this->input->post('caption');
			$Date = date('Y-m-d');

			////Kiểm tra dữ liệu
			settype($Order,"int");
			settype($Status,"int");
			$Name = trim(strip_tags($Name));
			$Link = trim(strip_tags($Link));

			//Chèn dữ liệu vào database
			$sql="INSERT INTO slider (Slider_Name,Slider_Image,Slider_Link,Slider_Status,Slider_Order,Slider_Caption,Slider_Date) 
				VALUES ('$Name','$Image','$Link',$Status,$Order,'$Caption','$Date')";
			$this->db->query($sql);
		}

		public function DeleteSlideshow($params){
			settype($params,"int");
			$sql="DELETE FROM slider WHERE Slider_ID=$params";
			$this->db->query($sql);
		}

		public function DetailSlideshow($params){
			settype($params,'int');
			$sql="SELECT * FROM slider WHERE Slider_ID = $params";
			$query = $this->db->query($sql);
			return $query->row_array();
		}

		public function EditSlideshow($params){
			// Tiếp nhận dữ liệu
			$Name = $this->input->post('name');
			$Order = $this->input->post('order');
			$Status = $this->input->post('status');
			if(empty($this->input->post('link'))) {
				$Link = '#!';
			}else $Link = $this->input->post('link');
			$Image = $this->input->post('image');
			$Caption = $this->input->post('caption');
			$Date = date('Y-m-d');

			////Kiểm tra dữ liệu
			settype($Order,"int");
			settype($Status,"int");
			settype($params,"int");
			$Name = trim(strip_tags($Name));
			$Link = trim(strip_tags($Link));

			//Chèn dữ liệu vào database
			$sql = "UPDATE slider SET Slider_Name='$Name', Slider_Image='$Image', Slider_Link='$Link', Slider_Status=$Status,
									  Slider_Order=$Order, Slider_Caption='aaaaaaa', Slider_Date='$Date' WHERE Slider_ID = $params"; 
			$this->db->query($sql);
		}
	}
?>