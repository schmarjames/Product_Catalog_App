<?php
class Admin_Controller extends MY_Controller {
	
	function __construct() {
		parent::__construct();
		$this->data['meta_title'] = 'Laser Marking Systems';
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->model('user_m');
		$this->load->model('dashboard_m');
		$this->load->model('dashboard_image_m');
		
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
	
	public function do_upload() {
	
		
		$config['allowed_types'] = '*';
		$config['upload_path'] = '../public_html/media/';
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
	
	public function delete_upload($delete_image, $id) {
		$path = realpath(dirname(__FILE__).'/../../public_html/media/');
		
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