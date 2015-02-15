<?php

class Media extends Controller {

	function __construct() {
		parent::Controller();
		$this->load->model('media_model');
	}


	function index() {
		$data['main_content'] = 'test/media';
		$this->load->view('template', $data);
	}

	function uploadfy() {
		$data['main_content'] = 'test/uploadfy';
		$this->load->view('template', $data);
	}

	function ajaxupload() {
		$data['main_content'] = 'test/ajaxupload';
		$this->load->view('template', $data);
	}

	function ajaxupload2() {
		$data['main_content'] = 'test/ajaxupload2';
		$this->load->view('template', $data);
	}

	function jcrop() {
		$data['main_content'] = 'test/jcrop';
		$this->load->view('template', $data);
	}

	function upload() {
		if(isset($_FILES['Filedata'])){
			$file 	= read_file($_FILES['Filedata']['tmp_name']);
			$name 	= basename($_FILES['Filedata']['name']);

			write_file('files/'.$name, $file);

			$this->media_model->add($name);
			echo "success";
			//redirect('profile');
		} else {
			$data['main_content'] = 'test/media';
			echo "error upload";
			$this->load->view('template', $data);
		}
	}

	function thumb() {
		$data['main_content'] = 'test/thumb';
		$this->load->view('template', $data);
	}

	function image_thumb($image_path, $height, $width)
	{
		// Get the CodeIgniter super object
		$CI =& get_instance();

		// Path to image thumbnail
		$image_thumb = dirname($image_path) . '/' . $height . '_' . $width . '.jpg';

		if( ! file_exists($image_thumb))
		{
			// LOAD LIBRARY
			$CI->load->library('image_lib');

			// CONFIGURE IMAGE LIBRARY
			$config['image_library']	= 'gd2';
			$config['source_image']		= $image_path;
			$config['new_image']		= $image_thumb;
			$config['maintain_ratio']	= TRUE;
			$config['height']			= $height;
			$config['width']			= $width;
			$CI->image_lib->initialize($config);
			$CI->image_lib->resize();
			$CI->image_lib->clear();
		}

		return '<img src="' . dirname($_SERVER['SCRIPT_NAME']) . '/' . $image_thumb . '" />';
	}
}

?>