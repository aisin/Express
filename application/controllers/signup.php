<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Signup extends CI_Controller {
	
	function __construct(){
		
		parent::__construct();
		$this->load->library(array('form_validation'));
		$this->load->model(array('Adm_topnav_mdl', 'Auth', 'Encrypt', 'Signup_mdl'));
		$this->load->helper(array('form', 'url'));
		
	}

	function index(){
		
		//测试时临时指向 admin 登陆后入口，生产项目须指向用户登陆后入口（前台）

		if($this->Auth->check_logged()===TRUE) redirect(site_url(ADMINPATH . 'dashboard'));

		$data = Array(
			'title' => 'CI Registration',
			'menu' =>  $this->Adm_topnav_mdl->menu(),
			'info' => ''
		);
		
		if($this->input->post('submit')) {
			
			$this->form_validation->set_rules('name', 'Name', 'trim|required|xss_clean');
			$this->form_validation->set_rules('username', 'User name', 'trim|required|alpha_dash|min_length[3]|max_length[20]|xss_clean');
			$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[3]|max_length[20]|matches[passconf]|xss_clean');
			$this->form_validation->set_rules('passconf', 'Confirm Password', 'trim|required|min_length[3]|max_length[20]|xss_clean');
			$this->form_validation->set_rules('email', 'Email',  'trim|required|min_length[3]|max_length[30]|valid_email');
			$this->form_validation->set_rules('country', 'Country', 'trim|xss_clean');
			$this->form_validation->set_rules('address', 'Address', 'trim|xss_clean');
			$this->form_validation->set_rules('gender', 'Gender', 'trim|xss_clean');
			$this->form_validation->set_rules('terms', 'Terms of Sevices', 'trim|required|xss_clean');

			if ($this->form_validation->run() === TRUE){
					
				$name = $this->input->post('name');
				$username = $this->input->post('username');
				$password = $this->input->post('password');
				$email = $this->input->post('email');
				$country = $this->input->post('country');
				$address = $this->input->post('address');
				$gender = $this->input->post('gender');
				$terms = $this->input->post('terms');

				if ($this->Signup_mdl->chk_exist($username , $email))

					$data['info'] = 'Username or Email address you entered is already used by another, please change.';

				else{
					
					$rand_salt = $this->Encrypt->genRndSalt();
					$encrypt_pass = $this->Encrypt->encryptUserPwd( $password, $rand_salt);
					
					$input_data = array(
						'name' => $name,
						'username' => $username,
						'email' => $email,
						'password' => $encrypt_pass,
						'country' => $country,
						'address' => $address,
						'gender' => $gender,
						'salt' => $rand_salt
					);

					if ($this->Signup_mdl->add_user($input_data))
					{
						//$data['info'] = "Registration success, please login.";
						if($this->Auth->process_login(array($username, $password)))
						{

							redirect(site_url(ADMINPATH . 'dashboard'));
							
						}

					}
					else

						$data['info'] = "Error on query";
				}
			}
		}
	
		$this->load->view('signup.php', $data);
	
	}
}