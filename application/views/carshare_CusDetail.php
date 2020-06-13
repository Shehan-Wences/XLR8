<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$data['title'] = ucfirst('Customer detail');
$this->load->view('inc/header', $data);
?>



<html>

<style>
.deactivate{
  background-color: #999999;
  border: 2px solid #4da4bd;
	color: #222;
	display: inline-block;
	font-size: 15px;
	font-weight: 600;
	padding: 2px 30px;
	cursor: pointer;
	text-transform: uppercase;
}

.deactivate {
  transition-duration: 0.4s;
}

.deactivate:hover {
  background-color: #b30000; /* Green */
  color: white;
}
</style>


<head>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
</head>
<body>

<!--== Page Title Area Start ==-->
<section id="page-title-area" class="section-padding overlay">
        <div class="container">
            <div class="row">
                <!-- Page Title Start -->
                <div class="col-lg-12">
                    <div class="section-title  text-center">
                        <h2>Customer Details</h2>
                        <span class="title-line"><i class="fa fa-car"></i></span>
                    </div>
                </div>
                <!-- Page Title End -->
            </div>
        </div>
    </section>
    <!--== Page Title Area End ==-->

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
                                 <p class="booking-p">Active Accounts</p>
                              </a>
                            </li>
                            <li class="nav-item">
                              <a class="nav-link" id="tab_item_2" data-toggle="tab" href="#team_member_2" role="tab" aria-selected="true">
                                <p class="booking-p">Deactived Accounts</p>
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
                                             <tr style="width: 100%; border-bottom: 1px solid #ddd;  background-color: #4da4bd;line-height: 45px;">
                                             <th>User ID</th>
                                             <th>First Name</th>
                                              <th>Last Name</th>
                                              <th>Email</th>
                                              <th>DriverL</th>
                                              <th>Deactivating the account</th>
                                              </tr>
                                            <?php foreach($Active as $key=>$act){?>
                                              <tr class="booktr" >
                                                <td><?php echo $act->Id; ?></td>
                                                <td><?php echo $act->Fname; ?></td>
                                                <td><?php echo $act->Lname; ?></td>
                                                <td><?php echo $act->Email; ?></td>
                                                <td><?php echo $act->DriverL; ?></td>
                                                <td><button type="submit" class="deactivate" id="<?php echo $act->Email; ?>">deactivate</button></td>
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
                                                      <tr style="width: 100%; border-bottom: 1px solid #ddd;  background-color: #4da4bd;line-height: 45px;">
                                                      <th>User ID</th>
                                                      <th>First Name</th>
                                                      <th>Last Name</th>
                                                      <th>Email</th>
                                                      <th>DriverL</th>
                                                      </tr>
                                                    <?php foreach($Deactive as $key=>$deact){?>
                                                      <tr class="booktr" >
                                                        <td><?php echo $deact->Id; ?></td>
                                                        <td><?php echo $deact->Fname; ?></td>
                                                        <td><?php echo $deact->Lname; ?></td>
                                                        <td><?php echo $deact->Email; ?></td>
                                                        <td><?php echo $deact->DriverL; ?></td>
                                                      </tr>
                                                    <?php } ?>
													                          </table>
                                                  </div>
                                               </div>
                                              </div>
                                              </div>
                                              </div>
                                              </section>

<script>
$(document).ready(function(){
    $('.deactivate').click(function(){
        var id = $(this).attr("id");
        if(confirm("Are you sure you want to deactivate this account?"))
        {
            window.location="<?php echo base_url(); ?>customerDetails?Email="+id;  
        }
        else
        {
            return false;
        }
    });
});
</script>

<?php $this->load->view('inc/footer'); ?>
