<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {


	public function index()
	{  
	 //$this->load->database();
		$this->db->select('Email');
        $this->db->from('Registration');

        $open_list = $this->db->get();
        foreach ($open_list->result() as $open_info) {
           print_r($open_info) ;
        }
		
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
