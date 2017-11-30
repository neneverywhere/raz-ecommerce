<?php class c_product_catalog extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$db = $this->load->database();
		$this->load->helper('url');
		$this->load->model('frontend/m_header');
		$this->load->model('frontend/m_home');
		$this->load->model('frontend/m_footer');
		$this->load->model('frontend/m_product_catalog');
	}

	public function ListProduct() {
		$params = $this->uri->segment(2);
		$data['Title'] = $this->m_product_catalog->Title($params);
		$data['Keyword'] = $this->m_product_catalog->Keyword($params);
		$data['Description'] = $this->m_product_catalog->Description($params);
		$data['Des'] = $this->m_product_catalog->Des($params);
		$data['sidebar'] = $this->m_product_catalog->sidebar();
		$data['webcrumb'] = $this->m_product_catalog->Webcrumb();
		//Phân trang
		$total = $this->m_product_catalog->CProduct($params); //Tổng số sản phẩm trong danh mục
		$perpage = 12; // Số sản phẩm trên 1 trang
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
		$config['base_url'] =  base_url().'san-pham/'.$params.'/';
		$config['uri_segment']	 =  3;
		$this->pagination->initialize($config); 
		$pagination =  $this->pagination->create_links(); // Khởi tạo phân trang
		$offset  =  ($this->uri->segment(3)=='') ? 0 : $this->uri->segment(3);
		$data['ListProduct']=$this->m_product_catalog->ListProduct($params,$offset,$perpage);
		$data['pagination'] = $pagination; // Lấy thanh phân trang ra view


		$this->load->view('frontend/product-catalog',$data);
	}
}//class
