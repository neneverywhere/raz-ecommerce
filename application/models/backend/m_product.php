<?php
	class m_product extends CI_model{
		function __construct(){        
		parent::__construct();
		$this->load->library('Session');
		$this->load->database();
		}  //function construct

		public function Check($params){
			settype($params, 'int');{
			$sql = "SELECT * FROM product_catalog WHERE Product_Catalog_ID_Parent=$params 
					ORDER BY Product_Catalog_Order";
			$query = $this->db->query($sql);
			$query = $query->result_array();
			if (count($query) > 0) return true;
			else return false;
			}
		}

		public function GetParent(){
			$sql="SELECT * FROM product_catalog WHERE Product_Catalog_ID_Parent = 0 ORDER BY Product_Catalog_Order";
			$query = $this->db->query($sql);
			return $query->result_array();
		}

		public function productchild($params){
			$sql="SELECT * FROM product_catalog WHERE Product_Catalog_ID_Parent=$params ORDER BY Product_Catalog_Order";
			$query = $this->db->query($sql);
			return $query->result_array();
		}

		public function GetNameParent($id){
			settype($id, 'int');
			$sql = "SELECT Product_Catalog_Name FROM product_catalog WHERE Product_Catalog_ID = $id";
			$query = $this->db->query($sql);
			$row = $query ->row();
			if ($row!=array()) return $row->Product_Catalog_Name;
		}

		public function GetParentID($id){
			settype($id, 'int');
			$sql = "SELECT Product_Catalog_ID_Parent FROM product_catalog WHERE Product_Catalog_ID = $id";
			$query = $this->db->query($sql);
			$row = $query ->row();
			if ($row!=array()) return $row->Product_Catalog_ID_Parent;
		}

		public function GetLinkCatalog($id){
			settype($id, 'int');
			$sql = "SELECT Product_Catalog_Link FROM product_catalog WHERE Product_Catalog_ID = $id";
			$query = $this->db->query($sql);
			$row = $query ->row();
			if ($row!=array()) return $row->Product_Catalog_Link;
		}

		public function SimilarCatalog($params){
			settype($params, 'int');
			$sql = "SELECT Product_Catalog_Name,Product_Catalog_ID  FROM product_catalog WHERE Product_Catalog_ID_Parent 
					IN (SELECT Product_Catalog_ID_Parent FROM product_catalog WHERE Product_Catalog_ID=$params)";
			$query = $this->db->query($sql);
			return $query->result_array();
		}


		public function CProduct(){
			$query = $this->db->count_all_results('product');
			return $query;
		}

		public function ListProduct($offset,$perpage){
			$sql="SELECT * FROM product ORDER BY Product_Date DESC LIMIT $offset,$perpage";
			$query = $this->db->query($sql);
			return $query ->result_array();
		}

		public function AddProduct(){
			if (isset($_POST["item"]) && array_filter($_POST["item"])!=array()){ // Kiểm tra input ko rỗng
			$gallery_array = array_filter($_POST["item"]); // Lấy dãy gallery
			$gallery_array = implode($gallery_array, ',');}; // implode thành chuỗi cắt nhau bởi dấu ","

			$Name = $this->input->post('name');
			$Code = $this->input->post('code');
			$Alias = $this->changeTitle($Name);
			$parent = $this->input->post('productparent');
			$child = $this->input->post('productchild');
			if($child==0 || $child == ''){
				$IdCat = $parent;
			}else $IdCat = $child;
			$Image = $this->input->post('image');
			$PriceBefore = ($this->input->post('price-before'))*1000;
			$Price = ($this->input->post('price'))*1000;
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

			$sql="INSERT INTO product (Product_Name,Product_Code,Product_Catalog_ID,
										Product_Alias,Product_Image,Product_Gallery,Product_Price_Before,Product_Price,Product_Des,
										Product_Content,Product_Hot,Product_Status,Product_Date,Product_Title,Product_Keyword,Product_Description) 
						VALUES ('$Name','$Code',$IdCat,'$Alias','$Image','$gallery_array','$PriceBefore','$Price','$Des',
								'$Content',$Hot,$Status,'$Date','$Title','$Keyword','$Description')";
			$this->db->query($sql);
		}

		public function UpdateProduct($params){
			settype($params, 'int');

			if (isset($_POST["item"]) && array_filter($_POST["item"])!=array()){ // Kiểm tra input ko rỗng
			$gallery_array = array_filter($_POST["item"]); // Lấy dãy gallery
			$gallery_array = implode($gallery_array, ',');}; // implode thành chuỗi cắt nhau bởi dấu "&&"

			$Name = $this->input->post('name');
			$Code = $this->input->post('code');
			$Alias = $this->m_product->changeTitle($Name);
			$parent = $this->input->post('productparent');
			$child = $this->input->post('productchild');
			if($child==0 || $child == ''){
				$IdCat = $parent;
			}else $IdCat = $child;
			$Image = $this->input->post('image');
			$PriceBefore = ($this->input->post('price-before'))*1000;
			$Price = ($this->input->post('price'))*1000;
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

			$sql="UPDATE product SET Product_Name='$Name',Product_Code='$Code',
									 Product_Catalog_ID=$IdCat,Product_Alias='$Alias',Product_Image='$Image',
									 Product_Price_Before='$PriceBefore',Product_Price='$Price',Product_Des='$Des',Product_Content='$Content',
									 Product_Hot=$Hot,Product_Status=$Status,Product_Date='$Date',Product_Title='$Title',Product_Keyword='$Keyword',
									 Product_Description='$Description', Product_Gallery='$gallery_array' WHERE Product_ID=$params";
			$this->db->query($sql);
		}

		public function DeleteProduct($params){
			settype($params,"int");
			$sql="DELETE FROM product WHERE Product_ID = $params";
			$this->db->query($sql);
		}

		public function DetailProduct($params){
			settype($params, 'int');
			$sql = "SELECT * FROM product WHERE Product_ID = $params";
			$query = $this->db->query($sql);
			return $query->row_array();
		}
	}
?>