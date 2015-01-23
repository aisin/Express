<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Profile_mdl extends CI_Model {

	function __construct(){

		parent::__construct();
		$this->load->library('session');
		$this->load->database();
		$this->load->helper(array('url',  'form'));
		//$this->load->model(array('Encrypt'));
		
	}

	function get_data( $username ) {

		$query = $this->db->query("SELECT name, email, username, country, address, gender FROM `users` WHERE `username`= '". $username . "'");

		return $query->num_rows > 0 ? $query->row_array() : FALSE;

	}

	function update_data($username, $data) {

		$this->db->where('username', $username);

  		$this->db->update('users', $data);

  		return $this->db->affected_rows() > 0;

	}
}