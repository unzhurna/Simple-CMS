<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auth_model extends CI_Model {

	function check_data()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$result = $this->db->get_where('users', array('username'=>$username, 'password'=>$password));
		if($result->num_rows() > 0)
		{
			$sess_ = array_merge(array('logged_in'=>TRUE), $result->row_array());
			return $sess_;
		}
		else
		{
			return FALSE;
		}
	}
	
	function facebook_data($data)
	{
		$facebook_data = array(
			'id'		=> $data['id'],
			'name'		=> $data['name'],
			'email'		=> $data['email'],
			'phone'		=> $data['phone'],
			'status'	=> 1,
			'id_group'	=> 2			
		);
		$this->db->insert('users', $facebook_data);
	}
	
	function twitter_data($data)
	{
		
	}
}