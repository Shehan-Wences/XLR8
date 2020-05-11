<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$data['title'] = ucfirst('Change Car details');
$this->load->view('inc/header', $data);
?>

<style>
table {
  border-collapse: collapse;
  margin: 0px auto;
  width: 40%;
}

th, td {
  padding: 8px;
  text-align: center;
  border-bottom: 1px solid #ddd;
}

th {
  background-color: #4da4bd;
  color: white;
}

.Update{
  background-color: #4da4bd;
	color: #222;
	display: inline-block;
	font-size: 15px;
	font-weight: 600;
	padding: 12px 30px;
	border: none;
	cursor: pointer;
	text-transform: uppercase;
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
<table width="600" border="1" cellspacing="5" cellpadding="5">
  <tr style="background:#CCC">
    <th>Serial no.</th>
    <th>Car Id</th>
    <th>Car Picture</th>
    <th>change details</th>
  </tr>
  <?php
  $i=1;
  foreach($user->result() as $row)
  {
    ?>
    <tr>  
    <td><?php echo $i; ?></td>  
    <td><?php echo $row->carid; ?></td>  
    <td><img style="width: 50%;" src=<?php echo $row->imageurl; ?> alt="JSOFT"></td>
    <td><button type="submit" class="Update" id="<?php echo $row->carid; ?>"
    onclick="dialog('<?php echo $row->carid; ?>','<?php echo $row->make; ?>','<?php echo $row->model; ?>','<?php echo $row->year;?>','<?php echo $row->rent;?>','<?php echo $row->type;?>','<?php echo $row->fuel;?>','<?php echo $row->transmission;?>',' ')"> 
    Change Details</button></td>
    </tr>
  <?php
    $i++;
  }
   ?>
</table>  
</section> 
</body>
<!--== model ==-->
<div id="updateBox" class="modal">
  <!-- Modal content -->
  <div class="modal-content">
    <span id="closeBox" class="close">&times;</span>
	
	<h2 id="heading" style="text-align:center; background-color: #4da4bd; color:black;"></h2>
	 
  <label >Car-ID</label>
    <input  type="text"  id="carid" disabled />

    <label >Make</label>
    <input  type="text"  id="make" />

    <label >Model</label>
    <input  type="text"  id="model" />

    <label >Year</label>
    <input  type="text"  id="year" />

    <label >Rent</label>
    <input  type="text"  id="rent" />

    <label >Type</label>
    <input  type="text"  id="type" />

    <label >Fuel</label>
    <input  type="text"  id="fuel" />

    <label >Transmission</label>
    <input  type="text"  id="transmission" />

    <button id="go" style="background-color:blue;" >Update</button>
    </div>
    </div> 
<!--== model ==-->
</html> 


<?php $this->load->view('inc/footer'); ?>
