<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('welcome_model');
	}

	function index()
	{
		$item['articles'] = $this->welcome_model->get_articles();
		$data['categories'] = $this->welcome_model->get_categories();
		$data['content'] = $this->load->view('list-articles', $item, TRUE);
		$this->load->view('public-layout', $data);
	}
	
	function article_base($id)
	{
		$item['articles'] = $this->welcome_model->get_base_articles($id);
		$data['categories'] = $this->welcome_model->get_categories();
		$data['content'] = $this->load->view('list-articles', $item, TRUE);
		$this->load->view('public-layout', $data);
	}
	
	function detail_article($id)
	{
		$item['articles'] = $this->welcome_model->get_article($id);
		$data['categories'] = $this->welcome_model->get_categories();
		$data['content'] = $this->load->view('singgle-article', $item, TRUE);
		$this->load->view('public-layout', $data);
	}

}