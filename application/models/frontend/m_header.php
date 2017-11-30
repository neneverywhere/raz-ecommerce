<?php
	class m_header extends CI_model{
		function __construct(){        
		parent::__construct();
		$this->load->database();
		}  //function construct 

		public function Logo(){
			$sql = "SELECT Logo FROM config";
			$query = $this->db->query($sql);
			$row = $query->row();
			return $row->Logo;
		}

		public function Favicon(){
			$sql = "SELECT Favicon FROM config";
			$query = $this->db->query($sql);
			$row = $query->row();
			return $row->Favicon;
		}

		public function Hotline(){
			$sql = "SELECT Hotline FROM contact";
			$query = $this->db->query($sql);
			$row = $query->row();
			return $row->Hotline;
		}


		// List tất cả menu ra
		public function Menu(){
			$sql = "SELECT * FROM menu WHERE Menu_Parent_ID=0 AND Menu_Status=1 ORDER BY Menu_Order";
			$query = $this->db->query($sql);
			$query = $query->result_array();
			foreach ($query as &$key) {
				$params = $key['Menu_ID'];
				$sql2 = "SELECT * FROM menu WHERE Menu_Parent_ID=$params AND Menu_Status=1 ORDER BY Menu_Order";
				$query2 = $this->db->query($sql2);
				$query2 = $query2->result_array();
				if (strpos($key['Menu_Link'], 'http')===false)
					{$key['Menu_Link'] = base_url().$key['Menu_Link'];}else{
						$key['Menu_Link'] = $key['Menu_Link'];
				}
				$key['menulv2'] = $query2;
				foreach ($key['menulv2'] as &$row) {
					$params2 = $row['Menu_ID'];
					$sql3 = "SELECT * FROM menu WHERE Menu_Parent_ID=$params2 AND Menu_Status=1 ORDER BY Menu_Order";
					$query3 = $this->db->query($sql3);
					$query3 = $query3->result_array();
					if (strpos($row['Menu_Link'], 'http')===false) 
						{$row['Menu_Link'] = base_url().$row['Menu_Link'];}else{
							$row['Menu_Link'] = $row['Menu_Link'];
					}
					$row['menulv3'] = $query3;
					foreach ($row['menulv3'] as &$re) {
						if (strpos($re['Menu_Link'], 'http')===false) 
							{$re['Menu_Link'] = base_url().$re['Menu_Link'];}else{
								$re['Menu_Link'] = $re['Menu_Link'];
						}
					}
				}
			}
			return $query;
		}

		public function CodeHeader(){
			$sql = "SELECT Code_Header FROM config";
			$query = $this->db->query($sql);
			$row = $query->row();
			return $row->Code_Header;
		}

	}
?>