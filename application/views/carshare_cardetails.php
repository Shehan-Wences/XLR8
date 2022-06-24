<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$data['title'] = ucfirst('Car Details');
$this->load->view('inc/header', $data);

?>
<script>
$(document).ready(function(){
	
	'use strict';

    jQuery('#filter-date, #search-from-date, #search-to-date').datetimepicker();
	
	$( "#booknow" ).click(function() {
		bookingtotal();
		$("#myModal").css('display','block');
		
	});
	$( "#dialogclose" ).click(function() {
		$("#myModal").css('display','none');
		
		$("#bookingerror").css('display','none');
	});
	
	$("#search-from-date").change(function(){
		if(!isNaN(new Date($('#search-from-date').val()).valueOf())==false){
			$('#total').text('invalid date');
		
		}else{
			bookingtotal();
		}
		
		$("#bookingerror").css('display','none');
		$('#search-from-date').css({"border": "1px solid #4da4bd"});
		$('#search-to-date').css({"border": "1px solid #4da4bd"});
	});
	
	$("#plocation").change(function(){
		
		$("#bookingerror").css('display','none');
		$('#plocation').css({"border": "1px solid #4da4bd"});
	});
	$("#dlocation").change(function(){
		
		$("#bookingerror").css('display','none');
		$('#dlocation').css({"border": "1px solid #4da4bd"});
	});
	
	$("#search-to-date").change(function(){
		if(!isNaN(new Date($('#search-to-date').val()).valueOf())==false){
			$('#total').text('invalid date');
		
		}else{
			bookingtotal();
		}
		
		$("#bookingerror").css('display','none');
		$('#search-to-date').css({"border": "1px solid #4da4bd"});
		$('#search-from-date').css({"border": "1px solid #4da4bd"});
	});
	
	$( "#booknpay" ).click(function() {
		
		var status=true;
		var plocation=$("#plocation").val();
		var dlocation=$("#dlocation").val();
		var pdate=$("#search-from-date").val();
		var ddate=$("#search-to-date").val();
		var carid="<?php echo $_GET['id'];?>";
		
		
		var loc = new RegExp('^([0-1]?[0-9]|20|21)$');
	
		if (!loc.test(plocation)) {
			$('#plocation').css({"border": "1.5px solid #ff0000"});
			status=false;
			
		}
		if (!loc.test(dlocation)) {
			$('#dlocation').css({"border": "1.5px solid #ff0000"});
			status=false;
			
		}
		var startdate = new Date(pdate);
		if(!isNaN(startdate.valueOf())==false){
			 $('#search-from-date').css({"border": "1.5px solid #ff0000"});
			status=false;
			
		}
		var enddate = new Date(ddate);
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
		if(status==true){
	
			$('#booknpay').text('Checking...');
			$('#booknpay').prop('disabled', true);
			
			
			$.ajax({
				
				
				url:"<?php echo base_url(); ?>booking?id="+carid+"&plocation="+plocation+"&dlocation="+dlocation+"&pdate="+pdate+"&ddate="+ddate+"&rent="+"<?php echo $rent; ?>" ,
				method:"GET",
				dataType:"json",
				success:function(data)
				{
					$('#booknpay').text('Book & Pay');
					$('#booknpay').prop('disabled', false);
					
					if(data.status=="success"){
						
						
						
						if(<?php echo isset($username)?'true':'false'; ?>){
							
							window.location.href = "<?php echo base_url('/payment'); ?>";
							
						}else{
					
							window.location.href = "<?php echo base_url('/signin?auth=required'); ?>";
							
						
						}
						
					}else if(data.status=="fail"){
						$("#bookingerror").css('display','block');
						$("#bookingerror").text(data.message);
					}
					
					
					
					
					
					
					
				},
				
			 error: function(XMLHttpRequest, textStatus, errorThrown) { 
				alert("Status: " + textStatus); alert("Error: " + errorThrown); 
			    }    
			});
		
		}
		return false;
	});
	

	
	
	
	
	
	
	
	function bookingtotal()
	{
		var start = new Date($('#search-from-date').val());
		var end = new Date($('#search-to-date').val());
		var diff = new Date(end - start);
		var days = diff/1000/60/60/24;
		var rent="<?php echo $rent; ?>";
		
		if(days>1){
			$('#total').text('Booking Total : '+Math.round(((days)*rent))+' AUD');
		}else if(days>0){
			$('#total').text('Booking Total : '+(1*rent)+' AUD');
		}else{
			 $('#total').text('Check the dates again');
		}
		
    }
});

</script>
    <!--== Page Title Area Start ==-->
    <section id="page-title-area" class="section-padding overlay">
        <div class="container">
            <div class="row">
                <!-- Page Title Start -->
                <div class="col-lg-12">
                    <div class="section-title  text-center">
                        <h2>Our Cars</h2>
                        <span class="title-line"><i class="fa fa-car"></i></span>
                     </div>
                </div>
                <!-- Page Title End -->
            </div>
        </div>
    </section>
    <!--== Page Title Area End ==-->

    <!--== Car List Area Start ==-->
    <section id="car-list-area" class="section-padding">
        <div class="container">
            <div class="row">
                <!-- Car List Content Start -->
                <div class="col-lg-9 m-auto">
                    <div class="car-details-content">
                        <h2> <?php echo $make; ?> <?php echo $model; ?>  <?php echo $year; ?> </h2>
						<span class="book"><button id="booknow" class="book-now-btn" style="width:100%;">Book Now</button></span>
                            <div class="single-car-preview">
                                <img style="width: 100%;" src=<?php echo $imageurl; ?> alt="JSOFT">
                            </div>
                        <div class="car-details-info">
                            <h4>Additional Info</h4>
                            <p><?php echo $description; ?></p>
							<p id="rent" style="display:none;"><?php echo $rent; ?></p>
                            <div class="technical-info">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="tech-info-table">
                                            <table class="table table-bordered">
                                                <tr>
                                                    <th>Class</th>
                                                    <td> <?php echo $type; ?> </td>
                                                </tr>
                                                <tr>
                                                    <th>Fuel</th>
                                                    <td> <?php echo $fuel; ?> </td>
                                                </tr>
                                                <tr>
                                                    <th>Rent</th>
                                                    <td><?php echo $rent; ?> </td>
                                                </tr>
                                                <tr>
                                                    <th>GearBox</th>
                                                    <td><?php echo $transmission; ?></td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="tech-info-list">
                                            <ul>
                                                <li>ABS</li>
                                                <li>Air Bags</li>
                                                <li>Bluetooth</li>
                                                <li>Car Kit</li>
                                                <li>GPS</li>
                                                <li>Music</li>
                                                <li>Bluetooth</li>
                                                <li>ABS</li>
                                                <li>GPS</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
            </div>
                </div>
                    </section>
                <!-- Car List Content End -->
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <span id="dialogclose" class="close">&times;</span>
	
	<h2 style="text-align:center; background-color: #4da4bd; color:black;"> <?php echo $make; ?> <?php echo $model; ?>  <?php echo $year; ?> </h2><br>
    <div class="contact-form">
                        
                            <div class="row">
                                <div class="col-lg-6 col-md-6">
                                    <div class="name-input">
									<label for="plocation">Pick up Location</label>
                                       <select id="plocation" name="plocation" class="custom-select" style="border: 1px solid #4da4bd; width:100%;">
											<option selected>Pick up Location</option>
											<?php foreach($locations as $key=>$loc){?>
												<option <?php if(isset($location)){ if($location==trim($loc->locationid)){ echo "selected"; }  }?> value="<?php echo trim($loc->locationid); ?>"> <?php echo trim($loc->name); ?></option>
											<?php } ?>
										</select>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6">
                                    <div class="email-input">
									<label for="dlocation">Drop Off Location</label>
                                        <select id="dlocation" name="dlocation" class="custom-select" style="border: 1px solid #4da4bd;width:100%;">
											<option selected>Drop Off Location</option>
											<?php foreach($locations as $key=>$loc){?>
												<option <?php if(isset($location)){ if($location==trim($loc->locationid)){ echo "selected"; }  }?> value="<?php echo trim($loc->locationid); ?>"> <?php echo trim($loc->name); ?></option>
											<?php } ?>
										</select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-6 col-md-6">
                                    <div class="website-input" >
									<label for="search-from-date">Pick up Date/Time</label>
                                        <input type="text" name="search-from-date" id="search-from-date" value="<?php if(isset($pickup)){ echo $pickup;} ?>" placeholder="Pick up Date" />
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6">
                                    <div class="subject-input" >
									<label for="search-to-date">Drop Off Date/Time</label>
                                         <input type="text" name="search-to-date" id="search-to-date" value="<?php if(isset($dropoff)){ echo $dropoff;} ?>" placeholder="Return Date" />
                                    </div>
                                </div>
                            </div>

                            <div class="message-input">
                                <textarea style="border: 1px solid #4da4bd;" name="review" cols="20" rows="2" placeholder="Message"></textarea>
                            </div>
							<br><h4 id="total" style="text-align:center;">Booking Total : 0 AUD</h4>
                            <div class="input-submit">
                                <button id="booknpay" >Book & Pay</button>
                            </div>
                        
      </div>
	<div id="bookingerror" style="display:none;" class="alert alert-danger">
		<strong>Error!</strong> Booking can not be made. Vehicle in unavailable in the given period.
	</div>
	<div id="bookingsuccessful" style="display:none;" class="alert alert-success">
		<strong>Successful!</strong> Booking has been made.
	</div>
  </div>

</div>

<?php $this->load->view('inc/footer'); ?>
