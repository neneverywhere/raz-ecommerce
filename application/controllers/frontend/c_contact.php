<?php class c_contact extends CI_Controller { 
	public function __construct(){
		parent::__construct();
		$db = $this->load->database();
		$this->load->helper('url');
		$this->load->model('frontend/m_header');
		$this->load->model('frontend/m_contact');
		$this->load->model('frontend/m_home');
		$this->load->model('frontend/m_footer');
	}
	public function Contact() {
		$data['Title'] = 'Liên hệ';
		$data['Map'] = $this->m_contact->GetMap();
		$data['Title'] = $this->m_home->Title();
		$data['Keyword'] = $this->m_home->Keyword();
		$data['Description'] = $this->m_home->Description();
		$this->load->view('frontend/contact',$data);
	}

	public function SendMail(){
		$result = $this->m_contact->SendMail();
		if($result==true){
			redirect('thanks');
		}
		else{
			echo '<script>alert("Gửi mail bị lỗi, xin vui lòng thử lại!");window.location="'.base_url().'lien-he"</script>';
		}
	}
}//class
