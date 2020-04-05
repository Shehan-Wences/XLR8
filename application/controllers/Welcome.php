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
			$data['username'] = $session_array_used['Fname'].' '.$session_array_used['Lname'];
		}else{
			
		}
   	

 		$this->load->view('carshare_home', $data);
	}
	
	
	public function search()
	{  
		$data = array();
		
		if($this->session->userdata('logged_in')){
			$session_array_used = $this->session->userdata('logged_in');
			$data['username'] = $session_array_used['Fname'].' '.$session_array_used['Lname'];
		}else{
			
		}
		
		$this->load->view('carshare_search', $data);
	}
	public function contact()
	{  
		$data = array();
		
		if($this->session->userdata('logged_in')){
			$session_array_used = $this->session->userdata('logged_in');
			$data['username'] = $session_array_used['Fname'].' '.$session_array_used['Lname'];
		}else{
			
		}

 

			
		$this->load->view('carshare_contact', $data);
	}
	public function signin()
	{  
		if($this->session->userdata('logged_in')){
			redirect('', 'refresh');
		}
		
		$data = array();
		
		if(($this->input->server('REQUEST_METHOD')) == 'POST'){
		
		$email=$this->input->post('email');
		$password=$this->input->post('password');
        $this->load->model('carshare_model');
        $login = $this->carshare_model->member_login_details($email,$password);

        if (count($login) > 0) {
            $status=trim($login[0]->Status);
			if($status == "ACTIVE"){
				$session_data = array(
					'email' => $login[0]->Email,
					'Fname' => $login[0]->Fname,
					'Lname' => $login[0]->Lname,
				);

				$this->session->set_userdata('logged_in', $session_data);
				$session_array_used = $this->session->userdata('logged_in');
				redirect('', 'refresh');
			}else{
				 echo "Account Status Pending! Check Back Later";
			}
			
        } else {
            echo "Email or Password Incorrect!" ;
			
        }
		
		}
		$this->load->view('carshare_signin', $data);
	}
	public function signup()
	{  
		if($this->session->userdata('logged_in')){
			redirect('', 'refresh');
		}
		$data = array();
		$this->load->model('carshare_model');
        if (($this->input->server('REQUEST_METHOD')) == 'POST') {
           
			$alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
			$pass = array(); //remember to declare $pass as an array
			$alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
			for ($i = 0; $i < 8; $i++) {
				$n = rand(0, $alphaLength);
				$pass[] = $alphabet[$n];
			}
			$randomPassword=implode($pass); //turn the array into a string

            $add_data = array('Fname' => $_POST['Fname'],
								'Lname' => $_POST['Lname'],
								'Email' => $_POST['Email'],
								'Status' => 'ACTIVE',
								'Password' => $randomPassword);

            $this->carshare_model->add_data('customer', $add_data);
			
			
			$emailContent = '<!DOCTYPE><html><head></head><body><p>Hi,</p><p>Thank You for Registering with XLR8 CarShare.</p>
			<p>Your Password is : '.$randomPassword.'</p><p>Do not forget to Change your Password at your first login.</p>
			<p>If you are having any issues using our services please let us know by replying to this email and we will endeavour to help you.</p>
			<p>Many Thanks</p>
			<p>XLR8 Team</p></body></html>';
	
			$config['protocol']    = 'smtp';
			$config['smtp_host']    = 'ssl://smtp.gmail.com';
			$config['smtp_port']    = '465';
			$config['smtp_timeout'] = '60';

			$config['smtp_user']    = 'xlr8.carshare@gmail.com';    
			$config['smtp_pass']    = 's3757847'; 

			$config['charset']    = 'utf-8';
			$config['newline']    = "\r\n";
			$config['mailtype'] = 'html'; 
			$config['validation'] = TRUE; 

			 

			$this->email->initialize($config);
			$this->email->set_mailtype("html");
			$this->email->from('xlr8.carshare@gmail.com');
			$this->email->to($_POST['Email']);
			$this->email->subject('Welcome To XLR8');
			$this->email->message($emailContent);
			$this->email->send();
			
			
          
        } 
		echo "Account Created";	
		$this->load->view('carshare_signup', $data);
		
	}
	public function signout()
	{  
		
        $this->session->unset_userdata('logged_in');
		redirect('', 'refresh');
	}
}
