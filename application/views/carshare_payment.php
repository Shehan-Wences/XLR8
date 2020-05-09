<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$data['title'] = ucfirst('payment');
$this->load->view('inc/header', $data);

?>
<style>

	table.timetable_sub {
	width: 100%;
	margin: 0 auto;
	border-collapse: collapse;
  width: 100%;
  position:relative;
  bottom:1147px;

}


.timetable_sub th {
	background: #212121;
	color: #fff !important;
	text-transform: capitalize;
	font-size: 13px;
	border-right: 1px solid #ded2d2;
}

.timetable_sub th,
.timetable_sub td {
    text-align: center;
    padding: 7px;
    font-size: 16px;
    color: #868282;
}

.timetable_sub td {
	border: 1px solid #CDCDCD;
}
.container1 {
	
  position: relative;
  top:200px;
}
td.image{
	text-align: left;
  
  }

	</style>
<!--Payment-->
<section id="page-title-area" class="section-padding overlay">
        <div class="container">
            <div class="row">
                <!-- Page Title Start -->
                <div class="col-lg-12">
                    <div class="section-title  text-center">
                        <h2>Payment</h2>
                        <span class="title-line"><i class="fa fa-car"></i></span>
                    </div>
                </div>
                <!-- Page Title End -->
            </div>
        </div>
	</section>
	<table class="timetable_sub">
						<thead>
							<tr>
								<th>Car</th>
								<th>Pickup Date</th>
								<th>Pickup Time</th>
								<th>Dropoff Date</th>
								<th>Dropoff Time</th>
							</tr>
						</thead>
						<tbody>

								<td class="image">
										<<img style="width: 20%;" src="assets/img/car/AUDI-A4-2019.jpg">
										
								</td>
								<td class="invert">Date</td>
								<td class="invert">Date</td>
								<td class="invert">Time</td>
								<td class="invert">Time</td>

								</td>
							</tr>
<section class="banner-bottom-wthreelayouts py-lg-5 py-3">
			<div class="container1">
				<div class="inner-sec-shop px-lg-4 px-3">
					<!--/tabs-->
					<div class="responsive_tabs">
						<div id="horizontalTab">
							<ul class="resp-tabs-list">
								<h2>Credit/Debit </h2>
							</ul>
							<br>
							<div class="resp-tabs-container">
								<!--/tab_one-->
								<div class="tab1">
									<div class="pay_info">
										<form action="#" method="post" class="creditly-card-form agileinfo_form">
											<section class="creditly-wrapper wthree, w3_agileits_wrapper">
												<div class="credit-card-wrapper">
													<div class="first-row form-group">
														<div class="controls">
															<label class="control-label">Name on Card</label>
															<input class="billing-address-name form-control" type="text" name="name" placeholder="Enter Name">
														</div>
														<div class="w3_agileits_card_number_grids">
															<div class="w3_agileits_card_number_grid_left">
																<div class="controls">
																	<label class="control-label">Card Number</label>
																	<input class="number credit-card-number form-control" type="text" name="number" inputmode="numeric" autocomplete="cc-number"
																	    autocompletetype="cc-number" x-autocompletetype="cc-number" placeholder="&#149;&#149;&#149;&#149; &#149;&#149;&#149;&#149; &#149;&#149;&#149;&#149; &#149;&#149;&#149;&#149;">
																</div>
															</div>
															<div class="w3_agileits_card_number_grid_right">
																<div class="controls">
																	<label class="control-label">CVV</label>
																	<input class="security-code form-control" Â· inputmode="numeric" type="text" name="security-code" placeholder="&#149;&#149;&#149;">
																</div>
															</div>
															<div class="clear"> </div>
														</div>
														<div class="controls">
															<label class="control-label">Expiration Date</label>
															<input class="expiration-month-and-year form-control" type="text" name="expiration-month-and-year" placeholder="MM / YY">
														</div>
													</div>
													<button class="submit">
														<span>Make a payment </span>
													</button>
												</div>
											</section>
										</form>
										
		<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
 
									</div>
								</div>
								
					<!--//tabs-->
				</div>

			</div>
			<!-- //payment -->
		</section>
		<!--//Payment-->

<?php $this->load->view('inc/footer'); ?>
