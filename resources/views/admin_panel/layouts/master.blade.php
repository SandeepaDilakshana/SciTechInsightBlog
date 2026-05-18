<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Laravel Blog')</title>

    <link rel="icon" href="{{ asset('admin_template/img/core-img/blogdesktop.png') }}">

    <link rel="stylesheet" href="{{ asset('admin_template/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin_template/css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('admin_template/css/introjs.min.css') }}">

    <link rel="stylesheet" href="{{ asset('admin_template/style.css') }}">

    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.0/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    @livewireStyles
</head>

<body>
    @include('admin_panel.includes.preloader')
    <div class="flapt-page-wrapper">
        @include('admin_panel.layouts.navbar')
        <div class="flapt-page-content">
            @include('admin_panel.layouts.header')
            <div class="main-content introduction-farm"
                style="display: flex; flex-direction: column; min-height: calc(100vh - 70px);">
                <div style="flex: 1 0 auto;">
                    @yield('content')
                </div>
                @include('admin_panel.layouts.footer')
            </div>
        </div>
    </div>
    <script src="{{ asset('admin_template/js/jquery.min.js') }}"></script>

    <script src="{{ asset('admin_template/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('admin_template/js/default-assets/setting.js') }}"></script>
    <script src="{{ asset('admin_template/js/default-assets/scrool-bar.js') }}"></script>
    <script src="{{ asset('admin_template/js/todo-list.js') }}"></script>

    <script src="{{ asset('admin_template/js/default-assets/active.js') }}"></script>

    <script src="{{ asset('admin_template/js/apexcharts.min.js') }}"></script>
    <script src="{{ asset('admin_template/js/intro.min.js') }}"></script>
    <script src="{{ asset('admin_template/js/dashboard-custom.js') }}"></script>
    <script src="{{ asset('admin_template/js/intro-active.js') }}"></script>

    @livewireScripts

    <script src="https://cdn.datatables.net/2.0.0/js/dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/2.0.0/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        $(document).ready(function() {
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
        });
    </script>

    <script>
        $(document).ready(function() {
            $('#myTable').DataTable({

                "pageLength": 10,
                "ordering": true,
                "searching": true,
                "paging": true,
                "info": true,
                "lengthChange": true,
                "processing": true,
                "deferRender": true,
            });
        });
    </script>

</body>

</html>
