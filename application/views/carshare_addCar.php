<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$data['title'] = ucfirst('Add Car');
$this->load->view('inc/header', $data);

?>

<style>
.login-form select {
	background-color: transparent;
	border: 1px solid #555;
	color: #000;
	margin: 10px 0;
	padding: 10px 20px;
	-webkit-transition: all 0.4s ease 0s;
	transition: all 0.4s ease 0s;
	width: 100%;
}

.login-form select:focus {
	border-color: #fff;
}
</style>
 
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
                               
							   	<input name="CarID" type="text" placeholder="Enter CarID" required>
								   <?php if(isset($errorCarID)){   ?>
										<div class="alert alert-danger">
											<?php echo $errorCarID;   ?> 
										</div>
									<?php }  ?>
								   
						                    
    							<input name="Description" type="text" placeholder="Enter Car Descripition" required> 
							
								<div class="row">
									<div class="col-md-6">
										<select name="Make" required>
											<option value="">Enter Car Make</option>
											<option value="Honda">Honda</option>
											<option value="Toyota">Toyota</option>
											<option value="Hyundai">Hyundai</option>
											<option value="Kia">Kia</option>
											<option value="Holden">Holden</option>
											<option value="Ford">Ford</option>
											<option value="BMW">BMW</option>
											<option value="Lexus">Lexus</option>
										</select>
									</div>	
									<div class="col-md-6">
										<input name="Model" type="text" placeholder="Enter Car Model" required>
									</div>
								</div>

	
								<input name="rent" min="10" max="150" type="number" placeholder="Enter rent per day" required>
							
								<select name="type" required>
									<option value="">Enter type</option>
									<option value="Sedan">Sedan</option>
									<option value="Van">Van</option>
									<option value="Hatchback">Hatchback</option>
									<option value="SUV">SUV</option>
									<option value="Wagon">Wagon</option>
									<option value="Convertible">Convertible</option>
								</select>
								
								<select name="fuel" required>
									<option value="">Enter Fuel type</option>
									<option value="Petrol">Petrol</option>
									<option value="Diesel">Diesel</option>
									<option value="Hybrid">Hybrid</option>
									<option value="Electric">Electric</option>
								</select>
								
								<select name="trans" required>
									<option value="">Enter transmission type</option>
									<option value="Auto">Auto</option>
									<option value="Manual">Manual</option>
								</select>
								
								<input name="year" min="1990" max="2020" type="number" placeholder="Enter car make year" required> 
								
								<input name="imgUrl" type="text" placeholder="Enter Car image Url" required>
								
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


