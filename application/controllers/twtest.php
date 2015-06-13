<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Twtest extends CI_Controller {

	function __construct()
	{
		parent:: __construct();
		$this->load->library('twconnect');
	}

	function index()
	{
		$ok = $this->twconnect->twredirect('twtest/callback');
		if (!$ok) 
		{
			echo 'Could not connect to Twitter. Refresh the page or try again later.';
		}
	}


	public function callback()
	{
		$ok = $this->twconnect->twprocess_callback();
		
		if ( $ok ) { redirect('welcome'); }
			else redirect ('twtest/failure');
	}


	public function success() 
	{
		echo 'Twitter connect succeded<br/>';
		echo '<p><a href="' . base_url() . 'twtest/clearsession">Do it again!</a></p>';

		$this->twconnect->twaccount_verify_credentials();

		echo 'Authenticated user info ("GET account/verify_credentials"):<br/><pre>';
		//echo $this->twconnect->tw_user_info['name'];
		print_r($this->twconnect->tw_user_info); echo '</pre>';
		//echo name
		
	}


	/* authentication un-successful */
	public function failure() {

		echo '<p>Twitter connect failed</p>';
		echo '<p><a href="' . base_url() . 'twtest/clearsession">Try again!</a></p>';
	}


	/* clear session */
	public function clearsession() {

		$this->session->sess_destroy();

		redirect('/twtest');
	}

}