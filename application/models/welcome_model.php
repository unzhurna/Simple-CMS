<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome_model extends CI_Model {

	function get_categories()
	{
		$result = $this->db->get('categories');
		return $result->result_array();
	}

}