<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$data['title'] = ucfirst('Add Car');
$this->load->view('inc/header', $data);

?>
 
      <!--== Page Title Area Start ==-->
    <section id="page-title-area" class="section-padding overlay">
        <div class="container">
            <div class="row">
                <!-- Page Title Start -->
                <div class="col-lg-12">
                    <div class="section-title  text-center">
                        <h2>Add Car</h2>
                        <span class="title-line"><i class="fa fa-car"></i></span>
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
                <div class="col-lg-5 col-md-8 m-auto">
                	<div class="login-page-content">
                		<div class="login-form">
                			<h3>Add Car</h3>
							<form action="<?php echo base_url('/addcar'); ?>" method="post" >
                                <div class="Email">
								    	<input name="CarID" type="text" placeholder="Enter CarID">
								</div>
                            
                                <div class="Email">
									<input name="Description" type="text" placeholder="Enter Car Descripition">
								</div>
                                
                                <div class="name">
									<div class="row">
										<div class="col-md-6">
											<input name="Make" type="text" placeholder="Enter Car Make">
										</div>
										
										<div class="col-md-6">
											<input name="Model" type="text" placeholder="Enter Car Model">
										</div>
									</div>
								</div>

								<div class="Email">
									<input name="rent" type="number" placeholder="Enter rent per day">
								</div>

                                <div class="Email">
									<input name="type" type="text" placeholder="Enter type">
								</div>

                                <div class="Email">
									<input name="fuel" type="text" placeholder="Enter Fuel type">
								</div>

                                <div class="Email">
									<input name="trans" type="text" placeholder="Enter transmission type">
								</div>


								
								<div class="log-btn">
									<button name="add" type="submit"><i class="fa fa-check-square"></i> Add Car</button>
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


