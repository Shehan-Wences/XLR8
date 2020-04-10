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
                                  <option selected>Pick up Location</option>
                                  <option value="1">Melbourne CBD</option>
                                  <option value="2">East Melbourne</option>
                                  <option value="3">North Melbourne</option>
                                  <option value="3">South Melbourne</option>
                                </select>
                            </div>

                            <div class="pick-date bookinput-item">
                                <input id="startDate2" placeholder="Pick up Date" />
                            </div>

                            <div class="retern-date bookinput-item">
                                <input id="endDate2" placeholder="Return Date" />
                            </div>

                            <div class="car-choose bookinput-item">
                                <select class="custom-select">
                                  <option selected>Return Location</option>
                                  <option value="1">Melbourne CBD</option>
                                  <option value="2">East Melbourne</option>
                                  <option value="3">North Melbourne</option>
                                  <option value="3">South Melbourne</option>
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
    <!--== Car List Area Start ==-->
    <section id="car-list-area" class="section-padding">
        <div class="container">
            <div class="row">
                <!-- Sidebar Area Start -->
                <div class="col-lg-4">
                    <div class="sidebar-content-wrap">
                        <!-- Single Sidebar Start -->
						
						<div class="single-sidebar">
                            <h3>CAR TYPE</h3>
							<div class="text-left">
                            <div class="sidebar-body">
                                <form action="/" method="post">
								<div class="row">
								<div class="col-lg-6 col-md-6">
									 <input type="checkbox" value="">
									 <label for="type"> Sedan</label><br>
									 </div>
									 <div class="col-lg-6 col-md-6">
									 <input type="checkbox" value="">
									 <label for="type"> Van</label><br>
									 </div>
								</div>
								
								<div class="row">
								<div class="col-lg-6 col-md-6">
									 <input type="checkbox" value="">
									 <label for="type"> Hatchback</label><br>
									 </div>
									 <div class="col-lg-6 col-md-6">
									 <input type="checkbox" value="">
									 <label for="type"> SUV</label><br>
									 </div>
								</div>
								
								<div class="row">
									<div class="col-lg-6 col-md-6">
										 <input type="checkbox" value="">
										 <label for="type"> Wagon</label><br>
									 </div>
									 <div class="col-lg-6 col-md-6">
										 <input type="checkbox" value="">
										 <label for="type"> Convertible</label><br>
									 </div>
								</div>

                                </form>
                            </div>
							</div>
                        </div>
						
									
						
                        <div class="single-sidebar">
                            <h3>MAKE</h3>
							<div class="text-left">
                            <div class="sidebar-body">
                                <form action="/" method="post">
									<div class="row">
									<div class="col-lg-6 col-md-6">
										 <input type="checkbox" value="">
										 <label for="type"> Honda</label><br>
									 </div>
									 <div class="col-lg-6 col-md-6">
										 <input type="checkbox" value="">
										 <label for="type"> Toyota</label><br>
									 </div>
								</div>
								
								<div class="row">
									<div class="col-lg-6 col-md-6">
										 <input type="checkbox" value="">
										 <label for="type"> Hyundai</label><br>
									 </div>
									 <div class="col-lg-6 col-md-6">
										 <input type="checkbox" value="">
										 <label for="type"> Kia</label><br>
									 </div>
								</div>
								
								<div class="row">
									<div class="col-lg-6 col-md-6">
										 <input type="checkbox" value="">
										 <label for="type"> Holden</label><br>
									 </div>
									 <div class="col-lg-6 col-md-6">
										 <input type="checkbox" value="">
										 <label for="type"> Ford</label><br>
									 </div>
								</div>
								
								<div class="row">
									<div class="col-lg-6 col-md-6">
										 <input type="checkbox" value="">
										 <label for="type"> BMW</label><br>
									 </div>
									 <div class="col-lg-6 col-md-6">
										 <input type="checkbox" value="">
										 <label for="type"> Lexus</label><br>
									 </div>
								</div>
								</form>
                            </div>
							</div>
                        </div>
						
												
						
						
						<div class="single-sidebar">
                            <h3>TRANSMISSION</h3>
							<div class="text-center">
                            <div class="sidebar-body">
                                <form action="/" method="post">
								  <input type="checkbox" value="">
								  <label for="make"> Automatic</label><br>
								  <input type="checkbox" value="">
								  <label for="make"> Manual</label><br>
								</form>
                            </div>
							</div>
                        </div>
						
						<div class="single-sidebar">
                            <h3>FUEL</h3>
							<div class="text-center">
                            <div class="sidebar-body">
                                <form action="/" method="post">
								  <input type="checkbox" value="">
								  <label for="make"> Petrol</label><br>
								  <input type="checkbox" value="">
								  <label for="make"> Diesel</label><br>
								</form>
                            </div>
							</div>
                        </div>
						
						<div class="single-sidebar">
                            <h3>PRICE</h3>
							<div class="text-center">
                            <div class="sidebar-body">
							  <p>Select a price that is within your budget:</p>
							  
							  <input type="range" min="1" max="100" value="50" id="slider">
							  
								<div id="selector" >
								<div class="SelectBtn"></div>
								<div> Price per day $ <span id="SelectValue"></span></div>
								</div>
								</div> 
								<script>
									var slider = document.getElementById("slider");
									var selector = document.getElementById("selector");
									var SelectValue = document.getElementById("SelectValue");
									
									SelectValue.innerHTML = slider.value;
									
									slider.oninput = function(){
										SelectValue.innerHTML = this.value;
										selector.style.left = this.value + "fasfsafas%";
										
									}
									</script>
								
							 
							 
							 
							 
							 </div>
                        </div>
						
						 <div class="text-center">
						 <div class="input-submit">
                                <button type="submit">SEARCH</button>
                         </div>
							</div>
                        <!-- Single Sidebar End -->
                    </div>
                </div>
                <!-- Sidebar Area End -->

                <!-- Car List Content Start -->
                <div class="col-lg-8">
                    <div class="car-list-content m-t-50">
                        <!-- Single Car Start -->
                        <div class="single-car-wrap">
                            <div class="row">
                                <!-- Single Car Thumbnail -->
                                <div class="col-lg-5">
                                    <div class="car-list-thumb car-thumb-1"></div>
                                </div>
                                <!-- Single Car Thumbnail -->

                                <!-- Single Car Info -->
                                <div class="col-lg-7">
                                    <div class="display-table">
                                        <div class="display-table-cell">
                                            <div class="car-list-info">
                                                <h2><a href="#">2000 BMW 3 Series 318i</a></h2>
                                                <h5>$10 AUD / PER Day</h5>
                                                <p>Love vintage cars? This car may be the right one for you! Modern cars are sometimes overrated.</p>
                                                <ul class="car-info-list">
                                                    <li>Air Condition</li>
                                                    <li>Diesel</li>
                                                    <li>Manual</li>
                                                </ul>
                                                <p class="rating">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star unmark"></i>
                                                    <i class="fa fa-star unmark"></i>
                                                </p>
                                                <a href="#" class="rent-btn">Book It</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Single Car info -->
                            </div>
                        </div>
                        <!-- Single Car End -->

                        <!-- Single Car Start -->
                        <div class="single-car-wrap">
                            <div class="row">
                                <!-- Single Car Thumbnail -->
                                <div class="col-lg-5">
                                    <div class="car-list-thumb car-thumb-2"></div>
                                </div>
                                <!-- Single Car Thumbnail -->

                                <!-- Single Car Info -->
                                <div class="col-lg-7">
                                    <div class="display-table">
                                        <div class="display-table-cell">
                                            <div class="car-list-info">
                                                <h2><a href="#">BMW 8 SERIES COUPÉ</a></h2>
                                                <h5>$99 AUD / PER DAY</h5>
                                                <p>Power. Control. Comfort. Combined with exclusive racing features, the luxury sports car is the perfect fusion of top quality and maximum performance. The 8 is never just a moment in time.</p>
                                                <ul class="car-info-list">
                                                    <li>Air Condition</li>
                                                    <li>Petrol</li>
                                                    <li>Auto</li>
                                                </ul>
                                                <p class="rating">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </p>
                                                <a href="#" class="rent-btn">Book It</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Single Car info -->
                            </div>
                        </div>
                        <!-- Single Car End -->

                        <!-- Single Car Start -->
                        <div class="single-car-wrap">
                            <div class="row">
                                <!-- Single Car Thumbnail -->
                                <div class="col-lg-5">
                                    <div class="car-list-thumb car-thumb-3"></div>
                                </div>
                                <!-- Single Car Thumbnail -->

                                <!-- Single Car Info -->
                                <div class="col-lg-7">
                                    <div class="display-table">
                                        <div class="display-table-cell">
                                            <div class="car-list-info">
                                                <h2><a href="#">2002 BMW 3 Series 318i</a></h2>
                                                <h5>$15 AUD / PER DAY</h5>
                                                <p>Stylish but affordable car to start your journey.</p>
                                                <ul class="car-info-list">
                                                    <li>Air Condition</li>
                                                    <li>Diesel</li>
                                                    <li>Auto</li>
                                                </ul>
                                                <p class="rating">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star unmark"></i>
                                                    <i class="fa fa-star unmark"></i>
                                                </p>
                                                <a href="#" class="rent-btn">Book It</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Single Car info -->
                            </div>
                        </div>
                        <!-- Single Car End -->
                    </div>

                    <!-- Page Pagination Start -->
                    <div class="page-pagi">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination">
                                <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item"><a class="page-link" href="#">4</a></li>
                                <li class="page-item"><a class="page-link" href="#">5</a></li>
                                <li class="page-item"><a class="page-link" href="#">Next</a></li>
                            </ul>
                        </nav>
                    </div>
                    <!-- Page Pagination End -->
                </div>
                <!-- Car List Content End -->
            </div>
        </div>
    </section>
	

<?php $this->load->view('inc/footer'); ?>