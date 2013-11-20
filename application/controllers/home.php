<?php
class Home extends Frontend_Controller {
	
	public function __construct() {
		parent::__construct();
		$home_data = array();
		$this->data['products'] = json_encode(array('product' => $this->dashboard_m->get(), JSON_FORCE_OBJECT));
		$this->data['product_images'] = json_encode(array('product_image' => $this->dashboard_image_m->get(), JSON_FORCE_OBJECT));
	}
	
	public function index() {
		$this->load->view('index', $this->data);
	}
	
		
}