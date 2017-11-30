<?php class c_book extends CI_Controller { 
	public function __construct(){
		parent::__construct();
		$db = $this->load->database();
		$this->load->helper('url');
		$this->load->model('frontend/m_home');
		$this->load->model('frontend/m_header');
		$this->load->model('frontend/m_footer');
		$this->load->model('frontend/m_book');
	}
	public function index() {
		$data['Title'] = $this->m_home->Title().' | Đặt hàng';
		$data['Keyword'] = $this->m_home->Keyword();
		$data['Description'] = $this->m_home->Description();
		$this->load->view('frontend/book',$data);
	}

	public function Order(){
		$this->m_book->SendOrder();
		$this->session->unset_userdata('idBill');
		$this->cart->destroy();
		redirect('thanks');
	}
}//class
