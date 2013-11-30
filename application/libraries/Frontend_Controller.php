<?php

/**
* Frontend_Controller contains general functionality for the Frontend section.
*
* The Frontend_Controller contains general functionality for the
* frontend section such as loading the necessary helpers, libraries, and
* and models.
*
* @package  Product Catalog
* @author   Schmar James
* @access   public
*/

class Frontend_Controller extends MY_Controller {
	
	
	/**
	 * Constructor
	 *
	 * @access	public
	 */
	 
	function __construct() {
		parent::__construct();
		$this->data['meta_title'] = 'Laser Marking Systems';
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->model('user_m');
		$this->load->model('dashboard_m');
		$this->load->model('dashboard_image_m');
		$this->load->model('upload_m');
	}
		
}