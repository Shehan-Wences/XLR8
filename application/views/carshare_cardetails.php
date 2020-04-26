<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$data['title'] = ucfirst('Car Details');
$this->load->view('inc/header', $data);

?>
<script>
$(document).ready(function(){

	$( "#booknow" ).click(function() {
		$("#myModal").css('display','block');
	});
	$( "#dialogclose" ).click(function() {
		$("#myModal").css('display','none');
	});
	
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
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
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
	<h2 style="text-align:center;"> <?php echo $make; ?> <?php echo $model; ?>  <?php echo $year; ?> </h2><br>
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
									<label for="startDate2">Pick up Date</label>
                                        <input style="border: 1px solid #4da4bd;"  name="pdate" id="startDate2" value="<?php if(isset($pickup)){ echo $pickup;} ?>" placeholder="Pick up Date" />
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6">
                                    <div class="subject-input" >
									<label for="endDate2">Drop Off Date</label>
                                        <input style="border: 1px solid #4da4bd;"  name="ddate" id="endDate2" value="<?php if(isset($dropoff)){ echo $dropoff;} ?>" placeholder="Return Date" />
                                    </div>
                                </div>
                            </div>

                            <div class="message-input">
                                <textarea name="review" cols="20" rows="2" placeholder="Message"></textarea>
                            </div>
							<br><h4 style="text-align:center;">Booking Total : 0 AUD</h4>
                            <div class="input-submit">
                                <button>Book & Pay</button>
                            </div>
                        
      </div>
  </div>

</div>

<?php $this->load->view('inc/footer'); ?>