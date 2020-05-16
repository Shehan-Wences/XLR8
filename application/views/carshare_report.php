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
    <!--== Reports page Content Start ==-->


<section id="lgoin-page-wrap" class="section-padding">
        <div class="container">
	    <div class="wchoose-content">
		<h4 style="text-align: center">STATISTICS AND DATA</h4>
		<p>To view statistical data of bookings made, follow the instructions provided below:</p>
		<div class="row">
		<div class="col-lg-6 col-md-6">
		<div class="single-choose-item">
			<span>1. Click the button below to navigate to reports page.</span>
		</div>
		</div>
			
			<div class="col-lg-6 col-md-6">
			 <div class="single-choose-item">
				<span>2. Enter 'report' as the account name.</span>
			</div>
			</div>
			
		<div class="col-lg-6 col-md-6">
		<div class="single-choose-item">
		<span>3. Enter username 'xlr8-admin'</span>
		</div>
		</div>
			
		<div class="col-lg-6 col-md-6">
		<div class="single-choose-item">
		<span>4. Enter password 'xlr8admin'</span>
		</div>
		</div>
		</div>

		    <a class="book-now-btn" href="https://us-east-1.quicksight.aws.amazon.com/sn/dashboards/d7890e07-3d80-487d-a856-85d5bf688d57" target="_blank">View Reports</a>

</div>
           
        </div>
    </section>
    <!--== Reports Page Content End ==-->

<?php $this->load->view('inc/footer'); ?>
