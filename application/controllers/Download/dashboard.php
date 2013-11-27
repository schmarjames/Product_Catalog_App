<?php 
class Dashboard extends Download_Controller {
	
	public function __construct() {
		parent::__construct();
	}
	
	
	public function index() {
		$this->data['uploads'] = $this->upload_m->get();
		$this->data['subview'] = 'download/dashboard/index';
		$this->load->view('download/_layout_main', $this->data);
	}
	
	public function select_download($id = NULL) {
		
		if ($id) {
			$this->data['download'] = $this->upload_m->get($id);
			if(!count($this->data['download'])) {
				$this->session->set_flashdata('error', 'Download could not be found');
				redirect('download/dashboard', 'refresh');
			} 
		} else {
			$this->data['errors'][] = 'Download could not be found';
			redirect('download/dashboard');
		}
		
		$file_name = $this->data['download']->file_name;
		$file_path = $this->data['download']->file_path;
		$download_result = $this->do_download($file_path, $file_name);
		
		var_dump($download_result); die;
	}
	
	public function modal() {
		$this->load->view('download/_layout_modal', $this->data);
	}
	
	public function login() {
		$dashboard = 'download/dashboard';
		$this->user_m->loggedin() == FALSE || redirect($dashboard);
		
		$rules = $this->user_m->rules;
		$this->form_validation->set_rules($rules);
		if ($this->form_validation->run() == TRUE) {
			// We can login and redirect
			if ($this->user_m->login() == TRUE) {
				redirect($dashboard);
			}
			else {
				$this->session->set_flashdata('error', 'That email/password combination does not exist');
				redirect('download/dashboard/login', 'refresh');
			}
		}
		$this->data['subview'] = 'download/dashboard/login';
		$this->load->view('download/_layout_modal', $this->data);
	}
	
	public function logout() {
		$this->user_m->logout();
		redirect('download/dashboard/login');
	}
	
	public function _unique_email($str) {
	
		$id = $this->uri->segment(4);
		$this->db->where('email', $this->input->post('email'));
		!$id || $this->db->where('id !=', $id);
		$user = $this->user_m->get();
		
		if (count($user)) {
			$this->form_validation->set_message('_unique_email', '%s should be unique.');
			
			return FALSE;
		}
		
		return TRUE;
	}
}