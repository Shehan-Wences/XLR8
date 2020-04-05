<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$data['title'] = ucfirst('Password Reset');
$this->load->view('inc/header', $data);

?>
 
      <!--== Page Title Area Start ==-->
    <section id="page-title-area" class="section-padding overlay">
        <div class="container">
            <div class="row">
                <!-- Page Title Start -->
                <div class="col-lg-12">
                    <div class="section-title  text-center">
                        <h2>Password Reset</h2>
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
                <div class="col-lg-4 col-md-8 m-auto">
                	<div class="login-page-content">
                		<div class="login-form">
                			<h3>Forgot your Password ?</h3>
							<form action="<?php echo base_url('/passwordreset'); ?>" method="post" >
								<div class="Email">
									<input name="Email" type="email" placeholder="Email">
								</div>
								
								<div class="log-btn">
									<button type="submit"><i class="fa fa-sign-in"></i>Reset Password</button>
								</div>
							</form>
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