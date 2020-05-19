<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$data['title'] = ucfirst('Change Car details');
$this->load->view('inc/header', $data);
?>

<style>

th, td {
  padding: 8px;
  text-align: center;
  border-bottom: 1px solid #ddd;

}
.contact-form .inputup button {
	display: block;
	margin-left: auto;
	margin-right: auto;

}

.Update{
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

.Update {
  transition-duration: 0.4s;
}

.Update:hover {
  background-color: #00cc00; /* Green */
  color: white;
}

.go_up{
  background-color: #4da4bd;
  border: 2px solid #4da4bd;
	color: #222;
	display: inline-block;
	font-size: 15px;
	font-weight: 600;
	padding: 10px 100px;
	cursor: pointer;
	text-transform: uppercase;
  margin: 0px auto;
}

.go_up {
  transition-duration: 0.4s;
}

.go_up:hover {
  background-color: #b30000; /* Green */
  color: white;
}
</style>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>

<script type="text/javascript">
																
	function dialog(id,make,model,year,rent,type,fuel,transmission)
	{
		$("#updateBox").css('display','block');
		$("#heading").text(make+' '+model+' '+year);
        $("#carid").val(id);
        $("#make").val(make);
        $("#model").val(model);
        $("#year").val(year);
        $("#rent").val(rent);
        $("#fuel").val(fuel);
        $("#type").val(type);
        $("#transmission").val(transmission);		
    }	
</script>


<script>
    $(document).ready(function() {
	
	    $( "#closeBox" ).click(function() {
		    $("#updateBox").css('display','none');
	    });

        $( "#go" ).click(function() {
		
            var carid = $("#carid").val();
            var make = $("#make").val();
            var model = $("#model").val();
            var year = $("#year").val();
            var rent = $("#rent").val();
            var fuel = $("#fuel").val();
            var type = $("#type").val();
            var transmission = $("#transmission").val();	

            $('#go').text('Updating...');
            $('#go').prop('disabled', true);
                
            $.ajax({
                url:"<?php echo base_url(); ?>updatecar?carid="+carid+"&make="+make+"&model="+model+"&year="+year+"&rent="+rent+"&fuel="+fuel+"&type="+type+"&transmission="+transmission,
                method:"GET",
                dataType:"json",
                success:function(data)
                {		
                        alert(data.message); 
                        window.location.href = "<?php echo base_url("/changecar"); ?>";
                        
                }
            });
        });
    });
</script>

<html>
<head>
</head>
<Body>


<!--== Page Title Area Start ==-->
<section id="page-title-area" class="section-padding overlay">
        <div class="container">
            <div class="row">
                <!-- Page Title Start -->
                <div class="col-lg-12">
                    <div class="section-title  text-center">
                        <h2>Change car details</h2>
                        <span class="title-line"><i class="fa fa-car"></i></span>
                    </div>
                </div>
                <!-- Page Title End -->
            </div>
        </div>
    </section>
    <!--== Page Title Area End ==-->

    <section id="lgoin-page-wrap" class="section-padding">
                            <!-- Team Tab Content start -->
                              <div class="col-lg-12">
                                <div class="tab-content" style="border-bottom: solid 1px #e5e1e1;   border-left: solid 1px #e5e1e1;  border-right: solid 1px #e5e1e1;" id="myTabContent">
                                    <!-- Single Team  start -->
								                  	<div class="tab-pane fade show active" id="team_member_1" role="tabpanel" aria-labelledby="tab_item_1">
                                      <div class="row">     
                                        <div class="col-lg-12 col-md-12">
                                          <div style="padding: 50px 30px;" >
                                            <table class="text-center" style="width: 70%;  margin: 0px auto;">
                                             <tr style="width: 100%; border-bottom: 1px solid #ddd;  background-color: #4da4bd;line-height: 45px;">
                                            <th>Car Id</th>
                                            <th>Car Picture</th>
                                            <th>Make and Model</th>
                                            <th>change details</th>
                                              </tr>
                                              <?php
                                                $i=1;
                                                foreach($user->result() as $row)
                                                {
                                                  ?>
                                                  <tr class="booktr">  
                                                  <td style="width: 20%;"><?php echo $row->carid; ?></td>  
                                                  <td style="width: 40%;"><img style="width: 50%; " src=<?php echo $row->imageurl; ?> alt="JSOFT"></td>
                                                  <td style="width: 20%;"><?php echo $row->make;?> <?php echo $row->model;?> <?php echo $row->year;?></td>
                                                  <td style="width: 20%;"><button type="submit" class="Update" id="<?php echo $row->carid; ?>"
                                                  onclick="dialog('<?php echo $row->carid; ?>','<?php echo $row->make; ?>','<?php echo $row->model; ?>','<?php echo $row->year;?>','<?php echo $row->rent;?>','<?php echo $row->type;?>','<?php echo $row->fuel;?>','<?php echo $row->transmission;?>',' ')"> 
                                                  Change Details</button></td>
                                                  </tr>
                                                <?php
                                                  $i++;
                                                }
                                                ?>             
													                    </table>
                                              </div>
                                            </div>
                                          </div>
                                        </div>
</section> 


</body>
<div id="updateBox" class="modal">

<!-- Modal content -->
<div class="modal-content">
  <span id="closeBox" class="close">&times;</span>

<h1 id="heading" style="text-align:center; background-color: #4da4bd; color:black;">Something</h2>
 <div class="contact-form">
<div class="row">
      <div class="col-lg-6 col-md-6">
          <div class="website-input" >
      <label for="carploc">Make</label>
        <input  type="text"  id="make" />
          </div>
      </div>

      <div class="col-lg-6 col-md-6">
          <div class="subject-input" >
      <label for="cardloc">Model</label>
      <input  type="text"  id="model" />
          </div>
      </div>
  </div>
<div class="row">
      <div class="col-lg-6 col-md-6">
          <div class="website-input" >
      <label for="carpdate">Year</label>
      <input  type="text"  id="year" />
          </div>
      </div>

      <div class="col-lg-6 col-md-6">
          <div class="subject-input" >
      <label for="carddate">Rent</label>
      <input  type="text"  id="rent" />
          </div>
      </div>
  </div>
  
  <div class="row">
      <div class="col-lg-6 col-md-6">
          <div class="website-input" >
      <label for="carpdate">Type</label>
      <input  type="text"  id="type" />
          </div>
      </div>

      <div class="col-lg-6 col-md-6">
          <div class="subject-input" >
      <label for="carddate">Fuel</label>
      <input  type="text"  id="fuel" />
          </div>
      </div>
  </div>

<div class="row">
      <div class="col-lg-6 col-md-6">
          <div class="website-input" >
      <label for="userid">Transmission</label>
      <input  type="text"  id="transmission" />
                  <input   type="text"  id="carid" hidden />
          </div>
      </div>
      </div>
</br>
</br>

     <div class="inputup">
  <button id="go" class="go_up" style= " margin: 0px auto;">Update</button>
      </div>
  </div>


</div>
</div>
</div>  

<!--== model ==-->
</html> 


<?php $this->load->view('inc/footer'); ?>
