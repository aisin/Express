<?php
class Post extends Controller {

	function index() {
		$data['main_content'] = 'admin/posts_view';
		$this->load->view('template', $data);
	}

	function ajax() {
		$this->load->library('firephp');
		$this->firephp->info('palin message');
		$this->firephp->warn('warn message');
		$this->firephp->error('error message');
		$data['main_content'] = 'test/test';
		$this->load->view('template', $data);
	}
	
	
}//end class