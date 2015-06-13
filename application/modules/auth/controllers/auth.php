<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auth extends CI_Controller {

	function __construct()
	{
		parent:: __construct();
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->model('auth_model');
	}
	
	function index()
	{
		if(!$this->session->userdata('logged_in'))
		{
			$this->load->view('login');
		}
		else
		{
			redirect('articles');
		}		
	}
	
	function login()
	{
		$this->form_validation->set_rules('username', 'username', 'trim|required');
		$this->form_validation->set_rules('password', 'password', 'trim|required|md5');
		
		if($this->form_validation->run() == FALSE)
		{
			$this->session->set_flashdata('error', validation_errors());
			redirect('auth');
		}
		else
		{
			$login_data = $this->auth_model->check_data();
			
			if($login_data)
			{
				$this->session->set_userdata($login_data);
				$this->session->set_flashdata('alert', 'Success! Welcome '.$this->session->userdata('name'));
				redirect('articles');
			}
			else
			{
				$this->session->set_flashdata('alert', 'Opps! Invalid username or password.');
				redirect('auth');
			}
		}
	}
	
	function facebook_login()
	{
		$this->load->library('facebook');
		$user = $this->facebook->getUser();        
        if($user) 
		{
            try 
			{
				$fb = $this->facebook->api('/me');
				$this->session->set_userdata(array(
					'logged_in'		=>TRUE,
					'logged_from'	=> 'facebook',
					'id'			=> $fb['id'],
					'name'			=> $fb['name'],
					'email'			=> $fb['email']
				));
				$this->auth_model->facebook_data($fb);
            }
			catch (FacebookApiException $e) 
			{
                $user = null;
            }
        }
		else 
		{
            $this->facebook->destroySession();
        }
		redirect('welcome');		
    }
	
	function twitter_login()
	{
		$user = $this->facebook->getUser();        
        if($user) 
		{
            try 
			{
				////$data['user_profile'] = $this->facebook->api('/me');
                $fb = $this->facebook->api('/me');
				$this->session->set_userdata(array(
					'logged_in'		=>TRUE,
					'logged_from'	=> 'facebook',
					'id'			=> $fb['id'],
					'name'			=> $fb['name'],
					'email'			=> $fb['email']
				));
				$this->auth_model->facebook_data($fb);
            }
			catch (FacebookApiException $e) 
			{
                $user = null;
            }
        }
		else 
		{
            $this->facebook->destroySession();
        }
		
    }
	
	function logout()
	{
		switch ($this->session->unset_userdata(logged_from)) { 
			case 'facebook': 
				$this->facebook->destroySession();
			break;
			case 'twitter': 
				$this->facebook->destroySession();
			break;
		}
		$this->session->unset_userdata(logged_in);
		$this->session->set_flashdata('alert', 'Success! You have logout.');
		redirect('/');
    }
	
}