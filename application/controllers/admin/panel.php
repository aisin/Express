<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Panel extends CI_Controller {
	
	function __construct(){
		parent::__construct();
		$this->load->helper(array('url'));
		$this->load->model(array('CI_menu'));
	}

	function index() {

		$data = Array(
			'title' => 'Panel Page',
			'menu' =>  $this->CI_menu->menu()
		);

		$this->load->view('panel_v', $data);

	}

}