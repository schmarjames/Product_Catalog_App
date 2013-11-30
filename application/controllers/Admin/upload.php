<?php 

/**
* Upload is a class that contains functionality for the Upload page.
*
* Upload is a class that contains all of the code for the user
* page within the Download section. It passes all of the queries 
* that deal with the upload_m table. It also is responsible for 
* the validation of any forms within the Upload section.
*
* Example usage:
* echo form_input('name', set_value('name', $upload->name), 'class="form-control"');
*
* @package  Product Catalog
* @author   Schmar James
* @access   public
*/

class Upload extends Admin_Controller {
	
	public function __construct() {
		parent::__construct();
	}
	
	
	/**
	 * Pass data to upload view
	 *
	 * Selects all rows from upload_m table and passes 
	 * data into data variable, which is included within the
	 * upload view
	 * 
	 */
	 
	public function index() {
		$this->data['uploads'] = $this->upload_m->get();
		$this->data['subview'] = 'admin/upload/index';
		$this->load->view('admin/_layout_main', $this->data);
	}
	
	public function modal() {
		$this->load->view('admin/_layout_modal', $this->data);
	}
	
	
	/**
	 * Validates and submits new_upload form
	 *
	 * Validates form data and runs an insert query. 
	 * 
	 */
	
	public function new_upload() {
		
		$this->data['upload'] = $this->upload_m->get_new();
		$upload_file_path = '../public_html/uploads/';
		$this->data['upload_info'] = $this->do_upload($upload_file_path);
		$rules = $this->upload_m->upload_rules;
		$this->form_validation->set_rules($rules);
		if ($this->form_validation->run() == TRUE) {
			$data = $this->upload_m->array_from_post(array('name', 'description'));	
			$info = $this->data['upload_info']['upload_results'][0]['upload_data']; 
			$data['file_name'] = $info['file_name']; 
			$data['file_path'] = $info['file_path'];
			$data['file_size'] = $info['file_size'];
			$data['file_type'] = $info['file_type'];
			$this->upload_m->save($data);
			
			redirect('admin/upload');
			// debugging: $this->load->view('admin/upload/index', $this->data);
		}
		
		$this->data['subview'] = 'admin/upload/new_upload';
		$this->load->view('admin/_layout_main', $this->data);
	}
	
	
	/**
	 * Deletes data from selected upload
	 *
	 * Deletes row from user_m table that has a matching id attached to 
	 * selected link within href tag
	 * 
	 * @param int $id
	 * @return int
	 */
	
	public function delete($id) {
		$upload_file = $this->upload_m->get($id);
		$upload_file_path = '/../../public_html/uploads/';
		$this->delete_upload($upload_file->file_name, $id, $upload_file_path);
		$this->upload_m->delete($id);
	
		redirect('admin/upload/index');
	}
}