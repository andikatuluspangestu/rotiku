<!DOCTYPE html>
<html lang="en-US" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        {{ $title }} - Rotiku
    </title>

    <!-- Meta Open Graph -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('home/img/favicons/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('home/img/favicons/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('home/img/favicons/favicon-16x16.png') }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('home/img/favicons/favicon.ico') }}">
    <link rel="manifest" href="{{ asset('home/img/favicons/manifest.json') }}">
    <meta name="msapplication-TileImage" content="{{ asset('home/img/favicons/mstile-150x150.png') }}">
    <meta name="theme-color" content="#ffffff">

    <!-- Meta Description -->
    <meta name="description" content="MyOrmawa is a Laravel Web App for managing organization's activities.">

    <!-- Stylesheet -->
    <link href="{{ asset('backend/compiled/css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('backend/compiled/css/app-dark.css') }}" rel="stylesheet">
    <link href="{{ asset('backend/compiled/css/iconly.css') }}" rel="stylesheet">

    <!-- Custom Main CSS File -->
    <link href="{{ asset('backend/compiled/css/custom.css') }}" rel="stylesheet">

    {{-- Font Awesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    {{-- CDN DataTable --}}
    <link rel="stylesheet" href="{{ asset('backend/extensions/datatables.net-bs5/css/dataTables.bootstrap5.css')}}">
    <link rel="stylesheet" href="{{ asset('backend/compiled/css/table-datatable-jquery.css')}}">

</head>

<body>

    <script src="{{ asset('backend/static/js/initTheme.js') }}"></script>

    <div id="app">
        @include('components.dashboard.sidebar')
        <div id="main">
            @include('components.dashboard.header')
            <main class="content">
                @yield('content')
            </main>
        </div>
    </div>

    <!-- JavaScripts -->
    <script src="{{ asset('backend/compiled/js/app.js') }}"></script>
    <script src="{{ asset('backend/static/js/components/dark.js') }}"></script>
    <script src="{{ asset('backend/extensions/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/js/all.min.js"></script>

    {{-- CDN SweetAlert2 --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    {{-- CDN DataTable --}}
    <script src="{{ asset('backend/extensions/jquery/jquery.js')}}"></script>
    <script src="{{ asset('backend/extensions/datatables.net/js/jquery.dataTables.js')}}"></script>
    <script src="{{ asset('backend/extensions/datatables.net-bs5/js/dataTables.bootstrap5.js')}}"></script>

    {{-- Custom JS --}}
    <script src="{{ asset('backend/static/js/custom.js') }}"></script>

    <script>
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
        var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl);
        });
    </script>


    <script>
        // Active Sidebar
        $(document).ready(function() {
            
            var title = "{{ $title }}";

            if (title == 'Dashboard') {
                $('#dashboard').addClass('active');
            } else if (title == 'Katalog Produk') {
                $('#catalog').addClass('active');
                $('#dashboard').removeClass('active');
            } else if (title == 'Produk') {
                $('#product').addClass('active');
                $('#dashboard').removeClass('active');
            } else if (title == 'Detail Produk') {
                $('#product').addClass('active');
                $('#dashboard').removeClass('active');
            } else if (title == 'Detail Pesanan') {
                $('#pesanan').addClass('active');
                $('#dashboard').removeClass('active');
            } else if (title == 'Daftar Pesanan') {
                $('#pesanan').addClass('active');
                $('#dashboard').removeClass('active');
            } else if (title == 'Riwayat Pesanan') {
                $('#history').addClass('active');
                $('#dashboard').removeClass('active');
            } else if (title == 'Pendapatan') {
                $('#pendapatan').addClass('active');
                $('#dashboard').removeClass('active');
            } else if (title == 'Data Administrator') {
                $('#users').addClass('active');
                $('#dashboard').removeClass('active');
            } else if (title == 'Data Pelanggan') {
                $('#pelanggan').addClass('active');
                $('#dashboard').removeClass('active');
            } else if (title == 'Data Operator') {
                $('#operator').addClass('active');
                $('#dashboard').removeClass('active');
            } else if (title == 'Keluhan Pelanggan') {
                $('#aspirasi').addClass('active');
                $('#dashboard').removeClass('active');
            } else if (title == 'Detail Keluhan') {
                $('#aspirasi').addClass('active');
                $('#dashboard').removeClass('active');
            }
        });
    </script>

</body>

</html>
