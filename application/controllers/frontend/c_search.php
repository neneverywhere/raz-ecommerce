<?php class c_search extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$db = $this->load->database();
		$this->load->helper('url');
		$this->load->model('frontend/m_header');
		$this->load->model('frontend/m_footer');
		$this->load->model('frontend/m_home');
		$this->load->model('frontend/m_search');
	}

	public function Search(){
		$data['partner'] = $this->m_home->partner();
		$data['method'] = $this->m_home->method();
		$data['Title'] = $this->m_home->Title();
		$data['Keyword'] = $this->m_home->Keyword();
		$data['Description'] = $this->m_home->Description();
		$data['result'] = $this->m_search->Search();
		$this->load->view('frontend/search-result',$data);
	}

}//class
