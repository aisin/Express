<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Logged extends CI_Controller {
	
	function __construct(){
		
		parent::__construct();
		$this->load->library(array('session'));
		$this->load->model(array('CI_auth', 'CI_menu'));
		$this->load->helper(array('html','url'));
	
	}
	
	function index(){
		
		if($this->CI_auth->check_logged() === FALSE) redirect(site_url().'/login/');
		
		else{

			
			//$data['title'] = 
			
			
			//$data['menu'] = $this->CI_menu->menu();

			$data = Array(
				'title' => 'Logged Page',			//页面title
				'menu' =>  $this->CI_menu->menu()	//顶部菜单
			);


			//$data['body'] = 'You are logged in MEMBER AREA <br/> <br/> <a href="'.site_url().'/login/logout/"> Click here </a> to logout';
			$this->load->view('logged/dashboard.php', $data);
			
		}
	
	}
}