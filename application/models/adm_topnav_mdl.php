<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Adm_topnav_mdl extends CI_Model {

	function __construct(){
		parent::__construct();
		$this->load->library('session');
		$this->load->database();
		$this->load->helper('url');
		$this->load->model(array('Auth'));
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
			'Home' => array(
							'url' => site_url(),
							'iconCls' => 'glyphicon-home'
							),
			'Dashboard' => array(
							'url' => site_url(ADMINPATH . 'dashboard'),
							'iconCls' => 'glyphicon-dashboard'
							)
		);

		$menu_unlogged = array(
			'Sign up' => site_url('signup'),
			'Sign in' => site_url(ADMIN_SIGNIN)
		);

		$menu_logged = array(
			'My Profile' => array(
							'url' => site_url(ADMINPATH . 'profile'),
							'iconCls' => 'glyphicon-user'
							),
			'Sign out' => array(
							'url' => site_url(ADMIN_SIGNIN . '/signout'),
							'iconCls' => 'glyphicon-lock'
							)
		);

		$menu = array_merge($menu_common,($this->Auth->check_logged() == true)?$menu_logged:$menu_unlogged);
		
		//return $this->create_menu($menu);
		return $menu;
	}

}