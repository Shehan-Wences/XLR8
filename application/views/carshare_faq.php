<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$data['title'] = ucfirst('faq');
$this->load->view('inc/header', $data);

?>

<!--== Page Title Area Start ==-->
<section id="page-title-area" class="section-padding overlay">
        <div class="container">
            <div class="row">
                <!-- Page Title Start -->
                <div class="col-lg-12">
                    <div class="section-title  text-center">
                        <h2>FAQ's</h2>
                        <span class="title-line"><i class="fa fa-car"></i></span>
                    </div>
                </div>
                <!-- Page Title End -->
            </div>
        </div>
    </section>
    <!--== Page Title Area End ==-->

    <!--== FAQ Area Start ==-->
    <section id="faq-page-area" class="section-padding">
        <div class="container">
            <div class="row">
                <!-- FAQ Content Start -->
				<div class="col-lg-12">
					<div class="faq-details-content">
						<!-- Single FAQ Subject  Start -->
						<div class="single-faq-sub">
							<h3>Frequently Asked Questions</h3>
							<div class="single-faq-sub-content">
								<div id="accordion">
									<!-- Single FAQ Start -->
									<div class="card">
										<div class="card-header" id="headingOne">
											<h5 class="mb-0"><button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
												<span>How can I see my previous bookings?</span>
												<i class="fa fa-angle-down"></i>
												<i class="fa fa-angle-up"></i>
											</button></h5>
										</div>

										<div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
											<div class="card-body">
												The previous bookings can be seen under the "bookings page" when the user has logged in.
											</div>
										</div>
									</div>
									<!-- Single FAQ End -->
														
            </div>
        </div>
    </section>
    <!--== FAQ Area End ==-->


 
<?php $this->load->view('inc/footer'); ?>