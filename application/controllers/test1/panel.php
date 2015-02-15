<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Panel extends CI_Controller {
	
	function __construct(){
		parent::__construct();
		$this->load->helper(array('url'));
		$this->load->model(array('Adm_topnav_mdl'));
	}

	function index() {

		$data = Array(
			'title' => 'Panel Page',
			'menu' =>  $this->Adm_topnav_mdl->menu()
		);

		$this->load->view('panel_v', $data);

	}

}