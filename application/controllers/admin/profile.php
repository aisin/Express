<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Profile extends CI_Controller {
	
	function __construct(){
		parent::__construct();
		$this->load->library(array('session', 'form_validation'));
		$this->load->model(array('Auth', 'Adm_topnav_mdl', 'Profile_mdl'));
		$this->load->helper(array('html','form', 'url'));
	}

	function index() {

		if($this->Auth->check_logged()===FALSE) redirect(site_url(ADMIN_SIGNIN));

		$data = Array(
			'title' => 'Profile Page',
			'menu' =>  $this->Adm_topnav_mdl->menu(),
			'info' => ''
		);

		if($this->input->post('submit')){

			//提交修改
			$this->form_validation->set_rules('name', 'Name', 'trim|required|xss_clean');
			$this->form_validation->set_rules('username', 'User name', 'trim|alpha_dash|min_length[3]|max_length[20]|xss_clean');
			$this->form_validation->set_rules('country', 'Country', 'trim|xss_clean');
			$this->form_validation->set_rules('address', 'Address', 'trim|xss_clean');
			$this->form_validation->set_rules('gender', 'Gender', 'trim|xss_clean');

			if($this->form_validation->run() === TRUE){

				$name = $this->input->post('name');
				$username = $this->input->post('username');
				$country = $this->input->post('country');
				$address = $this->input->post('address');
				$gender = $this->input->post('gender');

				$upd_data = array(
					'name' => $name,
					'country' => $country,
					'address' => $address,
					'gender' => $gender
				);

				//更新数据
				$this->Profile_mdl->update_data($username, $upd_data) ? 
				$data['info'] = '更新成功' :
				$data['info'] = '更新失败' ;

			}
		}

		//查询 seesion 返回当前用户信息
		$username = $this->session->userdata('logged_user');

		$user_data = $this->Profile_mdl->get_data($username);

		if($user_data) $data['user'] = $user_data;

		//页面初始化
		$this->load->view('admin/profile.php', $data);
		
	}
}