<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$data['title'] = ucfirst('change password');
$this->load->view('inc/header', $data);

?>
   <!--== Page Title Area Start ==-->
    <section id="page-title-area" class="section-padding overlay">
        <div class="container">
            <div class="row">
                <!-- Page Title Start -->
                <div class="col-lg-12">
                    <div class="section-title  text-center">
                        <h2>WELCOME <?php echo $username; ?></h2>
                        <span class="title-line"><i class="fa fa-car"></i></span>
                         
                    </div>
                </div>
                <!-- Page Title End -->
            </div>
        </div>
    </section>
    <!--== Page Title Area End ==-->

    <!--== Change password Page Area Start ==-->
	<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
  <li class="breadcrumb-item"><a href="/">My profile</a></li>
    <li class="breadcrumb-item"><a href="/">My bookings</a></li>
   <li class="breadcrumb-item active" aria-current="page">Change Password</li>
    <li class="breadcrumb-item"><a href="/">Deactivate account</a></li>
  </ol>
</nav>
	
    <div class="changepass-page-wrao section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 m-auto">
				<h1 class="font-weight-normal text-center">Change Password</h1>
            
			<div class="changepass-form">
			<div class="row">
	        <div class="col-md-8 mx-auto my-4">
        <div class="card">
            <div class="card-body">
                
                    <div class="form-group">
                        <label for="pass">New Password</label>
                        <input type="password" name="pass" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="repass">Confirm new password</label>
                        <input type="password" name="repass" class="form-control">
                    </div>
                    <div class="input-submit">
                                <button type="submit">Confirm</button>
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
	
    <!--== Change Password Page Area End ==-->

 
<?php $this->load->view('inc/footer'); ?>

