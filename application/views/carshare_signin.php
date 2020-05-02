<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$data['title'] = ucfirst('Sign in');
$this->load->view('inc/header', $data);

?>
 
      <!--== Page Title Area Start ==-->
    <section id="page-title-area" class="section-padding overlay">
        <div class="container">
            <div class="row">
                <!-- Page Title Start -->
                <div class="col-lg-12">
                    <div class="section-title  text-center">
                        <h2>SIGN IN</h2>
                        <span class="title-line"><i class="fa fa-car"></i></span>
                        <p>Sign in to get started on your trip today!</p>
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
                <div class="col-lg-4 col-md-8 m-auto">
                	<div class="login-page-content">
                		<div class="login-form">
                			<h3>Welcome Back!</h3>
							<?php if(isset($accounterror)){   ?>
							<div class="alert alert-danger">
								<?php echo $accounterror;   ?> 
							</div>
							<?php }  ?>
							<form action="<?php echo base_url('/signin'); ?>" method="post" >
								<div class="username">
									<input type="text" name="email" placeholder="Email">
								</div>
								<div class="password">
									<input type="password" name="password" placeholder="Password">
								</div>
								<div class="log-btn">
									<button type="submit"><i class="fa fa-sign-in"></i> Sign In</button>
								</div>
							</form>
                		</div>
                		<div class="create-ac">
                			<p>Forgot your password? <a href="<?php echo base_url("/passwordreset"); ?>">Reset</a></p>
                		</div>
                		<!--<div class="login-other">
                			<span class="or">or</span>
                			<a href="#" class="login-with-btn facebook"><i class="fa fa-facebook"></i> Sign With Facebook</a>
                			<a href="#" class="login-with-btn google"><i class="fa fa-google"></i> Sign With Google</a>
                		</div>
						-->
                		<div class="create-ac">
                			<p>Don't have an account? <a href="<?php echo base_url("/signup"); ?>">Sign Up</a></p>
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
