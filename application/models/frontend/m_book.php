<?php
	class m_book extends CI_model{
		function __construct(){        
		parent::__construct();
		$this->load->database();
		}  //function construct 

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

		public function AddOrderToData($Name,$Email,$Phone,$Address,$Content,$sum,$cart){
			date_default_timezone_set('Asia/Ho_Chi_Minh');
			$Date = date('Y-m-d H:i:s'); //Ngày cập nhật đơn hàng

			if($this->session->userdata('idBill')==''){ // Nếu đặt mua lần đầu thì tạo id bill mới
				$sql = "INSERT INTO bill (Bill_Guest_Name,Bill_Email,Bill_Phone,Bill_Address,Bill_Content,Bill_Date_Book,Bill_Price)
							   VALUES ('$Name','$Email','$Phone','$Address','$Content','$Date','$sum')";
				$this->db->query($sql); // Lưu đơn hàng
				$idBill = $this->db->insert_id();
				$this->session->set_userdata('idBill',$idBill);
				foreach ($cart as $item) {
					$name = $item['name'];
					$price = $item['price'];
					$id = $item['id'];
					$num = $item['qty'];
					$id_bill = $this->session->userdata('idBill');
					$sql = "INSERT INTO bill_detail (Bill_Detail_Product_Name, 																						Bill_Detail_Product_ID,Bill_Detail_Product_Num,Bill_Detail_Product_Price,Bill_ID)
							VALUES ('$name',$id,'$num','$price',$id_bill)";
					$this->db->query($sql); // Lưu đơn hàng chi tiết
				}



			}else{ // Nếu đã có id bill rồi thì cập nhật lại thông tin đơn hàng thôi
				$params = $this->session->userdata('idBill');
				$sql = "UPDATE bill SET Bill_Guest_Name='$Name', Bill_Email='$Email', Bill_Phone='$Phone', Bill_Address='$Address', 
										Bill_Content='$Content',Bill_Date_Book='$Date',Bill_Price='$sum' 
									WHERE Bill_ID =$params";
				$this->db->query($sql);
			}

		}

		public function SendOrder(){
			$this->load->helper(array('path'));
			// Lấy dữ liệu từ form
			$Name = trim($this->input->post('name'));
			$Phone = trim($this->input->post('phone'));
			$Email = trim($this->input->post('email'));
			$Address = trim($this->input->post('address'));
			$Subject = 'Đơn đặt hàng';
			$Content = $this->input->post('content');
			$EmailGetInfo = $this->m_book->EmailGetInfo();
			$EmailGetInfo = explode(',', $EmailGetInfo);
			$Protocol = $this->m_book->Protocol();
			$Port = $this->m_book->Port();
			$SMTP = $this->m_book->SMTP();
			$Email_Root = $this->m_book->Email_Root();
			$Password_Root = $this->m_book->Password_Root();

			// Lấy dữ liệu HTML sản phẩm
			$Product = "<table border='1' style='text-align: center' width='100%'>
						    <thead>
						      <th width='10%'>STT</th>
						      <th width='30%'>Tên</th>
						      <th width='10%'>Số lượng</th>
						      <th width='20%'>Đơn giá</th>
						      <th width='30%'>Tổng</th>
						    </thead>
						    <tbody>";
	        $i = 1;
	        $cart = $this->cart->contents();
	        $sum=0;
	        foreach ($cart as $item) {
	        	$Product .= 	"<tr>
						        <td>".$i++."</td>
						        <td style='text-align:left' class='bold'>".$item['name']."</td>
						        <td>".$item['qty']."</td>
						        <td class='red bold'>".number_format($item['price'])." Đ</td>
						        <td class='red bold'>".number_format($item['subtotal'])." Đ</td>
						        </tr>";
				$sum = $sum + $item['subtotal'];
	        }

	        $Product .= 		"<tr>
						        <td></td>
						        <td style='color: blue;font-weight: bold; text-align: left'>Tổng tiền đơn hàng: </td>
						        <td></td>
						        <td></td>
						        <td style='color: red;font-weight: bold;'>".number_format($sum)." Đ</td>
						      </tr>
	        ";

	        $Product .= "<table>";

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
			$mail->Body = '<b style="color:red;font-size:17px;font-weight:bold">Đơn đặt hàng từ:</b>'.'<br>'
						 .'Domain: '.base_url().'<br>'
						 .'Tên liên hệ: '.$Name.'<br>'
						 .'Email liên hệ: '.$Email.'<br>'
						 .'Phone liên hệ: '.$Phone.'<br>'
						 .'Địa chỉ: '.$Address.'<br>'
						 .'Chủ đề: '.$Subject.'<br>'
						 .'Nội dung: '.'<br>'.
						 $Content.'<br>'
						 .'Đơn hàng:'.'<br>'. $Product
						 ; //HTML Body   
			//$mail->AltBody = $Content; //Text Body   
			//$mail->SMTPDebug = 2;   
			$this->AddOrderToData($Name,$Email,$Phone,$Address,$Content,$sum,$cart); //Add thông tin khách vào database
			//$mail->Send(); //Send mail

			if(!$mail->send()) {
				return false;
			}
			else return true;
		}
	}
?>