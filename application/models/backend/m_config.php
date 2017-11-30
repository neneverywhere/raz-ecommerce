<?php
	class m_config extends CI_model{
		function __construct(){        
		parent::__construct();
		$this->load->library('Session');
		$this->load->database();
		}  //function construct 


		public function ListConfig(){
			$sql = "SELECT * FROM config WHERE ID=1";
			$query = $this->db->query($sql);
			return $query->row_array();
		}

		public function UpdateConfig(){
			//Tiếp nhận dữ liệu
			$Title = $this->input->post('title');
			$Keyword = $this->input->post('keyword');
			$Description = $this->input->post('description');
			$Logo = $this->input->post('logo');
			$FLogo = $this->input->post('flogo');
			$Favicon = $this->input->post('favicon');

			//Kiểm tra dữ liệu
			$Title = trim(strip_tags($Title));

			// Cập nhật dữ liệu vào database
			$sql = "UPDATE config SET Title='$Title', Logo='$Logo', Flogo='$FLogo', Favicon='$Favicon',
									  Keyword = '$Keyword', Description = '$Description'";
			$this->db->query($sql);
		}
	}
?>