<?php
	class m_info extends CI_model{
		function __construct(){        
		parent::__construct();
		$this->load->library('Session');
		$this->load->database();
		}  //function construct 


		public function ListIntro(){
			$sql = "SELECT Intro FROM contact";
			$query = $this->db->query($sql);
			return $query->row_array();
		}

		public function UpdateIntro(){
			$Intro = $this->input->post('intro');

			$sql = "UPDATE contact SET Intro = '$Intro'";
			$this->db->query($sql);
		}

		public function ListContact(){
			$sql = "SELECT *  FROM contact";
			$query = $this->db->query($sql);
			return $query->row_array();
		}

		public function UpdateContact(){
			$Name = trim($this->input->post('name'));
			$Hotline = trim($this->input->post('hotline'));
			$Email = trim($this->input->post('email'));
			$Email_Send = trim($this->input->post('email-send'));
			$Address = trim($this->input->post('address'));
			$Website = trim($this->input->post('website'));
			$Copyright = trim($this->input->post('copyright'));
			$Protocol = $this->input->post('protocol');
			$SMTP = trim($this->input->post('smtp'));
			$Email_Root = trim($this->input->post('email-root'));
			$Password_Root = trim($this->input->post('password-root'));
			$Port = $this->input->post('port');


			$sql = "UPDATE contact SET Name='$Name', Hotline='$Hotline', Email='$Email', Email_Send='$Email_Send', Address='$Address', Website='$Website', Copyright='$Copyright', SMTP='$SMTP', Email_Root='$Email_Root', Password_Root='$Password_Root', Port=$Port, Protocol = '$Protocol'";
			$this->db->query($sql);
		}

		public function ListMap(){
			$sql = "SELECT Map, Map_Content FROM contact";
			$query = $this->db->query($sql);
			return $query->row_array();
		}

		public function UpdateMap(){
			$Map = $this->input->post('map');
			$MapContent = mysql_real_escape_string($this->input->post('mapcontent'));

			$sql = "UPDATE contact SET Map='$Map', Map_Content='$MapContent'";
			$this->db->query($sql);
		}

		public function ListSocial(){
			$sql = "SELECT Facebook, Skype, Zalo, Youtube, Google_Plus FROM contact";
			$query = $this->db->query($sql);
			return $query->row_array();
		}

		public function UpdateSocial(){
			$Facebook = trim($this->input->post('facebook'));
			$Skype = trim($this->input->post('skype'));
			$Zalo = trim($this->input->post('zalo'));
			$Youtube = trim($this->input->post('youtube'));
			$Google = trim($this->input->post('google'));

			$sql = "UPDATE contact SET Facebook='$Facebook', Skype='$Skype', Zalo='$Zalo', Youtube='$Youtube', Google_Plus='$Google'";
			$this->db->query($sql);
		}

	}
?>