<?php

class Jquery extends Controller {
	
	function __construct() {
		parent::Controller();
	}
	
	function index() {
		$data['main_content'] = 'test/jquery/jquery_example';
		$this->load->view('template', $data); 	
	}
	
	function get_example() {
		$data['main_content'] = 'test/jquery/get_example';
		$this->load->view('template', $data);
	}
	
	function task() {
		if (IS_AJAX) {
			echo "this is my loaded content";	
		} else {
			echo 'Direct acces not allowed';
		}
	}
	
	function post_example() {
		$data['main_content'] = 'test/jquery/post_example';
		$this->load->view('template', $data);
	}
	
	function process_form() {
		$this->form_validation->set_rules('first_name', 'First Name' ,'required|xss_clean');
		$this->form_validation->set_rules('last_name', 'Last Name' , 'required|xss_clean');
		
		if ($this->form_validation->run() == FALSE) {
			echo validation_errors();
		} else {
			echo 1; 
		}
	}
	
}//end Jquery class

?>