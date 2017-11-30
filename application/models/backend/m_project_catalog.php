<?php
	class m_project_catalog extends CI_model{
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

		public function DetailProjectCatalog($params){
			settype($params,'int');
			$sql="SELECT * FROM project_catalog WHERE Project_Catalog_ID = $params ORDER BY Project_Catalog_Order";
			$query = $this->db->query($sql);
			return $query->row_array();
		}

		public function AddProjectCatalog(){
			//Tiếp nhận dữ liệu
			$Name = $this->input->post('name');
			$Des = $this->input->post('des');
			$Alias = $this->m_project_catalog->changeTitle($Name);
			$Order = $this->input->post('order');
			$Status = $this->input->post('status');
			if(empty($this->input->post('link'))) {
				$Link = 'du-an/'.($this->m_project_catalog->changeTitle($Name));
			}else $Link = 'du-an/'.$this->input->post('link');

			if(empty($this->input->post('title'))) {
				$Title = $Name;
			}else $Title = $this->input->post('title');

			$Keyword = $this->input->post('keyword');
			$Description = $this->input->post('description');

			//Kiểm tra dữ liệu
			settype($Order,"int");
			settype($Status,"int");
			$Name = trim(strip_tags($Name));
			$Link = trim(strip_tags($Link));
			//Chèn dữ liệu vào database
			$sql="INSERT INTO project_catalog (Project_Catalog_Name,Project_Catalog_Des,Project_Catalog_Alias,Project_Catalog_Link,Project_Catalog_Order,Project_Catalog_Status,
				Project_Catalog_Title, Project_Catalog_Keyword, Project_Catalog_Description) 
				VALUES ('$Name','$Des','$Alias','$Link',$Order, $Status, '$Title','$Keyword','$Description')";
			$this->db->query($sql);
		}

		public function EditProjectCatalog($params){
			//Tiếp nhận dữ liệu
			$Name = $this->input->post('name');
			$Des = $this->input->post('des');
			$Alias = $this->m_project_catalog->changeTitle($Name);
			$Order = $this->input->post('order');
			$Status = $this->input->post('status');
			if(empty($this->input->post('link'))) {
				$Link = 'du-an/'.($this->m_project_catalog->changeTitle($Name));
			}else $Link = 'du-an/'.$this->input->post('link');

			if(empty($this->input->post('title'))) {
				$Title = $Name;
			}else $Title = $this->input->post('title');

			$Keyword = $this->input->post('keyword');
			$Description = $this->input->post('description');

			//Kiểm tra dữ liệu
			settype($Order,"int");
			settype($Status,"int");
			settype($params,"int");
			$Name = trim(strip_tags($Name));
			$Link = trim(strip_tags($Link));
			//Chèn dữ liệu vào database
			$sql="UPDATE project_catalog SET Project_Catalog_Name = '$Name',Project_Catalog_Alias = '$Alias',
						Project_Catalog_Link = '$Link',Project_Catalog_Order = $Order,Project_Catalog_Status = $Status,
						Project_Catalog_Des = '$Des', Project_Catalog_Title = '$Title', Project_Catalog_Keyword = '$Keyword',
						Project_Catalog_Description = '$Description'
						WHERE Project_Catalog_ID = $params";
			$this->db->query($sql);
		}

		public function DeleteProjectCatalog($params){
			settype($params,"int");
			$sql="DELETE FROM project_catalog WHERE Project_Catalog_ID=$params";
			$this->db->query($sql);
		}
	}
?>