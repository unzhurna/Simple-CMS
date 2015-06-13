<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Image_manager_m extends CI_Model{
    function __construct(){
        parent::__construct();
    }
	
	function insert($data)
	{
		$this->load->database();
		if($this->db->insert('img_manager',$data))
		{
			return $this->db->insert_id();
		}
		
		return FALSE;
	}
	
	function get_data($offset=0)
	{
		$this->load->database();
		$this->db->from('img_manager');
		$this->db->limit(10, $offset);
		$this->db->order_by('id','desc');
		$result=$this->db->get();
		// echo $this->db->last_query();
		// exit;
		return $result->result_array();
	}
	
	function count_data()
	{
		$this->load->database();
		$count=$this->db->count_all('img_manager');
		return ceil($count/10);
	}
}