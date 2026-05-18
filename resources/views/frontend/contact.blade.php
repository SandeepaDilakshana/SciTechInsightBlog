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
                        <p>Direct support for all your inquiries.</p>
                        <a href="javascript:void(0)" onclick="copyToClipboard('0791234568')"
                            title="Click to Copy">{{ $contact_number }}</a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="contact-item">
                        <i class="fa fa-envelope"></i>
                        <h4>Email</h4>
                        <p>Fast and reliable email support.</p>
                        <a href="mailto:info_laravel@gmail.com">{{ $contact_email }}</a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="contact-item">
                        <i class="fa fa-map-marker"></i>
                        <h4>Location</h4>
                        <p>{{ $address }}</p>
                        <a href="#map">View on Google Maps</a>
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
                        <span>Feel free to reach out. We’re here to help!</span>
                    </div>
                </div>
                <div class="col-md-12">
                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Success!</strong> {{ session('success') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="contact-form">
                        <form id="contact" action="{{ route('contact.footer.submit') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-lg-6 col-md-12 col-sm-12">
                                    <fieldset class="mb-3 form-group">
                                        <input name="name" type="text" class="form-control" id="name"
                                            placeholder="Full Name" required="">
                                    </fieldset>
                                </div>

                                <div class="col-lg-6 col-md-12 col-sm-12">
                                    <fieldset class="mb-3 form-group">
                                        <input name="email" type="email" class="form-control" id="email"
                                            placeholder="E-Mail Address" required="">
                                    </fieldset>
                                </div>

                                <div class="col-lg-12">
                                    <fieldset class="mb-3 form-group">
                                        <textarea name="message" rows="6" class="form-control" id="message" placeholder="Your Message" required=""></textarea>
                                    </fieldset>
                                </div>

                                <div class="col-lg-12">
                                    <fieldset style="margin-bottom: 20px;">
                                        <div class="cf-turnstile" data-sitekey="{{ env('TURNSTILE_SITE_KEY') }}"></div>
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
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2785.328207859713!2d81.05934311311196!3d6.997988938012665!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ae4f7873408bf17%3A0x294e3cc667b5867d!2sServerClub.LK%20(Pvt)%20Ltd!5e1!3m2!1sen!2slk!4v1778045402327!5m2!1sen!2slk"
            width="100%" height="500px" frameborder="0" style="border:0;" allowfullscreen="" loading="lazy"
            referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>

    <script>
        function copyToClipboard(text) {
            navigator.clipboard.writeText(text).then(function() {
                alert('Phone number copied to clipboard: ' + text);
            }, function(err) {
                console.error('Could not copy text: ', err);
            });
        }
    </script>

    <script src="https://challenges.cloudflare.com/turnstile/v0/api.js" async defer nonce="GmunG9Dg4vvGaTAP1E1yfG"></script>
@endsection
