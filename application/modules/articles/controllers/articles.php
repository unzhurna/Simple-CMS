<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Articles extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('article_model');
		if(!$this->session->userdata('logged_in'))
		{
			show_404();
			exit;
		}
	}

	function index()
	{
		$item['source'] =  site_url('articles/grid_data');
		$data = array(
			'content' => $this->load->view('grid', $item, TRUE),
			'script' => $this->load->view('grid-js', '', TRUE)
		);
		$this->load->view('admin-layout', $data);
    }
	
	function grid_data()
    {
		if(!$this->input->is_ajax_request())
		{
			show_404();
			exit;
		}
		echo $this->article_model->list_articles();
    }
	
	function submit($id = FALSE)
	{
		$this->load->helper('text');
	    $this->load->helper('form');
		$this->load->library('form_validation');
        
		if($id)
		{
			$article = (array) $this->article_model->get_article($id);
		}
		else
		{
			$article = array(
			    'id' => $id,
				'title' => '',
				'content' => '',
				'id_category'=> '',
				'published'=>'',
			);
		}
        $article['opt_category'] = 	$this->article_model->opt_category();	
		
		//Form Validation
		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
		$this->form_validation->set_rules('title', 'title', 'required');
		$this->form_validation->set_rules('content', 'content', 'required');
	    
		if($this->form_validation->run() == FALSE)
		{
			$data = array(
				'content' => $this->load->view('form', $article, TRUE),
				'script' => $this->load->view('form-js', '', TRUE)
			);
			$this->load->view('admin-layout', $data);
		}
        else
        {
			$content	= $this->input->post('content');
			$img 		= get_image_attached($content);
			if($img)
			{
				$image			= $img[0];
				$save['image']	= $image;
				if (strpos($image,'http') !== false) 
				{
					$save['prev_img']  = $image;
					$save['thumb_img'] = $image;
					$save['icon_img']  = $image;
				}
				else
				{
					$img_array = explode('.', $image);
					$save['prev_img']	= $img_array[0].'_p.'.$img_array[1];
					$save['thumb_img']	= $img_array[0].'_t.'.$img_array[1];
					$save['icon_img']	= $img_array[0].'_i.'.$img_array[1];
				}
			}
			
            $save = array(
                'id'            => $id,
                'title'         => $this->input->post('title'),
                'content'       => $content,
				'id_category'   => $this->input->post('category'),
				'teaser' 		=> word_limiter(trim(strip_tags($content,'')),'20'),
				'tags'			=> $this->input->post('tags'),
                'id_user'       => $this->session->userdata('id'),
                'published'     => $this->input->post('status')
            );
            $this->article_model->submit_article($save);
            redirect('articles');
			//echo print_r($save);
        }        
		
	}
	
	function publish()
	{
		if(!$this->input->is_ajax_request())
		{
			show_404();
			exit;
		}
		$return = array('status'=>0,'alert'=>'Oops something went wrong!');
		
		$data = json_decode($this->input->post('post_id'));
		if($data)
		{
			$this->article_model->publish_article($data);
			$return = array('status'=>1,'alert'=>'Article/s has been published!');
		}
		echo json_encode($return);
	}
	
	
	function unpublish()
	{
		if(!$this->input->is_ajax_request())
		{
			show_404();
			exit;
		}
		$return = array('status'=>0,'alert'=>'Oops something went wrong!!');
		
		$data = json_decode($this->input->post('post_id'));
		if($data)
		{
			$this->article_model->unpublish_article($data);
			$return = array('status'=>1,'alert'=>'Article/s has been unpublished!');
		}
		echo json_encode($return);
	}
	
	function delete()
	{
		if(!$this->input->is_ajax_request())
		{
			show_404();
			exit;
		}
		$return = array('status'=>0,'alert'=>'Oops something went wrong!!');
		
		$data = json_decode($this->input->post('post_id'));
		if($data)
		{
			$this->article_model->delete_article($data);
			$return = array('status'=>1,'alert'=>'Article/s has been deleted!');
		}
		echo json_encode($return);
	}

}

