<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Media extends CI_Controller {
	
	function __Construct()
	{
		parent::__Construct();
		$this->load->model('media_model');
	}
	
	function index()
	{
		$data['pagging'] = FALSE;
		$count = $this->media_model->count_data();
		if($count > 1)
		{
			$data['pagging'] = site_url('media/page/2');
		}
		$data['image_list'] = $this->media_model->get_data();
		$this->load->view('media_manager', $data);
	}
	
	function page($page = 1)
	{
		$next_page    = $page + 1;
		$offset       = ($page - 1) * 10;
		$ttl_page     = $this->media_model->count_data();
		
		if($page < $ttl_page )
		{
			$result['pagging'] = site_url('media/page/'. $next_page);
		}
		else
		{
			$result['pagging'] = FALSE;
		}
		$data['image_list']   = $this->media_model->get_data($offset);
		$result['view']       = $this->load->view('ajax_list_img', $data, TRUE);
		echo json_encode($result);
	}
	
	function upload_image()
	{
		$this->load->view('form_upload.php');
	}
	
	function do_upload()
	{
		if(isset($_FILES['userfile']['error']) && $_FILES['userfile']['error'] != 4)
		{
			$directory = './images';
			if (!is_dir($directory))
			{
				mkdir($directory, 0777);
			}
			$config['upload_path']   = $directory. '/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$config['file_name']     = md5($_FILES['userfile']['name']);
			$config['overwrite']     = FALSE;
			$config['file_type']     = 'image/jpeg';
			$config['encrypt_name']  = TRUE;	
			$this->load->library('upload', $config);
			$this->upload->initialize($config);
			
			if($this->upload->do_upload())
			{
				$data = $this->upload->data();
				$this->load->library("image_moo");
				$this->image_moo->load($config['upload_path'].$data['file_name'])
								->resize_crop(690, 345)
								->save($config['upload_path'].$data['raw_name'].'_p'.$data['file_ext'], TRUE)
								->resize_crop(430, 430)
								->save($config['upload_path'].$data['raw_name'].'_t'.$data['file_ext'], TRUE)
								->resize_crop(50, 50)
								->save($config['upload_path'].$data['raw_name'].'_i'.$data['file_ext'], TRUE);
				$data = array(
					'caption'     => (($this->input->post('caption',TRUE)) ? $this->input->post('caption', TRUE) : $data['client_name']),
					'img_full'    =>'images/'.$data['raw_name'].$data['file_ext'],
					'img_preview' =>'images/'.$data['raw_name'].'_p'.$data['file_ext'],
					'img_thumb'   =>'images/'.$data['raw_name'].'_t'.$data['file_ext'],
					'img_icon'    =>'images/'.$data['raw_name'].'_i'.$data['file_ext'],
					'id_user'     => $this->session->userdata('id'),
				);
			    $this->media_model->insert($data);
				$this->session->set_flashdata('success', 'Image has been uploaded');
				redirect('media');	
			}
			else
			{
				$this->session->set_flashdata('error', 'Image has not been uploaded');
                redirect('media/upload_image');	
			}
		}
		else
		{
		    $this->session->set_flashdata('alert', 'No image uploaded');			    
			redirect('media/upload_image');
		}
	}
}