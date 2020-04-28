<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$data['title'] = ucfirst('Customer detail');
$this->load->view('inc/header', $data);
?>

<html>   
<head>  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>  
</head>  
<body> 
<section id="lgoin-page-wrap" class="section-padding">
<table width="600" border="1" cellspacing="5" cellpadding="5">
  <tr style="background:#CCC">
    <th>Sr No</th>
    <th>First Name</th>
    <th>Last Name</th>
    <th>Email</th>
    <th>Phone</th>
    <th>Status</th>
    <th>Id</th>
    <th>DriverL</th>
    <th>Created Date</th>
    <th>Deactivating the account</th>
  </tr>
  <?php
  $i=1;
  foreach($Cus_data->result() as $row)
  {
    ?>
    <tr>  
    <td><?php echo $i; ?></td>  
    <td><?php echo $row->Fname; ?></td>  
    <td><?php echo $row->Lname; ?></td>
    <td><?php echo $row->Email; ?></td> 
    <td><?php echo $row->Phone; ?></td> 
    <td><?php echo $row->Status; ?></td>   
    <td><?php echo $row->Id; ?></td> 
    <td><?php echo $row->DriverL; ?></td> 
    <td><?php echo $row->CreatedDate; ?></td> 
    <td><a href="#" class="deactivate" id="<?php echo $row->Email; ?>">deactivate</a></td>  
    </tr>
  <?php
    $i++;
  }
   ?>
</table>
<script>  
$(document).ready(function(){  
    $('.deactivate').click(function(){  
        var id = $(this).attr("id");  
        if(confirm("Are you sure you want to delete this?"))  
        {  
            window.location="<?php echo base_url(); ?>cusdet/"+id;  
        }  
        else  
        {  
            return false;  
        }  
    });  
});  
</script>  
</section>  
 </body>  
 </html>  

<?php $this->load->view('inc/footer'); ?>
