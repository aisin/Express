<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class W extends CI_Controller {
	
	function __construct() {

		parent::__construct();

		$this->load->library(array('session'));

		$this->load->model(array('Auth', 'Adm_topnav_mdl'));

	}

	function index(){

		$data = array(

			'menu_top' => $this->Adm_topnav_mdl->menu(),

		);

		$this->load->view('welcome_message', $data);

	}

}

/* End of file welcome.php */

/* Location: ./system/application/controllers/welcome.php */