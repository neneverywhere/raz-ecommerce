<?php class c_thanks extends CI_Controller { 
	public function __construct(){
		parent::__construct();
		$db = $this->load->database();
		$this->load->helper('url');
		$this->load->model('frontend/m_home');
		$this->load->model('frontend/m_header');
		$this->load->model('frontend/m_footer');
	}
	public function index() {
		$data['Title'] = $this->m_home->Title();
		$data['Keyword'] = $this->m_home->Keyword();
		$data['Description'] = $this->m_home->Description();
		$this->load->view('frontend/thanks',$data);
	}
}//class
