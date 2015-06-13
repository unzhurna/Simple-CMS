<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Category_model extends CI_Model {

	function list_categories()
	{
		$this->load->library('datatables');
        $this->datatables->select('id, category, description')
            ->from('categories')
            ->unset_column('id')
            ->edit_column('category', '<a href="#" onclick="call_modal(\'$1\')">$2</a>', 'id, category');
        return $this->datatables->generate();
	}
	
	function get_category($id)
	{
		$result = $this->db->get_where('categories', array('id'=> $id));
		return $result->row_array();
	}
	
	function save_category($data)
    {
        if(!$data['id'])
        {
            $this->db->insert('categories', $data);            
        }
        else
        {
            $this->db->update('categories', $data, array('id'=>$data['id']));
        }
    }
    
    function delete_category($id)
    {
        $this->db->delete('categories', array('id' => $id));
		$this->session->set_flashdata('alert', 'Data has been deleted!');
    }

}