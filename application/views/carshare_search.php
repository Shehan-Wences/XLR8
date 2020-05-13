<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$data['title'] = ucfirst('search');
$this->load->view('inc/header', $data);
?>
<script>
$(document).ready(function(){
	 'use strict';
	getLocation();
    jQuery('#filter-date, #search-from-date, #search-to-date').datetimepicker();
	var types='';
	var make='';
	var transmission='';
	var fuel='';
	var price='';
	
	function load_search_data()
	{
	getLocation();	
	var location=$('#searchlocation').val();
	var start=$('#search-from-date').val();
	var startdate = new Date(start);
	
	var end=$('#search-to-date').val();
	var enddate = new Date(end);
	
	var status=true;
	
	var loc = new RegExp('^([0-1]?[0-9]|20|21|Current Location)$');
	
	if (!loc.test(location)) {
        $('#searchlocation').css({"border": "1.5px solid #ff0000"});
		status=false;
		
    }
	
	if(!isNaN(startdate.valueOf())==false){
		 $('#search-from-date').css({"border": "1.5px solid #ff0000"});
		status=false;
		
	}
	if(!isNaN(enddate.valueOf())==false){
		 $('#search-to-date').css({"border": "1.5px solid #ff0000"});
		status=false;
		
	}	
	if(startdate>enddate){
		  $('#search-from-date').css({"border": "1.5px solid #ff0000"});
		   $('#search-to-date').css({"border": "1.5px solid #ff0000"});
		status=false;
	}
	
	if(new Date($.now())>startdate){
		  $('#search-from-date').css({"border": "1.5px solid #ff0000"});
		   $('#search-to-date').css({"border": "1.5px solid #ff0000"});
		status=false;
	}
	/*Car Type*/
	var typevalues = new Array();
	$.each($("input[name=type]:checked"), function() {
		typevalues.push($(this).val());
		
	});
		
	types = JSON.stringify(typevalues);
	types = encodeURIComponent(types);
	$("input[name=typesstring]").val(types);
	
	/*Car Make*/	
	var makevalues = new Array();
	$.each($("input[name=make]:checked"), function() {
		makevalues.push($(this).val());
		
	});
		
	make = JSON.stringify(makevalues);
	make = encodeURIComponent(make);
	$("input[name=makestring]").val(make);
	
	/*Car Transmission*/
	var transmissionvalues = new Array();
	$.each($("input[name=transmission]:checked"), function() {
		transmissionvalues.push($(this).val());
		
	});
		
	transmission = JSON.stringify(transmissionvalues);
	transmission = encodeURIComponent(transmission);
	$("input[name=transmissionstring]").val(transmission);
	
	/*Car Fuel*/
	var fuelvalues = new Array();
	$.each($("input[name=fuel]:checked"), function() {
		fuelvalues.push($(this).val());
		
	});
		
	fuel = JSON.stringify(fuelvalues);
	fuel = encodeURIComponent(fuel);
	$("input[name=fuelstring]").val(fuel);
	
	price =$("select[name=price]").find(":selected").val();
	$("input[name=sort]").val(price);
		
	if(status==true){
			
			
			
		
			$("#searchform").prepend($("input[name=typesstring]"));
			$("#searchform").prepend($("input[name=makestring]"));
			$("#searchform").prepend($("input[name=transmissionstring]"));
			$("#searchform").prepend($("input[name=fuelstring]"));
			$("#searchform").prepend($("input[name=sort]"));
			$("#searchform").submit();
			
		
		
	}
	}

	
	$("#searchlocation").change(function () {
		$('#searchlocation').css({"border": "1px solid #4da4bd"});
    });
	$("#search-from-date").change(function () {
		$('#search-from-date').css({"border": "1px solid #4da4bd"});
		$('#search-to-date').css({"border": "1px solid #4da4bd"});
    });
	$("#search-to-date").change(function () {
		$('#search-to-date').css({"border": "1px solid #4da4bd"});
		$('#search-from-date').css({"border": "1px solid #4da4bd"});
    });
	
	$( "input[name=type]" ).click(function() {
		var atLeastOneIsChecked = $("input[name=type]:checked").length == 0;
		if(atLeastOneIsChecked){
			alert("Atleast One Type Should Be Selected!");
			
				$(this).prop('checked', true);
		
		}else{
		
		//load_search_data();
		}
		

	});
	$( "input[name=make]" ).click(function() {
		var atLeastOneIsChecked = $("input[name=make]:checked").length == 0;
		if(atLeastOneIsChecked){
			alert("Atleast One Make Should Be Selected!");
			
				$(this).prop('checked', true);
		
		}else{
		
		//load_search_data();
		}
		

	});
	
	$( "input[name=transmission]" ).click(function() {
		var atLeastOneIsChecked = $("input[name=transmission]:checked").length == 0;
		if(atLeastOneIsChecked){
			alert("Atleast One Type of Transmission Should Be Selected!");
			
				$(this).prop('checked', true);
		
		}else{
		
		//load_search_data();
		}
		

	});
	$( "input[name=fuel]" ).click(function() {
		var atLeastOneIsChecked = $("input[name=fuel]:checked").length == 0;
		if(atLeastOneIsChecked){
			alert("Atleast One Fuel Type Should Be Selected!");
			
				$(this).prop('checked', true);
		
		}else{
		
		//load_search_data();
		}
		

	});
	$("select[name=price]").on('change', function() {
		if(this.value != "ASC" && this.value != "DESC"){
			alert( "There seems to be an error! Please reload the page" );
		}else{
			
		}
		
	});
	
	$( "#advancedfilter" ).click(function() {
		
		$("#filterdialog").css('display','block');
		
	});
	$( "#dialogclose" ).click(function() {
		$("#filterdialog").css('display','none');

	});
	$( "#searchfilterbtn" ).click(function() {
		load_search_data();

	});
	
	
});

function Validation(){
    getLocation();
	var location=$('#searchlocation').val();
	var start=$('#search-from-date').val();
	var startdate = new Date(start);
	
	var end=$('#search-to-date').val();
	var enddate = new Date(end);
	
	var status=true;
	
	var loc = new RegExp('^([0-1]?[0-9]|20|21|Current Location)$');
	
	if (!loc.test(location)) {
        $('#searchlocation').css({"border": "1.5px solid #ff0000"});
		status=false;
		
    }
	
	if(!isNaN(startdate.valueOf())==false){
		 $('#search-from-date').css({"border": "1.5px solid #ff0000"});
		status=false;
		
	}
	if(startdate>enddate){
		  $('#search-from-date').css({"border": "1.5px solid #ff0000"});
		   $('#search-to-date').css({"border": "1.5px solid #ff0000"});
		status=false;
	}
	
	if(new Date($.now())>startdate){
		  $('#search-from-date').css({"border": "1.5px solid #ff0000"});
		   $('#search-to-date').css({"border": "1.5px solid #ff0000"});
		status=false;
	}
	
	if(!isNaN(enddate.valueOf())==false){
		 $('#search-to-date').css({"border": "1.5px solid #ff0000"});
		status=false;
		
	}	
	if(status==false){
		return false;
	}
}
</script>
<!--== End of CSS Code to merge to range slider ==-->
   <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Modal Header</h4>
        </div>
        <div class="modal-body">
          <p>Some text in the modal.</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
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
                        <form id="searchform" action="<?php echo base_url("/search"); ?>" method="get" onsubmit="return Validation()" >
                            <div class="pick-location bookinput-item">
                                <select id="searchlocation" name="location" class="custom-select">
								
                                  <option selected>Current Location</option>
								 
									<?php foreach($locations as $key=>$loc){?>
                                  <option <?php if(isset($location)){ if($location==trim($loc->locationid)){ echo "selected"; }  }?> value="<?php echo trim($loc->locationid); ?>"> <?php echo trim($loc->name); ?></option>
								<?php } ?>
								  
								  
                                </select>
                            </div>

                            <div class="bookinput-item">
                                <!--<input name="pdate" id="startDate2" value="<?php if(isset($pickup)){ echo $pickup;} ?>" placeholder="Pick up Date" />-->
								<input type="text" name="search-from-date" id="search-from-date" value="<?php if(isset($pickup)){ echo $pickup;} ?>" placeholder="Pick up Date" />
                            </div>

                            <div class="bookinput-item">
                                <!--<input name="ddate" id="endDate2" value="<?php if(isset($dropoff)){ echo $dropoff;} ?>" placeholder="Return Date" />-->
								 <input type="text" name="search-to-date" id="search-to-date" value="<?php if(isset($dropoff)){ echo $dropoff;} ?>" placeholder="Return Date" />
                            </div>

                           <input type="hidden" name="nearestlocations"  />	

                            <div class="bookcar-btn bookinput-item">
                                <button type="submit" id="searchbutton">Search</button>
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
	<section  style="padding-bottom: 0px;padding-top: 25px;">
	<div class="container">
			<div class="sort" style="text-align: left; float:left;">	
				<h6>Showing '<?php echo count($cars); ?>' Matching Cars</h6>
			</div>			
			
		
			<div class="sort" style="text-align: right;">	
			 <button id="advancedfilter" type="button" class="btn btn-info btn-lg" >Advanced Search</button>
					<label for="sort">Sort by:</label>
					<select id="sort" name="price" class="custom-select" style="border: 1px solid rgb(77, 164, 189);">
						
							<option <?php if(isset($price)){ if($price=="ASC"){ echo "selected"; }  }else{ echo "selected";} ?> value="ASC"> Price Low to High</option>
							<option <?php if(isset($price)){ if($price=="DESC"){ echo "selected"; }  }?> value="DESC">Price High to Low</option>
					</select>
					<input type="hidden" name="sort"  />		
			</div>					
		</div>
	</section>
    <section id="car-list-area" style="padding: 25px 0;">
	

	
        <div class="container">
            <div class="row">
                <!-- Sidebar Area Start -->

                <!-- Sidebar Area End -->

                <!-- Car List Content Start -->
                <div class="col-lg-10 m-auto">
                    <div class="car-list-content m-t-50">

                      
						<?php if(isset($cars)){ foreach($cars as $key=>$car){?>
                                                                    


                        <!-- Single Car Start -->
                        <div class="single-car-wrap">
                            <div class="row">
                                <!-- Single Car Thumbnail -->
                                <div class="col-lg-5">
                                    <div class="car-list-thumb" style="background-image: url(<?php echo $car->imageurl; ?>);"></div>
                                </div>
                                <!-- Single Car Thumbnail -->

                                <!-- Single Car Info -->
                                <div class="col-lg-7">
                                    <div class="display-table">
                                        <div class="display-table-cell">
                                            <div class="car-list-info">
                                                <h2><a href="<?php echo base_url('/car?id='.trim($car->carid).'&plocation='.trim($car->availablelocationid).'&pdate='.rawurlencode ($pickup).'&ddate='.rawurlencode ($dropoff)); ?>"><?php echo $car->year; ?> <?php echo $car->make; ?> <?php echo $car->model; ?></a></h2>
                                                <h5 style="margin-bottom: 0px;">$<?php echo $car->rent; ?> AUD / PER DAY</h5>
												<p style="border-bottom: 1px solid #ddd;color: #4da4bd;margin-bottom: 10px;">Pickup @ <?php foreach($locations as $key=>$loc){if(trim($loc->locationid)==trim($car->availablelocationid)){ echo $loc->name; }}?></p>
                                                <p><?php echo $car->description; ?></p>
                                                <ul class="car-info-list">
                                                    <li><?php echo $car->type; ?></li>
                                                    <li><?php echo $car->fuel; ?></li>
                                                    <li><?php echo $car->transmission; ?></li>
												
                                                </ul>
                                             
                                                <a href="<?php echo base_url('/car?id='.trim($car->carid).'&plocation='.trim($car->availablelocationid).'&pdate='.rawurlencode ($pickup).'&ddate='.rawurlencode ($dropoff)); ?>" class="rent-btn">View Car</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Single Car info -->
                            </div>
                        </div>
                        <!-- Single Car End -->
						
						<?php } }?>
						
						
                    </div>

                    <!-- Page Pagination Start -->
                    <div class="page-pagi">
                        <nav aria-label="Page navigation example">
						
						  <!-- Page Pagination Start 
                            <ul class="pagination">
                                <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item"><a class="page-link" href="#">4</a></li>
                                <li class="page-item"><a class="page-link" href="#">5</a></li>
                                <li class="page-item"><a class="page-link" href="#">Next</a></li>
                            </ul>
							  Page Pagination Start -->
                        </nav>
                    </div>
                    <!-- Page Pagination End -->
                </div>
                <!-- Car List Content End -->
            </div>
        </div>
    </section>
	
<div id="filterdialog" class="modal">

  <!-- Modal content -->
  <div class="modal-content" style="width:80%;">
    <span id="dialogclose" class="close">&times;</span>
	
	<h2 style="text-align:center; background-color: #4da4bd; color:black;">Advanced Search</h2><br>
  							<div class="single-faq-sub-content">
								<div id="accordion">
									<div class="col-md-6 col-lg-6" style="float:left;">
									<div class="card col-md-12">
										<div class="card-header" id="headingOne">
											<h5 class="mb-0"><button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
												<span>CAR TYPE</span>
												<i class="fa fa-angle-down"></i>
												<i class="fa fa-angle-up"></i>
											</button></h5>
										</div>

										<div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
											<div class="card-body">
											<div class="row">
												<input type="hidden" name="typesstring"  />
												<div class="col-md-12">
													<label><input name="type" type="checkbox" value="Sedan" <?php if(is_array($cartype)){ if (in_array("Sedan", $cartype)){ echo "checked"; } }else{echo "checked";} ?> > Sedan</label>
												</div>
												<div class="col-md-12">
													<label><input name="type" type="checkbox" value="Van" <?php if(is_array($cartype)){ if (in_array("Van", $cartype)){ echo "checked"; } }else{echo "checked";} ?> > Van</label>
												</div>
											
												<div class="col-md-12">
													<label><input name="type" type="checkbox" value="Hatchback" <?php if(is_array($cartype)){ if (in_array("Hatchback", $cartype)){ echo "checked"; }  }else{echo "checked";}?> > Hatchback</label>
												</div>
												<div class="col-md-12">
													<label><input name="type" type="checkbox" value="SUV" <?php if(is_array($cartype)){ if (in_array("SUV", $cartype)){ echo "checked"; }  }else{echo "checked";}?> > SUV</label>
												</div>
											
												<div class="col-md-12">
													<label><input name="type" type="checkbox" value="Wagon" <?php if(is_array($cartype)){ if (in_array("Wagon", $cartype)){ echo "checked"; } }else{echo "checked";} ?> > Wagon</label>
												</div>
												<div class="col-md-12">
													<label><input name="type" type="checkbox" value="Convertible" <?php if(is_array($cartype)){ if (in_array("Convertible", $cartype)){ echo "checked"; }  }else{echo "checked";} ?> > Convertible</label>
												</div>
											</div>
											</div>
										</div>
									</div>
									
									<div class="card col-md-12">
										<div class="card-header" id="headingTwo">
											<h5 class="mb-0"><button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
									  			<span>MAKE</span>
												<i class="fa fa-angle-down"></i>
												<i class="fa fa-angle-up"></i>
									  		</button></h5>
										</div>
										<div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
											<div class="card-body">
											<div class="row">
											<input type="hidden" name="makestring"  />
												<div class="col-md-12">
													<label><input name="make" type="checkbox" value="Honda" <?php if(is_array($carmake)){  if (in_array("Honda", $carmake)){ echo "checked"; } }else{echo "checked";} ?> > Honda</label>
												</div>
												<div class="col-md-12">
													<label><input name="make" type="checkbox" value="Toyota" <?php if(is_array($carmake)){  if (in_array("Toyota", $carmake)){ echo "checked"; } }else{echo "checked";} ?> > Toyota</label>
												</div>
											
												<div class="col-md-12">
													<label><input name="make" type="checkbox" value="Hyundai" <?php if(is_array($carmake)){  if (in_array("Hyundai", $carmake)){ echo "checked"; } }else{echo "checked";} ?> > Hyundai</label>
												</div>
												<div class="col-md-12">
													<label><input name="make" type="checkbox" value="Kia" <?php if(is_array($carmake)){  if (in_array("Kia", $carmake)){ echo "checked"; }  }else{echo "checked";} ?> > Kia</label>
												</div>
											
												<div class="col-md-12">
													<label><input name="make" type="checkbox" value="Holden" <?php if(is_array($carmake)){  if (in_array("Holden", $carmake)){ echo "checked"; }  }else{echo "checked";} ?> > Holden</label>
												</div>
												<div class="col-md-12">
													<label><input name="make" type="checkbox" value="Ford" <?php if(is_array($carmake)){  if (in_array("Ford", $carmake)){ echo "checked"; } }else{echo "checked";} ?> > Ford</label>
												</div>
											
												<div class="col-md-12">
													<label><input name="make" type="checkbox" value="BMW" <?php if(is_array($carmake)){  if (in_array("BMW", $carmake)){ echo "checked"; } }else{echo "checked";} ?> > BMW</label>
												</div>
												<div class="col-md-12">
													<label><input name="make" type="checkbox" value="Lexus" <?php if(is_array($carmake)){  if (in_array("Lexus", $carmake)){ echo "checked"; } }else{echo "checked";} ?> > Lexus</label>
												</div>
											</div>	
												</div>
										</div>
										
									</div>
								</div>
								<div class="col-md-6 col-lg-6" style="float:left;">
									<div class="card col-md-12">
										<div class="card-header" id="headingThree">
											<h5 class="mb-0"><button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
									  			<span>Transmission</span>
												<i class="fa fa-angle-down"></i>
												<i class="fa fa-angle-up"></i>
											</button></h5>
										</div>
										<div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
											<div class="card-body">
												<div class="row">
												<input type="hidden" name="transmissionstring"  />
													<div class="col-md-12">
														<label><input name="transmission" type="checkbox" value="Auto" <?php if(is_array($cartransmission)){ if (in_array("Auto", $cartransmission)){ echo "checked"; } }else{echo "checked";} ?> > Auto</label>
													</div>
													<div class="col-md-12">
														<label><input name="transmission" type="checkbox" value="Manual" <?php if(is_array($cartransmission)){ if (in_array("Manual", $cartransmission)){ echo "checked"; } }else{echo "checked";} ?> > Manual</label>
													</div>
												</div>
								
												</div>
										</div>
									</div>
									<div class="card col-md-12">
										<div class="card-header" id="headingFour">
											<h5 class="mb-0"><button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
									  			<span>Fuel</span>
												<i class="fa fa-angle-down"></i>
												<i class="fa fa-angle-up"></i>
											</button></h5>
										</div>
										<div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordion">
											<div class="card-body">
											<div class="row">
											<input type="hidden" name="fuelstring"  />	
												<div class="col-md-12">
													<label><input name="fuel" type="checkbox" value="Petrol" <?php if(is_array($carfuel)){ if (in_array("Petrol", $carfuel)){ echo "checked"; } }else{echo "checked";} ?> > Petrol</label>
												</div>
												<div class="col-md-12">
													<label><input name="fuel" type="checkbox" value="Diesel" <?php if(is_array($carfuel)){if (in_array("Diesel", $carfuel)){ echo "checked"; } }else{echo "checked";} ?> > Diesel</label>
												</div>
											
												<div class="col-md-12">
													<label><input name="fuel" type="checkbox" value="Hybrid" <?php if(is_array($carfuel)){if (in_array("Hybrid", $carfuel)){ echo "checked"; } }else{echo "checked";} ?> > Hybrid</label>
												</div>
												<div class="col-md-12">
													<label><input name="fuel" type="checkbox" value="Electric" <?php if(is_array($carfuel)){if (in_array("Electric", $carfuel)){ echo "checked"; } }else{echo "checked";} ?> > Electric</label>
												</div>
											</div>
								
												</div>
										</div>
									</div>
								</div>
								</div>
							</div>
		
	 <button id="searchfilterbtn" type="button" class="btn btn-info btn-lg" >Filter Search</button>               
  
  </div>

</div>
 
<script>
        
		
		 
        function getLocation() {
			
			if (navigator.geolocation) {
				navigator.geolocation.getCurrentPosition(showPosition);
			} else { 
				alert( "Geolocation is not supported by this browser.");
			}
		}

		function showPosition(position) {
			
			
			//alert("Latitude: " + position.coords.latitude + "Longitude: " + position.coords.longitude);
			var locarray = new Array();
		   <?php foreach($locations as $key=>$loc){?>
              
			if(( getDistanceFromLatLonInKm(position.coords.latitude,position.coords.longitude,<?php echo $loc->lat; ?>,<?php echo $loc->long; ?> ).toFixed(1))<30){	
			  locarray.push(<?php echo $loc->locationid; ?>); 
			}
		
			<?php } ?>
			locvalues = JSON.stringify(locarray);
			locvalues = encodeURIComponent(locvalues);
			$("input[name=nearestlocations]").val(locvalues);
		}
		
		function getDistanceFromLatLonInKm(lat1,lon1,lat2,lon2) {
		  var R = 6371; // Radius of the earth in km
		  var dLat = deg2rad(lat2-lat1);  // deg2rad below
		  var dLon = deg2rad(lon2-lon1); 
		  var a = 
			Math.sin(dLat/2) * Math.sin(dLat/2) +
			Math.cos(deg2rad(lat1)) * Math.cos(deg2rad(lat2)) * 
			Math.sin(dLon/2) * Math.sin(dLon/2)
			; 
		  var c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1-a)); 
		  var d = R * c; // Distance in km
		  return d;
		}

		function deg2rad(deg) {
		  return deg * (Math.PI/180)
		}
</script>	

<?php $this->load->view('inc/footer'); ?>