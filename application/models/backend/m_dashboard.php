<?php
	class m_dashboard extends CI_model{
		function __construct(){        
		parent::__construct();
		$this->load->library('Session');
		$this->load->database();
		}  //function construct 

		public function CountNewsCatalog(){
			$query = $this->db->count_all_results('news_catalog');
			return $query;
		}

		public function CountNews(){
			$query = $this->db->count_all_results('news');
			return $query;
		}

		public function CountProductCatalog(){
			$query = $this->db->count_all_results('product_catalog');
			return $query;
		}

		public function CountProduct(){
			$query = $this->db->count_all_results('product');
			return $query;
		}

		public function CountProjectCatalog(){
			$query = $this->db->count_all_results('project_catalog');
			return $query;
		}

		public function CountProject(){
			$query = $this->db->count_all_results('project');
			return $query;
		}

		public function CountSlider(){
			$query = $this->db->count_all_results('slider');
			return $query;
		}

		public function CountMenu(){
			$query = $this->db->count_all_results('menu');
			return $query;
		}

		public function CountUser(){
			$query = $this->db->count_all_results('user');
			return $query;
		}

		public function CountGallery(){
			$query = $this->db->count_all_results('gallery');
			return $query;
		}

		public function CountPartner(){
			$query = $this->db->count_all_results('partner');
			return $query;
		}

		public function CountVisited(){
			$query = $this->db->count_all_results('counter');
			return $query;
		}

		public function CountOnline(){
			$tg = time();
			$tgnew = $tg - 300;
			$sql="SELECT Counter_IP FROM counter WHERE Counter_Time>=$tgnew";
			$query = $this->db->query($sql);
			$query = $query->num_rows();
			return $query;
		}

	}
?>