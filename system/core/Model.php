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
 * CodeIgniter Model Class
 *
 * @package		CodeIgniter
 * @subpackage	Libraries
 * @category	Libraries
 * @author		EllisLab Dev Team
 * @link		http://codeigniter.com/user_guide/libraries/config.html
 */
class CI_Model {

	/**
	 * Constructor
	 *
	 * @access public
	 */
	function __construct()
	{
		log_message('debug', "Model Class Initialized");
	}

	/**
	 * __get
	 *
	 * Allows models to access CI's loaded classes using the same
	 * syntax as controllers.
	 *
	 * @param	string
	 * @access private
	 */
	function __get($key)
	{
		$CI =& get_instance();
		return $CI->$key;
	}

	function Strip($str){
		if(!$str) return false;
		$unicode = array(
		 ''=>'!|@|#|$|%|^|&|*|(|)|:|"|\'|/|+|\\|=|.|?|_',
		);
		foreach($unicode as $khongkytu=>$cokytu) {
		  $arr = explode("|",$cokytu);
		  $str = str_replace($arr,$khongkytu,$str);
		}
		return $str;
	}
	function stripUnicode($str){
		if(!$str) return false;
		$unicode = array(
		 'a'=>'á|à|ả|ã|ạ|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ',
		 'A'=>'Á|À|Ả|Ã|Ạ|Ă|Ắ|Ằ|Ẳ|Ẵ|Ặ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ',
		 'd'=>'đ',
		 'D'=>'Đ',
		 'e'=>'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ',
		 'E'=>'É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ',
		 'i'=>'í|ì|ỉ|ĩ|ị',	  
		 'I'=>'Í|Ì|Ỉ|Ĩ|Ị',
		 'o'=>'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ',
		 'O'=>'Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ',
		 'u'=>'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự',
		 'U'=>'Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự',
		 'y'=>'ý|ỳ|ỷ|ỹ|ỵ',
		 'Y'=>'Ý|Ỳ|Ỷ|Ỹ|Ỵ'
		);
		foreach($unicode as $khongdau=>$codau) {
		  $arr = explode("|",$codau);
		  $str = str_replace($arr,$khongdau,$str);
		}
		return $str;
	}

	// Hàm thay đổi name -> alias name
	public function changeTitle($str){
		$str = $this->stripUnicode($str);//cắt dấu
		$str = $this->Strip($str);// bỏ ký tự đặc biệt
				
		$str = trim($str);		
		while (strpos($str,'  ')>0) $str = str_replace("  "," ",$str);
		$str = mb_convert_case($str , MB_CASE_LOWER , 'utf-8');
		// MB_CASE_UPPER/MB_CASE_TITLE/MB_CASE_LOWER
		$str = str_replace(" - "," ",$str);
		$str = str_replace(" ","-",$str);
		$str = str_replace('"',"",$str);
		$str = str_replace('“',"",$str);
		$str = str_replace('”',"",$str);
		$str = str_replace(',',"",$str);
		$str = str_replace('.',"",$str);
		$str = str_replace('+',"",$str);
		$str = str_replace('*',"",$str);
		$str = str_replace('!',"",$str);
		$str = str_replace('#',"",$str);
		$str = str_replace('@',"",$str);
		$str = str_replace('&',"",$str);
		$str = str_replace('(',"",$str);
		$str = str_replace(')',"",$str);
		$str = str_replace('--',"-",$str);
		$str = str_replace('---',"-",$str);
		return $str;
	}

	public function CutArray($str,$limit){
	    if(strlen($str)<=$limit) return $str;
	    return mb_substr($str,0,$limit-3,'UTF-8').'...';
	}
}
// END Model Class

/* End of file Model.php */
/* Location: ./system/core/Model.php */