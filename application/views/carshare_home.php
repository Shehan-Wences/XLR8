<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$data['title'] = ucfirst('home');
$this->load->view('inc/header', $data);
echo current_url();
?>



<?php $this->load->view('inc/footer'); ?>