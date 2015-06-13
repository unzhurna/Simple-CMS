<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome_model extends CI_Model {

	function get_articles()
	{
		$this->db->from('articles');
		$this->db->limit(10);
		$this->db->order_by('date_create', 'desc');
		$result = $this->db->get();
		return $result->result_array();
	}
	
	function get_categories()
	{
		$result = $this->db->get('categories');
		return $result->result_array();
	}

}