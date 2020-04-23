<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$data['title'] = ucfirst('oops');
$this->load->view('inc/header', $data);
?>
    <section id="page-404-wrap" class="section-padding overlay">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="page-404-content">
                    	<div class="number">
							<div class="four">4</div>
							<div class="zero">
								<img src="assets/img/404.png" alt="JSOFT">
							</div>
							<div class="four">4</div>
                    	</div>
                    	<h4>PAGE NOT FOUND !</h4>
                    	<p>SORRY, WE COULDN'T FIND THE PAGE <br> YOU'RE LOOKING.</p>
                    	
                    </div>
                </div>
        	</div>
        </div>
    </section>
<?php $this->load->view('inc/footer'); ?>