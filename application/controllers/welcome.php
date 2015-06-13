<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('welcome_model');
	}

	function index()
	{
		$data['categories'] = $this->welcome_model->get_categories();
		$this->load->view('public-layout', $data);
	}
	
	function article_base($id)
	{
		$data['categories'] = $this->welcome_model->get_category($id);
		$this->load->view('public-layout', $data);
	}

}