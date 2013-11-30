<?php

/**
* Download_Controller contains general functionality for the Download section.
*
* The Download_Controller contains general functionality for the
* Download section such as loading the necessary helpers, libraries, and
* and models. It also contains the download functionality
* for files.
*
* @package  Product Catalog
* @author   Schmar James
* @access   public
*/

class Download_Controller extends MY_Controller {
	
	
	/**
	 * Constructor
	 *
	 * @access	public
	 */
	 
	function __construct() {
		parent::__construct();
		$this->data['meta_title'] = 'Laser Marking Systems';
		$this->load->helper('form');
		$this->load->helper('download');
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->model('user_m');
		$this->load->model('dashboard_m');
		$this->load->model('dashboard_image_m');
		$this->load->model('upload_m');
		
		// Login check
		$exception_uris = array(
			'download/dashboard/login',
			'download/dashboard/logout'
		);
		if (in_array(uri_string(), $exception_uris) == FALSE) {
			if ($this->user_m->loggedin() == FALSE) {
				redirect('download/dashboard/login');
			}
		}
	}
	
	
	/**
	 * Downloads files
	 *
	 * Checks to see if chosen file has a path that exist.
	 * If so the file will be downloaded to the users local
	 * machine.
	 * 
	 * @param string $path
	 * @param string $name
	 * @return bool
	 */
	
	public function do_download($path, $name) {
		// Download functionality
		$file_content = file_get_contents($path.$name);
		
		if(file_exists($path.$name) == FALSE) {
			return false;
			exit;
		}
		
		force_download($name, $file_content);
		return true;
	}
}