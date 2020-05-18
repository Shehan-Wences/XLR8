<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$data['title'] = ucfirst('invoice');
$this->load->view('inc/header', $data);

?>
 <style>
 /*==============================
    Invoice Page Css
================================*/
.clearfix:after {
  content: "";
  display: table;
  clear: both;
}

a {
  color: #5D6975;
  text-decoration: underline;
}

header {
  padding: 10px 0;
  margin-bottom: 30px;
}

#logo {
  text-align: center;
  margin-bottom: 10px;
}

#logo img {
  width: 90px;
}

h1 {
  border-top: 1px solid  #5D6975;
  border-bottom: 1px solid  #5D6975;
  color: #5D6975;
  font-size: 2.4em;
  line-height: 1.4em;
  font-weight: normal;
  text-align: center;
  margin: 0 0 20px 0;
  background: url(dimension.png);
}

#project {
  float: left;
}

#project span {
  color: #5D6975;
  text-align: right;
  width: 52px;
  margin-right: 10px;
  display: inline-block;
  font-size: 0.8em;
}

#company {
  float: right;
  text-align: right;
}

#project div,
#company div {
  white-space: nowrap;        
}
table {
  border-collapse: collapse;
  width: 100%;
  position:relative;
  bottom:70px;
}

th, td {
  padding: 8px;
  text-align: center;
  border-bottom: 1px solid #ddd;
}

th {
  background-color: #4da4bd;
  color: white;
}
 .company{
  text-align: right;
  position: relative;
  right: 50px;
 }
 .project{
  text-align: left;
  position: relative;
  left: 30px;
  bottom: 110px;
 }

</style>

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
   
     
      <div class="company" class="clearfix">
        <div>XLR8</div>
        <div>45 Collins St, Melbourne<br />  VIC 3000, AU</div>
        <div>(602) 519-0450</div>
        <div><a href="mailto:company@example.com">xlr8-rental@gmail.com</a></div>
      </div>
      <div class="project">
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
            <td> Design</td>
            <td> 2017 Lexus IS200T F Sport (Car Hired) </td>
            <td >$0.00</td>
            <td>$</td>
          </tr>
          <tr>
            <td colspan="3">SUBTOTAL</td>
            <td >$</td>
          </tr>
          <tr>
            <td colspan="3">TAX 25%</td>
            <td >$</td>
          </tr>
          <tr>
            <td colspan="3">GRAND TOTAL</td>
            <td>$</td>
          </tr>
        </tbody>
      </table>
    </main>
  </body>
</html>
 
<?php $this->load->view('inc/footer'); ?>