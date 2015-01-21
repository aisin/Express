<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class CI_menu extends CI_Model {

	function __construct(){
		parent::__construct();
		$this->load->library('session');
		$this->load->database();
		$this->load->helper('url');
		$this->load->model(array('CI_auth'));
	}

	/*
	function create_menu($array_menu, $separator =' | '){
		
		$data = array(
			'menu' => $array_menu,
			'separator' => $separator
		);
		
		//return $this->load->view('_links',$data, true);
		return $data;
	}
	*/

	function menu(){

		$menu_common = array(
			'Home' => site_url(),
			'Dashboard' => site_url('/logged/')
			//'People' => '#',
			//'News' => '#'
		);

		$menu_unlogged = array(
			'Register' => site_url('/register/'),
			'Login' => site_url('/login/')
		);

		$menu_logged = array(
			'Profile' => site_url('/profile/'),
			'Logout' => site_url('/login/logout/')
		);

		$menu = array_merge($menu_common,($this->CI_auth->check_logged() == true)?$menu_logged:$menu_unlogged);
		
		//return $this->create_menu($menu);
		return $menu;
	}

}