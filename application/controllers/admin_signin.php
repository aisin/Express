<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_signin extends CI_Controller {
	
	function __construct(){
		
		parent::__construct();
		$this->load->library(array('session', 'form_validation', 'Common'));
		$this->load->model(array('Auth', 'Adm_topnav_mdl'));
		$this->load->helper(array('html','form', 'url'));
	
	}
	
	function index(){
		
		if($this->Auth->check_logged() === TRUE) redirect( site_url(ADMINPATH . 'dashboard') );
		
		$data = Array(
			'title' => 'Login Page',
			'menu' =>  $this->Adm_topnav_mdl->menu(),
			'info' => ''
		);
		
		if($this->input->post('submit_login')) {
			
			$this->form_validation->set_rules('username', 'username', 'trim|required|min_length[3]|max_length[20]|xss_clean');
			$this->form_validation->set_rules('password', 'password', 'trim|required|min_length[5]|max_length[35]|xss_clean');
				
			if ($this->form_validation->run() === TRUE){
				
				$login_array = array($this->input->post('username'), $this->input->post('password'));
				
				if($this->Auth->process_login($login_array)){

					redirect(site_url(ADMINPATH . 'dashboard'));
					
				}else{
					
					$data['info'] = "Invalid username or password.";
					
				}
			}

		}

		$this->load->view('admin/signin.php', $data);
	
	}

	function signout(){
		
		$this->session->sess_destroy();
	
		redirect(site_url(ADMIN_SIGNIN));
	
	}
}