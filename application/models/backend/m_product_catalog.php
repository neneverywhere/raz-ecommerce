<?php
	class m_product_catalog extends CI_model{
		function __construct(){        
		parent::__construct();
		$this->load->library('Session');
		$this->load->database();
		}  //function construct

		public function GetParent(){
			$sql="SELECT * FROM product_catalog WHERE Product_Catalog_ID_Parent = 0 ORDER BY Product_Catalog_Order";
			$query = $this->db->query($sql);
			return $query->result_array();
		}

		public function GetParentName($params){
			settype($params, 'int');
			if($params!=0){
				$sql = "SELECT Product_Catalog_Name FROM product_catalog WHERE Product_Catalog_ID = $params";
				$query = $this->db->query($sql);
				$row = $query->row();
				return $row->Product_Catalog_Name;
			}
		}

		public function GetChild($params){
			settype($params, 'int');
			$sql="SELECT * FROM product_catalog WHERE Product_Catalog_ID_Parent = $params ORDER BY Product_Catalog_Order";
			$query = $this->db->query($sql);
			return $query->result_array();
		}

		public function AddProductCatalog(){
			//Tiếp nhận dữ liệu
			$Name = $this->input->post('name');
			$Image = $this->input->post('image');
			$Des = $this->input->post('des');
			$Alias = $this->m_product_catalog->changeTitle($Name);
			$Order = $this->input->post('order');
			$Status = $this->input->post('status');
			$Hot = $this->input->post('hot');
			if(empty($this->input->post('link'))) {
				$Link = 'san-pham/'.($this->m_product_catalog->changeTitle($Name));
			}else $Link = 'san-pham/'.$this->input->post('link');

			if(empty($this->input->post('title'))) {
				$Title = $Name;
			}else $Title = $this->input->post('title');

			$Keyword = $this->input->post('keyword');
			$Description = $this->input->post('description');

			$Parent = $this->input->post('parent');

			//Kiểm tra dữ liệu
			settype($Order,"int");
			settype($Status,"int");
			settype($Hot,"int");
			settype($Parent,"int");
			$Name = trim(strip_tags($Name));
			$Link = trim(strip_tags($Link));

			//Chèn dữ liệu vào database
			$sql="INSERT INTO product_catalog (Product_Catalog_Name,Product_Catalog_Image,Product_Catalog_Alias,Product_Catalog_ID_Parent,
																				Product_Catalog_Des,Product_Catalog_Link,Product_Catalog_Order,Product_Catalog_Status,Product_Catalog_Hot,
																				Product_Catalog_Title,Product_Catalog_Keyword,Product_Catalog_Description)
				VALUES ('$Name','$Image','$Alias', $Parent ,'$Des','$Link', $Order , $Status, $Hot , '$Title' ,'$Keyword','$Description')";
			$this->db->query($sql);
		}

		public function UpdateProductCatalog($params){
			//Tiếp nhận dữ liệu
			$Name = $this->input->post('name');
			$Image = $this->input->post('image');
			$Des = $this->input->post('des');
			$Alias = $this->m_product_catalog->changeTitle($Name);
			$Order = $this->input->post('order');
			$Status = $this->input->post('status');
			$Hot = $this->input->post('hot');
			if(empty($this->input->post('link'))) {
				$Link = 'san-pham/'.($this->m_product_catalog->changeTitle($Name));
			}else $Link = 'san-pham/'.$this->input->post('link');

			if(empty($this->input->post('title'))) {
				$Title = $Name;
			}else $Title = $this->input->post('title');

			$Keyword = $this->input->post('keyword');
			$Description = $this->input->post('description');

			$Parent = $this->input->post('parent');

			//Kiểm tra dữ liệu
			settype($params,"int");
			settype($Order,"int");
			settype($Status,"int");
			settype($Hot,"int");
			settype($Parent,"int");
			$Name = trim(strip_tags($Name));
			$Link = trim(strip_tags($Link));

			//Chèn dữ liệu vào database
			$sql="UPDATE product_catalog SET Product_Catalog_Name='$Name',Product_Catalog_Alias='$Alias',Product_Catalog_ID_Parent=$Parent,
																				Product_Catalog_Des='$Des',Product_Catalog_Link='$Link',Product_Catalog_Order=$Order,
																				Product_Catalog_Status=$Status,Product_Catalog_Image='$Image',
																				Product_Catalog_Hot=$Hot,Product_Catalog_Title='$Title',Product_Catalog_Keyword='$Keyword',Product_Catalog_Description='$Description' WHERE Product_Catalog_ID=$params";
			$this->db->query($sql);
		}

		public function DeleteProductCatalog($params){
			settype($params,"int");
			$sql="DELETE FROM product_catalog WHERE Product_Catalog_ID=$params";
			$this->db->query($sql);
			$sql="DELETE FROM product_catalog WHERE Product_Catalog_ID_Parent=$params";
			$this->db->query($sql);
		}

		public function DetailProductCatalog($params){
			settype($params,'int');
			$sql="SELECT * FROM product_catalog WHERE Product_Catalog_ID = $params";
			$query = $this->db->query($sql);
			return $query->row_array();
		}
	}
?>