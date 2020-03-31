<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {


	public function index()
	{  
		$data = array();
		$this->load->view('carshare_home', $data);
	}
	public function search()
	{  
		$data = array();
		$this->load->view('carshare_search', $data);
	}
	public function contact()
	{  
		$data = array();
		$this->load->view('carshare_contact', $data);
	}
	public function signup()
	{  
		$data = array();
		$this->load->view('carshare_signup', $data);
	}
}
