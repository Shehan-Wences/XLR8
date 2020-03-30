<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$data['title'] = ucfirst('search');
$this->load->view('inc/header', $data);

?>
<!--== Pick Up Location ==-->

   <!--== Pick Up Date ==-->
   <div class="pick-up-date book-item">
    <h4>PICK-UP DATE:</h4>
    <input id="startDate" placeholder="Pick Up Date" />

   <div class="return-car">
   <h4>Return DATE:</h4>
   <input id="endDate" placeholder="Return Date" />
    </div>
    </div>
    <!--== Pick Up Location ==-->



<?php $this->load->view('inc/footer'); ?>
