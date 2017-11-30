<?php
	class m_personel extends CI_model{
		function __construct(){        
		parent::__construct();
		$this->load->library('Session');
		$this->load->database();
		}  //function construct 

		// Hàm tính tổng record để phân trang
		public function countpersonel(){
			$query = $this->db->count_all_results('personel');
			return $query;
		}

		public function ListPersonel($offset,$perpage){
			$sql="SELECT * FROM personel ORDER BY Personel_Order LIMIT $offset,$perpage";
			$query = $this->db->query($sql);
			return $query ->result();
		}

		public function AddPersonel(){
			//Tiếp nhận dữ liệu
			$Name = $this->input->post('name');
			$Image = $this->input->post('image');
			$Pos = $this->input->post('pos');
			$Phone = $this->input->post('phone');
			$Email = $this->input->post('email');
			$Address = $this->input->post('address');
			$Order = $this->input->post('order');
			$Status = $this->input->post('status');
			$Des = $this->input->post('des');

			settype($Order, 'int');
			settype($Status, 'int');

			// Thêm dữ liệu
			$sql = "INSERT INTO personel (Personel_Name,Personel_Pos,Personel_Phone,Personel_Email,Personel_Address,
																		Personel_Image,Personel_Des,Personel_Order,Personel_Status)
					VALUES ('$Name','$Pos','$Phone','$Email','$Address','$Image','$Des',$Order,$Status)";
			$this->db->query($sql);
		}

		public function DeletePersonel($params){
			settype($params,"int");
			$sql="DELETE FROM personel WHERE Personel_ID = $params";
			$this->db->query($sql);
		}

		public function DetailPersonel($params){
			settype($params,'int');
			$sql="SELECT * FROM personel WHERE Personel_ID = $params";
			$query = $this->db->query($sql);
			return $query->row();
		}

		public function UpdatePersonel($params){
			//Tiếp nhận dữ liệu
			$Name = $this->input->post('name');
			$Image = $this->input->post('image');
			$Pos = $this->input->post('pos');
			$Phone = $this->input->post('phone');
			$Email = $this->input->post('email');
			$Address = $this->input->post('address');
			$Order = $this->input->post('order');
			$Status = $this->input->post('status');
			$Des = $this->input->post('des');

			settype($Order, 'int');
			settype($Status, 'int');
			settype($params, 'int');

			//Cập nhật dữ liệu
			$sql="UPDATE personel SET Personel_Name='$Name',Personel_Pos='$Pos',Personel_Phone='$Phone',Personel_Email='$Email',Personel_Address='$Address', 
																Personel_Image='$Image',Personel_Des='$Des',Personel_Order=$Order,Personel_Status=$Status
														WHERE Personel_ID=$params";
			$this->db->query($sql);
		}

	}
?>