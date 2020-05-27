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
			$data['cart'] = $this->session->userdata('cart');
		}else if($this->session->userdata('admin')){
			$data['admin'] = $this->session->userdata('admin');
		}
		$this->session->unset_userdata('url');
			
		$this->load->model('carshare_model');
        $data['location']='Current Location';	
		$numberofcars = $this->carshare_model->cars();
		$data['numofcars']= (round($numberofcars/10)-1) * 10;
		$data['locations'] = $this->carshare_model->locations();

 		$this->load->view('carshare_home', $data);
	}
	
	public function error404()
	{ 
		
		$data = array();
			
		if($this->session->userdata('logged_in')){
			$session_array_used = $this->session->userdata('logged_in');
			$data['username'] = $session_array_used['Fname'].' '.$session_array_used['Lname'];
		}else if($this->session->userdata('admin')){
			$data['admin'] = $this->session->userdata('admin');
		}
		$this->session->unset_userdata('url');
 		$this->load->view('error_404', $data);
	}
	
	public function search()
	{  
		$data = array();
		$type='';
		$make='';
		$price='';
		$nearest='';
		$this->load->model('carshare_model');
        
		if($this->session->userdata('logged_in')){
			$session_array_used = $this->session->userdata('logged_in');
			$data['username'] = $session_array_used['Fname'].' '.$session_array_used['Lname'];
			$data['cart'] = $this->session->userdata('cart');
		}else if($this->session->userdata('admin')){
			$data['admin'] = $this->session->userdata('admin');
		}
		$this->session->unset_userdata('url');
		$data['locations'] = $this->carshare_model->locations();
		
		if(($this->input->server('REQUEST_METHOD')) == 'GET'){
			
		date_default_timezone_set('Australia/Melbourne');
			
		 if(!isset($_GET['location']) || !isset($_GET['search-from-date']) || !isset($_GET['search-to-date'])){
			 //$data['location']='1';
			// $data['pickup']=date("Y-m-d H:i", strtotime('+1 hour'));
			 //$data['dropoff']=date('Y/m/d H:i',strtotime($data['pickup']. ' + 3 days'));
			 redirect('', 'refresh');
			
		 }else{
			 $data['location']=$_GET['location'];
			 $data['pickup']=$_GET['search-from-date'];
			 $data['dropoff']=$_GET['search-to-date'];
			 if($_GET['location']=='Current Location'){
				 $nearest=json_decode(urldecode($_GET['nearestlocations']));
			 }
			 
		 }
		 
		 if(isset($_GET['typesstring'])){
			$type=json_decode(urldecode($_GET['typesstring']));
		 }else{
			$type = array("Sedan", "Van", "Hatchback", "SUV", "Wagon", "Convertible");
					 }
		 if(isset($_GET['makestring'])){
			$make=json_decode(urldecode($_GET['makestring']));
		 }else{
			$make = array("Honda", "Toyota", "Hyundai", "Kia", "Holden", "Ford", "BMW", "Lexus");
		 }
		 if(isset($_GET['transmissionstring'])){
			$transmission=json_decode(urldecode($_GET['transmissionstring']));
		 }else{
			$transmission = array("Auto", "Manual");
		 }
		 if(isset($_GET['fuelstring'])){
			$fuel=json_decode(urldecode($_GET['fuelstring']));
		 }else{
			$fuel = array("Petrol", "Diesel","Hybrid","Electric");
		 }
		 if(isset($_GET['sort'])){
			$price=$_GET['sort'];
		 }else{
			$price = "ASC";
		 }
		 $data['cartype']=$type;
		 $data['carmake']=$make;
		 $data['cartransmission']=$transmission;
		 $data['carfuel']=$fuel;
		 $data['price']=$price;
		 $data['cars'] =$this->carshare_model->fetch_cars( $data['location'], $data['pickup'],$data['dropoff'],$type,$make,$transmission,$fuel,$price,$nearest);
		}		
		$this->load->view('carshare_search', $data);
	}
	public function contact()
	{  
		$data = array();
		
		if($this->session->userdata('logged_in')){
			$session_array_used = $this->session->userdata('logged_in');
			$data['username'] = $session_array_used['Fname'].' '.$session_array_used['Lname'];
		}else if($this->session->userdata('admin')){
			$data['admin'] = $this->session->userdata('admin');
		}
		$this->session->unset_userdata('url');
 			
		$this->load->view('carshare_contact', $data);
	}
	public function signin()
	{  
		if($this->session->userdata('logged_in')){
			redirect('', 'refresh');
		}else if($this->session->userdata('admin')){
			redirect('', 'refresh');
		}
		
		$data = array();
		 $this->load->model('carshare_model');
		if(isset($_GET['auth'])){
			$data['auth']="Please Signin to continue with the booking.";
		}
		
		require APPPATH . 'vendor/google/google-api-php-client/vendor/autoload.php';
		$scopes = [
		 'https://www.googleapis.com/auth/plus.login',
		  'https://www.googleapis.com/auth/userinfo.email',
		];

		$gClient = new Google_Client();
		$gClient->setClientId("74415772971-pp3su1uji356qg18l84qbjt0idgbnrf0.apps.googleusercontent.com");
		$gClient->setClientSecret("3KsbtO-dESeZsadDOji6B7Z8");
		$gClient->setApplicationName("XLR8");
		$gClient->setRedirectUri(base_url('/signin'));
		$gClient->setScopes($scopes);
		$data['url']=$gClient->createAuthUrl();
		
		if(isset($_GET['code'])){
			
			$token=$gClient->fetchAccessTokenWithAuthCode($_GET['code']);
				try {
					$oAuth = new Google_Service_Oauth2($gClient);
					$userData = $oAuth->userinfo_v2_me->get();		
				}catch (\Exception $e) { 
					redirect('/eror404', 'refresh');
				}
			
			$profile = $this->carshare_model->profile($userData['email']);
			
			if(count($profile)>0){
				
				$session_data = array(
					'email' => $userData['email'],
					'Fname' => $profile[0]->Fname,
					'Lname' => $profile[0]->Lname,
					'Id' => $profile[0]->Id
				);				
											
				$gClient->revokeToken();
				$this->session->set_userdata('logged_in', $session_data);
				
				if($this->session->userdata('cart')){
					redirect(base_url('/payment'), 'refresh');
				}else{	
					redirect('', 'refresh');
				}

			}else{
				
				$add_data = array('Fname' => $userData['givenName'],
									'Lname' =>$userData['familyName'],
									'Email' => $userData['email'],
									'Status' => 'ACTIVE
									');

				$this->carshare_model->add_data('customer', $add_data);
				$session_data = array(
					'email' => $userData['email'],
					'Fname' => $userData['givenName'],
					'Lname' => $userData['familyName'],
					'Id' => $userData['id']
				);						
				
				$gClient->revokeToken();
				$this->session->set_userdata('logged_in', $session_data);
				if($this->session->userdata('cart')){
					redirect(base_url('/payment'), 'refresh');
				}else{	
					redirect('', 'refresh');
				}
			}
		}
		
		if(($this->input->server('REQUEST_METHOD')) == 'POST'){
		
		$email=$this->input->post('email');
		$password=$this->input->post('password');
       
        $login = $this->carshare_model->member_login_details($email,$password);

        if (count($login) > 0) {
            $status=trim($login[0]->Status);
			if($status == "ACTIVE"){
				$session_data = array(
					'email' => $login[0]->Email,
					'Fname' => $login[0]->Fname,
					'Lname' => $login[0]->Lname,
					'Id' => $login[0]->Id
				);

				$this->session->set_userdata('logged_in', $session_data);
				$session_array_used = $this->session->userdata('logged_in');

				if($this->session->userdata('cart')){
					redirect(base_url('/payment'), 'refresh');
				}else{	
					redirect('', 'refresh');
				}
				
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
		}else if($this->session->userdata('admin')){
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
			if(!preg_match("/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/", $_POST['Password'])){
				$data['passerror'] = "Password must contain minimum eight characters, at least one letter and one number";
				$status=false;
			}
			if(!preg_match("/^(([^<>()\[\]\\.,;:\s@']+(\.[^<>()\[\]\\.,;:\s@']+)*)|('.+'))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/i", $_POST['Email'])){
				$data['erroremail'] = "Invalid Email";
				$status=false;
			}
			if($status==true){
			$login = $this->carshare_model->email_check($_POST['Email']);

				if(count($login) > 0){
					
					$data['erroracc'] = "Account matching that email already exists.";
					$status=false;
				}
			}
			
			if($status==true){
				$add_data = array('Fname' => $_POST['Fname'],
									'Lname' => $_POST['Lname'],
									'Email' => $_POST['Email'],
									'Status' => 'Pending',
									'token' => sha1($randomPassword),
									'Password' => $_POST['Password']);

				$this->carshare_model->add_data('customer', $add_data);
				
				
				$emailContent = '<!DOCTYPE><html><head></head><body><p>Hi,</p><p>Thank You for Registering with XLR8 CarShare.</p>
				<a href="'.base_url().'accountconfirmation?token='.sha1($randomPassword).'">Click here to Activate your account</a>
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
				$data['successmessage'] = "Account Created succefully. Please check your email to verify your account.";
				$_POST = array();
			}
          
        } 
		
		$this->load->view('carshare_signup', $data);
		
	}
	public function signout()
	{  
		if($this->session->userdata('logged_in')){
			$this->session->unset_userdata('logged_in');
			$this->session->unset_userdata('cart');
			redirect('', 'refresh');
		}else if($this->session->userdata('admin')){
			$this->session->unset_userdata('admin');
			redirect('', 'refresh');
		}
		
       
	}
	
	public function deactivate()
	{  
		
		$data = array();
		$this->load->model('carshare_model');
		if($this->session->userdata('logged_in')){
			$session_array_used = $this->session->userdata('logged_in');
			$data['username'] = $session_array_used['Fname'].' '.$session_array_used['Lname'];
			$data['cart'] = $this->session->userdata('cart');
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
			$data['cart'] = $this->session->userdata('cart');
		
		
		
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
			$data['cart'] = $this->session->userdata('cart');
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
		}else if($this->session->userdata('admin')){
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
		
		if($this->session->userdata('admin')){
			$data = array();
			$status=true;
			$data['admin'] = $this->session->userdata('admin');
		
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
									'transmission' => $_POST['trans'],
									'year' => $_POST['year'],
									'imageurl' => $_POST['imgUrl']

								);
			
			if(!preg_match("/^[a-zA-Z0-9]{6}$/", $_POST['CarID']))
			{
				$data['errorCarID'] = "Car_Id should be 6 character long";
				$status=false;
			}

			if(!preg_match("/^[a-zA-Z0-9]{10,100}$/", $_POST['Description']))
			{
				$data['errorDescription'] = "Description should be between 10 t0 100 character long";
				$status=false;
			}

			if($status==true){
				$this->carshare_model->add_data('car', $addCar_data);
				$data['Successcar'] = "Car added to the database";
			}
			else{
				$data['errorCar'] = "Failed to add the car to the databse";
			}
		}
		$this->load->view('carshare_addCar', $data);
		}else{
			redirect('', 'refresh');
		}
	}




	public function cardetails()
	{
		$data = array();
		if($this->session->userdata('logged_in')){
			$session_array_used = $this->session->userdata('logged_in');
			$data['username'] = $session_array_used['Fname'].' '.$session_array_used['Lname'];
			$data['cart'] = $this->session->userdata('cart');
		}else if($this->session->userdata('admin')){
			$data['admin'] = $this->session->userdata('admin');
		}
		
		
		$this->load->model('carshare_model');
	
		$data['locations'] = $this->carshare_model->locations();
		
		if(isset($_GET['plocation'])){
			$data['location'] = $_GET['plocation'];
		}
		if(isset($_GET['pdate'])){
			$data['pickup'] = $_GET['pdate'];
		}
		if(isset($_GET['ddate'])){
			$data['dropoff'] = $_GET['ddate'];
		}
		if(isset($_GET['id'])){
		$id = $_GET['id'];

		$model_id = $this->carshare_model->carDetails($id);
		if (count($model_id) > 0) {
			
			$data['rent'] = $model_id[0]->rent;
			$data['description'] = $model_id[0]->description;
			$data['make'] = $model_id[0]->make;
			$data['model'] = $model_id[0]->model;
			$data['type'] = $model_id[0]->type;
			$data['fuel'] = $model_id[0]->fuel;
			$data['transmission'] = $model_id[0]->transmission;
			$data['year'] = $model_id[0]->year;
			$data['imageurl'] = $model_id[0]->imageurl;
		  $this->load->view('carshare_cardetails', $data);
		}else{
			$this->load->view('error_404', $data);
		}

		
		
		}else{
			$this->load->view('error_404', $data);
		}
		
	}
	
	public function admin()
	{  
		if($this->session->userdata('logged_in')){
			redirect('', 'refresh');
		}else if($this->session->userdata('admin')){
			redirect('', 'refresh');
		}
		
		$data = array();
		
		
		if(($this->input->server('REQUEST_METHOD')) == 'POST'){
		
		$email=$this->input->post('email');
		$password=$this->input->post('password');
       
		if($email=="admin" && $password=="1234" ){
			
			$session_data = "Admin";

			$this->session->set_userdata('admin', $session_data);
			
			redirect('', 'refresh');
			
		}else {
			
            $data['accounterror'] = "Username or Password is invalid.";
			
        }
		
		}
		$this->load->view('carshare_admin', $data);
	}
	
	public function booking()
	{ 
		$data = array();
		$this->load->model('carshare_model');
		
		if($this->session->userdata('admin')){
				$data['status']="fail";
				$data['message']="Admins Cannot make bookings.";
				echo json_encode($data);
		}else{	
			if(!isset($_GET['id'])||!isset($_GET['plocation'])||!isset($_GET['dlocation'])||!isset($_GET['pdate'])||!isset($_GET['ddate'])){
				$data['status']="fail";
				$data['message']="Booking CAN NOT be made.Please re-check booking details.";
				echo json_encode($data);
			}else{
				$check=$this->carshare_model->fetch_thecar($_GET['id'],$_GET['plocation'],$_GET['pdate'],$_GET['ddate']);
				
				if(!empty($check)){
					
					$today=strtotime(date('Y-m-d H:i'));
					$availabletime = strtotime($check[0]->availabledate);
					$endtime = strtotime($check[0]->enddate);
					$ptime = strtotime($_GET['pdate']);
					$dtime = strtotime($_GET['ddate']);
					
					$diff = abs($dtime - $ptime);
					if(($diff/(60*60*24))>1){
						$cost= $_GET['rent']*($diff/(60*60*24));
					}else{
						$cost= $_GET['rent'];
					}
					//$cost= $_GET['rent']*($diff/(60*60*24));
					
					if($ptime < $today || $dtime < $today || $ptime > $dtime){
						$data['status']="fail";
						$data['message']="Please check the dates again";
						echo json_encode($data);
						
					}else{
						
						$cart = array(
							'carid' => $_GET['id'],
							'plocation' => $_GET['plocation'],
							'dlocation' => $_GET['dlocation'],
							'pdate' => $_GET['pdate'],
							'ddate' => $_GET['ddate'],
							'rent' => $cost,
							'today' => date('Y-m-d H:i'),
							'token' => sha1($_GET['id'])
						);

						$this->session->set_userdata('cart', $cart);
						$data['status']="success";
						echo json_encode($data);
					}
					
				}else{
					$data['status']="fail";
					$data['message']="We are unable to make the booking.Vehicle is unavailable during this period.";
					echo json_encode($data);
				}		
			}
		}
	}

	public function cusDetail()
	{ 
		$data = array();
		$this->load->model('carshare_model');
		
		if($this->session->userdata('admin')){
			$data['admin'] = $this->session->userdata('admin');
		}else{
			redirect(base_url('/eror404'), 'refresh');
		}

		if(isset($_GET['Email'])){
			$Email = $_GET['Email'];  
			$edit_data = array('Status' => 'Deactivated');
			$this->carshare_model->edit_data('customer',$Email, 'Email', $edit_data);
		}

		$data['Active'] = $this->carshare_model->displayrecords('','ACTIVE','All');
		$data['Deactive'] = $this->carshare_model->displayrecords('','Deactivated','All');
		$this->load->view('carshare_CusDetail',$data);
	}

	public function payment()
	{ 
		$data = array();
		if($this->session->userdata('logged_in') && $this->session->userdata('cart')){
			$session_array_used = $this->session->userdata('logged_in');
			$data['username'] = $session_array_used['Fname'].' '.$session_array_used['Lname'];
			$data['Email'] = $session_array_used['email'];
			$data['id'] = $session_array_used['Id'];
			$data['cart'] = $this->session->userdata('cart');
		}else{
			redirect(base_url('/eror404'), 'refresh');
		}
		if(isset($_GET['bookingstatus'])){
		if($_GET['bookingstatus']=='failed'){
			$data['error']="Vehicle Unavailable.";
		}
		}
		$this->load->model('carshare_model');		
		$data['car']=$this->carshare_model->carDetails($data['cart']['carid']);		
		$data['locations']=$this->carshare_model->locations();	
		$data['pickupL']=$this->carshare_model->getLocationDetails($data['cart']['plocation']);
		$data['dropL']=$this->carshare_model->getLocationDetails($data['cart']['dlocation']);	
		$this->load->view('carshare_payment', $data);
			
	}

	public function invoice()
	{ 
		$data = array();
		$this->load->view('carshare_invoice', $data);
	}
	public function faq()
	{ 
		$data = array();
		$this->load->view('carshare_faq', $data);
	}

	public function bookingconfirmation()
	{ 
		$data = array();
		
		if($this->session->userdata('logged_in') && $this->session->userdata('cart')){
			$session_array_used = $this->session->userdata('logged_in');
			$data['username'] = $session_array_used['Fname'].' '.$session_array_used['Lname'];
			$data['Email'] = $session_array_used['email'];
			$data['id'] = $session_array_used['Id'];
			$data['cart'] = $this->session->userdata('cart');
			if($_GET['token']!=$data['cart']['token']){
				
				redirect(base_url('/eror404'), 'refresh');
			}
		}else{
			redirect(base_url('/eror404'), 'refresh');
		}
		
		$this->load->model('carshare_model');
		
		$check=$this->carshare_model->fetch_thecar($data['cart']['carid'],$data['cart']['plocation'],$data['cart']['pdate'],$data['cart']['ddate']);
		
		if(count($check)<1){
			redirect(base_url('/payment?bookingstatus=failed'), 'refresh');
		}
			
		$today=strtotime($data['cart']['today']);
		$availabletime = strtotime($check[0]->availabledate);
		$endtime = strtotime($check[0]->enddate);
		$ptime = strtotime($data['cart']['pdate']);
		$dtime = strtotime($data['cart']['ddate']);	
		
						$delete_data = array('parkingid' => $check[0]->parkingid);
						$this->carshare_model->delete_data('parking', $delete_data);
						//make booking in booking table
						$add_data = array('userid' => $data['id'],
										'carid' => $data['cart']['carid'],
										'bookingstatus' => "New",
										'pickuplocationid' => $data['cart']['plocation'],
										'pickupdate' => $data['cart']['pdate'],
										'dropofflocationid' => $data['cart']['dlocation'],
										'dropoffdate' => $data['cart']['ddate'],
										'cost' => $data['cart']['rent']);
						$this->carshare_model->add_data('booking', $add_data);
						
						if($ptime>$today && $ptime>$availabletime && $today==$availabletime){
							//available between today and pickupdate
							$add_data = array('carid' => $data['cart']['carid'],'status' => "Available",'availablelocationid' => $data['cart']['dlocation'],'availabledate' => date('Y-m-d H:i'),'enddate' => $data['cart']['pdate']);
							$this->carshare_model->add_data('parking', $add_data);
						}
						if($ptime>$today && $ptime>$availabletime && $today<$availabletime){
							//available available time and pickup
							$add_data = array('carid' => $data['cart']['carid'],'status' => "Available",'availablelocationid' => $data['cart']['dlocation'],'availabledate' => $check[0]->availabledate,'enddate' => $data['cart']['pdate']);
							$this->carshare_model->add_data('parking', $add_data);
						}
						if($ptime>$today && $ptime>$availabletime && $today>$availabletime){
							//available today and pickup
							$add_data = array('carid' => $data['cart']['carid'],'status' => "Available",'availablelocationid' => $data['cart']['dlocation'],'availabledate' => date('Y-m-d H:i'),'enddate' => $data['cart']['pdate']);
							$this->carshare_model->add_data('parking', $add_data);
						}
						if($dtime==$endtime ){
							//available between drop off and 1 year ahead if another parking is not available
							//do nothing for now
						}
						if($dtime<$endtime ){
							//available between drop and enddate                                     
							$add_data = array('carid' => $data['cart']['carid'],
											'status' => "Available",
											'availablelocationid' => $data['cart']['dlocation'],
											'availabledate' => $data['cart']['ddate'],
											'enddate' => $check[0]->enddate);
							
							$this->carshare_model->add_data('parking', $add_data);
							
						}
		$data['pickupL']=$this->carshare_model->getLocationDetails($data['cart']['plocation']);
		$data['dropL']=$this->carshare_model->getLocationDetails($data['cart']['dlocation']);			
						
		$emailContent = '<html><head></head><body style="background-color:#EAECED;"> <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet" type="text/css">
						<style> @import url("https://fonts.googleapis.com/css?family=Open+Sans"); </style> <table align="center" bgcolor="#EAECED" border="0" cellpadding="0" cellspacing="0" width="100%">
						<tbody><tr><td>&nbsp;</td></tr><tr style="font-size:0;line-height:0"><td>&nbsp;</td></tr><tr><td align="center" valign="top"><table width="600"><tbody>
                        <tr><td align="center"><table border="0" cellpadding="0" cellspacing="0" width="570">
						<tbody><tr><td style="text-align: center"><a href="<?php echo base_url(); ?>" target="_blank"><img alt="XLR8 Logo" src="https://xlr8-rental.herokuapp.com/assets/img/logo2.png" style="border:0"></a></td></tr>
                        </tbody></table></td></tr>
                        <tr><td>&nbsp;</td></tr><tr><td align="center" valign="top"><table bgcolor="#FFFFFF" border="0" cellpadding="0" cellspacing="0" style="overflow:hidden!important;border-radius:3px" width="580">
                        <tbody><tr><td>&nbsp;</td></tr><tr><td>&nbsp;</td></tr><tr><td align="center"><table width="85%"><tbody><tr><td align="center"><h2 style="margin:0!important;font-size:28px!important;line-height:38px!important;font-weight:200!important;color:#252b33!important">Booking Confirmation</h2>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>&nbsp;</td>
                                        </tr>
										
                                        <tr>
                                            <td align="center">
                                                <table border="0" cellpadding="0" cellspacing="0" width="78%">
                                                    <tbody>
                                                        <tr>
                                                            <td align="left" style="font-size:16px!important;line-height:30px!important;font-weight:100!important;color:#7e8890!important">
                                                                <p>Booking successfully made.Check your bookings page and your Email for more information.As always, we are here to help should you have any questions.</p>
                                                                <ul style="text-align: left">
                                                                    <li>Customer name: <strong>'.$data['username'].'</strong></li>
                                                                    <li>Car: <strong>'.$data['cart']['carid'].'</strong></li>
                                                                    <li><a href="https://maps.google.com/?q='.$data['pickupL'][0]->lat.','.$data['pickupL'][0]->long.'" target="_blank" class="author">Drop Off :<strong>'.$data['cart']['ddate'].'</strong><span>'.$data['pickupL'][0]->name.'</span></a></li>
																	
                                                                    <li><a href="https://maps.google.com/?q='.$data['dropL'][0]->lat.','.$data['dropL'][0]->long.'" target="_blank" class="author">Drop Off :<strong>'.$data['cart']['ddate'].'</strong><span>'.$data['dropL'][0]->name.'</span></a></li>
																	
                                                                    <li>Total Amount: <strong>'.round($data['cart']['rent']).' AUD</strong></li>
                                                                </ul>
                                                                <p>Kind regards</p>
                                                                <p>XLR8 Bookings Team</p>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                       
                                        <tr>
                                            <td align="center" valign="top">
                                                <table border="0" cellpadding="0" cellspacing="0">
                                                    <tbody>
                                                       
                                                        <tr>
                                                            <td>&nbsp;</td>
                                                        </tr>
                                                        <tr>
                                                            <td>&nbsp;</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>&nbsp;</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                       
                        <tr>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td align="center">
                                <table border="0" cellpadding="0" cellspacing="0" width="580">
                                    <tbody>
                                        <tr>
                                            <td>&nbsp;</td>
                                        </tr>
                                        <tr>
                                            <td align="center" style="color:#7e8890!important;font-size:12px!important;text-transform:uppercase!important;letter-spacing:.045em!important"
                                                valign="top">XLR8 &#9679; CAR RENTAL &#9679; SERVICES</td>
                            </tr>
                            <tr style="padding:0;margin:0;font-size:0;line-height:0">
                                <td>&nbsp;</td>
                            </tr>
                            <tr>
                                <td align="center" style="color:#7e8890!important;font-size:11px!important;letter-spacing:.05em!important"
                                    valign="top"><em></em></td>
            </tr>
            <tr style="padding:0;margin:0;font-size:0;line-height:0">
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td align="center" valign="top">
                    <p style="margin-bottom:1em;color:#7e8890!important;font-size:12px!important;font-weight:300!important">
                        <span>XLR8 Car Rental Ltd. 45 Collins St, Melbourne, VIC 3000</span></p>
                </td>
            </tr>
                        <tr>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
            </tr>
            
           
            </tbody>
            </table>
            </td>
            </tr>
            </tbody>
            </table>
            </td>
        </tr>
    </tbody>
</table>
  
  </body>
</html>';
		
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
				$this->email->to($data['Email']);
				$this->email->subject('XLR8 - Booking Confirmation');
				$this->email->message($emailContent);
				$this->email->send();				
									
		$this->session->unset_userdata('cart');
		$this->load->view('carshare_bookingconfirmation', $data);
			
	}
	
	public function customerbookings()
	{ 
		$data = array();
		
		$this->load->model('carshare_model');
		
		if($this->session->userdata('logged_in')){
			$session_array_used = $this->session->userdata('logged_in');
			$data['username'] = $session_array_used['Fname'].' '.$session_array_used['Lname'];
			$data['Email'] = $session_array_used['email'];
			$data['cart'] = $this->session->userdata('cart');
		}else{
			redirect(base_url('/eror404'), 'refresh');
		}
		$data['newbookings'] = $this->carshare_model->getbookings($session_array_used['Id'],'New','Only');
		$data['currentbookings'] = $this->carshare_model->getbookings($session_array_used['Id'],'Current','Only');
		$data['pastbookings'] = $this->carshare_model->getbookings($session_array_used['Id'],'Done','Only');
		$data['cancelledbookings'] = $this->carshare_model->getbookings($session_array_used['Id'],'Cancelled','Only');
		
		
		$this->load->view('carshare_bookings', $data);


	}
	public function allbookings()
	{ 
		$data = array();
		
		$this->load->model('carshare_model');
		
		if($this->session->userdata('admin')){
			$data['admin'] = $this->session->userdata('admin');
		}else{
			redirect(base_url('/eror404'), 'refresh');
		}
		$data['newbookings'] = $this->carshare_model->getbookings('','New','All');
		$data['currentbookings'] = $this->carshare_model->getbookings('','Current','All');
		$data['pastbookings'] = $this->carshare_model->getbookings('','Done','All');
		$data['cancelledbookings'] = $this->carshare_model->getbookings('','Cancelled','All');
		
		
		$this->load->view('carshare_allbookings', $data);


	}
	
	public function removecart()
	{ 
		$this->session->unset_userdata('cart');
		redirect(base_url(''), 'refresh');
	}
	
	public function cancelbooking()
	{ 
	
		$data = array();
		$this->load->model('carshare_model');
	
		if(!isset($_GET['id'])||!isset($_GET['bookingid'])){
				$data['status']="fail";
				$data['message']="There was an error please reload the page and try again.";
				echo json_encode($data);
		}else{
			
			if($this->session->userdata('logged_in') || $this->session->userdata('admin') ){
				
				if($this->session->userdata('logged_in')){
				$ses= $this->session->userdata('logged_in');
				
					$bookingdetails = $this->carshare_model->bookingsearch($_GET['id'],$ses['Id'],$_GET['bookingid']);
				}
				if($this->session->userdata('admin')){
								
					$bookingdetails = $this->carshare_model->bookingsearch($_GET['id'],$_GET['userid'],$_GET['bookingid']);
				}
				
				if(count($bookingdetails) > 0){
				
					$beforeavail = $this->carshare_model->fetch_availability1($_GET['id'],$_GET['bstartdate']);
					$afteravail = $this->carshare_model->fetch_availability2($_GET['id'],$_GET['benddate']);
					$update_file = array('bookingstatus' => 'Cancelled');
					
					if(count($beforeavail)> 0 && count($afteravail)> 0){
						//new available date.... beforeavail  availabledate to afteravail enddate
						$delete_data = array('parkingid' => $beforeavail[0]->parkingid);
						$this->carshare_model->delete_data('parking', $delete_data);
						$delete_data = array('parkingid' => $afteravail[0]->parkingid);
						$this->carshare_model->delete_data('parking', $delete_data);
			
						$this->carshare_model->edit_data('booking', $_GET['bookingid'], 'bookingid', $update_file);
								
						$add_data = array('carid' => $_GET['id'],'status' => "Available",'availablelocationid' => $beforeavail[0]->availablelocationid,'availabledate' => $beforeavail[0]->availabledate,'enddate' => $beforeavail[0]->enddate);
						$this->carshare_model->add_data('parking', $add_data);
					}
					if(count($beforeavail)> 0 && count($afteravail)== 0){
						//new available date.... beforeavail  availabledate to $_GET['benddate']
						$delete_data = array('parkingid' => $beforeavail[0]->parkingid);
						$this->carshare_model->delete_data('parking', $delete_data);
						
						$this->carshare_model->edit_data('booking', $_GET['bookingid'], 'bookingid', $update_file);
						
						$add_data = array('carid' => $_GET['id'],'status' => "Available",'availablelocationid' => $beforeavail[0]->availablelocationid,'availabledate' => $beforeavail[0]->availabledate,'enddate' => $bookingdetails[0]->dropoffdate);
						$this->carshare_model->add_data('parking', $add_data);
					}
					if(count($beforeavail)== 0 && count($afteravail)> 0){
						//new available date.... $_GET['bstartdate'] to afteravail enddate
						$delete_data = array('parkingid' => $afteravail[0]->parkingid);
						$this->carshare_model->delete_data('parking', $delete_data);
						
						$this->carshare_model->edit_data('booking', $_GET['bookingid'], 'bookingid', $update_file);
						
						$add_data = array('carid' => $_GET['id'],'status' => "Available",'availablelocationid' => $afteravail[0]->availablelocationid,'availabledate' => $bookingdetails[0]->pickupdate,'enddate' => $afteravail[0]->enddate);
						$this->carshare_model->add_data('parking', $add_data);
					}
					if(count($beforeavail)== 0 && count($afteravail)== 0){
						//new available date.... $_GET['bstartdate'] to $_GET['benddate']
						$this->carshare_model->edit_data('booking', $_GET['bookingid'], 'bookingid', $update_file);
						
						$add_data = array('carid' => $_GET['id'],'status' => "Available",'availablelocationid' => $bookingdetails[0]->pickuplocationid,'availabledate' => $bookingdetails[0]->pickupdate,'enddate' => $bookingdetails[0]->dropoffdate);
						$this->carshare_model->add_data('parking', $add_data);
					}
					
					$data['status']="success";
					
						echo json_encode($data);
				
			
				}else{
					$data['status']="fail";
					$data['message']="Booking does not exist";
					echo json_encode($data);
				}
				
			}else{
				
				$data['status']="fail";
				$data['message']="There was an error please reload the page and try again.";
				echo json_encode($data);
				
			}
			
			
			
		}	
	}

	public function changeCar()
    { 
        $data = array();

		if($this->session->userdata('admin')){
        $status=true;
        $data['admin'] = $this->session->userdata('admin');
        $this->load->model('carshare_model');

        $data['user'] = $this->carshare_model->displayrecord2();
		$this->load->view('carshare_changeCar',$data);
		}
		else{
			$this->load->view('error_404', $data);
		}  

    
    }
	 public function reports(){
		 
		 $data = array();

		if($this->session->userdata('admin')){
        $status=true;
        $data['admin'] = $this->session->userdata('admin');
        
			$this->load->view('carshare_report', $data);
		
		}
		else{
			$this->load->view('error_404', $data);
		}  

		 
	 }

    public function updatecar(){
        $data = array();
        $this->load->model('carshare_model');

        $data['message'] = "Car Details has been updated";
        if(isset($_GET['carid']))
        {
            $id= $_GET['carid'];
            $update_data = array(
                'make' => $_GET['make'],
                'model' => $_GET['model'],
                'year' => $_GET['year'],
                'rent' => $_GET['rent'],
                'fuel' => $_GET['fuel'],
                'type' => $_GET['type'],
                'transmission' => $_GET['transmission']
            );
            $this->carshare_model->edit_data('car', $id, 'carid', $update_data);
            $data['success'] = "working";
            echo json_encode($data);
        }   
        else{
            $data['fail'] = "fail";
            echo json_encode($data);
        }
	}

	public function changedate(){
        $data = array();
		$this->load->model('carshare_model');
		
        $data['message'] = "New date and time has been updated";
        if(isset($_GET['benddate']))
        {
			#changing at booking database
            $id = $_GET['bookingid'];
            $update_Status = array(
                'dropoffdate' => $_GET['benddate'],
            );
            $this->carshare_model->edit_data('booking', $id, 'bookingid', $update_Status);
            $data['success'] = "working";
            echo json_encode($data);
        }   
        else{
            $data['fail'] = "fail";
            echo json_encode($data);
        }
	}
	
	public function pickedup(){
        $data = array();
		$this->load->model('carshare_model');
		
        $data['message'] = "Car Booking has been updated";
        if(isset($_GET['bookingid']))
        {
            $id = $_GET['bookingid'];
            $update_Status = array(
                'bookingstatus' => $_GET['bookingstatus'],
            );
            $this->carshare_model->edit_data('booking', $id, 'bookingid', $update_Status);
            $data['success'] = "working";
            echo json_encode($data);
        }   
        else{
            $data['fail'] = "fail";
            echo json_encode($data);
        }
	}
	
	public function dropped(){
        $data = array();
        $this->load->model('carshare_model');
		$data['message'] = "Car Booking has been updated";
		
        if(isset($_GET['bookingid']))
        {
			#update booking status 
            $id = $_GET['bookingid'];
            $update_Status = array(
                'bookingstatus' => $_GET['bookingstatus'],
            );
			$this->carshare_model->edit_data('booking', $id, 'bookingid', $update_Status);

			#making the car available 
			$carid = $_GET['carid'];
			$update_Car = array(
                'status' => 'Available',
			);
			$this->carshare_model->edit_data('parking', $carid, 'carid', $update_Car);

			#updating mileage
			#$mile = $_GET['mile'];
			#$update_mile = array(
            #    'Mileage' => $mile,
			#);
			#$this->carshare_model->edit_data('car', $carid, 'carid', $update_mile);

            $data['success'] = "working";
            echo json_encode($data);
        }   
        else{
            $data['fail'] = "fail";
            echo json_encode($data);
        }
    }
	
	public function accountconfirmation(){
	
		if(isset($_GET['token'])){
			
			 $data = array();
			$this->load->model('carshare_model');
			
			$user=$this->carshare_model->confirmation($_GET['token']);
			
			if(count($user)>0){
				
				$update_data = array(
                'Status' => "ACTIVE",
                
				);

            $this->carshare_model->edit_data('customer', $user[0]->Id, 'Id', $update_data);
            
				
				
				echo "Thank You for confirming your email.";
			}else{
				$this->load->view('error_404', $data);
			}
			
		}else{
			$this->load->view('error_404', $data);
		}  
	
	
	}
	
	
}
