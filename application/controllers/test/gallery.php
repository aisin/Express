<?php

class Gallery extends CI_Controller {

	function __construct(){
		
		parent::__construct();
		$this->load->library(array('session', 'form_validation'));
		$this->load->model(array('Auth', 'Adm_topnav_mdl'));
		$this->load->helper(array('html','form', 'url', 'file'));
	
	}

	function index() {
		if(isset($_FILES['file_data'])){
			//get file name from temp direcotory
			$file 	= read_file($_FILES['file_data']['tmp_name']);
			$name 	= basename($_FILES['file_data']['name']);
			$rnd_name = '1122334455667788';//get_random_name();	//set random name to avoid the same file name
			$file_ext = 'jpg';//find_exts($name);	//get file extension
			$file_name = $rnd_name . '.' . $file_ext; //concatenate file name to its file extension
			$folder = 'avatar';
			write_file('avatar/'.$file_name, $file);	//write the file to spesific direcotory
			$cropped_name = $this->default_thumb($folder, $rnd_name, $file_ext, 500, 500);	//generate thumbnail to expected width and height
			
			redirect('test/gallery/crop/' . $cropped_name);
		} else {
			$data['main_content'] = 'test/upload';
			$this->load->view('template', $data);
		}
	}
	
	/**
	 * Resize the uploaded image  
	 * 
	 */
	function default_thumb($folder, $rnd_name, $ext, $height, $width) {

		$image_path =  $folder . '/' . $rnd_name . '.' . $ext;
		$image_thumb = $folder . '/' . $rnd_name . '_' . $width . '.' . $ext;

		$this->load->library('image_lib');
		$config['image_library']	= 'gd2';
		$config['source_image']		= $image_path;
		$config['new_image']		= $image_thumb;
		$config['maintain_ratio']	= TRUE;
		$config['height']			= $height;
		$config['width']			= $width;
		$this->image_lib->initialize($config);
		$this->image_lib->resize();
		$this->image_lib->clear();

		return $rnd_name . '_' . $width . '.' . $ext;
	}

	function crop($path = null) {
		if( isset($_POST['submit']))
		{
			$this->load->library('image_lib');
			
			//set source file path and destination of file path
			$path = $this->input->post('file_name');
			$file_name = $path;
			$src_path = 'avatar/' . $path;

			$des_path =  'avatar/' . $file_name . '_t.jpg';

			$x = $this->input->post('x');
			$y = $this->input->post('y');
			$width = $this->input->post('w');
			$height = $this->input->post('h');
			
			//set image library configuration
			$config['image_library']	= 'gd2';
			$config['source_image']		= $src_path;
			$config['new_image']		= $des_path;
			$config['maintain_ratio']	= FALSE;
			$config['width']			= 130;
			$config['height']			= 130;
			$config['orig_width']		= $width;
			$config['orig_height']		= $height;
			$config['x_axis']			= $x;
			$config['y_axis']			= $y;
			$this->image_lib->initialize($config);
			
			//process thumb and reset the original with and height
			$this->image_lib->image_process_gd('thumb', $width, $height);
			
			$data['cropresult'] = $des_path;
			$data['main_content'] = 'test/cropresult';
			$this->load->view('template', $data);
		} else {
			//set image size to width and height varable
			list($width, $height) =  getimagesize('avatar/' . $path);
			$data['orig_w'] = $width;
			$data['orig_h'] = $height;
			$data['targ_w'] = 120;		//expected thumbnail
			$data['targ_h'] = 120;
			$data['path'] = $path;

			$this->load->view('test/jcrop', $data);
		}

	}//end crop

}

?>