<?php

/**
* MY_Model contains general database functionality.
*
* The MY_Model contains general functionality for the
* database such as inserting, updating, selecting, and
* deleting data.
*
* @package  Product Catalog
* @author   Schmar James
* @access   public
*/

class MY_Model extends CI_Model {

	protected $_table_name = '';
	protected $_primary_key = 'id';
	protected $_primary_filter = 'intval';
	protected $_order_by = '';
	public $rules = array();
	protected $_timestamps = FALSE;


	/**
	 * Constructor
	 *
	 * @access	public
	 */
	 
	function __construct() {
		parent::__construct();
	}
	
	
	/**
	 * Provides associative array of form data
	 *
	 * Takes array of form data and transforms
	 * it into an associative array for the form
	 * validation library.
	 * 
	 * @param array $fields
	 * @return array
	 */
	 
	public function array_from_post($fields) {
		$data = array();
		foreach($fields as $field) {
			$data[$field] = $this->input->post($field);
		}
		return $data;
	}
	
	
	/**
	 * Gets data from selected table
	 *
	 * Get a row or all rows from selected table.
	 * 
	 * @param int $id
	 * @param bool $single
	 * @return array
	 */
	
	public function get($id = NULL, $single = FALSE){
		
		if ($id != NULL) {
			$filter = $this->_primary_filter;
			$id = $filter($id);
			$this->db->where($this->_primary_key, $id);
			$method = 'row';
		}
		elseif ($single == TRUE) {
			$method = 'row';
		}
		else {
			$method = 'result';
		}
		
		if (!count($this->db->ar_orderby)) {
			$this->db->order_by($this->_order_by);
		}
		
		return $this->db->get($this->_table_name)->$method();
	}
	
	
	/**
	 * Selects data by where clause
	 *
	 * Selects data from specified table based
	 * on where clause.
	 * 
	 * @param string $where
	 * @param bool $single
	 * @return int
	 */
	
	public function get_by ($where, $single = FALSE) {
		$this->db->where($where);
		return $this->get(NULL, $single);
	}
	
	public function save ($data, $id = NULL) {
		// Set timestamps
		if ($this->_timestamps == TRUE) {
			$now = date('Y-m-d H:i:s');
			$id || $data['created'] = $now;
			$data['modiffied'] = $now;
		}
		
		// Insert
		if ($id === NULL) {
			!isset($data[$this->_primary_key]) || $data[$this->_primary_key] = NULL;
			$this->db->set($data);
			$this->db->insert($this->_table_name);
			$id = $this->db->insert_id();
		}
		// Update
		else {
			$filter = $this->_primary_filter;
			$id = $filter($id);
			$this->db->set($data);
			$this->db->where($this->_primary_key, $id);
			$this->db->update($this->_table_name);
		}
		
		return $id;
	}
	
	
	/**
	 * Deletes data based on where clause
	 *
	 * Deletes data from a specified table based
	 * on where clause
	 * 
	 * @param array $delete_where
	 */
	 
	public function delete_by($delete_where=array()) {
	
		foreach ($delete_where as $key => $value) {
			$this->db->where($key,$value);
		}
		$this->db->delete($this->_table_name);
	}
	
	
	/**
	 * Deletes data from selected table.
	 *
	 * Deletes a row from a specified table based
	 * on matching id.
	 * 
	 * @param int $id
	 * @return bool
	 */
	 
	public function delete($id) {
		$filter = $this->_primary_filter;
		$id = $filter($id);
		
		if (!$id) {
			return FALSE;
		}
		$this->db->where($this->_primary_key, $id);
		$this->db->limit(1);
		$this->db->delete($this->_table_name);
	}
}