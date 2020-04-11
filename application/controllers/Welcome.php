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
   	
			
		$this->load->model('carshare_model');
        $data['location']='1';	
		
		$data['locations'] = $this->carshare_model->locations();

 		$this->load->view('carshare_home', $data);
	}
	
	
	public function search()
	{  
		$data = array();
		
		$this->load->model('carshare_model');
        
		if($this->session->userdata('logged_in')){
			$session_array_used = $this->session->userdata('logged_in');
			$data['username'] = $session_array_used['Fname'].' '.$session_array_used['Lname'];
		}else{
			
		}
		
		$data['locations'] = $this->carshare_model->locations();
		
		if(($this->input->server('REQUEST_METHOD')) == 'GET'){
		 if(!isset($_GET['location']) || !isset($_GET['pdate']) || !isset($_GET['ddate'])){
			 $data['location']='1';
			 $data['pickup']=date('m/d/Y');
			 $data['dropoff']=date('m/d/Y',strtotime($data['pickup']. ' + 3 days'));
			
		 }else{
			 $data['location']=$_GET['location'];
			 $data['pickup']=$_GET['pdate'];
			 $data['dropoff']=$_GET['ddate'];
		 }
		 
		  $data['cars'] =$this->carshare_model->fetch_cars( $data['location'], $data['pickup'],$data['dropoff']);
		
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
				$data['accounterror'] = "Account Status is ".$status.". Please Contact XLR8 Team for more details.";
			}
			
        } else {
            $data['accounterror'] = "Username or Password is invalid.";
			
        }
		
		}
		$this->load->view('carshare_signin', $data);
	}
	public function signup()
	{  
		if($this->session->userdata('logged_in')){
			redirect('', 'refresh');
		}
		$status=true;
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

			if(!preg_match("/^[a-z ,.'-]{2,10}$/i", $_POST['Fname'])){
				$data['errorfname'] = "First Name should contain 2-10 characters";
				$status=false;
			}
			if(!preg_match("/^[a-z ,.'-]{2,20}$/i", $_POST['Lname'])){
				$data['errorlname'] = "Last Name should contain 2-20 characters";
				$status=false;
			}
			if(!preg_match("/^(([^<>()\[\]\\.,;:\s@']+(\.[^<>()\[\]\\.,;:\s@']+)*)|('.+'))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/i", $_POST['Email'])){
				$data['erroremail'] = "Invalid Email";
				$status=false;
			}
			if($status==true){
			$login = $this->carshare_model->email_check($_POST['Email']);

				if(count($login) > 0){
					
					$data['erroremail'] = "Account matching that email already exists.";
					$status=false;
				}
			}
			
			if($status==true){
				$add_data = array('Fname' => $_POST['Fname'],
									'Lname' => $_POST['Lname'],
									'Email' => $_POST['Email'],
									'Status' => 'ACTIVE',
									'Password' => sha1($randomPassword));

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
				$this->email->from('xlr8.carshare@gmail.com','XLR8');
				$this->email->to($_POST['Email']);
				$this->email->subject('Welcome To XLR8');
				$this->email->message($emailContent);
				$this->email->send();
				$data['successmessage'] = "Account Create succefully. Please check your email.";
			}
          
        } 
		
		$this->load->view('carshare_signup', $data);
		
	}
	public function signout()
	{  
		
        $this->session->unset_userdata('logged_in');
		redirect('', 'refresh');
	}
	
	public function deactivate()
	{  
		
		$data = array();
		$this->load->model('carshare_model');
		if($this->session->userdata('logged_in')){
			$session_array_used = $this->session->userdata('logged_in');
			$data['username'] = $session_array_used['Fname'].' '.$session_array_used['Lname'];
		}else{
			redirect('', 'refresh');
		}
		if (($this->input->server('REQUEST_METHOD')) == 'POST') {
			
			$edit_data = array('Status' => 'Deactivated');
			$this->carshare_model->edit_data('customer',$session_array_used['email'], 'Email', $edit_data);

			redirect('/signout', 'refresh');	
		}	
			
		$this->load->view('carshare_deactivate', $data);
	}
	
	public function profile()
	{  
		
		$data = array();
		$status=true;
		$this->load->model('carshare_model');
		if($this->session->userdata('logged_in')){
			$session_array_used = $this->session->userdata('logged_in');
			$data['username'] = $session_array_used['Fname'].' '.$session_array_used['Lname'];
			$data['Email'] = $session_array_used['email'];
		
		
		
		if (($this->input->server('REQUEST_METHOD')) == 'POST') {
			
			if(!preg_match("/^[a-z ,.'-]{2,10}$/i", $_POST['Fname'])){
				$data['Fnameerror']	="First Name should contain 2-10 characters";
				$status=false;
			}
			if(!preg_match("/^[a-z ,.'-]{2,20}$/i", $_POST['Lname'])){
				$data['Lnameerror']	="Last Name should contain 2-20 characters";
				$status=false;
			}
			if(!preg_match("/^[0]{1}[0-9]{9}$/", $_POST['Phone'])){
				$data['Phoneerror']	="Invalid Phone number";
				$status=false;
			}
			if(!preg_match("/^[0-9]{9}$/", $_POST['DriverL'])){
				$data['Lerror']	="Invalid License Number";		
				$status=false;
			}
			
			if($status==false){
				$data['accounterror'] =	"Details Could Not Be Updated!";	
			}else{
				$edit_data = array('Fname' => $_POST['Fname'],'Lname' => $_POST['Lname'],'Phone' => $_POST['Phone'],'DriverL' => $_POST['DriverL']);
				$this->carshare_model->edit_data('customer',$session_array_used['email'], 'Email', $edit_data);
				$data['accountsuccess'] = "Details Successfully Updated";
			}
			    
				
			$data['Fname'] = $_POST['Fname'];
			$data['Lname'] = $_POST['Lname'];
			$data['Phone'] = $_POST['Phone'];
			$data['DriverL'] = $_POST['DriverL'];					
				
			
		}else{
			$details = $this->carshare_model->profile($data['Email']);
			if (count($details) > 0) {
				$data['Fname'] = $details[0]->Fname;
				$data['Lname'] = $details[0]->Lname;
				$data['Phone'] = $details[0]->Phone;
				$data['DriverL'] = $details[0]->DriverL;
			  
			}
		}
		
		
		$this->load->view('carshare_profile', $data);
		
		}else{
			redirect('', 'refresh');
		}
	}
	public function passwordchange()
	{  
		$status=true;
		$data = array();
		$this->load->model('carshare_model');
		if($this->session->userdata('logged_in')){
			$session_array_used = $this->session->userdata('logged_in');
			$data['username'] = $session_array_used['Fname'].' '.$session_array_used['Lname'];
		}else{
			redirect('', 'refresh');
		}
		if (($this->input->server('REQUEST_METHOD')) == 'POST') {
			
			if(!preg_match("/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/", $_POST['newpass'])){
				$data['passerror'] = "Password must contain minimum eight characters, at least one letter and one number";
				$status=false;
			}
			if(!preg_match("/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/", $_POST['confirmpass'])){
				$data['passerror'] = "Password must contain minimum eight characters, at least one letter and one number";
				$status=false;
			}
			if($_POST['confirmpass']!=$_POST['newpass']){
				if(isset($data['passerror'])){
					$data['passerror'] =$data['passerror']."\r\n Passwords does not match!";
				}else{
					$data['passerror'] = "Passwords does not match!";
				}
				
				$status=false;
			}
			
			if($status==true){
				$edit_data = array('Password' => sha1($_POST['confirmpass']));
				$this->carshare_model->edit_data('customer',$session_array_used['email'], 'Email', $edit_data);
				$data['passsuccess'] = "Password successfully changed";
			}
					
			
		}
		$this->load->view('carshare_changepassword', $data);
	}
	
	public function passwordreset()
	{  
		$status=true;
		$data = array();
		
		if($this->session->userdata('logged_in')){
			redirect('', 'refresh');

		}
		if (($this->input->server('REQUEST_METHOD')) == 'POST') {
			
			$this->load->model('carshare_model');
           
			if(!preg_match("/^(([^<>()\[\]\\.,;:\s@']+(\.[^<>()\[\]\\.,;:\s@']+)*)|('.+'))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/i", $_POST['Email'])){
				$data['erroremail'] = "Invalid Email";
				$status=false;
			}
			$alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
			$pass = array(); //remember to declare $pass as an array
			$alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
			for ($i = 0; $i < 8; $i++) {
				$n = rand(0, $alphaLength);
				$pass[] = $alphabet[$n];
			}
			$randomPassword=implode($pass); //turn the array into a string
			
			if($status==true){
			$login = $this->carshare_model->email_check($_POST['Email']);

				if(count($login) < 1){
					
					$data['accounterror'] = "Account matching that email does not exist";
					$status=false;
				}
			}
			
			if($status==true){
				$edit_data = array('Password' => sha1($randomPassword));

				
				$this->carshare_model->edit_data('customer', $_POST['Email'], 'Email', $edit_data);
				
				$emailContent = '<!DOCTYPE><html><head></head><body><p>Hi,</p><p>You have requested to RESET your password.</p>
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
				$this->email->from('xlr8.carshare@gmail.com','XLR8');
				$this->email->to($_POST['Email']);
				$this->email->subject('XLR8 >> Password Reset');
				$this->email->message($emailContent);
				$this->email->send();
				$data['successmessage'] = "Password succefully reseted.Please check your email.";
			}
          
        } 
		
		$this->load->view('carshare_passwordreset', $data);
	}

	public function addCar()
	{
		$data = array();

		$this->load->model('carshare_model');
		if (($this->input->server('REQUEST_METHOD')) == 'POST') 
		{
			$addCar_data = array('carid' => $_POST['CarID'],
									'description' => $_POST['Description'],
									'make' => $_POST['Make'],
									'model' => $_POST['Model'],
									'rent' => $_POST['rent'],
									'type' => $_POST['type'],
									'fuel' => $_POST['fuel'],
									'transmission' => $_POST['trans']
							    );

			$this->carshare_model->add_data('car', $addCar_data);
			
		}
		$this->load->view('carshare_addCar', $data);

	}
}
