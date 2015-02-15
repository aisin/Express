<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Profile extends CI_Controller {
	
	function __construct(){
		parent::__construct();
		$this->load->library(array('session', 'form_validation'));
		$this->load->model(array('Auth', 'Adm_topnav_mdl', 'Profile_mdl'));
		$this->load->helper(array('html','form', 'url', 'file'));
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
			$this->form_validation->set_rules('avatar_url', '', 'trim|xss_clean');// avatar
			$this->form_validation->set_rules('name', 'Name', 'trim|required|xss_clean');
			$this->form_validation->set_rules('username', 'User name', 'trim|alpha_dash|min_length[3]|max_length[20]|xss_clean');
			$this->form_validation->set_rules('country', 'Country', 'trim|xss_clean');
			$this->form_validation->set_rules('address', 'Address', 'trim|xss_clean');
			$this->form_validation->set_rules('gender', 'Gender', 'trim|xss_clean');

			if($this->form_validation->run() === TRUE){

				$avatar = $this->input->post('avatar_url');// avatar
				$name = $this->input->post('name');
				$username = $this->input->post('username');
				$country = $this->input->post('country');
				$address = $this->input->post('address');
				$gender = $this->input->post('gender');

				$upd_data = array(
					'avatar' => $avatar,
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

	//Ajax 上传图片

	public function upload_avatar(){

		$status = "";
		$msg = "";
		$fname = "";
		$file_element_name = 'avatar';

		$new_name = $this->_new_file_name();

		if($status != "error")
		{


			$config = array(
				'upload_path' => './' . AVATAR_PATH . 'upload',
				'allowed_types' => "gif|jpg|png|jpeg",
				'overwrite' => TRUE,
				'max_size' => "2048000", // 2 MB(2048 Kb)
				'max_height' => "768",
				'max_width' => "1024",
				'file_name' => $new_name
			);

			$this->load->library('upload', $config);

			if( !$this->upload->do_upload($file_element_name) )
			{
				//$error = array('error' => $this->upload->display_errors());
				//$this->load->view('file_view', $error);
				//echo $this->upload->display_errors();
				$status = 'error';
	    		$msg = $this->upload->display_errors('', '');
			}
			else
			{

				$data = $this->upload->data();
				$fl_name = $data['file_name'];//图片名称
				$fl_path = $data['file_path'];//图片路径

				if(file_exists($fl_path))
				{
					$status = "success";
					$msg = base_url(AVATAR_PATH).'/upload/'.$fl_name;
					$fname = $fl_name;
				}
				else
				{
					$status = "error";
					$msg = "上传出现错误，请重新上传！";
					$fname = "";
				}

				
			}
			@unlink($_FILES[$file_element_name]);

		}
		echo json_encode(array('status' => $status, 'msg' => $msg, 'fname'=> $fname));
	}

	// 切割图片，可设置大小

	function crop($path = null) {

		//if( isset($_POST['submit_crop']))
		//{
			$this->load->library('image_lib');
			
			//set source file path and destination of file path
			$path = $this->input->post('copy_file');
			//$file_name = get_file_name($path);
			//$file_name = $path;
			$src_path = AVATAR_PATH . '/upload/'. $path;

			$des_path =  AVATAR_PATH . '/upload/'. $path . '_thumb.jpg';

			$crop_x = $this->input->post('copy_x');
			$crop_y = $this->input->post('copy_y');
			$crop_w = $this->input->post('copy_w'); //切割框的 width
			$crop_h = $this->input->post('copy_h'); //切割框的 height

			// $crop_x = $_POST['copy_x'];
			// $crop_y = $_POST['copy_y'];
			// $crop_w = $_POST['copy_w']; //切割框的 width
			// $crop_h = $_POST['copy_h']; //切割框的 height


			$ava_w = 100; //需要头像的 width
			$ava_h = 100; //需要头像的 height

			//原图的width和height
			list($width, $height) = getimagesize(AVATAR_PATH . '/upload/'. $path);

			//set image library configuration
			$config['image_library']	= 'gd2';
			$config['source_image']		= $src_path;
			$config['new_image']		= $des_path;
			$config['quality']          = "100%";
			$config['maintain_ratio']	= FALSE;
			$config['width']			= $width * $ava_w / $crop_w;
			$config['height']			= $height * $ava_h / $crop_h;
			
			//resize
			$this->image_lib->clear();
			$this->image_lib->initialize($config);

			$this->image_lib->resize();

			//切割
			$config['width']			= $ava_w;
			$config['height']			= $ava_h;
			$config['x_axis']			= $crop_x * $ava_w / $crop_w;
			$config['y_axis']			= $crop_y * $ava_h / $crop_h;

			$config['source_image']		= $des_path; //使用新图片
			$config['new_image']		= AVATAR_PATH . $path;
			$this->image_lib->initialize($config); 
			
			//process thumb and reset the original with and height
			//$this->image_lib->image_process_gd('thumb', $width, $height);
			
			if($this->image_lib->crop())
			{
				//$data['title'] = '222';//...........................................
				//$data['cropresult'] = $des_path;
				//$data['main_content'] = 'test/cropresult';

				$url = $path;
				$msg = '';

				//保存 avatar 图片名
				//$username = $this->session->userdata('logged_user');

				//$this->Profile_mdl->save_avatar($username, $path);
				
			}
			else
			{
				//$data['title'] = '333';//...........................................
				//$data['cropresult'] = 'error...';

				$url = '';
				$msg = '上传出现问题，请重新上传！';
				
			}
			//$this->load->view('panel_v', $data);

			echo json_encode(array('url'=>$url, 'msg' => $msg));
			
		//}

	}//end crop

	//生成新的文件名 : 6位随机串(a-z) + 下划线 + 10位时间戳

	private function _new_file_name(){

		date_default_timezone_set('Asia/Shanghai');
		//$new_file_name = time();

		$chr_str = '';

		for($i = 0; $i < 6; $i++) {
			$chr_str .= chr(mt_rand(97, 122));
		}

		return $chr_str . '_' . time();

	}


}