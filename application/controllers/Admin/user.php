<?php 

/**
* User is a class that contains functionality for the user page.
*
* User is a class that contains all of the code for the user
* page within the Admin section. It passes all of the queries 
* that deal with the user_m table. It also is responsible for 
* the validation of any forms within the user section.
*
* Example usage:
* echo empty($user->id) ? 'Add a new user' : 'Edit user ' . $user->name;
*
* @package  Product Catalog
* @author   Schmar James
* @access   public
*/

 class User extends Admin_Controller {
 	
 	
 	/**
 	 * Constructor
 	 *
 	 * @access	public
 	 */
 	 
 	public function __construct() {
 		parent::__construct();
 	}
 	
 	
 	/**
 	 * Pass data to user view
 	 *
 	 * Selects all rows from user_m table and passes 
 	 * data into data variable, which is included within the
 	 * user view
 	 * 
 	 */
 	
 	public function index() {
 		$this->data['users'] = $this->user_m->get();
 		$this->data['subview'] = 'admin/user/index';
 		$this->load->view('admin/_layout_main', $this->data);
 	}
 	
 	
 	/**
 	 * Validates and submits edit form
 	 *
 	 * Validates form data and runs an update or insert query based on
 	 * existents of an id within the url. I id exist it is an update, 
 	 * however if it doesn't then it is an insert for a new row
 	 * 
 	 * @param int $id
 	 */
 	
 	public function edit($id = NULL) {
 		
 		if ($id) {
 			$this->data['user'] = $this->user_m->get($id);
 			count($this->data['user']) || $this->data['errors'][] = 'User could not be found';
 		}
 		else {
 			$this->data['user'] = $this->user_m->get_new($id);
 		}
 		
 		$rules = $this->user_m->rules_admin;
 		$id || $rules['password'] .= '|required'; 
 		$this->form_validation->set_rules($rules);
 		if ($this->form_validation->run() == TRUE) {
 			$data = $this->user_m->array_from_post(array('name', 'email', 'password'));
 			$data['password'] = $this->user_m->hash($data['password']);
 			$this->user_m->save($data, $id);
 			redirect('admin/user');
 		}
 		
 		$this->data['subview'] = 'admin/user/edit';
 		$this->load->view('admin/_layout_main', $this->data);
 	}
 	
 	
 	/**
 	 * Deletes data from selected user
 	 *
 	 * Deletes row from user_m table that has a matching id attached to 
 	 * selected link within href tag
 	 * 
 	 * @param int $id
 	 * @return int
 	 */
 	
 	public function delete($id) {
 		$this->user_m->delete($id);
 		redirect('admin/user');
 	}
 	
 	
 	/**
 	 * Logins user into admin section
 	 *
 	 * Validates that the email and password matches a row
 	 * within the user_m table. If so they will be redirected 
 	 * to the dashboard page.
 	 * 
 	 */
 	
 	public function login() {
 		$dashboard = 'admin/dashboard';
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
 				redirect('admin/user/login', 'refresh');
 			}
 		}
 		$this->data['subview'] = 'admin/user/login';
 		$this->load->view('admin/_layout_modal', $this->data);
 	}
 	
 	
 	/**
 	 * Logs user out of the admin section
 	 *
 	 * Redirects the user to the user login page;
 	 * 
 	 */
 	
 	public function logout() {
 		$this->user_m->logout();
 		redirect('admin/user/login');
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