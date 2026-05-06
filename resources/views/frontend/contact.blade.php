@extends('frontend.layouts.master')

@section('title', 'Contact Us')

@section('content')
    <div class="page-heading header-text">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>Contact Us</h1>
                    <span>feel free to send us a message now!</span>
                </div>
            </div>
        </div>
    </div>

    <div class="contact-information">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="contact-item">
                        <i class="fa fa-phone"></i>
                        <h4>Phone</h4>
                        <p>Vivamus ut tellus mi. Nulla nec cursus elit, id vulputate nec cursus augue.</p>
                        <a href="#">+1 333 4040 5566</a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="contact-item">
                        <i class="fa fa-envelope"></i>
                        <h4>Email</h4>
                        <p>Vivamus ut tellus mi. Nulla nec cursus elit, id vulputate nec cursus augue.</p>
                        <a href="#">contact@company.com</a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="contact-item">
                        <i class="fa fa-map-marker"></i>
                        <h4>Location</h4>
                        <p>212 Barrington Court New York str <br> USA</p>
                        <a href="#">View on Google Maps</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="callback-form contact-us">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-heading">
                        <h2>Send us a <em>message</em></h2>
                        <span>Suspendisse a ante in neque iaculis lacinia</span>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="contact-form">
                        <form id="contact" action="" method="get">
                            <div class="row">
                                <div class="col-lg-4 col-md-12 col-sm-12">
                                    <fieldset>
                                        <input name="name" type="text" class="form-control" id="name"
                                            placeholder="Full Name" required="">
                                    </fieldset>
                                </div>
                                <div class="col-lg-4 col-md-12 col-sm-12">
                                    <fieldset>
                                        <input name="email" type="text" class="form-control" id="email"
                                            pattern="[^ @]*@[^ @]*" placeholder="E-Mail Address" required="">
                                    </fieldset>
                                </div>
                                <div class="col-lg-4 col-md-12 col-sm-12">
                                    <fieldset>
                                        <input name="subject" type="text" class="form-control" id="subject"
                                            placeholder="Subject" required="">
                                    </fieldset>
                                </div>
                                <div class="col-lg-12">
                                    <fieldset>
                                        <textarea name="message" rows="6" class="form-control" id="message" placeholder="Your Message" required=""></textarea>
                                    </fieldset>
                                </div>
                                <div class="col-lg-12">
                                    <fieldset>
                                        <button type="submit" id="form-submit" class="filled-button">Send Message</button>
                                    </fieldset>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="map">
        <!-- How to change your own map point
     1. Go to Google Maps
     2. Click on your location point
     3. Click "Share" and choose "Embed map" tab
     4. Copy only URL and paste it within the src="" field below
    -->
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2785.328207859713!2d81.05934311311196!3d6.997988938012665!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ae4f7873408bf17%3A0x294e3cc667b5867d!2sServerClub.LK%20(Pvt)%20Ltd!5e1!3m2!1sen!2slk!4v1778045402327!5m2!1sen!2slk" width="100%" height="500px" frameborder="0" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
@endsection
