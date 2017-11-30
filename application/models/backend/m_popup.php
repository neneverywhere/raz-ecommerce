<?php
	class m_popup extends CI_model{
		function __construct(){        
		parent::__construct();
		$this->load->library('Session');
		$this->load->database();
		}  //function construct

		public function ListPopup(){
			$sql = "SELECT * FROM popup ORDER BY Popup_Order";
			$query = $this->db->query($sql);
			return $query ->result_array();
		}

		public function DetailPopup($params){
			settype($params,'int');
			$sql = "SELECT * FROM popup WHERE Popup_ID=$params";
			$query = $this->db->query($sql);
			return $query ->row_array();
		}


		public function AddPopup(){
			// Tiếp nhận dữ liệu
			$Name = $this->input->post('name');
			$Order = $this->input->post('order');
			$Status = $this->input->post('status');
			if(empty($this->input->post('link'))) {
				$Link = '#!';
			}else $Link = $this->input->post('link');
			$Image = $this->input->post('image');
			$Caption = $this->input->post('caption');
			$Delay = $this->input->post('delay');
			$Date = date('Y-m-d H:i:s');

			////Kiểm tra dữ liệu
			settype($Order,"int");
			settype($Status,"int");
			settype($Delay,"int");
			$Name = trim(strip_tags($Name));
			$Link = trim(strip_tags($Link));

			//Chèn dữ liệu vào database
			$sql="INSERT INTO popup (Popup_Name,Popup_Image,Popup_Link,Popup_Status,Popup_Order,Popup_Caption,Popup_Date,Popup_Delay) 
				VALUES ('$Name','$Image','$Link',$Status,$Order,'$Caption','$Date',$Delay)";
			$this->db->query($sql);
		}

		public function DeletePopup($params){
			settype($params,"int");
			$sql="DELETE FROM popup WHERE Popup_ID=$params";
			$this->db->query($sql);
		}

		public function UpdatePopup($params){
			// Tiếp nhận dữ liệu
			$Name = $this->input->post('name');
			$Order = $this->input->post('order');
			$Status = $this->input->post('status');
			if(empty($this->input->post('link'))) {
				$Link = '#!';
			}else $Link = $this->input->post('link');
			$Image = $this->input->post('image');
			$Caption = $this->input->post('caption');
			$Delay = $this->input->post('delay');
			$Date = date('Y-m-d H:i:s');

			////Kiểm tra dữ liệu
			settype($Order,"int");
			settype($Status,"int");
			settype($Delay,"int");
			$Name = trim(strip_tags($Name));
			$Link = trim(strip_tags($Link));

			//Chèn dữ liệu vào database
			$sql="UPDATE popup SET Popup_Name='$Name', Popup_Image='$Image', Popup_Link='$Link', Popup_Status=$Status, Popup_Order=$Order,
									Popup_Caption='$Caption', Popup_Date='$Date', Popup_Delay='$Delay' 
								WHERE Popup_ID=$params";
			$this->db->query($sql);
		}

	}
?>