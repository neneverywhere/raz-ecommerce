<?php
	class m_menu extends CI_model{
		function __construct(){        
		parent::__construct();
		$this->load->library('Session');
		$this->load->database();
		}  //function construct

		// Hàm tính tổng record để phân trang
		public function CMenu(){
			$query = $this->db->count_all_results('menu');
			return $query;
		}

		//Lấy tên Menu cha hiển thị ra trang listmenu
		public function GetNameParent($params){
			$sql = "SELECT Menu_ID, Menu_Name, Menu_Parent_ID FROM menu WHERE Menu_ID = $params";
			$query = $this->db->query($sql);
			return $query->row_array();
		}

		/* Trường hợp 1 */
		// List menu cấp 1
		public function ListMenuOne(){
			$sql = "SELECT * FROM menu WHERE Menu_Parent_ID = 0 ORDER BY Menu_Order ";
			$query = $this->db->query($sql);
			return $query->result_array();
		}

		// List menu cấp 2
		public function ListMenuTwo($params){
			$sql = "SELECT * FROM menu WHERE Menu_Parent_ID = $params ORDER BY Menu_Order";
			$query = $this->db->query($sql);
			return $query->result_array();
		}

		// List tất cả menu ra
		public function ListMenu(){
			$sql = "SELECT * FROM menu WHERE Menu_Parent_ID=0 ORDER BY Menu_Order";
			$query = $this->db->query($sql);
			$query = $query->result_array();
			foreach ($query as &$key) {
				$params = $key['Menu_ID'];
				$sql2 = "SELECT * FROM menu WHERE Menu_Parent_ID=$params ORDER BY Menu_Order";
				$query2 = $this->db->query($sql2);
				$query2 = $query2->result_array();
				$key['menulv2'] = $query2;
				foreach ($key['menulv2'] as &$row) {
					$params2 = $row['Menu_ID'];
					$sql3 = "SELECT * FROM menu WHERE Menu_Parent_ID=$params2 ORDER BY Menu_Order";
					$query3 = $this->db->query($sql3);
					$query3 = $query3->result_array();
					if ($query3!=array()) $row['menulv3'] = $query3;
				}
			}
			return $query;
		}

		public function AddMenu(){
			// Tiếp nhận dữ liệu
			$Name = $this->input->post('name');
			$Order = $this->input->post('order');
			$Status = $this->input->post('status');
			$Target = $this->input->post('target');

			$Parent = $this->input->post('parent');
			$ParentTwo = $this->input->post('parenttwo');
			if($ParentTwo == 0 || $ParentTwo == ''){
				$Parent_ID = $Parent;
			}else $Parent_ID = $ParentTwo;

			if(empty($this->input->post('link'))) {
				$Link = '#!';
			}else $Link = $this->input->post('link');
			$Image = $this->input->post('image');

			////Kiểm tra dữ liệu
			settype($Order,"int");
			settype($Status,"int");
			$Name = trim(strip_tags($Name));
			$Link = trim(strip_tags($Link));

			//Chèn dữ liệu vào database
			$sql="INSERT INTO menu (Menu_Name,Menu_Icon,Menu_Link,Menu_Status,Menu_Order,Menu_Parent_ID,Menu_Target) 
				VALUES ('$Name','$Image','$Link',$Status,$Order,$Parent_ID,'$Target')";
			$this->db->query($sql);
		}

		public function DeleteMenu($params){
			settype($params, 'int');
			$sql="DELETE FROM menu WHERE Menu_ID = $params";
			$this->db->query($sql);
		}

		public function DetailMenu($params){
			settype($params, 'int');
			$sql = "SELECT * FROM menu WHERE Menu_ID = $params";
			$query = $this->db->query($sql);
			return $query->row_array();
		}

		public function EditMenu($params){
			// Tiếp nhận dữ liệu
			$Name = $this->input->post('name');
			$Order = $this->input->post('order');
			$Status = $this->input->post('status');
			$Target = $this->input->post('target');
			$Parent_ID = $this->input->post('parent');

			if(empty($this->input->post('link'))) {
				$Link = '#!';
			}else $Link = $this->input->post('link');
			$Image = $this->input->post('image');

			////Kiểm tra dữ liệu
			settype($Order,"int");
			settype($Status,"int");
			settype($Parent_ID,"int");
			$Name = trim(strip_tags($Name));
			$Link = trim(strip_tags($Link));

			//Chèn dữ liệu vào database
			$sql="UPDATE menu SET Menu_Name='$Name',Menu_Icon='$Image',Menu_Link='$Link',Menu_Status=$Status,Menu_Order=$Order,Menu_Parent_ID=$Parent_ID, Menu_Target='$Target' WHERE Menu_ID = $params";
			$this->db->query($sql);
		}
	}
?>