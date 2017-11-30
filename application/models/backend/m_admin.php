<?php
	class m_admin extends CI_model{
		function __construct(){        
		parent::__construct();
		$this->load->library('Session');
		$this->load->database();
		}  //function construct 

		public function CheckLogin(){
			$Email = addslashes(stripslashes($this->input->post('email'))); // Kiểm tra các kí tự trước khi đăng nhập, chống hack
			$Password = addslashes(stripslashes($this->input->post('password'))); // Kiểm tra các kí tự trước khi đăng nhập, chống hack

			$Password = md5($Password);

			$sql="SELECT * FROM user WHERE User_Email = '$Email' AND  User_Password = '$Password' AND User_Active = 1";
			$query = $this->db->query($sql);
			$query = $query->num_rows;
			return $query;
		}

		public function GetUser($Email){
			$sql="SELECT * FROM user WHERE User_Email = '$Email'";
			$query = $this->db->query($sql);
			return $query ->row_array();
		}

		public function CheckEmail($email){
			$sql="SELECT User_ID FROM user WHERE User_Email='$email'";
			$query = $this->db->query($sql);
			$query = $query->num_rows;
			return $query;
		}

		public function AddUser(){
			//Tiếp nhận dữ liệu
			$Name = $this->input->post('name');
			$Password = addslashes(stripslashes($this->input->post('password')));
			$Email = addslashes(stripslashes($this->input->post('email')));
			$Date = date('Y-m-d');
			$Phone = $this->input->post('phone');

			//Mã hóa
			$Password = md5($Password);

			$sql="INSERT INTO user (User_Name, User_Email, User_Password, User_Group, User_Active, User_Date, User_Mobile)
							VALUES ('$Name', '$Email', '$Password', 0, 0, '$Date', '$Phone')";
			$this->db->query($sql);
		}

		public function ListUser(){
			$sql="SELECT * FROM user WHERE User_Group<2 ORDER BY User_Active DESC, User_ID";
			$query = $this->db->query($sql);
			$query = $query->result_array();
			return $query;
		}

		public function DeleteUser($params){
			settype($params,"int");
			$sql="DELETE FROM user WHERE User_ID = $params";
			$this->db->query($sql);
		}

		public function DetailUser($params){
			settype($params, 'int');
			$sql="SELECT * FROM user WHERE User_Group<2 AND User_ID=$params ORDER BY User_ID";
			$query = $this->db->query($sql);
			return $query->row_array();
		}

		public function UpdateUser($params){
			settype($params, 'int');

			$Permission = $this->input->post('permission');
			$Active = $this->input->post('active');

			settype($Permission, 'int');
			settype($Active, 'int');

			$sql="UPDATE user SET User_Group=$Permission, User_Active=$Active WHERE User_ID=$params";
			$this->db->query($sql);
		}

	}
?>