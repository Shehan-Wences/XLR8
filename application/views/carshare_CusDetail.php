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
    echo "<tr>";
    echo "<td>".$i."</td>";
    echo "<td>".$row->Fname."</td>";
    echo "<td>".$row->Lname."</td>";
    echo "<td>".$row->Email."</td>";
    echo "<td>".$row->Phone."</td>";
    echo "<td>".$row->Status."</td>";
    echo "<td>".$row->Id."</td>";
    echo "<td>".$row->DriverL."</td>";
    echo "<td>".$row->CreatedDate."</td>";
    echo "<td>" "<a href=# class=delete_data id=.$row->id.>""Delete""</a>""</td>"
    echo "</tr>";
    $i++;
  }
   ?>
</table>
</section>

<?php $this->load->view('inc/footer'); ?>
