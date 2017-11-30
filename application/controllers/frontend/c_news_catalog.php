<?php class c_news_catalog extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$db = $this->load->database();
		$this->load->helper('url');
		$this->load->model('frontend/m_header');
		$this->load->model('frontend/m_footer');
		$this->load->model('frontend/m_home');
		$this->load->model('frontend/m_news_catalog');
	}

	public function ListNews() {
		$params = $this->uri->segment(2);
		$data['Title'] = $this->m_news_catalog->Title($params);
		$data['Keyword'] = $this->m_news_catalog->Keyword($params);
		$data['Description'] = $this->m_news_catalog->Description($params);
		$data['sidebar'] = $this->m_news_catalog->sidebar($params);
		//Phân trang
		$total = $this->m_news_catalog->CNews($params); //Tổng số tin trong danh mục
		$perpage = 10; // Số tin trên 1 trang
		$this->load->library('pagination');
		$config['total_rows']  =  $total;
		$config['per_page']  =  $perpage;
		$config['next_link'] =  'Next »';
		$config['prev_link'] =  '« Prev';
		$config['num_tag_open'] =  '';
		$config['num_tag_close'] =  '';
		$config['num_links']	=  5;
		$config['cur_tag_open'] =  '<a class="currentpage">';
		$config['cur_tag_close'] =  '</a>';
		$config['base_url'] =  base_url().'tin-tuc/'.$params.'/';
		$config['uri_segment']	 =  3;
		$this->pagination->initialize($config); 
		$pagination =  $this->pagination->create_links(); // Khởi tạo phân trang
		$offset  =  ($this->uri->segment(3)=='') ? 0 : $this->uri->segment(3);
		$data['ListNews']=$this->m_news_catalog->ListNews($params,$offset,$perpage);
		$data['pagination'] = $pagination; // Lấy thanh phân trang ra view


		$this->load->view('frontend/news-catalog',$data);
	}
}//class
