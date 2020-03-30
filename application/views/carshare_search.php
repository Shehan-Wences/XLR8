<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$data['title'] = ucfirst('search');
$this->load->view('inc/header', $data);

?>

   <!--== Slider Area Start ==-->
    <section id="home-slider-area">
        <div class="home-slider-item slider-bg-1 overlay">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="slideshowcontent">
                            <h1>BOOK A CAR TODAY!</h1>
                            <p>FOR AS LOW AS $10 A DAY PLUS 15% DISCOUNT <br> FOR OUR RETURNING CUSTOMERS</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="home-slider-item slider-bg-2 overlay">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="slideshowcontent">
                            <h1>SAVE YOUR MONEY</h1>
                            <p>FOR AS LOW AS $10 A DAY PLUS 15% DISCOUNT <br> FOR OUR RETURNING CUSTOMERS</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="home-slider-item slider-bg-3 overlay">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="slideshowcontent">
                            <h1>ENJOY YOUR JOURNEY</h1>
                            <p>FOR AS LOW AS $10 A DAY PLUS 15% DISCOUNT <br> FOR OUR RETURNING CUSTOMERS</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--== Slider Area End ==-->

    <!--== Book A Car Area Start ==-->
    <div id="book-a-car">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="booka-car-content">
                        <form action="index3.html">
                            <div class="pick-location bookinput-item">
                                <select class="custom-select">
                                  <option selected>Pick Location</option>
                                  <option value="1">Dhaka</option>
                                  <option value="2">Comilla</option>
                                  <option value="3">Barishal</option>
                                  <option value="3">Rangpur</option>
                                </select>
                            </div>

                            <div class="pick-date bookinput-item">
                                <input id="startDate2" placeholder="Pick Date" />
                            </div>

                            <div class="retern-date bookinput-item">
                                <input id="endDate2" placeholder="Return Date" />
                            </div>

                            <div class="car-choose bookinput-item">
                                <select class="custom-select">
                                  <option selected>Choose Car</option>
                                  <option value="1">BMW</option>
                                  <option value="2">Audi</option>
                                  <option value="3">Lexus</option>
                                </select>
                            </div>

                            <div class="bookcar-btn bookinput-item">
                                <button type="submit">Book Car</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--== Book A Car Area End ==-->

    <!--== What We Do Area Start ==-->
    <section id="what-do-area" class="section-padding">
        <div class="container">
            <div class="row">
                <!-- Section Title Start -->
                <div class="col-lg-12">
                    <div class="section-title  text-center">
                        <h2>WHAT WE DO</h2>
                        <span class="title-line"><i class="fa fa-car"></i></span>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                    </div>
                </div>
                <!-- Section Title End -->
            </div>

            <div class="row">
                <!-- Single We Do Start -->
                <div class="col-lg-4 col-md-4">
                    <div class="single-we-do we-do-bg-1">
                        <div class="we-do-content">
                            <div class="display-table">
                                <div class="display-table-cell">
                                    <h3>CAR INSPECTION</h3>
                                    <p>Erspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque</p>
                                    <a href="#">Read More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Single We Do End -->

                <!-- Single We Do Start -->
                <div class="col-lg-4 col-md-4">
                    <div class="single-we-do we-do-bg-2">
                        <div class="we-do-content">
                            <div class="display-table">
                                <div class="display-table-cell">
                                    <h3>CAR INSPECTION</h3>
                                    <p>Erspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque</p>
                                    <a href="#">Read More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Single We Do End -->

                <!-- Single We Do Start -->
                <div class="col-lg-4 col-md-4">
                    <div class="single-we-do we-do-bg-3">
                        <div class="we-do-content">
                            <div class="display-table">
                                <div class="display-table-cell">
                                    <h3>CAR INSPECTION</h3>
                                    <p>Erspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque</p>
                                    <a href="#">Read More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Single We Do End -->
            </div>
        </div>
    </section>
    <!--== What We Do Area End ==-->

    <!--== Partner Area Start ==-->
    <div id="partner-area">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="partner-content-wrap">
                        <!-- Single Partner Start -->
                        <div class="single-partner">
                            <div class="display-table">
                                <div class="display-table-cell">
                                    <img src="assets/img/partner/partner-logo-1.png" alt="JSOFT">
                                </div>
                            </div>
                        </div>
                        <!-- Single Partner End -->

                        <!-- Single Partner Start -->
                        <div class="single-partner">
                            <div class="display-table">
                                <div class="display-table-cell">
                                    <img src="assets/img/partner/partner-logo-2.png" alt="JSOFT">
                                </div>
                            </div>
                        </div>
                        <!-- Single Partner End -->

                        <!-- Single Partner Start -->
                        <div class="single-partner">
                            <div class="display-table">
                                <div class="display-table-cell">
                                    <img src="assets/img/partner/partner-logo-3.png" alt="JSOFT">
                                </div>
                            </div>
                        </div>
                        <!-- Single Partner End -->

                        <!-- Single Partner Start -->
                        <div class="single-partner">
                            <div class="display-table">
                                <div class="display-table-cell">
                                    <img src="assets/img/partner/partner-logo-4.png" alt="JSOFT">
                                </div>
                            </div>
                        </div>
                        <!-- Single Partner End -->

                        <!-- Single Partner Start -->
                        <div class="single-partner">
                            <div class="display-table">
                                <div class="display-table-cell">
                                    <img src="assets/img/partner/partner-logo-5.png" alt="JSOFT">
                                </div>
                            </div>
                        </div>
                        <!-- Single Partner End -->

                        <!-- Single Partner Start -->
                        <div class="single-partner">
                            <div class="display-table">
                                <div class="display-table-cell">
                                    <img src="assets/img/partner/partner-logo-1.png" alt="JSOFT">
                                </div>
                            </div>
                        </div>
                        <!-- Single Partner End -->

                        <!-- Single Partner Start -->
                        <div class="single-partner">
                            <div class="display-table">
                                <div class="display-table-cell">
                                    <img src="assets/img/partner/partner-logo-4.png" alt="JSOFT">
                                </div>
                            </div>
                        </div>
                        <!-- Single Partner End -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--== Partner Area End ==-->

    <!--== Services Area Start ==-->
    <section id="service-area" class="section-padding">
        <div class="container">
            <div class="row">
                <!-- Section Title Start -->
                <div class="col-lg-12">
                    <div class="section-title  text-center">
                        <h2>Our Services</h2>
                        <span class="title-line"><i class="fa fa-car"></i></span>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                    </div>
                </div>
                <!-- Section Title End -->
            </div>

            <div class="row">
                <!-- Single Service Start -->
                <div class="col-lg-4 col-md-6">
                    <div class="single-service">
                        <div class="media">
                            <div class="service-icon">
                                <span></span>
                                <img src="assets/img/services/service-icon-1.png" alt="JSOFT">
                            </div>
                            <div class="media-body">
                                <h4>RENTAL CAR</h4>
                                <p>You can be a celebrity for a full night and half days with a nice one of our amazing Limousines, Hummers.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Single Service Start -->

                <!-- Single Service Start -->
                <div class="col-lg-4 col-md-6">
                    <div class="single-service">
                        <div class="media">
                            <div class="service-icon">
                                <span></span>
                                <img src="assets/img/services/service-icon-2.png" alt="JSOFT">
                            </div>
                            <div class="media-body">
                                <h4>CAR REPAIR</h4>
                                <p>You can be a celebrity for a full night and half days with a nice one of our amazing Limousines, Hummers.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Single Service Start -->

                <!-- Single Service Start -->
                <div class="col-lg-4 col-md-6">
                    <div class="single-service">
                        <div class="media">
                            <div class="service-icon">
                                <span></span>
                                <img src="assets/img/services/service-icon-3.png" alt="JSOFT">
                            </div>
                            <div class="media-body">
                                <h4>TAXI SERVICE</h4>
                                <p>You can be a celebrity for a full night and half days with a nice one of our amazing Limousines, Hummers.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Single Service Start -->

                <!-- Single Service Start -->
                <div class="col-lg-4 col-md-6">
                    <div class="single-service">
                        <div class="media">
                            <div class="service-icon">
                                <span></span>
                                <img src="assets/img/services/service-icon-4.png" alt="JSOFT">
                            </div>
                            <div class="media-body">
                                <h4>life insurance</h4>
                                <p>You can be a celebrity for a full night and half days with a nice one of our amazing Limousines, Hummers.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Single Service Start -->

                <!-- Single Service Start -->
                <div class="col-lg-4 col-md-6">
                    <div class="single-service">
                        <div class="media">
                            <div class="service-icon">
                                <span></span>
                                <img src="assets/img/services/service-icon-5.png" alt="JSOFT">
                            </div>
                            <div class="media-body">
                                <h4>car wash</h4>
                                <p>You can be a celebrity for a full night and half days with a nice one of our amazing Limousines, Hummers.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Single Service Start -->

                <!-- Single Service Start -->
                <div class="col-lg-4 col-md-6">
                    <div class="single-service">
                        <div class="media">
                            <div class="service-icon">
                                <span></span>
                                <img src="assets/img/services/service-icon-6.png" alt="JSOFT">
                            </div>
                            <div class="media-body">
                                <h4>call driver</h4>
                                <p>You can be a celebrity for a full night and half days with a nice one of our amazing Limousines, Hummers.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Single Service Start -->
            </div>
        </div>
    </section>
    <!--== Services Area End ==-->

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
                                        <p><span class="counter">550</span>+</p>
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
                                        <p><span class="counter">250</span>+</p>
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
                                        <p><span class="counter">50</span>+</p>
                                        <h4>office in cities</h4>
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

    <!--== Our Cars Area Start ==-->
    <section id="our-cars" class="section-padding">
        <div class="container">
            <div class="row">
                <!-- Section Title Start -->
                <div class="col-lg-12">
                    <div class="section-title  text-center">
                        <h2>Our cars</h2>
                        <span class="title-line"><i class="fa fa-car"></i></span>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                    </div>
                </div>
                <!-- Section Title End -->
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="team-content">
                        <div class="row">
                            <!-- OurCars Tab Menu start -->
                            <div class="col-lg-3">
                                <div class="ourcar-tab-menu">
                                    <ul class="nav nav-tabs" id="ourcartabmenu" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" id="ourcar_item_1" data-toggle="tab" href="#ourcar_1" role="tab" aria-selected="true">VW Golf VII</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="ourcar_item_2" data-toggle="tab" href="#ourcar_2" role="tab" aria-selected="true">Audi A1 S-LINE</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="ourcar_item_3" data-toggle="tab" href="#ourcar_3" role="tab" aria-selected="true">VW Golf VII</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="ourcar_item_4" data-toggle="tab" href="#ourcar_4" role="tab" aria-selected="true">Audi A1 S-LINE</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="ourcar_item_5" data-toggle="tab" href="#ourcar_5" role="tab" aria-selected="true">VW Golf VII</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <!-- OurCars Tab Menu End -->

                            <!-- OurCars Tab Content start -->
                            <div class="col-lg-9">
                                <div class="tab-content" id="ourcartabcontent">
                                    <!-- Single OurCars  start -->
                                    <div class="tab-pane fade show active" id="ourcar_1" role="tabpanel" aria-labelledby="ourcar_item_1">
                                        <div class="row">
                                            <div class="col-lg-8 text-center">
                                                <div class="display-table">
                                                    <div class="display-table-cell">
                                                        <div class="ourcar-pic">
                                                            <img src="assets/img/car/car-5.jpg" alt="JSOFT">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-4">
                                                <div class="ourcar-info text-center">
                                                    <h2>$ 75.40 <span>Rent per day</span></h2>
                                                    <table class="our-table">
                                                        <tr>
                                                            <td>Model</td>
                                                            <td>Limousine</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Doors</td>
                                                            <td>5</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Seats</td>
                                                            <td>15</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Transmission</td>
                                                            <td>Automatic</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Air conditioning</td>
                                                            <td>Yes</td>
                                                        </tr>
                                                    </table>
                                                    <a href="#" class="bookbtn">Book Now</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Single OurCars End -->

                                    <!-- Single OurCars  start -->
                                    <div class="tab-pane fade" id="ourcar_2" role="tabpanel" aria-labelledby="ourcar_item_2">
                                        <div class="row">
                                            <div class="col-lg-8 text-center">
                                                <div class="display-table">
                                                    <div class="display-table-cell">
                                                        <div class="ourcar-pic">
                                                            <img src="assets/img/car/car-1.jpg" alt="JSOFT">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-4">
                                                <div class="ourcar-info text-center">
                                                    <h2>$ 75.40 <span>Rent per day</span></h2>
                                                    <table class="our-table">
                                                        <tr>
                                                            <td>Model</td>
                                                            <td>Limousine</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Doors</td>
                                                            <td>5</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Seats</td>
                                                            <td>15</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Transmission</td>
                                                            <td>Automatic</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Air conditioning</td>
                                                            <td>Yes</td>
                                                        </tr>
                                                    </table>
                                                    <a href="#" class="bookbtn">Book Now</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Single OurCars End -->

                                    <!-- Single OurCars  start -->
                                    <div class="tab-pane fade" id="ourcar_3" role="tabpanel" aria-labelledby="ourcar_item_3">
                                        <div class="row">
                                            <div class="col-lg-8 text-center">
                                                <div class="display-table">
                                                    <div class="display-table-cell">
                                                        <div class="ourcar-pic">
                                                            <img src="assets/img/car/car-2.jpg" alt="JSOFT">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-4">
                                                <div class="ourcar-info text-center">
                                                    <h2>$ 75.40 <span>Rent per day</span></h2>
                                                    <table class="our-table">
                                                        <tr>
                                                            <td>Model</td>
                                                            <td>Limousine</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Doors</td>
                                                            <td>5</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Seats</td>
                                                            <td>15</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Transmission</td>
                                                            <td>Automatic</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Air conditioning</td>
                                                            <td>Yes</td>
                                                        </tr>
                                                    </table>
                                                    <a href="#" class="bookbtn">Book Now</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Single OurCars End -->

                                    <!-- Single OurCars  start -->
                                    <div class="tab-pane fade" id="ourcar_4" role="tabpanel" aria-labelledby="ourcar_item_4">
                                        <div class="row">
                                            <div class="col-lg-8 text-center">
                                                <div class="display-table">
                                                    <div class="display-table-cell">
                                                        <div class="ourcar-pic">
                                                            <img src="assets/img/car/car-3.jpg" alt="JSOFT">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-4">
                                                <div class="ourcar-info text-center">
                                                    <h2>$ 75.40 <span>Rent per day</span></h2>
                                                    <table class="our-table">
                                                        <tr>
                                                            <td>Model</td>
                                                            <td>Limousine</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Doors</td>
                                                            <td>5</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Seats</td>
                                                            <td>15</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Transmission</td>
                                                            <td>Automatic</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Air conditioning</td>
                                                            <td>Yes</td>
                                                        </tr>
                                                    </table>
                                                    <a href="#" class="bookbtn">Book Now</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Single OurCars End -->

                                    <!-- Single OurCars  start -->
                                    <div class="tab-pane fade" id="ourcar_5" role="tabpanel" aria-labelledby="ourcar_item_5">
                                        <div class="row">
                                            <div class="col-lg-8 text-center">
                                                <div class="display-table">
                                                    <div class="display-table-cell">
                                                        <div class="ourcar-pic">
                                                            <img src="assets/img/car/car-4.jpg" alt="JSOFT">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-4">
                                                <div class="ourcar-info text-center">
                                                    <h2>$ 75.40 <span>Rent per day</span></h2>
                                                    <table class="our-table">
                                                        <tr>
                                                            <td>Model</td>
                                                            <td>Limousine</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Doors</td>
                                                            <td>5</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Seats</td>
                                                            <td>15</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Transmission</td>
                                                            <td>Automatic</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Air conditioning</td>
                                                            <td>Yes</td>
                                                        </tr>
                                                    </table>
                                                    <a href="#" class="bookbtn">Book Now</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Single OurCars End -->
                                </div>
                            </div>
                            <!-- OurCars Tab Content End -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--== Our Cars Area End ==-->

    <!--== Pricing Area Start ==-->
    <section id="pricing-area" class="section-padding overlay">
        <div class="container">
            <div class="row">
                <!-- Section Title Start -->
                <div class="col-lg-12">
                    <div class="section-title  text-center">
                        <h2>Only quality for clients</h2>
                        <span class="title-line"><i class="fa fa-car"></i></span>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                    </div>
                </div>
                <!-- Section Title End -->
            </div>

            <!-- Pricing Table Conatent Start -->
            <div class="row">
                <!-- Single Pricing Table -->
                <div class="col-lg-4 col-md-6 text-center">
                    <div class="single-pricing-table">
                        <h3>BUSINESS</h3>
                        <h2>$ 55.99</h2>
                        <h5>PER MONTH</h5>

                        <ul class="package-list">
                            <li>FREE VEHICLE DELIVERY</li>
                            <li>WEDDINGS CELEBRATIONS</li>
                            <li>FULL INSURANCE INCLUDED</li>
                            <li>TRANSPORT ABROAD</li>
                            <li>ALL INCLUSIVE MINI BAR</li>
                            <li>CHAUFFER INCLUDED IN PRICE</li>
                        </ul>
                    </div>
                </div>
                <!-- Single Pricing Table -->

                <!-- Single Pricing Table -->
                <div class="col-lg-4 col-md-6 text-center">
                    <div class="single-pricing-table">
                        <h3>Trial</h3>
                        <h2>Free</h2>
                        <h5>PER MONTH</h5>

                        <ul class="package-list">
                            <li>FREE VEHICLE DELIVERY</li>
                            <li>OTHER CELEBRATIONS</li>
                            <li>FULL INSURANCE</li>
                            <li>TRANSPORT ABROAD</li>
                            <li>MINI BAR</li>
                            <li>INCLUDED IN PRICE</li>
                        </ul>
                    </div>
                </div>
                <!-- Single Pricing Table -->

                <!-- Single Pricing Table -->
                <div class="col-lg-4 col-md-6 text-center">
                    <div class="single-pricing-table">
                        <h3>standard</h3>
                        <h2>$ 35.99</h2>
                        <h5>PER MONTH</h5>

                        <ul class="package-list">
                            <li>DELIVERY AT AIRPORT</li>
                            <li>WEDDINGS AND OTHER</li>
                            <li>FULL INCLUDED</li>
                            <li>TRANSPORT ABROAD</li>
                            <li>ALL MINI BAR</li>
                            <li>CHAUFFER PRICE</li>
                        </ul>
                    </div>
                </div>
                <!-- Single Pricing Table -->
            </div>
            <!-- Pricing Table Conatent End -->
        </div>
    </section>
    <!--== Pricing Area End ==-->

    <!--== Why Coose Us Start ==-->
    <section id="why-choose-area" class="section-padding">
        <div class="container">
            <div class="row">
                <!-- Section Title Start -->
                <div class="col-lg-12">
                    <div class="section-title  text-center">
                        <h2>Why Coose Us</h2>
                        <span class="title-line"><i class="fa fa-car"></i></span>
                        <p>Lorem ipsum dolor sit amet elit.</p>
                    </div>
                </div>
                <!-- Section Title End -->
            </div>

            <div class="row">
                <div class="col-lg-10 m-auto">
                    <div class="row">
                        <!-- Why Choose Tab Menu -->
                        <div class="col-lg-4">
                            <ul class="nav nav-tabs" id="choosetabmenu" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="car-ins" data-toggle="tab" href="#car-insp" role="tab" aria-selected="true">CAR INSPECTION</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="car-repair" data-toggle="tab" href="#car-repairw" role="tab" aria-selected="false">CAR REPAIR WORKS</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="car-glass" data-toggle="tab" href="#car-glassing" role="tab" aria-selected="false">CAR GLASSING</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="delivery-tab" data-toggle="tab" href="#delivery" role="tab" aria-selected="false">DELIVERY</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="vehiclemodels-tab" data-toggle="tab" href="#vehiclemodels" role="tab" aria-selected="false">Vehicle Models</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="ourrental-tab" data-toggle="tab" href="#ourrental" role="tab" aria-selected="false">Our Rental</a>
                                </li>
                            </ul>
                        </div>
                        <!-- Why Choose Tab Menu -->

                        <!-- Why Choose Tab Content -->
                        <div class="col-lg-8">
                            <div class="tab-content" id="choosetabcontent">
                                <div class="tab-pane fade show active" id="car-insp" role="tabpanel" aria-labelledby="car-ins">
                                    <div class="wchoose-content">
                                        <h4>CAR INSPECTION</h4>
                                        <p>Erspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beataesal vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia.</p>

                                        <div class="row">
                                            <div class="col-lg-6 col-md-6">
                                                <div class="single-choose-item">
                                                    <div class="choose-icon">
                                                        <i class="fa fa-anchor"></i>
                                                    </div>
                                                    <span>Quia, odio, ipsam deleniti delectus assumenda cum.</span>
                                                </div>
                                            </div>

                                            <div class="col-lg-6 col-md-6">
                                                <div class="single-choose-item">
                                                    <div class="choose-icon">
                                                        <i class="fa fa-delicious"></i>
                                                    </div>
                                                    <span>Deleniti eius fuga perferendis, dolorum atquesequi soluta.</span>
                                                </div>
                                            </div>

                                            <div class="col-lg-6 col-md-6">
                                                <div class="single-choose-item">
                                                    <div class="choose-icon">
                                                        <i class="fa fa-bus"></i>
                                                    </div>
                                                    <span>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</span>
                                                </div>
                                            </div>

                                            <div class="col-lg-6 col-md-6">
                                                <div class="single-choose-item">
                                                    <div class="choose-icon">
                                                        <i class="fa fa-briefcase"></i>
                                                    </div>
                                                    <span>Beataesal vitae dicta sunt explicabo. Nemo enim ipsam </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="car-repairw" role="tabpanel" aria-labelledby="car-repair">
                                    <div class="wchoose-content">
                                        <h4>CAR REPAIR WORKS</h4>
                                        <p>Erspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beataesal vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia.</p>

                                        <div class="row">
                                            <div class="col-lg-6 col-md-6">
                                                <div class="single-choose-item">
                                                    <div class="choose-icon">
                                                        <i class="fa fa-anchor"></i>
                                                    </div>
                                                    <span>Quia, odio, ipsam deleniti delectus assumenda cum.</span>
                                                </div>
                                            </div>

                                            <div class="col-lg-6 col-md-6">
                                                <div class="single-choose-item">
                                                    <div class="choose-icon">
                                                        <i class="fa fa-delicious"></i>
                                                    </div>
                                                    <span>Deleniti eius fuga perferendis, dolorum atquesequi soluta.</span>
                                                </div>
                                            </div>

                                            <div class="col-lg-6 col-md-6">
                                                <div class="single-choose-item">
                                                    <div class="choose-icon">
                                                        <i class="fa fa-bus"></i>
                                                    </div>
                                                    <span>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</span>
                                                </div>
                                            </div>

                                            <div class="col-lg-6 col-md-6">
                                                <div class="single-choose-item">
                                                    <div class="choose-icon">
                                                        <i class="fa fa-briefcase"></i>
                                                    </div>
                                                    <span>Beataesal vitae dicta sunt explicabo. Nemo enim ipsam </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="car-glassing" role="tabpanel" aria-labelledby="car-glass">
                                    <div class="wchoose-content">
                                        <h4>CAR GLASSING</h4>
                                        <p>Erspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beataesal vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia.</p>

                                        <div class="row">
                                            <div class="col-lg-6 col-md-6">
                                                <div class="single-choose-item">
                                                    <div class="choose-icon">
                                                        <i class="fa fa-anchor"></i>
                                                    </div>
                                                    <span>Quia, odio, ipsam deleniti delectus assumenda cum.</span>
                                                </div>
                                            </div>

                                            <div class="col-lg-6 col-md-6">
                                                <div class="single-choose-item">
                                                    <div class="choose-icon">
                                                        <i class="fa fa-delicious"></i>
                                                    </div>
                                                    <span>Deleniti eius fuga perferendis, dolorum atquesequi soluta.</span>
                                                </div>
                                            </div>

                                            <div class="col-lg-6 col-md-6">
                                                <div class="single-choose-item">
                                                    <div class="choose-icon">
                                                        <i class="fa fa-bus"></i>
                                                    </div>
                                                    <span>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</span>
                                                </div>
                                            </div>

                                            <div class="col-lg-6 col-md-6">
                                                <div class="single-choose-item">
                                                    <div class="choose-icon">
                                                        <i class="fa fa-briefcase"></i>
                                                    </div>
                                                    <span>Beataesal vitae dicta sunt explicabo. Nemo enim ipsam </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="delivery" role="tabpanel" aria-labelledby="delivery-tab">
                                    <div class="wchoose-content">
                                        <h4>DELIVERY</h4>
                                        <p>Erspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beataesal vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia.</p>

                                        <div class="row">
                                            <div class="col-lg-6 col-md-6">
                                                <div class="single-choose-item">
                                                    <div class="choose-icon">
                                                        <i class="fa fa-anchor"></i>
                                                    </div>
                                                    <span>Quia, odio, ipsam deleniti delectus assumenda cum.</span>
                                                </div>
                                            </div>

                                            <div class="col-lg-6 col-md-6">
                                                <div class="single-choose-item">
                                                    <div class="choose-icon">
                                                        <i class="fa fa-delicious"></i>
                                                    </div>
                                                    <span>Deleniti eius fuga perferendis, dolorum atquesequi soluta.</span>
                                                </div>
                                            </div>

                                            <div class="col-lg-6 col-md-6">
                                                <div class="single-choose-item">
                                                    <div class="choose-icon">
                                                        <i class="fa fa-bus"></i>
                                                    </div>
                                                    <span>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</span>
                                                </div>
                                            </div>

                                            <div class="col-lg-6 col-md-6">
                                                <div class="single-choose-item">
                                                    <div class="choose-icon">
                                                        <i class="fa fa-briefcase"></i>
                                                    </div>
                                                    <span>Beataesal vitae dicta sunt explicabo. Nemo enim ipsam </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="vehiclemodels" role="tabpanel" aria-labelledby="vehiclemodels-tab">
                                    <div class="wchoose-content">
                                        <h4>Vehicle Models</h4>
                                        <p>Erspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beataesal vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia.</p>

                                        <div class="row">
                                            <div class="col-lg-6 col-md-6">
                                                <div class="single-choose-item">
                                                    <div class="choose-icon">
                                                        <i class="fa fa-anchor"></i>
                                                    </div>
                                                    <span>Quia, odio, ipsam deleniti delectus assumenda cum.</span>
                                                </div>
                                            </div>

                                            <div class="col-lg-6 col-md-6">
                                                <div class="single-choose-item">
                                                    <div class="choose-icon">
                                                        <i class="fa fa-delicious"></i>
                                                    </div>
                                                    <span>Deleniti eius fuga perferendis, dolorum atquesequi soluta.</span>
                                                </div>
                                            </div>

                                            <div class="col-lg-6 col-md-6">
                                                <div class="single-choose-item">
                                                    <div class="choose-icon">
                                                        <i class="fa fa-bus"></i>
                                                    </div>
                                                    <span>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</span>
                                                </div>
                                            </div>

                                            <div class="col-lg-6 col-md-6">
                                                <div class="single-choose-item">
                                                    <div class="choose-icon">
                                                        <i class="fa fa-briefcase"></i>
                                                    </div>
                                                    <span>Beataesal vitae dicta sunt explicabo. Nemo enim ipsam </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="ourrental" role="tabpanel" aria-labelledby="ourrental-tab">
                                    <div class="wchoose-content">
                                        <h4>Our Rental</h4>
                                        <p>Erspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beataesal vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia.</p>

                                        <div class="row">
                                            <div class="col-lg-6 col-md-6">
                                                <div class="single-choose-item">
                                                    <div class="choose-icon">
                                                        <i class="fa fa-anchor"></i>
                                                    </div>
                                                    <span>Quia, odio, ipsam deleniti delectus assumenda cum.</span>
                                                </div>
                                            </div>

                                            <div class="col-lg-6 col-md-6">
                                                <div class="single-choose-item">
                                                    <div class="choose-icon">
                                                        <i class="fa fa-delicious"></i>
                                                    </div>
                                                    <span>Deleniti eius fuga perferendis, dolorum atquesequi soluta.</span>
                                                </div>
                                            </div>

                                            <div class="col-lg-6 col-md-6">
                                                <div class="single-choose-item">
                                                    <div class="choose-icon">
                                                        <i class="fa fa-bus"></i>
                                                    </div>
                                                    <span>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</span>
                                                </div>
                                            </div>

                                            <div class="col-lg-6 col-md-6">
                                                <div class="single-choose-item">
                                                    <div class="choose-icon">
                                                        <i class="fa fa-briefcase"></i>
                                                    </div>
                                                    <span>Beataesal vitae dicta sunt explicabo. Nemo enim ipsam </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Why Choose Tab Content -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--== Why Coose Us End ==-->

    <!--== Mobile App Area Start ==-->
    <div id="mobileapp-video-bg"></div>
    <section id="mobile-app-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="mobile-app-content">
                        <h2>SAVE 30% WITH THE APP</h2>
                        <p>Easy &amp; Fast - Book a car in 60 seconds</p>
                        <div class="app-btns">
                            <a href="#"><i class="fa fa-android"></i> Android Store</a>
                            <a href="#"><i class="fa fa-apple"></i> Apple Store</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--== Mobile App Area End ==-->

    <!--== Articles Area Start ==-->
    <section id="tips-article-area" class="section-padding">
        <div class="container">
            <div class="row">
                <!-- Section Title Start -->
                <div class="col-lg-12">
                    <div class="section-title  text-center">
                        <h2>Tips and articles</h2>
                        <span class="title-line"><i class="fa fa-car"></i></span>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                    </div>
                </div>
                <!-- Section Title End -->
            </div>

            <!-- Articles Content Wrap Start -->
            <div class="row">
                <!-- Single Articles Start -->
                <div class="col-lg-12">
                    <article class="single-article">
                        <div class="row">
                            <!-- Articles Thumbnail Start -->
                            <div class="col-lg-5">
                                <div class="article-thumb">
                                    <img src="assets/img/article/arti-thumb-1.jpg" alt="JSOFT">
                                </div>
                            </div>
                            <!-- Articles Thumbnail End -->

                            <!-- Articles Content Start -->
                            <div class="col-lg-7">
                                <div class="display-table">
                                    <div class="display-table-cell">
                                        <div class="article-body">
                                            <h3><a href="article-details.html">Wliquam sit amet urna eullam</a></h3>
                                            <div class="article-meta">
                                                <a href="#" class="author">By :: <span>Admin</span></a>
                                                <a href="#" class="commnet">Comments :: <span>10</span></a>
                                            </div>

                                            <div class="article-date">25 <span class="month">jan</span></div>

                                            <p>Wlam aiber vestibulum fringilla oremedad ipsum dolor sit amet consectetur adipisicing elit sed doned eiusmod tempored incididunt ut labore et dolore magna aliquaa enimd ad minim veniad.</p>

                                            <a href="article-details.html" class="readmore-btn">Read More <i class="fa fa-long-arrow-right"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Articles Content End -->
                        </div>
                    </article>
                </div>
                <!-- Single Articles End -->

                <!-- Single Articles Start -->
                <div class="col-lg-12">
                    <article class="single-article middle">
                        <div class="row">

                            <!-- Articles Thumbnail Start -->
                            <div class="col-lg-5 d-xl-none">
                                <div class="article-thumb">
                                    <img src="assets/img/article/arti-thumb-2.jpg" alt="JSOFT">
                                </div>
                            </div>
                            <!-- Articles Thumbnail End -->

                            <!-- Articles Content Start -->
                            <div class="col-lg-7">
                                <div class="display-table">
                                    <div class="display-table-cell">
                                        <div class="article-body">
                                            <h3><a href="article-details.html">fringilla oremedad ipsum dolor sit</a></h3>
                                            <div class="article-meta">
                                                <a href="#" class="author">By :: <span>Admin</span></a>
                                                <a href="#" class="commnet">Comments :: <span>10</span></a>
                                            </div>

                                            <div class="article-date">14<span class="month">feb</span></div>

                                            <p>Wlam aiber vestibulum fringilla oremedad ipsum dolor sit amet consectetur adipisicing elit sed doned eiusmod tempored incididunt ut labore et dolore magna aliquaa enimd ad minim veniad.</p>

                                            <a href="article-details.html" class="readmore-btn">Read More <i class="fa fa-long-arrow-right"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Articles Content End -->

                            <!-- Articles Thumbnail Start -->
                            <div class="col-lg-5 d-none d-xl-block">
                                <div class="article-thumb">
                                    <img src="assets/img/article/arti-thumb-2.jpg" alt="JSOFT">
                                </div>
                            </div>
                            <!-- Articles Thumbnail End -->
                        </div>
                    </article>
                </div>
                <!-- Single Articles End -->

                <!-- Single Articles Start -->
                <div class="col-lg-12">
                    <article class="single-article">
                        <div class="row">
                            <!-- Articles Thumbnail Start -->
                            <div class="col-lg-5">
                                <div class="article-thumb">
                                    <img src="assets/img/article/arti-thumb-3.jpg" alt="JSOFT">
                                </div>
                            </div>
                            <!-- Articles Thumbnail End -->

                            <!-- Articles Content Start -->
                            <div class="col-lg-7">
                                <div class="display-table">
                                    <div class="display-table-cell">
                                        <div class="article-body">
                                            <h3><a href="article-details.html">Tempored incididunt ut labore</a></h3>
                                            <div class="article-meta">
                                                <a href="#" class="author">By :: <span>Admin</span></a>
                                                <a href="#" class="commnet">Comments :: <span>10</span></a>
                                            </div>

                                            <div class="article-date">17 <span class="month">feb</span></div>

                                            <p>Wlam aiber vestibulum fringilla oremedad ipsum dolor sit amet consectetur adipisicing elit sed doned eiusmod tempored incididunt ut labore et dolore magna aliquaa enimd ad minim veniad.</p>

                                            <a href="article-details.html" class="readmore-btn">Read More <i class="fa fa-long-arrow-right"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Articles Content End -->
                        </div>
                    </article>
                </div>
                <!-- Single Articles End -->
            </div>
            <!-- Articles Content Wrap End -->
        </div>
    </section>
    <!--== Articles Area End ==-->
	

<?php $this->load->view('inc/footer'); ?>