<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$data['title'] = ucfirst('profile');
$this->load->view('inc/header', $data);

?>
   <!--== Page Title Area Start ==-->
    <section id="page-title-area" class="section-padding overlay">
        <div class="container">
            <div class="row">
                <!-- Page Title Start -->
                <div class="col-lg-12">
                    <div class="section-title  text-center">
                        <h2>WELCOME <?php echo $username; ?></h2>
                        <span class="title-line"><i class="fa fa-car"></i></span>
                         
                    </div>
                </div>
                <!-- Page Title End -->
            </div>
        </div>
    </section>
    <!--== Page Title Area End ==-->

    <!--== Profile Page Area Start ==-->

	
	<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
  <li class="breadcrumb-item active" aria-current="page">My profile</li>
    <li class="breadcrumb-item"><a href="/">My bookings</a></li>
    <li class="breadcrumb-item"><a href="/">Change Password</a></li>
    <li class="breadcrumb-item"><a href="/">Deactivate account</a></li>
  </ol>
</nav>

<div class="position-relative overflow-hidden p-3 p-md-5 m-md-3 bg-light">
    <a href="/" class="float-right">Edit</a>
    <div class="col-md-8 mx-auto my-2">
        <h1 class="text-center" style="margin:20px 0">My profile</h1>
				
        <div class="card">
                <div class="table-responsive">
                    <table class="table table-borderless">
                        <tr>
                            <th>Full name:</th>
                            <td><?php echo $username; ?></td>
                        </tr>
                        <tr>
                            <th>Date of birth:</th>
                            <td></td>
                        </tr>
                        <tr>
                            <th>Residential Address:</th>
                            <td></td>
                        </tr>
                        <tr>
                            <th>Email:</th>
                            <td><?php echo $email; ?></td>
                        </tr>
                        <tr>
                            <th>Date joined:</th>
                            <td></td>
                        </tr>
                        
                    </table>
                </div>                   
              
            </div>
			
        </div>
    </div>

    <!--== Profile Page Area End ==-->
 


<?php $this->load->view('inc/footer'); ?>