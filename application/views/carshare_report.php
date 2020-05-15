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
                        <h2>Reports</h2>
                        <span class="title-line"><i class="fa fa-car"></i></span>
                       
                    </div>
                </div>
                <!-- Page Title End -->
            </div>
        </div>
    </section>
    <!--== Page Title Area End ==-->
	<br>
							<?php if(isset($auth)){   ?>
							<div class="container">
							<div class="alert alert-danger col-lg-4 col-md-6 m-auto" style="text-align:center;">
								<?php echo $auth;   ?> 
							</div>
							</div>
							<?php }  ?>
    <!--== Login Page Content Start ==-->
    <section id="lgoin-page-wrap" class="section-padding">
        <div class="container">
            <div class="row">
				click the button <br>
				enter account name : report<br>
				username : xlr8-admin<br>
				password : xlr8admin<br>
				
                <a class="btn btn-primary" href="https://us-east-1.quicksight.aws.amazon.com/sn/dashboards/d7890e07-3d80-487d-a856-85d5bf688d57" target="_blank">Reports Click me</a>
        	</div>
        </div>
    </section>
    <!--== Login Page Content End ==-->

<?php $this->load->view('inc/footer'); ?>
