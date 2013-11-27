<?php 
class Upload extends Admin_Controller {
	
	public function __construct() {
		parent::__construct();
	}
	
	
	public function index() {
		$this->data['uploads'] = $this->upload_m->get();
		$this->data['subview'] = 'admin/upload/index';
		$this->load->view('admin/_layout_main', $this->data);
	}
	
	public function modal() {
		$this->load->view('admin/_layout_modal', $this->data);
	}
	
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
	
	public function delete($id) {
		$upload_file = $this->upload_m->get($id);
		$upload_file_path = '/../../public_html/uploads/';
		$this->delete_upload($upload_file->file_name, $id, $upload_file_path);
		$this->upload_m->delete($id);
	
		redirect('admin/upload/index');
	}
}