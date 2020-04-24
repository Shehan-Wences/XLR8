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
                        <h2>ADMIN SIGN IN</h2>
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
                			<h3>Welcome!</h3>
							<?php if(isset($accounterror)){   ?>
							<div class="alert alert-danger">
								<strong>Error!</strong><?php echo $accounterror;   ?> 
							</div>
							<?php }  ?>
							<form action="<?php echo base_url('/admin'); ?>" method="post" >
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
                            		
                	</div>
                </div>
        	</div>
        </div>
    </section>
    <!--== Login Page Content End ==-->

<?php $this->load->view('inc/footer'); ?>