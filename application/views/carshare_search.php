<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$data['title'] = ucfirst('search');
$this->load->view('inc/header', $data);
?>

<!--== CSS Code to merge to range slider ==-->
<style>
    .selector {
    position: relative;
    width: 100%;
    margin: 0 auto 20px;
    height: 35px;
    text-align: center;
    }

    .selector input {
    pointer-events: none;
    position: absolute;
    left: 0;
    top: 15px;
    width: 100%;
    outline: none;
    height: 18px;
    margin: 0;
    padding: 0;
    border-radius: 8px;
    }

    .selector input::-webkit-slider-thumb {
    pointer-events: all;
    position: relative;
    z-index: 1;
    outline: 0;
    height: 24px;
    widows: 24px;
    border-radius: 12px;
    background-color: white;
    border: 2px solid black;
    -webkit-appearance: none;
    }

    .selector input::-moz-range-thumb {
    pointer-events: all;
    position: relative;
    z-index: 1;
    outline: 0;
    height: 24px;
    widows: 24px;
    border-radius: 12px;
    background-color: white;
    border: 2px solid black;
    -moz-appearance: none;
    }

    input::-moz-range-track {
    background: #ccc;
    }
	
	
	
	
</style>
<script>
$(document).ready(function(){
	
	
	function load_search_data()
	{
	var location=$('#searchlocation').val();
	var start=$('#startDate2').val();
	var startdate = new Date(start);
	
	var end=$('#endDate2').val();
	var enddate = new Date(end);
	
	var status=true;
	
	var loc = new RegExp('^([0-1]?[0-9]|20|21)$');
		
	if (!loc.test(location)) {
        $('#searchlocation').css({"border": "1.5px solid #ff0000"});
		status=false;
		
    }
	
	if(!isNaN(startdate.valueOf())==false){
		 $('#startDate2').css({"border": "1.5px solid #ff0000"});
		status=false;
		
	}
	if(!isNaN(enddate.valueOf())==false){
		 $('#startDate2').css({"border": "1.5px solid #ff0000"});
		status=false;
		
	}
	if(status==true){
			
			
			
		
			$("#searchform").append($("input[name=typesstring]"));
			$("#searchform").submit();
			
		
		
	}
	}

	
	$("#searchlocation").change(function () {
		$('#searchlocation').css({"border": "1px solid #4da4bd"});
    });
	$("#startDate2").change(function () {
		$('#startDate2').css({"border": "1px solid #4da4bd"});
    });
	$("#endDate2").change(function () {
		$('#endDate2').css({"border": "1px solid #4da4bd"});
    });
	$( "input[name=type]" ).click(function() {
		var atLeastOneIsChecked = $("input[name=type]:checked").length == 0;
		if(atLeastOneIsChecked){
			alert("Atleast One Type Should Be Selected!");
			
				$(this).prop('checked', true);
		
		}else{
		var typevalues = new Array();
		$.each($("input[name=type]:checked"), function() {
		typevalues.push($(this).val());
		
		});
		
		types = JSON.stringify(typevalues);
		types = encodeURIComponent(types);
		$("input[name=typesstring]").val(types);
		load_search_data();
		}
		

	});
	
	
});

function Validation(){
    
	var location=$('#searchlocation').val();
	var start=$('#startDate2').val();
	var startdate = new Date(start);
	
	var end=$('#endDate2').val();
	var enddate = new Date(end);
	
	var status=true;
	
	var loc = new RegExp('^([0-1]?[0-9]|20|21)$');
	
	if (!loc.test(location)) {
        $('#searchlocation').css({"border": "1.5px solid #ff0000"});
		status=false;
		
    }
	
	if(!isNaN(startdate.valueOf())==false){
		 $('#startDate2').css({"border": "1.5px solid #ff0000"});
		status=false;
		
	}
	if(!isNaN(enddate.valueOf())==false){
		 $('#startDate2').css({"border": "1.5px solid #ff0000"});
		status=false;
		
	}	
	if(status==false){
		return false;
	}
}
</script>
<!--== End of CSS Code to merge to range slider ==-->
 
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
								
                                  <option selected>Pick up Location</option>
								 
									<?php foreach($locations as $key=>$loc){?>
                                  <option <?php if(isset($location)){ if($location==trim($loc->locationid)){ echo "selected"; }  }?> value="<?php echo trim($loc->locationid); ?>"> <?php echo trim($loc->name); ?></option>
								<?php } ?>
								  
								  
                                </select>
                            </div>

                            <div class="pick-date bookinput-item">
                                <input name="pdate" id="startDate2" value="<?php if(isset($pickup)){ echo $pickup;} ?>" placeholder="Pick up Date" />
                            </div>

                            <div class="retern-date bookinput-item">
                                <input name="ddate" id="endDate2" value="<?php if(isset($dropoff)){ echo $dropoff;} ?>" placeholder="Return Date" />
                            </div>

                           

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
							
                            <div class="sidebar-body type">
 								<div class="row">
									<div class="col-lg-6 col-md-6">
										<label><input name="type" type="checkbox" value="Sedan" <?php if (in_array("Sedan", $cartype)){ echo "checked"; }  ?> > Sedan</label>
									</div>
									<div class="col-lg-6 col-md-6">
										<label><input name="type" type="checkbox" value="Van" <?php if (in_array("Van", $cartype)){ echo "checked"; }  ?> > Van</label>
									</div>
								</div>
								<div class="row">
									<div class="col-lg-6 col-md-6">
										<label><input name="type" type="checkbox" value="Hatchback" <?php if (in_array("Hatchback", $cartype)){ echo "checked"; }  ?> > Hatchback</label>
									</div>
									<div class="col-lg-6 col-md-6">
										<label><input name="type" type="checkbox" value="SUV" <?php if (in_array("SUV", $cartype)){ echo "checked"; }  ?>> SUV</label>
									</div>
								</div>
								<div class="row">
									<div class="col-lg-6 col-md-6">
										<label><input name="type" type="checkbox" value="Wagon" <?php if (in_array("Wagon", $cartype)){ echo "checked"; }  ?>> Wagon</label>
									</div>
									<div class="col-lg-6 col-md-6">
										<label><input name="type" type="checkbox" value="Convertible" <?php if (in_array("Convertible", $cartype)){ echo "checked"; }  ?> > Convertible</label>
									</div>
								</div>
								<input type="hidden" name="typesstring"  />
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
										 <input type="checkbox" value="Honda">
										 <label for="type"> Honda</label><br>
									 </div>
									 <div class="col-lg-6 col-md-6">
										 <input type="checkbox" value="Toyota">
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
								    <div class="selector" >
								        <div class="SelectBtn"></div>
                                            <input value="0" min="0" max="100" step="1" type="range" >
                                            <input value="100" min="0" max="100" step="1" type="range" >
                                            </br>
								                <div> Price per day </br><span class="SelectValue"></span> </div>
                                        </div>
                                    </br>
								    </div> 

								    <script>
                                        function getVals(){
                                            
                                            var parent = this.parentNode;
                                            var slides = parent.getElementsByTagName("input");
                                                var slide1 = parseFloat( slides[0].value );
                                                var slide2 = parseFloat( slides[1].value );
                                            
                                            if( slide1 > slide2 )
                                            { 
                                                var tmp = slide2; 
                                                slide2 = slide1; 
                                                slide1 = tmp; 
                                            }
                                            
                                            var displayElement = parent.getElementsByClassName("SelectValue")[0];
                                                displayElement.innerHTML = "$ " + slide1 + " To $" + slide2 ;
                                            }

                                            window.onload = function(){
                                           
                                            var sliderSections = document.getElementsByClassName("selector");
                                                for( var x = 0; x < sliderSections.length; x++ ){
                                                    var sliders = sliderSections[x].getElementsByTagName("input");
                                                    for( var y = 0; y < sliders.length; y++ ){
                                                    if( sliders[y].type ==="range" ){
                                                        sliders[y].oninput = getVals;
                                                        sliders[y].oninput();
                                                    }
                                                    }
                                                }
                                            }                        
                                    </script>

							    </div>
                            </div>

						
						
                        <!-- Single Sidebar End -->
                    </div>
                </div>
                <!-- Sidebar Area End -->

                <!-- Car List Content Start -->
                <div class="col-lg-8">
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
                                                <h2><a href="<?php echo base_url('/car?id='.$car->carid); ?>"><?php echo $car->year; ?> <?php echo $car->make; ?> <?php echo $car->model; ?></a></h2>
                                                <h5>$<?php echo $car->rent; ?> AUD / PER DAY</h5>
                                                <p><?php echo $car->description; ?></p>
                                                <ul class="car-info-list">
                                                    <li><?php echo $car->type; ?></li>
                                                    <li><?php echo $car->fuel; ?></li>
                                                    <li><?php echo $car->transmission; ?></li>
                                                </ul>
                                             
                                                <a href="<?php echo base_url('/car?id='.$car->carid); ?>" class="rent-btn">View Car</a>
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
	

<?php $this->load->view('inc/footer'); ?>