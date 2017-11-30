<?php
	class m_partner extends CI_model{
		function __construct(){        
		parent::__construct();
		$this->load->library('Session');
		$this->load->database();
		}  //function construct 

		public function ListPartner(){
			$sql = "SELECT * FROM partner ORDER BY Partner_Order";
			$query = $this->db->query($sql);
			return $query->result_array();
		}

		public function AddPartner(){
			$Name = $this->input->post('name');
			$Logo = $this->input->post('logo');

			if(empty($this->input->post('link'))){$Link = '#!';
			}else $Link =  $this->input->post('link');

			$Des = $this->input->post('des');
			$Order = $this->input->post('order');
			$Status = $this->input->post('status');

			settype($Status, 'int');
			settype($Order, 'int');

			$sql="INSERT INTO partner (Partner_Name,Partner_Image,Partner_Link,Partner_Des,Partner_Order,Partner_Status) 
				VALUES ('$Name','$Logo','$Link','$Des',$Order, $Status)";
			$this->db->query($sql);
		}

		public function DeletePartner($params){
			settype($params, 'int');
			$sql="DELETE FROM partner WHERE Partner_ID = $params";
			$this->db->query($sql);
		}

		public function DetailPartner($params){
			settype($params, 'int');
			$sql = "SELECT * FROM partner WHERE Partner_ID = $params";
			$query = $this->db->query($sql);
			return $query->row_array();
		}

		public function UpdatePartner($params){
			settype($params, 'int');
			$Name = $this->input->post('name');
			$Logo = $this->input->post('logo');

			if(empty($this->input->post('link'))){$Link = '#!';
			}else $Link =  $this->input->post('link');

			$Des = $this->input->post('des');
			$Order = $this->input->post('order');
			$Status = $this->input->post('status');

			settype($Status, 'int');
			settype($Order, 'int');

			$sql="UPDATE partner SET Partner_Name='$Name', Partner_Image='$Logo', Partner_Link='$Link',
				 					 Partner_Des='$Des',Partner_Order=$Order,Partner_Status=$Status
				 				 WHERE Partner_ID = $params";
			$this->db->query($sql);
		}

	}
?>