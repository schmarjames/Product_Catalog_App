<?php
class Dashboard_image_m extends MY_Model {

	protected $_table_name = 'product_images';
	protected $_order_by = 'product_id';
	
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