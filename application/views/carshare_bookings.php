<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$data['title'] = ucfirst('bookings');
$this->load->view('inc/header', $data);

?>
<script>
$(document).ready(function(){

	$( "#dialogclose" ).click(function() {
		$("#myBooking").css('display','none');


	});

	$( "#cancelbooking" ).click(function() {

		$('#cancelbooking').text('Checking...');
		$('#cancelbooking').prop('disabled', true);



		var carid=	 $("#carid").val();
		var bstartdate=	$("#carpdate").val();
		var benddate=	$("#carddate").val();
		var bookingid= $("#bkid").val();

		$.ajax({

		url:"<?php echo base_url(); ?>cancelbooking?id="+carid+"&bstartdate="+bstartdate+"&benddate="+benddate+"&bookingid="+bookingid,
		method:"GET",
		dataType:"json",
		success:function(data)
		{


			if(data.status=="success"){

				window.location.href = "<?php echo base_url('/mybookings'); ?>";

			}else if(data.status=="fail"){
						$('#cancelbooking').text('Cancel Booking');
						$('#cancelbooking').prop('disabled', false);
						alert(data.message);


			}







		}
		});


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

<div id="myBooking" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <span id="dialogclose" class="close">&times;</span>

	<h2 id="cartitle" style="text-align:center; background-color: #4da4bd; color:black;">Something</h2>
	 <div class="contact-form">
	<div class="row">
        <div class="col-lg-6 col-md-6">
            <div class="website-input" >
				<label for="carploc">Pickup Location</label>
                    <input   type="text"  id="carploc" disabled />
            </div>
        </div>

        <div class="col-lg-6 col-md-6">
            <div class="subject-input" >
				<label for="cardloc">Dropoff Location</label>
                <input  type="text"  id="cardloc" disabled />
            </div>
        </div>
    </div>
	<div class="row">
        <div class="col-lg-6 col-md-6">
            <div class="website-input" >
				<label for="carpdate">Pickup Date/Time</label>
                    <input   type="text"  id="carpdate" disabled />
            </div>
        </div>

        <div class="col-lg-6 col-md-6">
            <div class="subject-input" >
				<label for="carddate">Dropoff Date/Time</label>
                <input  type="text"  id="carddate" disabled />
            </div>
        </div>
    </div>
	<div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="message-input">
			<label for="carddate">Message</label>
			 <input  type="text"  id="carid" hidden />
			 <input  type="text"  id="bkid" hidden />
				<textarea id="carmessage" style="border: 1px solid #4da4bd;" name="review" cols="20" rows="2" placeholder="Message" disabled></textarea>
			</div>
        </div>

    </div>
	<div class="row">
        <div class="col-lg-6 col-md-6">
            <div class="website-input" >
				<h4 id="carcost" style="text-align:center;">Booking Total : 0 AUD</h4>
            </div>
        </div>
		<div class="col-lg-6 col-md-6">
		<div class="input-submit">
 			 <button id="shortenbooking" >Shorten Booking</button>
			 <button id="cancelbooking" style="background-color:red;" >Cancel Booking</button>
        </div>
        </div>
    </div>

</div>
 </div>
 </div>

 <section id="help-desk-page-wrap" class="section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="team-content">
                        <div class="row">
                            <!-- Team Tab Menu start -->
                            <div class="col-lg-12">

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
                                            <a class="nav-link" id="tab_item_3" data-toggle="tab" href="#team_member_3" role="tab" aria-selected="true">
												<p class="booking-p">Past Bookings</p>

                                            </a>
                                        </li>
										<li class="nav-item">
                                            <a class="nav-link" id="tab_item_4" data-toggle="tab" href="#team_member_4" role="tab" aria-selected="true">
												<p class="booking-p">Cancelled Bookings</p>

                                            </a>
                                        </li>

                                    </ul>

                            </div>
                            <!-- Team Tab Menu End -->

                            <!-- Team Tab Content start -->
                            <div class="col-lg-12">
                                <div class="tab-content" style="border-bottom: solid 1px #e5e1e1;   border-left: solid 1px #e5e1e1;  border-right: solid 1px #e5e1e1;" id="myTabContent">
                                    <!-- Single Team  start -->
									<div class="tab-pane fade show active" id="team_member_1" role="tabpanel" aria-labelledby="tab_item_1">
                                        <div class="row">

                                            <div class="col-lg-12 col-md-12">
                                                <div style="padding: 50px 30px;" >
                                                    <table class="text-center" style="width: 100%;">
													 <?php if(!empty($newbookings)){?>
													  <tr style="width: 100%; border-bottom: 1px solid #ddd;  background-color: #4da4bd;line-height: 45px;">
														<th>Booking ID</th>

														<th>CAR</th>
														<th>Cost</th>
														<th>Details</th>
													  </tr>
													 <?php }else{ ?>

													 <p>No Bookings Available</p>

													 <?php }?>
													 <?php foreach($newbookings as $key=>$new){?>
														<tr class="booktr" >
															<td><?php echo $new->bookingid; ?></td>

															<td> <?php echo $new->make; ?> <?php echo $new->model; ?> <?php echo $new->year;?></td>
															<td><?php echo $new->cost; ?> AUD</td>
															<td><img id="<?php echo trim($new->bookingid); ?>" src="assets/img/icon-transparent.png"
															onmouseover="hover('<?php echo trim($new->bookingid); ?>')"
															onmouseout="out('<?php echo trim($new->bookingid); ?>')" style="height: 30px; width: 30px; cursor:pointer;"
															onclick="dialog('<?php echo $new->carid; ?>','<?php echo $new->make; ?>','<?php echo $new->model; ?>','<?php echo $new->year;?>','<?php echo $new->pickuplocation; ?>','<?php echo $new->pickupdate; ?>','<?php echo $new->dropofflocation; ?>','<?php echo $new->dropoffdate; ?>','<?php echo $new->cost; ?>','<?php echo $new->message; ?>','New','<?php echo $new->bookingid; ?>')"></td>

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
                                                <div style="padding: 50px 30px;" >
                                                    <table class="text-center" style="width: 100%;">
													   <?php if(!empty($currentbookings)){?>
													  <tr style="width: 100%; border-bottom: 1px solid #ddd;  background-color: #4da4bd;line-height: 45px;">
														<th>Booking ID</th>

														<th>CAR</th>
														<th>Cost</th>
														<th>Details</th>
													  </tr>
													 <?php }else{ ?>

													 <p>No Bookings Available</p>

													 <?php }?>
													 <?php foreach($currentbookings as $key=>$current){?>
														<tr class="booktr" >
															<td><?php echo $current->bookingid; ?></td>

															<td> <?php echo $current->make; ?> <?php echo $current->model; ?> <?php echo $current->year;?></td>
															<td><?php echo $current->cost; ?> AUD</td>
															<td><img id="<?php echo $current->bookingid; ?>" src="assets/img/icon-transparent.png"
															onmouseover="hover('<?php echo trim($current->bookingid); ?>')"
															onmouseout="out('<?php echo trim($current->bookingid); ?>')" style="height: 30px; width: 30px; cursor:pointer;"
															onclick="dialog('<?php echo $current->carid; ?>','<?php echo $current->make; ?>','<?php echo $current->model; ?>','<?php echo $current->year;?>','<?php echo $current->pickuplocation; ?>','<?php echo $current->pickupdate; ?>','<?php echo $current->dropofflocation; ?>','<?php echo $current->dropoffdate; ?>','<?php echo $current->cost; ?>','<?php echo $current->message; ?>','Current','<?php echo $current->bookingid; ?>')"></td>

														</tr>
													<?php } ?>


													</table>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
									<div class="tab-pane fade show" id="team_member_3" role="tabpanel" aria-labelledby="tab_item_3">
                                        <div class="row">

                                            <div class="col-lg-12 col-md-12">
                                                <div style="padding: 50px 30px;" >
                                                    <table class="text-center" style="width: 100%;">
													   <?php if(!empty($pastbookings)){?>
													  <tr style="width: 100%; border-bottom: 1px solid #ddd;  background-color: #4da4bd;line-height: 45px;">
														<th>Booking ID</th>

														<th>CAR</th>
														<th>Cost</th>
														<th>Details</th>
													  </tr>
													 <?php }else{ ?>

													 <p>No Bookings Available</p>

													 <?php }?>
													 <?php foreach($pastbookings as $key=>$past){?>
														<tr class="booktr" >
															<td><?php echo $past->bookingid; ?></td>

															<td> <?php echo $past->make; ?> <?php echo $past->model; ?> <?php echo $past->year;?></td>
															<td><?php echo $past->cost; ?> AUD</td>
															<td><img id="<?php echo $past->bookingid; ?>" src="assets/img/icon-transparent.png" style="height: 30px; width: 30px; cursor:pointer;"
															onmouseover="hover('<?php echo trim($past->bookingid); ?>')"
															onmouseout="out('<?php echo trim($past->bookingid); ?>')"
															onclick="dialog('<?php echo $past->carid; ?>','<?php echo $past->make; ?>','<?php echo $past->model; ?>','<?php echo $past->year;?>','<?php echo $past->pickuplocation; ?>','<?php echo $past->pickupdate; ?>','<?php echo $past->dropofflocation; ?>','<?php echo $past->dropoffdate; ?>','<?php echo $past->cost; ?>','<?php echo $past->message; ?>','Past','<?php echo $past->bookingid; ?>')"></td>

														</tr>
													<?php } ?>


													</table>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
									<div class="tab-pane fade show" id="team_member_4" role="tabpanel" aria-labelledby="tab_item_4">
                                        <div class="row">

                                            <div class="col-lg-12 col-md-12">
                                                <div style="padding: 50px 30px;" >
                                                    <table class="text-center" style="width: 100%;">
													   <?php if(!empty($cancelledbookings)){?>
													  <tr style="width: 100%; border-bottom: 1px solid #ddd;  background-color: #4da4bd;line-height: 45px;">
														<th>Booking ID</th>

														<th>CAR</th>
														<th>Cost</th>
														<th>Details</th>
													  </tr>
													 <?php }else{ ?>

													 <p>No Bookings Available</p>

													 <?php }?>
													 <?php foreach($cancelledbookings as $key=>$cancelled){?>
														<tr class="booktr" >
															<td><?php echo $cancelled->bookingid; ?></td>

															<td> <?php echo $cancelled->make; ?> <?php echo $cancelled->model; ?> <?php echo $cancelled->year;?></td>
															<td><?php echo $cancelled->cost; ?> AUD</td>
															<td><img id="<?php echo $cancelled->bookingid; ?>" src="assets/img/icon-transparent.png" style="height: 30px; width: 30px; cursor:pointer;"
															onmouseover="hover('<?php echo trim($cancelled->bookingid); ?>')"
															onmouseout="out('<?php echo trim($cancelled->bookingid); ?>')"
															onclick="dialog('<?php echo $cancelled->carid; ?>','<?php echo $cancelled->make; ?>','<?php echo $cancelled->model; ?>','<?php echo $cancelled->year;?>','<?php echo $cancelled->pickuplocation; ?>','<?php echo $cancelled->pickupdate; ?>','<?php echo $cancelled->dropofflocation; ?>','<?php echo $cancelled->dropoffdate; ?>','<?php echo $cancelled->cost; ?>','<?php echo $cancelled->message; ?>','Cancelled','<?php echo $cancelled->bookingid; ?>')"></td>

														</tr>
													<?php } ?>


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
	<script type="text/javascript">

	function dialog(id,make,model,year,pickuplocation,pickupdate,dropofflocation,dropoffdate,cost,message,status,bookingid)
	{
		$("#myBooking").css('display','block');
		$("#cartitle").text(make+' '+model+' '+year);
		$("#carploc").val(pickuplocation);
		$("#cardloc").val(dropofflocation);
		$("#carpdate").val(pickupdate);
		$("#carddate").val(dropoffdate);
		$("#carmessage").val(message);
		$("#carid").val(id);
		$("#bkid").val(bookingid);
		$("#carcost").text('Booking Total : '+cost+' AUD');

		if(status=='New'){
			$("#cancelbooking").css('display','block');
			$("#shortenbooking").css('display','none');

		}else if(status=='Current'){
			$("#cancelbooking").css('display','none');
			$("#shortenbooking").css('display','block');
		}else if(status=='Past'){
			$("#cancelbooking").css('display','none');
			$("#shortenbooking").css('display','none');
		}else if(status=='Cancelled'){
			$("#cancelbooking").css('display','none');
			$("#shortenbooking").css('display','none');
		}



    }

	function hover(id){
		$("#"+id).attr("src","assets/img/icon-transparenthover.png");
	}
	function out(id){
		$("#"+id).attr("src","assets/img/icon-transparent.png");
	}


	</script>


    <!--== My bookings Page Area End ==-->



<?php $this->load->view('inc/footer'); ?>
