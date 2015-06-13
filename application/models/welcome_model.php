<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome_model extends CI_Model {

	function get_articles()
	{
		$this->db->from('articles');
		$this->db->where('published', 1);
		$this->db->limit(10);
		$this->db->order_by('date_create', 'desc');
		$result = $this->db->get();
		return $result;
	}
	
	function get_base_articles($id)
	{
		$this->db->from('articles');
		$this->db->where('published', 1);
		$this->db->where('id_category', $id);
		$this->db->limit(10);
		$this->db->order_by('date_create', 'desc');
		$result = $this->db->get();
		return $result;
	}
	
	function get_article($id)
	{
		$result = $this->db->get('articles', array('id', $id));
		return $result;
	}
	
	function get_categories()
	{
		$result = $this->db->get('categories');
		return $result->result_array();
	}

}