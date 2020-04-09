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
							
							<div class= "col-lg-2 col-md-2">  
								<p>First Name:</p>
								</div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="Fname-input">
                                        <input type="text" placeholder="<?php echo $Fname; ?>">
                                    </div>
                                </div>
                             </div>
							
							<div class="row justify-content-center">
                                <div class="col-lg-2 col-md-2">  
								<p>Last Name:</p>
								</div>
								
								<div class="col-lg-6 col-md-6">
								    <div class="Lname-input">
                                        <input type="text" placeholder="<?php echo $Lname; ?>">
                                    </div>
								</div>
							</div>

                            <div class="row justify-content-center">
							<div class="col-lg-2 col-md-2">  
								<p>Email Address:</p>
								</div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="email-input">
                                        <input type="email" placeholder="<?php echo $email; ?>">
                                    </div>
                                </div>
                            </div>
							
							<div class="row justify-content-center">
							<div class="col-lg-2 col-md-2">  
								<p>Phone number:</p>
								</div>
								<div class="col-lg-6 col-md-6">
                                    <div class="phone-input">
                                        <input type="phone" placeholder="<?php echo $phone; ?>">
                                    </div>
								</div>
							</div>
							
							<div class="row justify-content-center">
							<div class="col-lg-2 col-md-2">  
								<p>License number:</p>
								</div>
								<div class="col-lg-6 col-md-6">
                                    <div class="license-input">
                                        <input type="license" placeholder="<?php echo $DriverL; ?>">
                                    </div>
								</div>
							</div>

                            <div class="input-submit">
                                <button type="submit">Submit</button>
                            </div>
                        </form>
                    </div>
					</div>
                </div>
            </div>
        </div>
   
	

    <!--== My profile Page Area End ==-->

 

<?php $this->load->view('inc/footer'); ?>