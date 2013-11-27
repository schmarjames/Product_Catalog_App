<?php
class Upload_m extends MY_Model {

	protected $_table_name = 'uploads';
	protected $_order_by = 'name';
	public $upload_rules = array(
		'name' => array(
			'field' => 'name', 
			'label' => 'Item Name', 
			'rules' => 'trim|required|xss_clean|max_length[70]'
		),
		'description' => array(
			'field' => 'description', 
			'label' => 'Description', 
			'rules' => 'trim|required|max_length[500]'
		),
	);
	
	function __construct() {
		parent::__construct();
	}
	
	public function get_new() {
		$upload = new stdClass();
		$upload->name = '';
		$upload->description = '';
		return $upload;
	}
	
}