<?php

/**
* Download is a class that contains functionality for the download page.
*
* Download is a class that contains all of the code for the download
* page within the Download section. It passes all of the queries 
* that deal with the upload_m table. It also is responsible for 
* the validation of any forms within the download section.
*
* Example usage:
* anchor('download/dashboard/select_download/' . $upload->id, $upload->name);
*
* @package  Product Catalog
* @author   Schmar James
* @access   public
*/
 
class Dashboard extends Download_Controller {
	
	
	/**
	 * Constructor
	 *
	 * @access	public
	 */
	 
	public function __construct() {
		parent::__construct();
	}
	
	
	/**
	 * Pass data to xview
	 *
	 * Selects all rows from upload_m table and passes 
	 * data into data variable, which is included within the
	 * dashboard download view
	 * 
	 */
	 
	public function index() {
		$this->data['uploads'] = $this->upload_m->get();
		$this->data['subview'] = 'download/dashboard/index';
		$this->load->view('download/_layout_main', $this->data);
	}
	
	
	/**
	 * Validates and submits upload form
	 *
	 * Validates form data and runs an insert query to the upload_m table.
	 * 
	 * @param int $id
	 */
	
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
	}
	
	
	/**
	 * modal loads the _layout_modal view
	 */
	
	public function modal() {
		$this->load->view('download/_layout_modal', $this->data);
	}
	
	
	/**
	 * logs the user into the download dashboard section
	 *
	 * Runs a validation to check if the email and password
	 * exist within the user_m table. If it does it will redirect
	 * the user to the download dashboard section. Otherwise
	 * the current login page will refresh displaying the errors.
	 */
	
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
	
	
	/**
	 * Logs user out of the download section
	 */
	
	public function logout() {
		$this->user_m->logout();
		redirect('download/dashboard/login');
	}
	
	
	/**
	 * Checks to see if email is unique.
	 *
	 * Checks to see if the posted email doesn't have
	 * a matching email within the user_m table. 
	 * 
	 * @param string $str
	 * @return bool
	 */
	 
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