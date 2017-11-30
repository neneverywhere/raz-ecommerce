<?php class c_news extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$db = $this->load->database();
		$this->load->helper('url');
		$this->load->model('frontend/m_header');
		$this->load->model('frontend/m_footer');
		$this->load->model('frontend/m_home');
		$this->load->model('frontend/m_news');
		$this->load->model('frontend/m_news_catalog');
	}

	public function DetailNews(){
		$params = $this->uri->segment(3);
		$params = explode('.', $params);
		$params = $params[0];
		$data['Title'] = $this->m_news->Title($params);
		$data['Keyword'] = $this->m_news->Keyword($params);
		$data['Description'] = $this->m_news->Description($params);
		$data['sidebar'] = $this->m_news_catalog->sidebar($this->uri->segment(2));

		$cal = $this->uri->segment(2); // Lấy catalog
		$checklink = $this->m_news->CheckLink($cal); //Kiểm tra catalog có tồn tại hay ko
		if($checklink==true){ // Nếu có catalog thì chuyển trang bình thường
			$data['DetailNews'] = $this->m_news->DetailNews($params);
			$this->load->view('frontend/news.php',$data);
		}else{
			$cal = $this->m_news->GetCal($params);
			$path = $this->uri->segment_array();
			$path[2] = $cal;
			redirect($path); // Nếu ko có catalog thì chuyển hướng lại cho đúng catalog chứa tin tức này
		}
	}

}//class
