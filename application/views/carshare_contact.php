<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$data['title'] = ucfirst('contact us');
$this->load->view('inc/header', $data);

?>
   <!--== Page Title Area Start ==-->
    <section id="page-title-area" class="section-padding overlay">
        <div class="container">
            <div class="row">
                <!-- Page Title Start -->
                <div class="col-lg-12">
                    <div class="section-title  text-center">
                        <h2>Contact Us</h2>
                        <span class="title-line"><i class="fa fa-car"></i></span>
                        <p>Got a question? Our team is happy to answer your questions. Fill out the form and we'll be in touch as soon as possible.</p>
                    </div>
                </div>
                <!-- Page Title End -->
            </div>
        </div>
    </section>
    <!--== Page Title Area End ==-->

    <!--== Contact Page Area Start ==-->
    <div class="contact-page-wrao section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 m-auto">
                    <div class="contact-form">
                        <form action="index.html">
                            <div class="row">
                                <div class="col-lg-6 col-md-6">
                                    <div class="name-input">
                                        <input type="text" placeholder="Full Name">
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6">
                                    <div class="email-input">
                                        <input type="email" placeholder="Email Address">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-6 col-md-6">
                                    <div class="website-input">
                                        <input type="url" placeholder="Website">
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6">
                                    <div class="subject-input">
                                        <input type="text" placeholder="Subject">
                                    </div>
                                </div>
                            </div>

                            <div class="message-input">
                                <textarea name="review" cols="30" rows="10" placeholder="Message"></textarea>
                            </div>

                            <div class="input-submit">
                                <button type="submit">Submit Message</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--== Contact Page Area End ==-->

    <!--== Map Area Start ==-->
    <div class="maparea">
      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d12607.936572390969!2d144.9723171040658!3d-37.81384039993984!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6ad642c80a4d2e13%3A0x284597fcbe480e4!2s45%20Collins%20St%2C%20Melbourne%20VIC%203000!5e0!3m2!1sen!2sau!4v1586417781447!5m2!1sen!2sau" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
	</div>
    <!--== Map Area End ==-->


<?php $this->load->view('inc/footer'); ?>