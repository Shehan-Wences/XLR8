<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$data['title'] = ucfirst('home');
$this->load->view('inc/header', $data);
//echo current_url();
?>


    <!--== Slider Area Start ==-->
    <section id="slider-area">
        <!--== slide Item One ==-->
        <div class="single-slide-item overlay">
            <div class="container">
                <div class="row">
                    <div class="col-lg-5">
                        <div class="book-a-car">
                            <form action="<?php echo base_url('/search'); ?>" method="get">
                                <!--== Pick Up Location ==-->
                                <div class="pickup-location book-item">
                                    <h4>PICK-UP LOCATION:</h4>
                                    <select name="location" class="custom-select">
                                      <option selected>Pick up Location</option>
                                      <?php foreach($locations as $key=>$loc){?>
                                  <option <?php if(isset($location)){ if($location==trim($loc->locationid)){ echo "selected"; }  }?> value="<?php echo trim($loc->locationid); ?>"> <?php echo trim($loc->name); ?></option>
								<?php } ?>
                                    </select>
                                </div>
                                <!--== Pick Up Location ==-->

                                <!--== Pick Up Date ==-->
                                <div class="pick-up-date book-item">
                                    <h4>PICK-UP DATE:</h4>
                                    <!--<input type="text" name="pdate" id="startDate" value="<?php echo date('Y/m/d H:i'); ?>" placeholder="Pick Up Date" />-->
									<input type="text" name="search-from-date" id="search-from-date" value="<?php echo date('Y/m/d H:i'); ?>" placeholder="Pick Up Date" />
                                    <div class="return-car">
                                     <h4>Return DATE:</h4>
                                     <!--   <input name="ddate" id="endDate" value="<?php echo date('Y/m/d H:i',strtotime(date('Y/m/d H:i'). ' + 3 days')); ?>" placeholder="Return Date" />-->
									  <input type="text" name="search-to-date" id="search-to-date" value="<?php echo date('Y/m/d H:i',strtotime(date('Y/m/d H:i'). ' + 3 days')); ?>" placeholder="Return Date" />
                                    </div>
                                </div>
                                <!--== Pick Up Location ==-->

                                <!--== Car Choose ==-->
                             
                                <!--== Car Choose ==-->

                                <div class="book-button text-center">
                                    <button class="book-now-btn">Book Now</button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="col-lg-7 text-right">
                        <div class="display-table">
                            <div class="display-table-cell">
                                <div class="slider-right-text">
                                    <h1>BOOK A CAR TODAY!</h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--== slide Item One ==-->
    </section>
    <!--== Slider Area End ==-->

    <!--== About Us Area Start ==-->
    <section id="about-area" class="section-padding">
        <div class="container">
            <div class="row">
                <!-- Section Title Start -->
                <div class="col-lg-12">
                    <div class="section-title  text-center">
                        <h2>About us</h2>
                        <span class="title-line"><i class="fa fa-car"></i></span>
                    </div>
                </div>
                <!-- Section Title End -->
            </div>

            <div class="row">
                <!-- About Content Start -->
                <div class="col-lg-12">
                    <div class="display-table">
                        <div class="display-table-cell">
                            <div class="about-content">
                                <p>XLR8 is a newly established car sharing service that operates in the heart of Victoria, providing customers the red carpet experience like no other.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- About Content End -->

            </div>
        </div>
    </section>
    <!--== About Us Area End ==-->
    
    <!--== Fun Fact Area Start ==-->
    <section id="funfact-area" class="overlay section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-11 col-md-12 m-auto">
                    <div class="funfact-content-wrap">
                        <div class="row">
                            <!-- Single FunFact Start -->
                            <div class="col-lg-4 col-md-6">
                                <div class="single-funfact">
                                    <div class="funfact-icon">
                                        <i class="fa fa-smile-o"></i>
                                    </div>
                                    <div class="funfact-content">
                                        <p><span class="counter">10</span>+</p>
                                        <h4>HAPPY CLIENTS</h4>
                                    </div>
                                </div>
                            </div>
                            <!-- Single FunFact End -->

                            <!-- Single FunFact Start -->
                            <div class="col-lg-4 col-md-6">
                                <div class="single-funfact">
                                    <div class="funfact-icon">
                                        <i class="fa fa-car"></i>
                                    </div>
                                    <div class="funfact-content">
                                        <p><span class="counter"><?php echo $numofcars; ?></span>+</p>
                                        <h4>CARS IN STOCK</h4>
                                    </div>
                                </div>
                            </div>
                            <!-- Single FunFact End -->

                            <!-- Single FunFact Start -->
                            <div class="col-lg-4 col-md-6">
                                <div class="single-funfact">
                                    <div class="funfact-icon">
                                        <i class="fa fa-bank"></i>
                                    </div>
                                    <div class="funfact-content">
                                        <p><span class="counter">20</span>+</p>
                                        <h4>Locations in Melbourne </h4>
                                    </div>
                                </div>
                            </div>
                            <!-- Single FunFact End -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--== Fun Fact Area End ==-->

   
    <!--== Testimonials Area Start ==-->
    <section id="testimonial-area" class="section-padding">
        <div class="container">
            <div class="row">
                <!-- Section Title Start -->
                <div class="col-lg-12">
                    <div class="section-title  text-center">
                        <h2>Reviews</h2>
                        <span class="title-line"><i class="fa fa-car"></i></span>
                        <p>Here's what our customers have said about their rental experience.</p>
                    </div>
                </div>
                <!-- Section Title End -->
            </div>

            <div class="row">
                <div class="col-lg-8 col-md-12 m-auto">
                    <div class="testimonial-content">
                        <!--== Single Testimoial Start ==-->
                        <div class="single-testimonial">
                            <p>Our family car broke down last minute and XLR8 was conveniently available for us to rent for our upcoming family holiday. Would highly recommend!</p>
                            <h3>Fatima Pratel</h3>
                            <div class="client-logo">
                                <img src="assets/img/client/client-pic-1.jpg" alt="JSOFT">
                            </div>
                        </div>
                        <!--== Single Testimoial End ==-->

                        <!--== Single Testimoial Start ==-->
                        <div class="single-testimonial">
                            <p>Rented a luxury car to take out my boss for a business trip. My boss complimented the clean, nice modern car thinking it was my own! Definitely would recommend if you need a last minute car to impress someone.</p>
                            <h3>John Smith</h3>
                            <div class="client-logo">
                                <img src="assets/img/client/client-pic-3.jpg" alt="JSOFT">
                            </div>
                        </div>
                        <!--== Single Testimoial End ==-->

                        <!--== Single Testimoial Start ==-->
                        <div class="single-testimonial">
                            <p>Booking with XLR8 was the best decision I've made. I rented a van through them, which in fact helped me save money while moving houses. The van was spacious and was able to fit majority of my larger furnitures! It only costed me $50 (which is a lot cheaper if you were to hire a truck).</p>
                            <h3>Achol Deng</h3>
                            <div class="client-logo">
                                <img src="assets/img/client/client-pic-2.jpg" alt="JSOFT">
                            </div>
                        </div>
                        <!--== Single Testimoial End ==-->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--== Testimonials Area End ==-->
<script>
            /*jslint browser:true*/
            /*global jQuery, document*/

            jQuery(document).ready(function () {
                'use strict';

                jQuery('#filter-date, #search-from-date, #search-to-date').datetimepicker();
            });
</script>
    









<?php $this->load->view('inc/footer'); ?>
