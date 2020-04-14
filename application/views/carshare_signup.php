<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$data['title'] = ucfirst('Sign up');
$this->load->view('inc/header', $data);

?>
 
      <!--== Page Title Area Start ==-->
    <section id="page-title-area" class="section-padding overlay">
        <div class="container">
            <div class="row">
                <!-- Page Title Start -->
                <div class="col-lg-12">
                    <div class="section-title  text-center">
                        <h2>SIGN UP</h2>
                        <span class="title-line"><i class="fa fa-car"></i></span>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                    </div>
                </div>
                <!-- Page Title End -->
            </div>
        </div>
    </section>
    <!--== Page Title Area End ==-->

    <!--== Login Page Content Start ==-->
    <section id="lgoin-page-wrap" class="section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-md-8 m-auto">
                	<div class="login-page-content">
                		<div class="login-form">
                			<h3>Sign Up</h3>
							<?php if(isset($successmessage)){   ?>
								<div class="alert alert-success">
									<strong>Yay!!</strong><?php echo $successmessage;   ?> 
								</div>
							<?php }  ?>
							<?php if(isset($erroracc)){   ?>
								<div class="alert alert-danger">
									<strong>Oops!!</strong><?php echo $erroracc;   ?> 
								</div>
							<?php }  ?>
							<form action="<?php echo base_url('/signup'); ?>" method="post" >
								<div class="name">
									<div class="row">
										<div class="col-md-6">
											<input name="Fname" type="text" placeholder="First Name">
										</div>
										
										<div class="col-md-6">
											<input name="Lname" type="text" placeholder="Last Name">
										</div>
									
									</div>
									<?php if(isset($errorfname)){   ?>
										<div class="alert alert-danger">
											<strong>Oops!</strong><?php echo $errorfname;   ?> 
										</div>
									<?php }  ?>
									<?php if(isset($errorlname)){   ?>
										<div class="alert alert-danger">
											<strong>Oops!</strong><?php echo $errorlname;   ?> 
										</div>
									<?php }  ?>
								</div>
								<div class="Email">
									<input name="Email" type="email" placeholder="Email">
								</div>
								<?php if(isset($erroremail)){   ?>
								<div class="alert alert-danger">
									<strong>Oops!</strong><?php echo $erroremail;   ?> 
								</div>
								<?php }  ?>
								<!--<div class="password">
									<input name="Password" type="password" placeholder="Password">
								</div>
								-->
								<div class="log-btn">
									<button name="signup" type="submit"><i class="fa fa-check-square"></i> Sign Up</button>
								</div>
							</form>
                		</div>
                		
                		<div class="login-other">
                			<span class="or">or</span>
                			<a href="#" class="login-with-btn facebook"><i class="fa fa-facebook"></i> Signup With Facebook</a>
                			<a href="#" class="login-with-btn google"><i class="fa fa-google"></i> Signup With Google</a>
                		</div>
                		<div class="create-ac">
                			<p>Have an account? <a href="<?php echo base_url("/signin"); ?>">Sign In</a></p>
                		</div>
                		<div class="login-menu">
                			<a href="<?php echo base_url("/contact"); ?>">Contact</a>
                		</div>
                	</div>
                </div>
        	</div>
        </div>
    </section>
    <!--== Login Page Content End ==-->

<?php $this->load->view('inc/footer'); ?>


