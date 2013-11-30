<?php 

/**
* Dashboard is a class that contains functionality for the dashboard page.
*
* Dashboard is a class that contains all of the code for the dashboard
* page within the Admin section. It passes all of the queries 
* that deal with the dashboard_m and dashboard_image_m table. It is also 
* responsible for the validation of any forms within the dashboard section.
*
* @package  Product Catalog
* @author   Schmar James
* @access   public
*/

class Dashboard extends Admin_Controller {
	
	
	/**
	 * Constructor
	 *
	 * @access	public
	 */
	 
	public function __construct() {
		parent::__construct();
	}
	
	
	/**
	 * Pass data to dashboard view
	 *
	 * Selects all rows from dashboard_m table and passes 
	 * data into data variable, which is included within the
	 * dashboard view.
	 * 
	 */
	
	public function index() {
		$this->data['products'] = $this->dashboard_m->get();
		$this->data['subview'] = 'admin/dashboard/index';
		$this->load->view('admin/_layout_main', $this->data);
	}
	
	public function modal() {
		$this->load->view('admin/_layout_modal', $this->data);
	}
	
	
	/**
	 * Validates and submits edit form
	 *
	 * Validates form data and runs an update or insert query based on
	 * existents of an id within the url. If id exist it is an update, 
	 * however if it doesn't then it is an insert for a new row.
	 * 
	 * @param int $id
	 */
	
	public function edit($id = NULL) {
		
		if($id) {
			$this->data['product'] = $this->dashboard_m->get($id);
			$this->data['product_file_name'] = $this->dashboard_image_m->get_by('product_id ='.$id);
			count($this->data['product']) || $this->data['errors'][] = 'Product could not be found';
			
			// check if $_POST['check_image'] array exist
			if(isset($_POST['image_check'])) {
				$post_delete_image = $_POST['image_check'];
				$this->delete_upload($post_delete_image, $id);
			}
		}
		else {
			$this->data['product'] = $this->dashboard_m->get_new($id);
		}
		$image_upload_path = '../public_html/media/';
		$this->data['upload_info'] = $this->do_upload($image_upload_path);
		$this->data['image_query'] = array();
		$rules = $this->dashboard_m->product_rules;
		$this->form_validation->set_rules($rules);
		if ($this->form_validation->run() == TRUE) {
			$data = $this->dashboard_m->array_from_post(array(
				'name', 'price', 'description', 'highlight_message1', 'highlight_message2', 'bullet_list_title1',
				'bullet_point1_1', 'bullet_point1_2', 'bullet_point1_3', 'bullet_point1_4', 'bullet_point1_5',
				'bullet_list_title2', 'bullet_point2_1', 'bullet_point2_2', 'bullet_point2_3', 'bullet_point2_4',
				'bullet_point2_5', 'warranty_message'));
				
			$product_id = $this->dashboard_m->save($data, $id);
			$info = $this->data['upload_info']['upload_results']; 
			$image_query_data = array();
			$image_data = array('', 'file_name', 'file_path', 'orig_name', 'file_size', 'image_width', 'image_height', 'file_type', 'image_type');
					
			for ($j = 0; $j<count($info); $j++) {			
				foreach($info[$j]['upload_data'] as $key=>$value) {	
				
					if(	$key == 'image_width' && $value == '' || $key == 'image_height' && $value == '' ) {
						$value = 0;
					}
					
					if(array_search($key, $image_data)) {
						$image_query_data[$key] = $value;
					}
				}
			
				$image_query	= 	array_slice($image_query_data, 0, 0, true) + 
									array('product_id' => $product_id) +
									array_slice($image_query_data, 0, NULL, true);
					
				$this->dashboard_image_m->save($image_query);
						
				unset($image_query_data);
				$image_query_data = array();
			}
			
			redirect('admin/dashboard');
			// debugging: $this->load->view('admin/dashboard/index', $this->data);
		}
		
		$this->data['subview'] = 'admin/dashboard/edit';
		$this->load->view('admin/_layout_main', $this->data);
	}
	
	
	/**
	 * Deletes data from selected product
	 *
	 * Deletes row from dashboard_m table that has a matching id attached to 
	 * selected link within href tag.
	 * 
	 * @param int $id
	 * @return int
	 */
	
	public function delete($id) {
		$this->dashboard_m->delete($id);
		$image_upload_path = '/../../public_html/media/';
		$image_rows = $this->dashboard_image_m->get_by('product_id ='.$id);
		for ($n=0; $n<count($image_rows); $n++) {
				$delete_file_data = array("product_id" => $id, "file_name" => $image_rows[$n]->file_name);
				$this->dashboard_image_m->delete_by($delete_file_data);
				$this->delete_upload($image_rows[$n]->file_name, $id, $image_upload_path);
		}
		redirect('admin/dashboard/index');
	}
}