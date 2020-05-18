<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$data['title'] = ucfirst('payment');
$this->load->view('inc/header', $data);

?>

<!--Payment-->
<section id="page-title-area" class="section-padding overlay">
        <div class="container">
            <div class="row">
                <!-- Page Title Start -->
                <div class="col-lg-12">
                    <div class="section-title  text-center">

                        <h2>CHECKOUT</h2>
                        <span class="title-line"><i class="fa fa-car"></i></span>
                    </div>
                </div>
                <!-- Page Title End -->
            </div>
        </div>
	</section>


      
	  
	  
<div id="blog-page-content" class="section-padding" style="padding-top: 100px;">

<div class="container">
<div class="row">

<div class="col-lg-12">
<article class="single-article">
<div class="row">

 <div class="col-lg-5">
<div class="article-thumb">
<img src="<?php echo $car[0]->imageurl;?>" alt="JSOFT">
</div>
</div>


<div class="col-lg-7">
<div class="display-table">
<div class="display-table-cell">
<div class="article-body">
<h3><a href="#"><?php echo $car[0]->make;?> <?php echo $car[0]->model;?> <?php echo $car[0]->year;?></a></h3>
	
	<div class="article-meta">
	<a href="#" class="author">Pick Up Date : <span><?php echo date_format(date_create($cart['pdate']),'Y-m-d');?></span></a>
	<a href="#" class="author">Pick Up Time : <span><?php echo date_format(date_create($cart['pdate']),'H:i');?></span></a>
	</div>
	
	<div class="article-meta">
	<a href="https://maps.google.com/?q=<?php echo $pickupL[0]->lat;?>,<?php echo $pickupL[0]->long;?>" target="_blank" class="author">Pick Up Location : <span><?php echo $pickupL[0]->name; ?></span></a>
	</div>
	
	<div class="article-meta">
	<a href="#" class="commnet">Drop Off Date : <span><?php echo date_format(date_create($cart['ddate']),'Y-m-d');?></span></a>
	<a href="#" class="commnet">Drop Off Time : <span><?php echo date_format(date_create($cart['ddate']),'H:i');?></span></a>
	</div>
	<div class="article-meta">
	<a href="https://maps.google.com/?q=<?php echo $dropL[0]->lat;?>,<?php echo $dropL[0]->long;?>" target="_blank" class="author">Drop Off Location : <span><?php echo $dropL[0]->name; ?></span></a>
	</div>
	<div class="article-meta">
	
	<a href="#" class="commnet">Total : <span><?php echo round($cart['rent']);?> AUD</span></a>
	</div>
	<div class="article-meta" style="text-align: right;">
	<a id="removebooking" class="remove" href="<?php echo base_url('/removecart'); ?>">Remove</a>
	</div>


</div>
</div>
</div>
</div>

</div>
</article>

<article class="single-article" style="margin-top: 50px; padding-bottom: 10px; margin-bottom: 100px;">

<section class="banner-bottom-wthreelayouts py-lg-5 py-3">
			<div class="container">
				<div class="col-md-6 m-auto">
					<!--/tabs-->
					<div class="responsive_tabs">
						<div id="horizontalTab">
							<ul class="resp-tabs-list">

							

							</ul>
							<br>
							<div id="paypal-button-container"></div>
							
							
							
						</div>
					</div>

								
					<!--//tabs-->
				</div>

			</div>
			<!-- //payment -->
		</section>
		<!--//Payment-->

<script src="https://www.paypal.com/sdk/js?client-id=AX76diJ83S6uZNLYyOYx8bTAHifetVi4DOHGYB4dUYz6q8oDPqKIfJNRMpKKjdUhGlbTMXK1JzdpW66H&currency=AUD" data-sdk-integration-source="button-factory"></script>
<script>
  paypal.Buttons({
      style: {
          shape: 'rect',
          color: 'silver',
          layout: 'vertical',
          label: 'pay',
          
      },
      createOrder: function(data, actions) {
          return actions.order.create({
              purchase_units: [{
                  amount: {
                      value: '<?php echo round($cart['rent']);?>'
                  }
              }]
          });
      },
      onApprove: function(data, actions) {
          return actions.order.capture().then(function(details) {
			  window.location.href = "<?php echo base_url('/bookingconfirmation').'?token='.sha1($cart['carid']); ?>";
             });
      }
  }).render('#paypal-button-container');
</script>


</article>
</div>












</div>
</div>
</div>



<?php $this->load->view('inc/footer'); ?>
