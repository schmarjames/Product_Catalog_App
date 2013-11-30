<?php

/**
* Migration is a class loads the migrations library.
*
* @package  Product Catalog
* @author   Schmar James
* @access   public
*/

class Migration extends Admin_Controller {
	
	/**
	 * Constructor
	 *
	 * @access	public
	 */
	 
	public function __construct() {
		parent::__construct();
	}
	
	
	/**
	 * Includes the migrations library
	 *
	 * Includes the migrations library, which enables
	 * any subclass to set rules to generate a table
	 * 
	 */
	
	public function index() {
		$this->load->library('migration');
		if (!$this->migration->current()) {
			show_error($this->migration->error_string());
		}
		else {
			echo "the migration worked";
		}
	}
	
}