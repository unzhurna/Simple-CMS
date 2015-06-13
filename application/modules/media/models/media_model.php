<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Media_model extends CI_Model {
        
    function insert($data)
	{
		if($this->db->insert('media', $data))
		{
			return $this->db->insert_id();
		}		
		return FALSE;
	}
	
	function get_data($offset = 0)
	{
		$this->db->from('media');
		$this->db->limit(10, $offset);
		$this->db->order_by('id', 'desc');
		$result = $this->db->get();
		return $result->result_array();
	}
	
	function count_data()
	{
		$count = $this->db->count_all('media');
		return ceil($count/10);
	}
}