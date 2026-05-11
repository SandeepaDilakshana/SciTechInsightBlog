<footer>
    <div class="container">
        <div class="row">
            <div class="col-md-3 footer-item">
                <h4>Blog Application</h4>
                <p>Bringing you the best stories and latest news right at your fingertips. Explore, read, and grow with
                    the Blog Application community.</p>
                <ul class="social-icons">
                    <li><a href="https://www.facebook.com/share/1AnrEiye4z/" target="_blank" rel="noopener noreferrer"><i
                                class="fa fa-facebook"></i></a></li>
                    <li><a href="https://x.com/SandeepaDila" target="_blank" rel="noopener noreferrer"><i
                                class="fa fa-twitter"></i></a></li>
                    <li><a href="https://www.linkedin.com/in/sandeepa-dilakshana-666b29283" target="_blank"
                            rel="noopener noreferrer"><i class="fa fa-linkedin"></i></a></li>
                </ul>
            </div>
            <div class="col-md-3 footer-item">
                <h4>Other Links</h4>
                <ul class="menu-list">
                    <li><a href="{{ route('blog.categories') }}">Categories</a></li>
                    <li><a href="{{ route('blog.tags') }}">Tags</a></li>
                </ul>
            </div>
            <div class="col-md-3 footer-item">
                <h4>Additional Pages</h4>
                <ul class="menu-list">
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li><a href="{{ route('about.show') }}">About Us</a></li>
                    <li><a href="{{ route('blog.show') }}">Blog</a></li>
                    <li><a href="{{ route('contact.show') }}">Contact Us</a></li>
                </ul>
            </div>
            <div class="col-md-3 footer-item last-item">
                <h4>Contact Us</h4>
                <div class="contact-form">
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

                    <form id="contact-footer-contact" action="{{ route('contact.footer.submit') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <fieldset>
                                    <input name="name" type="text" class="form-control" id="name"
                                        placeholder="Full Name" required="">
                                </fieldset>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <fieldset>
                                    <input name="email" type="email" class="form-control" id="email"
                                        placeholder="E-Mail Address" required="">
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
</footer>

<div class="sub-footer">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <p>
                    Copyright © 2026
                </p>
            </div>
        </div>
    </div>
</div>
