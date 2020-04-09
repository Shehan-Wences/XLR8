<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$data['title'] = ucfirst('deactivate');
$this->load->view('inc/header', $data);

?>
   <!--== Page Title Area Start ==-->
    <section id="page-title-area" class="section-padding overlay">
        <div class="container">
            <div class="row">
                <!-- Page Title Start -->
                <div class="col-lg-12">
                    <div class="section-title  text-center">
                        <h2>WELCOME KIM</h2>
                        <span class="title-line"><i class="fa fa-car"></i></span>
                         
                    </div>
                </div>
                <!-- Page Title End -->
            </div>
        </div>
    </section>
    <!--== Page Title Area End ==-->

    <!--== Deactivation Page Area Start ==-->
	<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
  <li class="breadcrumb-item"><a href="/">My profile</a></li>
    <li class="breadcrumb-item"><a href="/">My bookings</a></li>
    <li class="breadcrumb-item"><a href="/">Change Password</a></li>
	<li class="breadcrumb-item active" aria-current="page">Deactivate account</li>
  </ol>
</nav>
	
    <div class="deactivate-page-wrao section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 m-auto">
				<h1 class="font-weight-normal text-center">Deactivate my account</h1>
				
            <div class="deactivate-form">
				
         <div class="row">
	        <div class="col-md-8 mx-auto my-4">
        <div class="card">
            <div class="card-body">
                
                    <div class="form-group">
                        <p> Are you sure you want to deactivate your account? If you change your mind, you can always contact our team to reactivate your account. We're here to help!</p>
                    </div>
					<div class="input-submit" style="text-align: center">
                                <button class="button">Deactivate</button>
                         </div>
                
            
        </div>
  
                </div>
                </div>
				</div>
				</div>
				</div>
	
	</div>
	</div>
	</div>
    <!--== Deactivation Page Area End ==-->

 
<?php $this->load->view('inc/footer'); ?>

