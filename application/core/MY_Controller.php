<?php 

/**
* MY_Controller contains general controller functionality.
*
* The MY_Controller contains general functionality for the
* controller subclass such declaring the $data array variable
* that will be used to hold I/O data.
*
* @package  Product Catalog
* @author   Schmar James
* @access   public
*/

class MY_Controller extends CI_Controller {
	
	public $data = array();
	
	
	/**
	 * Constructor
	 *
	 * @access	public
	 */
	 
	function __construct() {
		parent::__construct();
		$this->data['errors'] = array();
		$this->data['site_name'] = config_item('site_name');
	}	
	
}