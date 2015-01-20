<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {
	
	function __construct(){
		parent::__construct();
		$this->load->library(array('session', 'form_validation'));
		$this->load->model(array('CI_auth', 'CI_menu'));
		$this->load->helper(array('html','form', 'url'));
	}
	
	function index(){
		
		if($this->CI_auth->check_logged() === true) redirect( site_url('/logged/') );

		$data = Array(
			'title' => 'Login Page',		//页面title
			'menu' =>  $this->CI_menu->menu(),	//顶部菜单
			'info' => ''
		);
		
		if($this->input->post('submit_login')) {
			
			$this->form_validation->set_rules('username', 'username', 'trim|required|min_length[3]|max_length[20]|xss_clean');
			$this->form_validation->set_rules('password', 'password', 'trim|required|min_length[5]|max_length[35]|xss_clean');
				
			if ($this->form_validation->run() === TRUE){
				
				$login_array = array($this->input->post('username'), $this->input->post('password'));
				
				if($this->CI_auth->process_login($login_array)){        //login successfull

					redirect(site_url('/logged/'));
					
				}else{
					
					$data['info'] = "Invalid username or password.";
					
				}
			}

		}

		$this->load->view('login/login.php', $data);

	}

	function logout(){
		
		$this->session->sess_destroy();
	
		redirect(site_url().'/login/');
	
	}
}