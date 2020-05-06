<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$data['title'] = ucfirst('invoice');
$this->load->view('inc/header', $data);

?>
 
 <!DOCTYPE html>
 <section id="page-title-area" class="section-padding overlay">
        <div class="container">
            <div class="row">
                <!-- Page Title Start -->
                <div class="col-lg-12">
                    <div class="section-title  text-center">
                        <h2>Invoice</h2>
                        <span class="title-line"><i class="fa fa-car"></i></span>
                    </div>
                </div>
                <!-- Page Title End -->
            </div>
        </div>
    </section>
    <br>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Invoice</title>
    <link rel="stylesheet" href="style.css" media="all" />
  </head>
  <body>
   
     
      <div id="company" class="clearfix">
        <div>XLR8</div>
        <div>45 Collins St, Melbourne<br />  VIC 3000, AU</div>
        <div>(602) 519-0450</div>
        <div><a href="mailto:company@example.com">xlr8-rental@gmail.com</a></div>
      </div>
      <div id="project">
        <div><span>PROJECT</span> Car Rental</div>
        <div><span>CLIENT</span> Name</div>
        <div><span>ADDRESS</span> 79 victoria street, VIC 3000, AU</div>
        <div><span>EMAIL</span> <a href="mailto:john@example.com">....@example.com</a></div>
        <div><span>PICKUP</span> September 17, 2020</div>
        <div><span>RETURN</span> September 20, 2020</div>
       
      </div>
    </header>
    <main>
      <table>
        <thead>
          <tr>
            <th class="service">SERVICE</th>
            <th class="desc">DESCRIPTION</th>
            <th>PRICE</th>
            <th>TOTAL</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td class="service">Design</td>
            <td class="desc"> 2017 Lexus IS200T F Sport (Car Hired) </td>
            <td class="unit">$0.00</td>
            <td class="total">$</td>
          </tr>
          <tr>
            <td colspan="3">SUBTOTAL</td>
            <td class="total">$</td>
          </tr>
          <tr>
            <td colspan="3">TAX 25%</td>
            <td class="total">$</td>
          </tr>
          <tr>
            <td colspan="3" class="grand total">GRAND TOTAL</td>
            <td class="grand total">$</td>
          </tr>
        </tbody>
      </table>
    </main>
  </body>
</html>
 
 

 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 

<?php $this->load->view('inc/footer'); ?>