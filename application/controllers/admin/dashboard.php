<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	
	function __construct(){
		
		parent::__construct();
		$this->load->library(array('session'));
		$this->load->model(array('Auth', 'Adm_topnav_mdl'));
		$this->load->helper(array('html','url'));
	
	}
	
	function index(){
		
		if($this->Auth->check_logged()===FALSE) redirect(site_url(ADMIN_SIGNIN));
		
		$data = Array(
			'title' => 'Dashboard Page',
			'menu' =>  $this->Adm_topnav_mdl->menu()
		);

		$this->load->view('admin/dashboard.php', $data);

	}
}