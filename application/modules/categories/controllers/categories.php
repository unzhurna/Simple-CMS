<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Categories extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('category_model');
		$this->load->helper('form');
		$this->load->library('form_validation');
		if(!$this->session->userdata('logged_in'))
		{
			show_404();
			exit;
		}
	}

	function index()
	{
		$item['source'] =  site_url('categories/grid_data');
		$data = array(
			'content' => $this->load->view('grid', $item, TRUE),
			'script' => $this->load->view('grid-js', '', TRUE)
		);
		$this->load->view('admin-layout', $data);
    }
	
	function grid_data()
    {
       echo $this->category_model->list_categories();
    }
	
	function call_form($id)
	{
		if($id != 0)
		{
			$data = (array) $this->category_model->get_category($id);
		}
		else
		{
			$data = array(
				'id' => FALSE,
				'category' => '',
				'description' => ''
			);
		}
		$this->load->view('form', $data);
	}
	
	function submit_form()
	{
		$this->form_validation->set_rules('category', 'category', 'required');
		
		if($this->form_validation->run() == FALSE)
		{
			$json = array('status'=>0, 'alert'=>validation_errors());
		}
		else
		{
			$data = array(
				'id' => $this->input->post('id'),
				'category' => $this->input->post('category'),
				'description' => $this->input->post('description'),
			);
			$this->category_model->save_category($data);
			$json = array('status'=>1, 'alert'=>'Data has been submited!');
		}
		echo json_encode($json);
	}
	
	function delete_category($id)
    {
        $this->category_model->delete_category($id);
		redirect('categories');
    }

}