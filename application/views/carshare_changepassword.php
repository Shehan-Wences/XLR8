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
                        <h2>About time you changed your password</h2>
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
  <li class="breadcrumb-item"><a href="<?php echo base_url('/profile'); ?>"><?php echo $username; ?></a></li>
   <li class="breadcrumb-item active" aria-current="page">Change Password</li>
  </ol>
</nav>
	

	<div class="contact-page-wrao section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 m-auto">
				<h1 class="font-weight-normal text-center">Change Password</h1>
				<?php if(isset($passerror)){   ?>
							<div class="alert alert-danger">
								<strong>Oops!</strong><?php echo $passerror;   ?> 
							</div>
				<?php }  ?>
				<?php if(isset($passsuccess)){   ?>
							<div class="alert alert-success">
								<strong>Yay!</strong><?php echo $passsuccess;   ?> 
							</div>
				<?php }  ?>
                    <div class="contact-form">
                        <form action="<?php echo base_url('/passwordchange'); ?>" method="post" >

                            <div class="row">
                                <div class="col-lg-12 col-md-12">
                                    <div class="website-input">
                                        <input name="newpass" type="password" placeholder="New Password">
                                    </div>
                                </div>
                               
                            </div>

                            <div class="row">
                                <div class="col-lg-12 col-md-12">
                                    <div class="website-input">
                                        <input name="confirmpass" type="password" placeholder="Retype Password">
                                    </div>
                                </div>

                             
                            </div>

                           
                            <div class="input-submit">
											<button name="changepass" type="submit">Update</button>
							</div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--== Change Password Page Area End ==-->

 
<?php $this->load->view('inc/footer'); ?>

