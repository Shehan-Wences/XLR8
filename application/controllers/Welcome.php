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
		}else if($this->session->userdata('admin')){
			$data['admin'] = $this->session->userdata('admin');
		}
		$this->session->unset_userdata('url');
			
		$this->load->model('carshare_model');
        $data['location']='1';	
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
		$this->load->model('carshare_model');
        
		if($this->session->userdata('logged_in')){
			$session_array_used = $this->session->userdata('logged_in');
			$data['username'] = $session_array_used['Fname'].' '.$session_array_used['Lname'];
		}else if($this->session->userdata('admin')){
			$data['admin'] = $this->session->userdata('admin');
		}
		$this->session->unset_userdata('url');
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
		 $data['cars'] =$this->carshare_model->fetch_cars( $data['location'], $data['pickup'],$data['dropoff'],$type,$make,$transmission,$fuel,$price);
		
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
					'Id' => $login[0]->Id,
				);

				$this->session->set_userdata('logged_in', $session_data);
				$session_array_used = $this->session->userdata('logged_in');
				if($this->session->userdata('url')){
					$link= $this->session->userdata('url');
					$this->session->unset_userdata('url');
					redirect($link, 'refresh');
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
		if($this->session->userdata('logged_in')){
			$this->session->unset_userdata('logged_in');
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
			if(!preg_match("/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/", $_POST['CarID'])){
				$data['errorCarID'] = "Car_Id should be 8 character long";
				$status=false;
			}
			
			if($status==true){
			$this->carshare_model->add_data('car', $addCar_data);
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
		//$date1 = "2020-04-20";
		//$date2 = "2020-04-26";

		//$diff = abs(strtotime($date2) - strtotime($date1));
		//echo ($diff/(60*60*24))+1;
		$data = array();
		$this->load->model('carshare_model');
		if($this->session->userdata('logged_in')){
			$session_array_used = $this->session->userdata('logged_in');
			$data['username'] = $session_array_used['Fname'].' '.$session_array_used['Lname'];
			$data['id']=$session_array_used['Id'];
			
			if(!isset($_GET['id'])||!isset($_GET['plocation'])||!isset($_GET['dlocation'])||!isset($_GET['pdate'])||!isset($_GET['ddate'])){
				$data['status']="fail";
				$data['message']="Booking CAN NOT be made.Please re-check booking details.";
				echo json_encode($data);
			}else{
				
				
				
				
				$check=$this->carshare_model->fetch_thecar($_GET['id'],$_GET['plocation'],$_GET['pdate'],$_GET['ddate']);
				
				if(!empty($check)){
					
					$today=strtotime(date('Y-m-d'));
					$availabletime = strtotime($check[0]->availabledate);
					$endtime = strtotime($check[0]->enddate);
					$ptime = strtotime($_GET['pdate']);
					$dtime = strtotime($_GET['ddate']);
					
					$diff = abs($dtime - $ptime);
					$cost= $_GET['rent']*(($diff/(60*60*24))+1);
					
					if($ptime < $today || $dtime < $today || $ptime > $dtime){
						
						
						$data['status']="fail";
						$data['message']="Please check the dates again";
						
			
						echo json_encode($data);
						
					}else{	
						
					/*
						$delete_data = array('parkingid' => $check[0]->parkingid);
						$this->carshare_model->delete_data('parking', $delete_data);
						*/
						//make booking in booking table
						/*
						$add_data = array('userid' => $data['id'],
										'carid' => $_GET['id'],
										'bookingstatus' => "New",
										'pickuplocationid' => $_GET['plocation'],
										'pickupdate' => $_GET['pdate'],
										'dropofflocationid' => $_GET['dlocation'],
										'dropoffdate' => $_GET['ddate'],
										'cost' => $cost);
						$this->carshare_model->add_data('booking', $add_data);
						*/
						/*
						if($ptime>$today && $ptime>$availabletime && $today==$availabletime){
							//available between today and pickupdate
							$add_data = array('carid' => $_GET['id'],'status' => "Available",'availablelocationid' => $_GET['dlocation'],'availabledate' => date('Y-m-d'),'enddate' => $_GET['pdate']);
							$this->carshare_model->add_data('parking', $add_data);
						}
						if($ptime>$today && $ptime>$availabletime && $today<$availabletime){
							//available available time and pickup
							$add_data = array('carid' => $_GET['id'],'status' => "Available",'availablelocationid' => $_GET['dlocation'],'availabledate' => $check[0]->availabledate,'enddate' => $_GET['pdate']);
							$this->carshare_model->add_data('parking', $add_data);
						}
						if($ptime>$today && $ptime>$availabletime && $today>$availabletime){
							//available today and pickup
							$add_data = array('carid' => $_GET['id'],'status' => "Available",'availablelocationid' => $_GET['dlocation'],'availabledate' => date('Y-m-d'),'enddate' => $_GET['pdate']);
							$this->carshare_model->add_data('parking', $add_data);
						}
						if($dtime==$endtime ){
							//available between drop off and 1 year ahead if another parking is not available
							//do nothing for now
						}
						if($dtime<$endtime ){
							//available between drop and enddate                                     
							$add_data = array('carid' => $_GET['id'],
											'status' => "Available",
											'availablelocationid' => $_GET['dlocation'],
											'availabledate' => $_GET['ddate'],
											'enddate' => $check[0]->enddate);
							
							$this->carshare_model->add_data('parking', $add_data);
							
						}
						
						*/
						$data['status']="fail";
						
						
						
						
						
						
						
						
						
						
						if(isset($data['id'])){$a=$data['id'];}else{$a="nope";}
						if(isset($_GET['id'])){$b=	$_GET['id'];}else{$b=	"nope";}
						if(isset($_GET['plocation'])){$c=	$_GET['plocation'];}else{$c="nope";}
						if(isset($_GET['pdate'])){$d=	$_GET['pdate'];}else{$d=	"nope";}
						if(isset($_GET['dlocation'])){$e=	$_GET['dlocation'];}else{$e=	"nope";}
						if(isset($_GET['ddate'])){$f=	$_GET['ddate'];}else{$f=	"nope";}
						if(isset($cost)){$g=$cost;}else{$g=	"nope";}
						
						
						
						
						
						
						



										
						$data['message']=$a.' '.$b.' '.$c.' '.$d.' '.$e.' '.$f.' '.$g;
						echo json_encode($data);
						
					}
					
				}else{
					$data['status']="fail";
					$data['message']="We are unable to make the booking.Vehicle is unavailable during this period.";
					echo json_encode($data);
				}
				
				
				
			}
		}else{
			$data['status']="fail";
			$data['message']="Please Sign in to make a booking";
			echo json_encode($data);
		}
	
	}
	
}
