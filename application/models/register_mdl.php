<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Register_mdl extends CI_Model {

	function __construct(){

		parent::__construct();
		$this->load->library('session');
		$this->load->database();
		//$this->load->helper(array('url',  'form'));
		//$this->load->model(array('Encrypt'));
		
	}

	function chk_exist($username, $email) {

		$sql = "SELECT * FROM `users` WHERE `username`='$username' OR `email`='$email'";
		
		$query = $this->db->query( $sql );

		return $query->num_rows() > 0;

	}

	function add_user($data) {

		$this->db->insert('users', $data);

		return $this->db->affected_rows() > 0;

	}


}