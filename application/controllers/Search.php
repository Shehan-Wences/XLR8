<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Search extends CI_Controller {


	public function index()
	{  
		$data = array();
		$this->load->view('carshare_search', $data);
	}
		
}
