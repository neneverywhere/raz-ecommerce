<?php
	class m_contact extends CI_model{
		function __construct(){        
		parent::__construct();
		$this->load->database();
		}  //function construct 

		public function GetMap(){
			$sql = "SELECT Map,Map_Content FROM contact";
			$query = $this->db->query($sql);
			$row = $query ->row_array();
			return $row;
		}

		public function EmailGetInfo(){
			$sql = "SELECT Email_Send FROM contact";
			$query = $this->db->query($sql);
			$row = $query ->row();
			return $row->Email_Send;
		}

		public function Port(){
			$sql = "SELECT Port FROM contact";
			$query = $this->db->query($sql);
			$row = $query ->row();
			return $row->Port;
		}

		public function SMTP(){
			$sql = "SELECT SMTP FROM contact";
			$query = $this->db->query($sql);
			$row = $query ->row();
			return $row->SMTP;
		}

		public function Protocol(){
			$sql = "SELECT Protocol FROM contact";
			$query = $this->db->query($sql);
			$row = $query ->row();
			return $row->Protocol;
		}

		public function Email_Root(){
			$sql = "SELECT Email_Root FROM contact";
			$query = $this->db->query($sql);
			$row = $query ->row();
			return $row->Email_Root;
		}

		public function Password_Root(){
			$sql = "SELECT Password_Root FROM contact";
			$query = $this->db->query($sql);
			$row = $query ->row();
			return $row->Password_Root;
		}

		public function AddContactToData($Name,$Email,$Phone,$Subject,$Content){
			date_default_timezone_set('Asia/Ho_Chi_Minh');
			$Date = date('Y-m-d H:i:s');
			$sql = "INSERT INTO guest (Guest_Name,Guest_Email,Guest_Phone,Guest_Subject,Guest_Content,Guest_Date_Submit)
						   VALUES ('$Name','$Email','$Phone','$Subject','$Content','$Date')";
			$this->db->query($sql);
		}

		public function SendMail(){
			$this->load->helper(array('path'));
			// Lấy dữ liệu từ form
			$Name = trim($this->input->post('name'));
			$Phone = trim($this->input->post('phone'));
			$Email = trim($this->input->post('email'));
			$Subject = trim($this->input->post('subject'));
			$Content = $this->input->post('content');
			$EmailGetInfo = $this->m_contact->EmailGetInfo();
			$EmailGetInfo = explode(',', $EmailGetInfo);
			$Protocol = $this->m_contact->Protocol();
			$Port = $this->m_contact->Port();
			$SMTP = $this->m_contact->SMTP();
			$Email_Root = $this->m_contact->Email_Root();
			$Password_Root = $this->m_contact->Password_Root();

			//setup phpmailer
			$this->load->file('phpmailer/class.phpmailer.php');
			$this->load->file('phpmailer/class.smtp.php');

			$mail = new PHPMailer();
			$mail ->CharSet = "UTF-8";
			$mail->IsSMTP(); // set mailer to use SMTP   
			$mail->Host = $SMTP; // specify main and backup server   
			$mail->Port = $Port; // set the port to use   
			$mail->SMTPAuth = true; // turn on SMTP authentication   
			$mail->SMTPSecure = $Protocol;
			$mail->Username = $Email_Root; // your SMTP username or your gmail username   
			$mail->Password = $Password_Root; // your SMTP password or your gmail password   
			$from = $Email; // Reply to this email
			//$to = $EmailGetInfo; // Recipients email ID   
			$name=""; // Recipient's name   
			$mail->From = $from;   
			$mail->FromName=$Name; // Name to indicate where the email came from when the recepient received

			foreach ($EmailGetInfo as $EmailGetInfo) {
				$mail->AddAddress($EmailGetInfo,$name);   
			}

			$mail->AddReplyTo($from,$Name);   
			$mail->WordWrap = 50; // set word wrap   
			$mail->IsHTML(true); // send as HTML   
			$mail->Subject = $Subject;   
			$mail->Body = '<b style="color:blue;font-size:17px">Thông tin liên hệ từ:</b>'.'<br>'
						 .'Domain: '.base_url().'<br>'
						 .'Tên liên hệ: '.$Name.'<br>'
						 .'Email liên hệ: '.$Email.'<br>'
						 .'Phone liên hệ: '.$Phone.'<br>'
						 .'Chủ đề: '.$Subject.'<br>'
						 .'Nội dung: '.'<br>'.
						 $Content; //HTML Body   
			//$mail->AltBody = $Content; //Text Body   
			//$mail->SMTPDebug = 2;   
			$this->AddContactToData($Name,$Email,$Phone,$Subject,$Content); //Add thông tin khách vào database
			//$mail->Send(); //Send mail

			if(!$mail->send()) {
				return false;
			}
			else return true;
		}
	}
?>