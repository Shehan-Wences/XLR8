<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$data['title'] = ucfirst('home');
$this->load->view('inc/header', $data);

?>



<?php $this->load->view('inc/footer'); ?>