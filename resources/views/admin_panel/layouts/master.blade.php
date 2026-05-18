<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Title -->
    <title>@yield('title', 'Laravel Blog')</title>

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('admin_template/img/core-img/blogdesktop.png') }}">

    <!-- Plugins File -->
    <link rel="stylesheet" href="{{ asset('admin_template/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin_template/css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('admin_template/css/introjs.min.css') }}">

    <!-- Master Stylesheet [If you remove this CSS file, your file will be broken undoubtedly.] -->
    <link rel="stylesheet" href="{{ asset('admin_template/style.css') }}">

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

</head>

<body>
    <!-- Preloader -->
    @include('admin_panel.includes.preloader')
    <!-- /Preloader -->


    <!-- ======================================
    ******* Page Wrapper Area Start **********
    ======================================= -->
    <div class="flapt-page-wrapper">
        <!-- Sidemenu Area -->
        @include('admin_panel.layouts.navbar')
        <!-- Sidemenu Area -->

        <!-- Page Content -->
        <div class="flapt-page-content">
            <!-- Header Area -->
            @include('admin_panel.layouts.header')
            <!-- Header Area -->

            <div class="main-content introduction-farm" style="display: flex; flex-direction: column; min-height: calc(100vh - 70px);">
                <!-- Main Content Area -->
                <div style="flex: 1 0 auto;">
                    @yield('content')
                </div>
                <!-- Main Content Area -->

                <!-- Footer Area -->
                @include('admin_panel.layouts.footer')
                <!-- Footer Area -->

            </div>
        </div>
    </div>

    <!-- ======================================
    ********* Page Wrapper Area End ***********
    ======================================= -->

    <!-- Must needed plugins to the run this Template -->
    <script src="{{ asset('admin_template/js/jquery.min.js') }}"></script>
    <script src="{{ asset('admin_template/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('admin_template/js/default-assets/setting.js') }}"></script>
    <script src="{{ asset('admin_template/js/default-assets/scrool-bar.js') }}"></script>
    <script src="{{ asset('admin_template/js/todo-list.js') }}"></script>

    <!-- Active JS -->
    <script src="{{ asset('admin_template/js/default-assets/active.js') }}"></script>

    <!-- These plugins only need for the run this page -->
    <script src="{{ asset('admin_template/js/apexcharts.min.js') }}"></script>
    <script src="{{ asset('admin_template/js/intro.min.js') }}"></script>
    <script src="{{ asset('admin_template/js/dashboard-custom.js') }}"></script>
    <script src="{{ asset('admin_template/js/intro-active.js') }}"></script>

</body>

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    toastr.options = {
        "closeButton": true,
        "progressBar": true,
        "positionClass": "toast-top-center",
    };

    @if (Session::has('message'))
        var type = "{{ Session::get('alert-type', 'info') }}";
        switch (type) {
            case 'info':
                toastr.info("{{ Session::get('message') }}");
                break;
            case 'success':
                toastr.success("{{ Session::get('message') }}");
                break;
            case 'warning':
                toastr.warning("{{ Session::get('message') }}");
                break;
            case 'error':
                toastr.error("{{ Session::get('message') }}");
                break;
        }
    @endif
</script>

</html>
