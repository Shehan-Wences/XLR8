<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$data['title'] = ucfirst('bookings');
$this->load->view('inc/header', $data);

?>
   <!--== Page Title Area Start ==-->
    <section id="page-title-area" class="section-padding overlay">
        <div class="container">
            <div class="row">
                <!-- Page Title Start -->
                <div class="col-lg-12">
                    <div class="section-title  text-center">
                        <h2>MY BOOKINGS</h2>
                        <span class="title-line"><i class="fa fa-car"></i></span>
                    </div>
                </div>
                <!-- Page Title End -->
            </div>
        </div>
    </section>
    <!--== Page Title Area End ==-->

    <!--== My bookings Page Area Start ==-->
	<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
	<li class="breadcrumb-item"><a href="<?php echo base_url('/profile'); ?>"><?php echo $username; ?></a></li>
	<li class="breadcrumb-item active" aria-current="page">My Bookings</li>
  </ol>
</nav>

<section id="help-desk-page-wrap" class="section-padding">
<div class="container">
<div class="col-lg-12">
<div class="team-content">

		<div class="col-lg-12">
		
					<div class="team-tab-menu">
					
					
						<ul class="nav nav-tabs" id="myTab" role="tablist">
								<li class="nav-item">
									<a class="nav-link active" id="tab_item_1" data-toggle="tab" href="#team_member_1" role="tab" aria-selected="true" style="text-align: -webkit-center;">
									<div class="team-mem-icon" style="margin auto">
									<img src="assets/img/current-booking.png" alt="JSOFT">
									</div>
									<h5>Current bookings</h5>
									</a>
								</li>
								
								<li class="nav-item">
									<a class="nav-link" id="tab_item_2" data-toggle="tab" href="#team_member_2" role="tab" aria-selected="true" style="text-align: -webkit-center;">
									<div class="team-mem-icon">
									<img src="assets/img/past-booking.png" alt="JSOFT">
									</div>
									<h5>Past Bookings</h5>
									</a>
								</li>
						</ul>
					</div>
					
		
		</div>
	

		<div class="col-lg-12">
			<div class="tab-content" id="myTabContent">

				<div class="tab-pane fade active show" id="team_member_1" role="tabpanel" aria-labelledby="tab_item_1">
				<div class="row">
						<div class="col-lg-12 col-md-12">
							<div class="team-member-info text-center">
								<h4>Current Bookings</h4>
								
							<div class="team-member-info text-center">	
								<table style="width: 100%;">
								  <tr style="width: 100%; border-bottom: 1px solid #ddd;">
									<th>Booking ID</th>
									<th>From</th>
									<th>To</th>
									<th>Car ID</th>
									<th>Cost</th>
									<th>Status</th>
								  </tr>
								  
								  <tr>
									<td><?php echo $bookingid; ?></td>
									<td><?php echo $pickupdate; ?></td>
									<td><?php echo $dropoffdate; ?></td>
									<td><?php echo $carid; ?></td>
									<td><?php echo $cost; ?></td>
									<td><?php echo $bookingstatus; ?></td>
								  </tr>
								  
								 
								</table>
							</div>			
		
							</div>
								
							</div>
						</div>
					</div>
				


				<div class="tab-pane fade" id="team_member_2" role="tabpanel" aria-labelledby="tab_item_2">
					<div class="row">
						<div class="col-lg-12 col-md-12">
							<div class="team-member-info text-center">
								<h4>Past Bookings</h4>
								
									<div class="team-member-info text-center">	
										<table style="width: 100%;">
										  <tr style="width: 100%; border-bottom: 1px solid #ddd;">
											<th>Booking ID</th>
											<th>Date of Pick Up</th>
											<th>Date of Drop Off</th>
											<th>Car ID</th>
											<th>Cost</th>
										  </tr>
										  
										  <tr>
											<td><?php echo $bookingid; ?></td>
											<td><?php echo $pickupdate; ?></td>
											<td><?php echo $dropoffdate; ?></td>
											<td><?php echo $carid; ?></td>
											<td><?php echo $cost; ?></td>
											
										  </tr>
										
										 
										</table>
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
   

    <!--== My bookings Page Area End ==-->

 

<?php $this->load->view('inc/footer'); ?>