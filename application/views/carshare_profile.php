<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$data['title'] = ucfirst('profile');
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

    <!--== My profile Page Area Start ==-->
	<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
  <li class="breadcrumb-item active" aria-current="page"><?php echo $username; ?></li>
  </ol>
</nav>




    <div class="contact-page-wrao section-padding">
	<h1 class="text-center" style="margin:50px 0">MY PROFILE</h1>
        <div class="container">
		
            <div class="row">
                <div class="col-lg-10 m-auto">
				
                    <div class="contact-form">
					
					
                        <form action="index.html">
						
						
						
                            <div class="row justify-content-center">
							
							<div class= "col-lg-4 col-md-4">  
								<p class="profile-input">First Name:</p>
								</div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="website-input">
                                        <input type="text" placeholder="First Name" value="<?php echo $Fname; ?>">
                                    </div>
                                </div>
                             </div>
							
							<div class="row justify-content-center">
                                <div class="col-lg-4 col-md-4">  
								<p class="profile-input">Last Name:</p>
								</div>
								
								<div class="col-lg-6 col-md-6">
								    <div class="website-input">
                                        <input type="text" placeholder="Last Name" value="<?php echo $Lname; ?>">
                                    </div>
								</div>
							</div>

                            <div class="row justify-content-center">
							<div class="col-lg-4 col-md-4">  
								<p class="profile-input">Email Address:</p>
								</div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="website-input">
                                        <input type="email" placeholder="Email cannot be changed" value="<?php echo $Email; ?>" disabled>
                                    </div>
                                </div>
                            </div>
							
							<div class="row justify-content-center">
							<div class="col-lg-4 col-md-4">  
								<p class="profile-input">Phone number:</p>
								</div>
								<div class="col-lg-6 col-md-6">
                                    <div class="website-input">
                                        <input type="phone" placeholder="Phone Number" value="<?php echo $Phone; ?>">
                                    </div>
								</div>
							</div>
							
							<div class="row justify-content-center">
							<div class="col-lg-4 col-md-4">  
								<p class="profile-input">License number:</p>
								</div>
								<div class="col-lg-6 col-md-6">
                                    <div class="website-input">
                                        <input type="license" placeholder="Driver's License Number" value="<?php echo $DriverL; ?>">
                                    </div>
								</div>
							</div>

                            <div class="input-submit">
                                <button type="submit" name="profileupdate">Save</button>
                            </div>
                        </form>
                    </div>
					</div>
                </div>
            </div>
        </div>
   
	

    <!--== My profile Page Area End ==-->

 

<?php $this->load->view('inc/footer'); ?>