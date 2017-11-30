<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * CodeIgniter
 *
 * An open source application development framework for PHP 5.1.6 or newer
 *
 * @package		CodeIgniter
 * @author		EllisLab Dev Team
 * @copyright		Copyright (c) 2008 - 2014, EllisLab, Inc.
 * @copyright		Copyright (c) 2014 - 2015, British Columbia Institute of Technology (http://bcit.ca/)
 * @license		http://codeigniter.com/user_guide/license.html
 * @link		http://codeigniter.com
 * @since		Version 1.0
 * @filesource
 */

// ------------------------------------------------------------------------

/**
 * CodeIgniter Application Controller Class
 *
 * This class object is the super class that every library in
 * CodeIgniter will be assigned to.
 *
 * @package		CodeIgniter
 * @subpackage	Libraries
 * @category	Libraries
 * @author		EllisLab Dev Team
 * @link		http://codeigniter.com/user_guide/general/controllers.html
 */
class CI_Controller {

	private static $instance;

	/**
	 * Constructor
	 */
	public function __construct()
	{
		self::$instance =& $this;

		// Assign all the class objects that were instantiated by the
		// bootstrap file (CodeIgniter.php) to local class variables
		// so that CI can run as one big super object.
		foreach (is_loaded() as $var => $class)
		{
			$this->$var =& load_class($class);
		}

		$this->load =& load_class('Loader', 'core');

		$this->load->initialize();
		
		log_message('debug', "Controller Class Initialized");
	}

	public static function &get_instance()
	{
		return self::$instance;
	}

	public function tinymce(){
		$this->load->helper('url');
		$editor = '
			<script src="'. base_url() .'public/backend/tinymce/tinymce.min.js"></script>
			<script>
			 tinymce.init({ 
			    selector:"textarea#content",
			    language: "vi_VN",
			    theme: "modern",
			    plugins: [
			    "advlist autolink lists link image charmap print preview hr anchor pagebreak",
			    "searchreplace wordcount visualblocks visualchars code fullscreen",
			    "insertdatetime media nonbreaking save table contextmenu directionality",
			    "template paste textcolor colorpicker textpattern imagetools responsivefilemanager fullscreen",
			    ],
			    content_css: "'.base_url().'public/frontend/css/style.css,'.base_url().'public/frontend/css/bootstrap.css",
			    toolbar1: "insertfile undo redo | styleselect | bold italic underline | fontselect fontsizeselect  | alignleft aligncenter alignright alignjustify | table | bullist numlist outdent indent",
			    toolbar2: "print preview link unlink media image | forecolor backcolor | responsivefilemanager fullscreen code ",
				table_default_styles: {
					width: "90%",
				},
			    image_advtab: true ,
				document_base_url : "'.base_url().'",
			    relative_urls: false,
			    external_filemanager_path:"'.  base_url().'filemanager/",
			    filemanager_title:"Responsive Filemanager" ,
			    external_plugins: { "filemanager" : "'.  base_url().'filemanager/plugin.min.js"},
			  });
			</script>';
		return $editor;
	}
}
// END Controller class

/* End of file Controller.php */
/* Location: ./system/core/Controller.php */