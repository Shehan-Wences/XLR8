<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct() {
        parent::__construct();
        
    }
	
	public function index()
	{ 
		
		$data = array();
			
		if($this->session->userdata('logged_in')){
			$session_array_used = $this->session->userdata('logged_in');
			$data['username'] = $session_array_used['username'];
		}else{
			
		}
        
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
	public function signin()
	{  
		$data = array();
		
		if(($this->input->server('REQUEST_METHOD')) == 'POST'){
		
		$email=$this->input->post('email');
		$password=$this->input->post('password');
        $this->load->model('carshare_model');
        $login = $this->carshare_model->member_login_details($email,$password);

        if (count($login) > 0) {
            
            $session_data = array(
                'email' => $login[0]->Email,
                'username' => $login[0]->Name,
            );

            $this->session->set_userdata('logged_in', $session_data);
			$session_array_used = $this->session->userdata('logged_in');
			redirect('', 'refresh');
        } else {
            echo "Email or Password Incorrect!";
        }
		
		}
		$this->load->view('carshare_signin', $data);
	}
	public function signup()
	{  
		$data = array();
		$this->load->view('carshare_signup', $data);
		
	}
	public function signout()
	{  
		
        $this->session->unset_userdata('logged_in');
		redirect('', 'refresh');
	}
}
