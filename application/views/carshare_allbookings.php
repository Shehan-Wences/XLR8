<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$data['title'] = ucfirst('bookings');
$this->load->view('inc/header', $data);

?>

<style>

.contact-form .input1 button {
	display: block;
	margin-left: auto;
	margin-right: auto;
	float:left;
}

.contact-form .input2 button {
	display: block;
	margin-left: auto;
	margin-right: auto;
	float:right;
}

.modal-content input {
	background-color: #fafafa;
	border: 1px solid #4da4bd;
	border-radius: .25rem;
	color: #000;
	padding: 8px 15px;
	resize: none;
	width: 100%;
}

.modal-content input:focus {
	border-color: #4da4bd;
}


.in1, .in2, .for2{
  background-color: #4da4bd;
  border: 2px solid #4da4bd;
	color: #222;
	display: inline-block;
	font-size: 15px;
	font-weight: 600;
	padding: 10px 70px;
	cursor: pointer;
	text-transform: uppercase;
}

.in1, .in2,.in3, .in4, .for1 {
  transition-duration: 0.4s;
}

.in1:hover, .in2:hover, .for2:hover {
  background-color: #00cc00; /* Green */
  color: white;
}

.in3, .in4, .for1{
  background-color: #4da4bd;
  border: 2px solid #4da4bd;
	color: #222;
	display: inline-block;
	font-size: 15px;
	font-weight: 600;
	padding: 10px 70px;
	cursor: pointer;
	text-transform: uppercase;
  margin: 0px auto;
}

.in3:hover, .in4:hover, .for1:hover{
  background-color: #b30000; /* Green */
  color: white;
}

</style>

<script>
$(document).ready(function(){

	$( "#admindialogclose" ).click(function() {
		$("#allBooking").css('display','none');
	});

	$( "#adminshortenbooking" ).click(function() {
		$("#allBooking").css('display','none');
		$("#sjrt").css('display','block');
	});

	$( "#newadmindialogclose" ).click(function() {
		$("#sjrt").css('display','none');
		$("#allBooking").css('display','block');
	});

	$( "#newadminshortenbooking" ).click(function() {
		$('#newadminshortenbooking').text('Updating Date and Time...');
		$('#newadminshortenbooking').prop('disabled', true);

		var bookingid= $("#newadminbkid").val();
		var carid=	 $("#newadmincarid").val();
		var benddate= $("#newadmincarddate").val();

		$.ajax({
		url:"<?php echo base_url(); ?>changedate?id="+carid+"&benddate="+benddate+"&bookingid="+bookingid,
		method:"GET",
		dataType:"json",
		success:function(data)
		{
				alert(data.message);
				window.location.href = "<?php echo base_url('/allbookings'); ?>";
		}
		});
	});

	$( "#admincarpickedup" ).click(function() {
		$('#admincarpickedup').text('Updating Booking...');
		$('#admincarpickedup').prop('disabled', true);

		var bookingid= $("#adminbkid").val();

		$.ajax({
		url:"<?php echo base_url(); ?>pickedup?&bookingid="+bookingid+"&bookingstatus=Current",
		method:"GET",
		dataType:"json",
		success:function(data)
		{
				alert(data.message);
				window.location.href = "<?php echo base_url('/allbookings'); ?>";
		}
		});
	});

	/*$( "#admincarDroped" ).click(function() {
		$("#allBooking").css('display','none');
		$("#miles").css('display','block');
	});

	$( "#milesclose" ).click(function() {
		$("#miles").css('display','none');
		$("#allBooking").css('display','block');
	});*/


	$( "#admincarDroped" ).click(function() {
		$('#admincarDroped').text('Updating Booking...');
		$('#admincarDroped').prop('disabled', true);

		var bookingid= $("#adminbkid").val();
		var carid=	 $("#admincarid").val();
		/*var mile=	 $("#mile").val(); +"&mile="+mile*/

		$.ajax({
		url:"<?php echo base_url(); ?>dropped?&bookingid="+bookingid+"&bookingstatus=Done"+"&carid="+carid,
		method:"GET",
		dataType:"json",
		success:function(data)
		{
				alert(data.message);
				window.location.href = "<?php echo base_url('/allbookings'); ?>";
		}
		});
	});

	$( "#admincancelbooking" ).click(function() {
		$('#admincancelbooking').text('Checking...');
		$('#admincancelbooking').prop('disabled', true);

		var carid=	 $("#admincarid").val();
		var bstartdate=	$("#admincarpdate").val();
		var benddate=	$("#admincarddate").val();
		var bookingid= $("#adminbkid").val();
		var userid= $("#userid").val();

		$.ajax({
		url:"<?php echo base_url(); ?>cancelbooking?id="+carid+"&bstartdate="+bstartdate+"&benddate="+benddate+"&bookingid="+bookingid+"&userid="+userid,
		method:"GET",
		dataType:"json",
		success:function(data)
		{
			if(data.status=="success"){
				window.location.href = "<?php echo base_url('/allbookings'); ?>";
			}else if(data.status=="fail"){
						$('#admincancelbooking').text('Cancel Booking');
						$('#admincancelbooking').prop('disabled', false);
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
                        <h2>ALL BOOKINGS</h2>
                        <span class="title-line"><i class="fa fa-car"></i></span>
                    </div>
                </div>
                <!-- Page Title End -->
            </div>
        </div>
    </section>
    <!--== Page Title Area End ==-->

    <!--== My bookings Page Area Start
	<div id="miles" class="modal">

<div class="modal-content">
    <span id="milesclose" class="close">&times;</span>

	<h2 style="text-align:center; background-color: #4da4bd; color:black;">Update Mileage</h2>
	<div class="row">
        <div class="1" style=" margin: auto;">
            <div class="subject-input" style="text-align: center;" >
				<label for="milage">New Milage </label>
                <input  type="text"  id="mile" />
				<input  type="text"  id="newadmincarid" hidden />
			 	<input  type="text"  id="newadminbkid" hidden />
            </div>
        </div>
    </div>

	<div class="row">
		<div class="2" style=" margin: auto;">
		<div class="input-submit">
 			<button id="milesup" class="for1" >Update</button>
        </div>
		</div>
    </div>
</div>
</div>==-->


<div id="sjrt" class="modal">
<div class="modal-content">
    <span id="newadmindialogclose" class="close">&times;</span>
	<h2 style="text-align:center; background-color: #4da4bd; color:black;">Change Date/Time</h2>
	<div class="row">
        <div class="1" style=" margin: auto;">
            <div class="subject-input" style="text-align: center;" >
				<label for="newcarddate">Dropoff Date/Time --> </label>
                <input  type="text"  id="newadmincarddate"  />
				<input  type="text"  id="newadmincarid" hidden />
			 	<input  type="text"  id="newadminbkid" hidden />
            </div>
        </div>
    </div>

	<div class="row">
		<div class="2" style=" margin: auto;">
		<div class="input-submit">
 			<button id="newadminshortenbooking" class="for2" >Update Time-period</button>
        </div>
		</div>
    </div>

</div>
</div>


<div id="allBooking" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <span id="admindialogclose" class="close">&times;</span>

	<h2 id="admincartitle" style="text-align:center; background-color: #4da4bd; color:black;">Something</h2>
	 <div class="contact-form">
	<div class="row">
        <div class="col-lg-6 col-md-6">
            <div class="website-input" >
				<label for="carploc">Pickup Location</label>
                    <input   type="text"  id="admincarploc" disabled />
            </div>
        </div>

        <div class="col-lg-6 col-md-6">
            <div class="subject-input" >
				<label for="cardloc">Dropoff Location</label>
                <input  type="text"  id="admincardloc" disabled />
            </div>
        </div>
    </div>
	<div class="row">
        <div class="col-lg-6 col-md-6">
            <div class="website-input" >
				<label for="carpdate">Pickup Date/Time</label>
                    <input   type="text"  id="admincarpdate" disabled />
            </div>
        </div>

        <div class="col-lg-6 col-md-6">
            <div class="subject-input" >
				<label for="carddate">Dropoff Date/Time</label>
                <input  type="text"  id="admincarddate" disabled />
            </div>
        </div>
    </div>
	<div class="row">
        <div class="col-lg-6 col-md-6">
            <div class="website-input" >
				<label for="userid">User ID</label>
                    <input   type="text"  id="userid" disabled />
            </div>
        </div>


    </div>
	<div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="message-input">
			<label for="carddate">Message</label>
			 <input  type="text"  id="admincarid" hidden />
			 <input  type="text"  id="adminbkid" hidden />
				<textarea id="admincarmessage" style="border: 1px solid #4da4bd;" name="review" cols="20" rows="2" placeholder="Message" disabled></textarea>
			</div>
        </div>

    </div>
	<div class="row">
        <div class="col-lg-6 col-md-6">
            <div class="website-input" >
				<h4 id="admincarcost" style="text-align:center;">Booking Total : 0 AUD</h4>
            </div>
        </div>
		</div>
		</br>
		</br>
		<div class="input1">
 			 <button id="adminshortenbooking" class='in1' >Change Booking Period</button>
			 <button id="admincancelbooking" class='in2'   >Cancel Booking</button>
        </div>

		<div class="input2">
		<button id="admincarpickedup" class='in3'  >Car Picked Up</button>
		<button id="admincarDroped" class='in4'  >Car Dropped</button>
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
														<th>User ID</th>
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
															<td><?php echo $new->Fname; ?> <?php echo $new->Lname; ?></td>
															<td><?php echo $new->bookingid; ?></td>
															<td> <?php echo $new->make; ?> <?php echo $new->model; ?> <?php echo $new->year;?></td>
															<td><?php echo $new->cost; ?> AUD</td>
															<td><img id="<?php echo trim($new->bookingid); ?>" src="assets/img/icon-transparent.png"
															onmouseover="hover('<?php echo trim($new->bookingid); ?>')"
															onmouseout="out('<?php echo trim($new->bookingid); ?>')" style="height: 30px; width: 30px; cursor:pointer;"
															onclick="dialog('<?php echo $new->carid; ?>','<?php echo $new->make; ?>','<?php echo $new->model; ?>','<?php echo $new->year;?>','<?php echo $new->pickuplocation; ?>','<?php echo $new->pickupdate; ?>','<?php echo $new->dropofflocation; ?>','<?php echo $new->dropoffdate; ?>','<?php echo $new->cost; ?>','<?php echo $new->message; ?>','New','<?php echo $new->bookingid; ?>','<?php echo $new->userid; ?>')"></td>
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
														<th>User ID</th>
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
															<td><?php echo $current->Fname; ?> <?php echo $current->Lname; ?></td>
															<td><?php echo $current->bookingid; ?></td>
															<td> <?php echo $current->make; ?> <?php echo $current->model; ?> <?php echo $current->year;?></td>
															<td><?php echo $current->cost; ?> AUD</td>
															<td><img id="<?php echo $current->bookingid; ?>" src="assets/img/icon-transparent.png"
															onmouseover="hover('<?php echo trim($current->bookingid); ?>')"
															onmouseout="out('<?php echo trim($current->bookingid); ?>')" style="height: 30px; width: 30px; cursor:pointer;"
															onclick="dialog('<?php echo $current->carid; ?>','<?php echo $current->make; ?>','<?php echo $current->model; ?>','<?php echo $current->year;?>','<?php echo $current->pickuplocation; ?>','<?php echo $current->pickupdate; ?>','<?php echo $current->dropofflocation; ?>','<?php echo $current->dropoffdate; ?>','<?php echo $current->cost; ?>','<?php echo $current->message; ?>','Current','<?php echo $current->bookingid; ?>','<?php echo $current->userid; ?>')"></td>

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
														<th>User ID</th>
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
															<td><?php echo $past->Fname; ?> <?php echo $past->Lname; ?></td>
															<td><?php echo $past->bookingid; ?></td>
															<td> <?php echo $past->make; ?> <?php echo $past->model; ?> <?php echo $past->year;?></td>
															<td><?php echo $past->cost; ?> AUD</td>
															<td><img id="<?php echo $past->bookingid; ?>" src="assets/img/icon-transparent.png" style="height: 30px; width: 30px; cursor:pointer;"
															onmouseover="hover('<?php echo trim($past->bookingid); ?>')"
															onmouseout="out('<?php echo trim($past->bookingid); ?>')"
															onclick="dialog('<?php echo $past->carid; ?>','<?php echo $past->make; ?>','<?php echo $past->model; ?>','<?php echo $past->year;?>','<?php echo $past->pickuplocation; ?>','<?php echo $past->pickupdate; ?>','<?php echo $past->dropofflocation; ?>','<?php echo $past->dropoffdate; ?>','<?php echo $past->cost; ?>','<?php echo $past->message; ?>','Past','<?php echo $past->bookingid; ?>','<?php echo $past->userid; ?>')"></td>
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
														<th>User ID</th>
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
														<td><?php echo $cancelled->Fname; ?> <?php echo $cancelled->Lname; ?></td>
															<td><?php echo $cancelled->bookingid; ?></td>
															<td> <?php echo $cancelled->make; ?> <?php echo $cancelled->model; ?> <?php echo $cancelled->year;?></td>
															<td><?php echo $cancelled->cost; ?> AUD</td>
															<td><img id="<?php echo $cancelled->bookingid; ?>" src="assets/img/icon-transparent.png" style="height: 30px; width: 30px; cursor:pointer;"
															onmouseover="hover('<?php echo trim($cancelled->bookingid); ?>')"
															onmouseout="out('<?php echo trim($cancelled->bookingid); ?>')"
															onclick="dialog('<?php echo $cancelled->carid; ?>','<?php echo $cancelled->make; ?>','<?php echo $cancelled->model; ?>','<?php echo $cancelled->year;?>','<?php echo $cancelled->pickuplocation; ?>','<?php echo $cancelled->pickupdate; ?>','<?php echo $cancelled->dropofflocation; ?>','<?php echo $cancelled->dropoffdate; ?>','<?php echo $cancelled->cost; ?>','<?php echo $cancelled->message; ?>','Cancelled','<?php echo $cancelled->bookingid; ?>','<?php echo $cancelled->userid; ?>')"></td>
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

	function dialog(id,make,model,year,pickuplocation,pickupdate,dropofflocation,dropoffdate,cost,message,status,bookingid,userid)
	{
		$("#allBooking").css('display','block');
		$("#admincartitle").text(make+' '+model+' '+year);
		$("#admincarploc").val(pickuplocation);
		$("#admincardloc").val(dropofflocation);
		$("#admincarpdate").val(pickupdate);
		$("#admincarddate").val(dropoffdate);
		$("#newadmincarddate").val(dropoffdate);
		$("#admincarmessage").val(message);
		$("#userid").val(userid);
		$("#admincarid").val(id);
		$("#adminbkid").val(bookingid);
		$("#newadmincarid").val(id);
		$("#newadminbkid").val(bookingid);
		$("#admincarcost").text('Booking Total : '+cost+' AUD');

		if(status=='New'){
			$("#admincancelbooking").css('display','block');
			$("#admincarpickedup").css('display','block');
			$("#admincarDroped").css('display','none');
			$("#adminshortenbooking").css('display','none');

		}else if(status=='Current'){
			$("#admincancelbooking").css('display','none');
			$("#admincarpickedup").css('display','none');
			$("#admincarDroped").css('display','block');
			$("#adminshortenbooking").css('display','block');
		}else if(status=='Past'){
			$("#admincancelbooking").css('display','none');
			$("#admincarpickedup").css('display','none');
			$("#admincarDroped").css('display','none');
			$("#adminshortenbooking").css('display','none');
		}else if(status=='Cancelled'){
			$("#admincancelbooking").css('display','none');
			$("#admincarpickedup").css('display','none');
			$("#admincarDroped").css('display','none');
			$("#adminshortenbooking").css('display','none');
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
