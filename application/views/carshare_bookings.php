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
            <div class="row">
                <div class="col-lg-12">
                    <div class="team-content">
                        <div class="row">
                            <!-- Team Tab Menu start -->
                            <div class="col-lg-3">
                                <div class="team-tab-menu">
                                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" id="tab_item_1" data-toggle="tab" href="#team_member_1" role="tab" aria-selected="true">
                                                 <p class="booking-p">New Bookings</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="tab_item_2" data-toggle="tab" href="#team_member_2" role="tab" aria-selected="true">
												<p class="booking-p">Current Bookings</p>
                                             
                                            </a>
                                        </li>
										 <li class="nav-item">
                                            <a class="nav-link " id="tab_item_3" data-toggle="tab" href="#team_member_3" role="tab" aria-selected="true">
												<p class="booking-p">Past Bookings</p>
                                             
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <!-- Team Tab Menu End -->

                            <!-- Team Tab Content start -->
                            <div class="col-lg-9">
                                <div class="tab-content" id="myTabContent">
                                    <!-- Single Team  start -->
                                    <div class="tab-pane fade show active" id="team_member_1" role="tabpanel" aria-labelledby="tab_item_1">
                                        <div class="row">
                                           
                                            <div class="col-lg-12 col-md-12">
                                                <div class="team-member-info text-center">
                                                    <table style="width: 100%;">
													  <tr style="width: 100%; border-bottom: 1px solid #ddd;">
														<th>Booking ID</th>
														
														<th>CAR</th>
														<th>Pick Up</th>
														<th>date</th>
														<!-- <th>Drop Off</th> -->
														<!-- <th>date</th>-->
														<th>Cost</th>
														<!-- <th>Message</th>-->
													  </tr>
													 <?php foreach($newbookings as $key=>$new){?>
														<tr>
															<td><?php echo $new->bookingid; ?></td>
															
															<td><?php echo $new->carid; ?> <?php echo $new->make; ?> <?php echo $new->model; ?> <?php echo $new->year;?></td>
															<td><?php echo $new->pickuplocation; ?></td>
															<td><?php echo $new->pickupdate; ?></td>
															<!--<td><?php echo $new->dropofflocation; ?></td>-->
															<!--<td><?php echo $new->dropoffdate; ?></td>-->
															<td><?php echo $new->cost; ?></td>
															<!--<td><?php echo $new->message; ?>Message</td>-->
														</tr>
													<?php } ?>
											 
													 
													</table>
                                                </div>
                                            </div>
											
                                        </div>
                                    </div>
									<div class="tab-pane fade show" id="team_member_2" role="tabpanel" aria-labelledby="tab_item_2">
                                        <div class="row">
                                           
                                            <div class="col-lg-12 col-md-12">
                                                <div class="team-member-info text-center">
                                                    <table style="width: 100%;">
													  <tr style="width: 100%; border-bottom: 1px solid #ddd;">
														<th>Booking ID</th>
														<th>Status</th>
														<th>CAR</th>
														<th>Pick Up</th>
														<th>Drop Off</th>
														<th>Cost</th>
														<th>Message</th>
													  </tr>
													  
													  <tr>
														<td>Booking ID</td>
														<td>Status</td>
														<td>CAR</td>
														<td>Pick Up</td>
														<td>Drop Off</td>
														<td>Cost</td>
														<td>Message</td>
													  </tr>
													  <tr>
														<td>Booking ID</td>
														<td>Status</td>
														<td>CAR</td>
														<td>Pick Up</td>
														<td>Drop Off</td>
														<td>Cost</td>
														<td>Message</td>
													  </tr>
													 
													</table>
                                                </div>
                                            </div>
											
                                        </div>
                                    </div>
									<div class="tab-pane fade show" id="team_member_3" role="tabpanel" aria-labelledby="tab_item_3">
                                        <div class="row">
                                           
                                            <div class="col-lg-12 col-md-12">
                                                <div class="team-member-info text-center">
                                                    <table style="width: 100%;">
													  <tr style="width: 100%; border-bottom: 1px solid #ddd;">
														<th>Booking ID</th>
														<th>Status</th>
														<th>CAR</th>
														<th>Pick Up</th>
														<th>Drop Off</th>
														<th>Cost</th>
														<th>Message</th>
													  </tr>
													  
													  <tr>
														<td>Booking ID</td>
														<td>Status</td>
														<td>CAR</td>
														<td>Pick Up</td>
														<td>Drop Off</td>
														<td>Cost</td>
														<td>Message</td>
													  </tr>
													  <tr>
														<td>Booking ID</td>
														<td>Status</td>
														<td>CAR</td>
														<td>Pick Up</td>
														<td>Drop Off</td>
														<td>Cost</td>
														<td>Message</td>
													  </tr>
													 
													</table>
                                                </div>
                                            </div>
											
                                        </div>
                                    </div>
 
                                </div>
                            </div>
                            <!-- Team Tab Content End -->
                        </div>
                    </div>
                </div>
        	</div>
        </div>
    </section>
	
	

   

    <!--== My bookings Page Area End ==-->

 

<?php $this->load->view('inc/footer'); ?>