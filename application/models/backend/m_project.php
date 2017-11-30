<?php
	class m_project extends CI_model{
		function __construct(){        
		parent::__construct();
		$this->load->library('Session');
		$this->load->database();
		}  //function construct 


		public function ListProjectCatalog(){
			$sql="SELECT * FROM project_catalog ORDER BY Project_Catalog_Order";
			$query = $this->db->query($sql);
			return $query ->result_array();
		}

		public function GetNameCatalog($params){
			$sql="SELECT Project_Catalog_Name FROM project_catalog WHERE Project_Catalog_ID=$params";
			$query = $this->db->query($sql);
			$row = $query ->row();
			if($row!=array()) return $row->Project_Catalog_Name;
			else return '';
		}

		public function GetLinkCatalog($params){
			$sql="SELECT Project_Catalog_Link FROM project_catalog WHERE Project_Catalog_ID=$params";
			$query = $this->db->query($sql);
			$row = $query ->row();
			if($row!=array()) return $row->Project_Catalog_Link;
			else return '';
		}

		// Đếm số record trong project để phân trang
		public function CProject(){
			$sql="SELECT * FROM project";
			$query = $this->db->query($sql);
			return $query ->result_array();
		}

		public function ListProject($offset,$perpage){
			$sql="SELECT * FROM project ORDER BY Project_Date DESC LIMIT $offset,$perpage";
			$query = $this->db->query($sql);
			return $query ->result_array();
		}

		public function AddProject(){
			//Tiếp nhận dữ liệu
			$IDCat = $this->input->post('parent');
			$Name = $this->input->post('name');
			$Alias = ($this->m_project->changeTitle($Name));
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

			// Thêm dữ liệu
			$sql = "INSERT INTO project (Project_Name, Project_Catalog_ID, Project_Alias, Project_Image, Project_Des, Project_Content, Project_Hot, Project_Status, Project_Date, Project_Title, Project_Keyword, Project_Description)
					VALUES ('$Name', $IDCat,'$Alias','$Image','$Des','$Content',$Hot,$Status,'$Date',
							'$Title','$Keyword','$Description')";
			$this->db->query($sql);
		}

		public function DetailProject($params){
			$sql="SELECT * FROM project WHERE Project_ID = $params";
			$query = $this->db->query($sql);
			return $query->row_array();
		}

		public function EditProject($param){
			//Tiếp nhận dữ liệu
			$IDCat = $this->input->post('parent');
			$Name = $this->input->post('name');
			$Alias = ($this->m_project->changeTitle($Name));
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

			// Update dữ liệu
			$sql= "UPDATE project SET Project_Name = '$Name', Project_Image = '$Image', Project_Catalog_ID = $IDCat,
									Project_Des = '$Des', Project_Content = '$Content', Project_Hot = $Hot,
									Project_Status = $Status, Project_Date = '$Date', Project_Alias = '$Alias',
									Project_Title = '$Title', Project_Keyword = '$Keyword', Project_Description = '$Description'
					WHERE Project_ID = $param";
			$this->db->query($sql);
		}

		public function DeleteProject($params){
			settype($params,"int");
			$sql="DELETE FROM project WHERE Project_ID = $params";
			$this->db->query($sql);
		}
	}
?>