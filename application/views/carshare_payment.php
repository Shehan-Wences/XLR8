<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$data['title'] = ucfirst('payment');
$this->load->view('inc/header', $data);

?>


<!--Payment-->
<section id="page-title-area" class="section-padding overlay">
        <div class="container">
            <div class="row">
                <!-- Page Title Start -->
                <div class="col-lg-12">
                    <div class="section-title  text-center">
                        <h2>CHECKOUT</h2>
                        <span class="title-line"><i class="fa fa-car"></i></span>
                    </div>
                </div>
                <!-- Page Title End -->
            </div>
        </div>
	</section>
	

      
	  
	  
<div id="blog-page-content" class="section-padding" style="padding-top: 100px;">

<div class="container">
<div class="row">

<div class="col-lg-12">
<article class="single-article">
<div class="row">

 <div class="col-lg-5">
<div class="article-thumb">
<img src="assets\img\car\2020_lexus_es-350.jpg" alt="JSOFT">
</div>
</div>


<div class="col-lg-7">
<div class="display-table">
<div class="display-table-cell">
<div class="article-body">
<h3><a href="">Lexus ES350 2020</a></h3>
	
	<div class="article-meta">
	<a href="#" class="author">Pick Up Date : <span>10/05/2020</span></a>
	<a href="#" class="author">Pick Up Time : <span>13:00</span></a>
	</div>
	
	<div class="article-meta">
	<a href="#" class="author">Location : <span>Melbourne Central</span></a>
	</div>
	
	<div class="article-meta">
	<a href="#" class="commnet">Drop Off Date : <span>20/05/2020</span></a>
	<a href="#" class="commnet">Drop Off Time : <span>18:00</span></a>
	</div>
	<div class="article-meta">
	<a href="#" class="author">Location : <span>Noble Park</span></a>
	</div>
	<div class="article-meta">
	<a href="#" class="commnet">Price : <span>$50.00</span></a>
	<a href="#" class="commnet">Total : <span>$650.00 AUD</span></a>
	</div>
	<div class="article-meta" style="text-align: right;">
	<a class="remove" href="/cart/change?line=1&amp;quantity=0">Remove</a>
	</div>


</div>
</div>
</div>
</div>

</div>
</article>

<article class="single-article" style="margin-top: 50px; padding-bottom: 10px; margin-bottom: 100px;">
<section class="banner-bottom-wthreelayouts py-lg-5 py-3">
			<div class="container1">
				<div class="inner-sec-shop px-lg-4 px-3">
					<!--/tabs-->
					<div class="responsive_tabs">
						<div id="horizontalTab">
							<ul class="resp-tabs-list">
								<h2>Payment </h2>
							</ul>
							<br>
							<div class="resp-tabs-container">
								<!--/tab_one-->
								<div class="tab1">
									<div class="pay_info">
										<div class="creditly-card-form agileinfo_form">
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
														<button id="paynow" class="book-now-btn">Pay Now</button>
												</div>
											</section>
										</form>
 
									</div>
								</div>

								<!--//tab_one-->
								
								</div>
							</div>
						</div>
					</div>

								
					<!--//tabs-->
				</div>

			</div>
			<!-- //payment -->
		</section>
		<!--//Payment-->
</article>
</div>












</div>
</div>
</div>



<script>
$(document).ready(function(){

	$( "#paynow" ).click(function() {

		window.location.href = "<?php echo base_url('/bookingconfirmation'); ?>";

	});

});

</script>
	

<?php $this->load->view('inc/footer'); ?>
