<?php

/**
* Admin_Controller contains general functionality for the Admin section.
*
* The Admin_Controller contains general functionality for the
* Admin section such as loading the necessary helpers, libraries, and
* and models. It also contains the upload and delete functionality
* for files.
*
* Example usage:
* $this->data['upload_info'] = $this->do_upload($image_upload_path);
*
* @package  Product Catalog
* @author   Schmar James
* @access   public
*/

class Admin_Controller extends MY_Controller {
	
	
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
		
		// Login check
		$exception_uris = array(
			'admin/user/login',
			'admin/user/logout'
		);
		if (in_array(uri_string(), $exception_uris) == FALSE) {
			if ($this->user_m->loggedin() == FALSE) {
				redirect('admin/user/login');
			}
		}
	}
	
	
	/**
	 * Upload files
	 *
	 * Checks each file within the $_FILES array and runs
	 * a validation to see if it has the correct path and 
	 * file size. If so the file will get uploaded to 
	 * the specified path
	 * 
	 * @param string $path
	 * @return array
	 */
	
	public function do_upload($path) {	
		$config['allowed_types'] = '*';
		$config['upload_path'] = $path;
		$config['max_size']	= '0';
		$this->upload->initialize($config);
		$this->load->library('upload', $config);
		$this->data['upload_results'] = array();
		foreach ($_FILES as $key => $value) {
			if(!empty($value['tmp_name'])) {
				if ( ! $this->upload->do_upload($key)) {
					$this->data['upload_results'] = array('error' => $this->upload->display_errors());
				    //failed display the errors
				} else {
				    //success
				    $this->data['upload_results'][] = array('upload_data' => $this->upload->data());
				}
			}
		}
		return $this->data;	
	}	
	
	
	/**
	 * Deletes files
	 *
	 * Checks each file within the $delete_image file to check
	 * if its path exist. If so this file will be deleted
	 * from the chosen path. The id that is related to these
	 * will be check within the dashboard_image_m table to see
	 * if it matches the product_id field. If so this row will
	 * be deleted from the table.
	 * 
	 * @param array $delete_image
	 * @param int $id
	 * @param string $file_path
	 * @return bool
	 */
	 
	public function delete_upload($delete_image, $id, $file_path) {
		$path = realpath(dirname(__FILE__).$file_path);
		for ($i = 0; $i<count($delete_image); $i++) {
		  
			if(is_readable($path.'/'.$delete_image)) {
		  		unlink($path.'/'.$delete_image);
			}
			$delete_file_data = array("product_id" => $id, "file_name" => $delete_image);
			$this->dashboard_image_m->delete_by($delete_file_data);
		}
		return true;
	}
}