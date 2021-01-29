<!DOCTYPE html>
<html lang="en">

<head>
	<!-- Meta -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Sufee Admin - HTML5 Admin Template</title>
    <link rel="shortcut icon" href="{{ asset('/assets/images/favicon.ico') }}">
    
    <!-- Global stylesheets -->
    <link rel="stylesheet" href="/assets/vendors/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="/assets/vendors/themify-icons/css/themify-icons.css">
    <link rel="stylesheet" href="/assets/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="/assets/vendors/selectFX/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="/assets/vendors/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="/assets/vendors/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css">
    <link rel="stylesheet" href="/assets/css/style.css">

    <link rel="stylesheet" href="{{ asset('/assets/flatpickr/flatpickr.min.css') }}">
    <link rel="stylesheet" href="/assets/notiflix/notiflix-2.3.2.min.css" type="text/css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
    <!-- /global stylesheets -->
    
    <!-- New Theme JS files -->
    <script src="/assets/moment/moment_locales.min.js"></script>  
    <script src="/assets/notiflix/notiflix-2.3.2.min.js"></script>  
    <script src="/assets/summernote/jquery-3.5.1.min.js"></script>
    <script src="/assets/summernote/bootstrap.min.js"></script>

    @yield('style')
    
</head>
<body>
    @include('layout.sidebar')
    @include('layout.navbar')   
    @yield('content')
</body>

    @yield('scripts')

    <script src="assets/notiflix/flatpickr.js"></script>  
    <!-- <script src="{{ asset('assets/vendors/jquery/dist/jquery.min.js') }}"></script>   
    <script src="{{ asset('assets/vendors/popper.js/dist/umd/popper.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script> -->

    <!-- <script src="{{ asset('assets/vendors/chart.js/dist/Chart.bundle.min.js') }}"></script>
    <script src="{{ asset('/assets/js/dashboard.js') }}"></script> -->
    
    <!-- <script src="{{ asset('assets/js/widgets.js') }}"></script>
    <script src="{{ asset('assets/vendors/jqvmap/dist/jquery.vmap.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js') }}"></script>
    <script src="{{ asset('assets/vendors/jqvmap/dist/maps/jquery.vmap.world.js') }}"></script> -->

    <script src="vendors/jquery/dist/jquery.min.js"></script>
    <script src="vendors/popper.js/dist/umd/popper.min.js"></script>
    <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="assets/js/main.js"></script>


    <script src="vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="vendors/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="vendors/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
    <script src="vendors/jszip/dist/jszip.min.js"></script>
    <script src="vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="vendors/pdfmake/build/vfs_fonts.js"></script>
    <script src="vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="vendors/datatables.net-buttons/js/buttons.colVis.min.js"></script>
    <script src="assets/js/init-scripts/data-table/datatables-init.js"></script>

    <!-- include summernote css/js -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    <!-- /Theme JS files -->

    

    <script>
        (function($) {
            "use strict";

            jQuery('#vmap').vectorMap({
                map: 'world_en',
                backgroundColor: null,
                color: '#ffffff',
                hoverOpacity: 0.7,
                selectedColor: '#1de9b6',
                enableZoom: true,
                showTooltip: true,
                values: sample_data,
                scaleColors: ['#1de9b6', '#03a9f5'],
                normalizeFunction: 'polynomial'
            });
        })(jQuery);
    </script>
</html>