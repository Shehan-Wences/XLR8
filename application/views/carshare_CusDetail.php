<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$data['title'] = ucfirst('Customer detail');
$this->load->view('inc/header', $data);
?>

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
    <td><a href="#" class="delete_data" id="<?php echo $row->Id; ?>">Delete</a></td>  
    </tr>
  <?php
    $i++;
  }
   ?>
</table>
</section>

<?php $this->load->view('inc/footer'); ?>
