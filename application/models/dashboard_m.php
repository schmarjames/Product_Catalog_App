<?php
class Dashboard_M extends MY_Model {

	protected $_table_name = 'products_info';
	protected $_order_by = 'name';
	public $product_rules = array(
		'name' => array(
			'field' => 'name', 
			'label' => 'Item Name', 
			'rules' => 'trim|required|xss_clean|max_length[70]'
		),
		'price' => array(
			'field' => 'price', 
			'label' => 'Price', 
			'rules' => 'trim|required'
		),
		'description' => array(
			'field' => 'description', 
			'label' => 'Description', 
			'rules' => 'trim|required|max_length[300]'
		),
		'highlight_message1' => array(
			'field' => 'highlight_message1', 
			'label' => 'Highlight Message #1', 
			'rules' => 'trim|max_length[75]'
		),
		'highlight_message2' => array(
			'field' => 'highlight_message2', 
			'label' => 'Highlight Message #2', 
			'rules' => 'trim|max_length[75]'
		),
		'bullet_list_title1' => array(
			'field' => 'bullet_list_title1', 
			'label' => 'Bullet List Title #1', 
			'rules' => 'trim|max_length[100]'
		),
		'bullet_point1_1' => array(
			'field' => 'bullet_point1_1', 
			'label' => 'Bullet Point Message #1', 
			'rules' => 'trim|max_length[80]'
		),
		'bullet_point1_2' => array(
			'field' => 'bullet_point1_2', 
			'label' => 'Bullet Point Message #2', 
			'rules' => 'trim|max_length[80]'
		),
		'bullet_point1_3' => array(
			'field' => 'bullet_point1_3', 
			'label' => 'Bullet Point Message #3', 
			'rules' => 'trim|max_length[80]'
		),
		'bullet_point1_4' => array(
			'field' => 'bullet_point1_4', 
			'label' => 'Bullet Point Message #4', 
			'rules' => 'trim|max_length[80]'
		),
		'bullet_point1_5' => array(
			'field' => 'bullet_point1_5', 
			'label' => 'Bullet Point Message #5', 
			'rules' => 'trim|max_length[80]'
		),
		'bullet_list_title2' => array(
			'field' => 'bullet_list_title2', 
			'label' => 'Bullet List Title #2', 
			'rules' => 'trim|max_length[100]'
		),
		'bullet_point2_1' => array(
			'field' => 'bullet_point2_1', 
			'label' => 'Bullet Point Message #1', 
			'rules' => 'trim|max_length[80]'
		),
		'bullet_point2_2' => array(
			'field' => 'bullet_point2_2', 
			'label' => 'Bullet Point Message #2', 
			'rules' => 'trim|max_length[80]'
		),
		'bullet_point2_3' => array(
			'field' => 'bullet_point2_3', 
			'label' => 'Bullet Point Message #3', 
			'rules' => 'trim|max_length[80]'
		),
		'bullet_point2_4' => array(
			'field' => 'bullet_point2_4', 
			'label' => 'Bullet Point Message #4', 
			'rules' => 'trim|max_length[80]'
		),
		'bullet_point2_5' => array(
			'field' => 'bullet_point2_5', 
			'label' => 'Bullet Point Message #5', 
			'rules' => 'trim|max_length[80]'
		),
		'warranty_message' => array(
			'field' => 'warranty_message', 
			'label' => 'Warranty Message', 
			'rules' => 'trim|max_length[80]'
		),
	);
	
	function __construct() {
		parent::__construct();
	}
	
	public function get_new() {
		$product = new stdClass();
		$product->name = '';
		$product->price = '';
		$product->description = '';
		$product->highlight_message1 = '';
		$product->highlight_message2 = '';
		$product->bullet_list_title1 = '';
		$product->bullet_point1_1 = '';
		$product->bullet_point1_2 = '';
		$product->bullet_point1_3 = '';
		$product->bullet_point1_4 = '';
		$product->bullet_point1_5 = '';
		$product->bullet_list_title2 = '';
		$product->bullet_point2_1 = '';
		$product->bullet_point2_2 = '';
		$product->bullet_point2_3 = '';
		$product->bullet_point2_4 = '';
		$product->bullet_point2_5 = '';
		$product->warranty_message = '';
		return $product;
	}
	
}