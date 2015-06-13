<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Article_model extends CI_Model {

	function list_articles()
	{
		$this->load->library('datatables');
        $this->datatables->select('A.id, A.title, B.category, C.name, A.date_create, A.published')
            ->from('articles A')
            ->join('categories B', 'A.id_category=B.id', 'inner')
            ->join('users C', 'A.id_user=C.id', 'inner')
            ->where('A.deleted', 0)
            ->edit_column('A.title', '<a href="'.site_url("articles/submit/$1").'">$2</a>', 'A.id, A.title');
        return $this->datatables->generate();
	}
    
    function get_article($id)
    {
        $result = $this->db->get_where('articles', array('id'=>$id));
        return $result->row_array();
    }
    
    function submit_article($data)
    {
        if(!$data['id'])
        {
            $this->db->insert('articles', $data);
            $this->session->set_flashdata('alert', 'Article has been added!');
        }
        else
        {
            $this->db->update('articles', $data, array('id'=>$data['id']));            
            $this->session->set_flashdata('alert', 'Article has been updated!');
        }
    }
    
    function opt_category()
    {
        $result = $this->db->get('categories');
		
		$data = [];
        foreach($result->result_array() as $row)
        {
            $data[$row['id']] = $row['category'];
        }
        return $data;
    }
	
	function publish_article($data)
	{
		$this->db->where_in('id', $data);
		$this->db->update('articles', array('published'=>1));
	}
	
	function unpublish_article($data)
	{
		$this->db->where_in('id', $data);
		$this->db->update('articles', array('published'=>0));
	}
	
	function delete_article($data)
	{
		$this->db->where_in('id', $data);
		$this->db->update('articles', array('deleted'=>1));
	}

}