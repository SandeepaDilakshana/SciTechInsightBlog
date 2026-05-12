<header class="">
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home') }}">
                <h2>Blog <em> Application</em></h2> <!--title change kale na -->
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
                aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="ml-auto navbar-nav">

                    <li class="nav-item {{ Route::is('home') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('home') }}">Home</a>
                    </li>

                    <li class="nav-item {{ Route::is('blog.show') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('blog.show') }}">Blog</a>
                    </li>

                    <li class="nav-item {{ Route::is('blog.categories') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('blog.categories') }}">Categories</a>
                    </li>

                    <li class="nav-item {{ Route::is('about.show') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('about.show') }}">About Us</a>
                    </li>

                    <li class="nav-item {{ Route::is('contact.show') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('contact.show') }}">Contact Us</a>
                    </li>

                </ul>
            </div>
        </div>
    </nav>
</header>
