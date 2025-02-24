<!DOCTYPE html>
<html lang="en"
    class="light-style layout-menu-fixed"
    dir="ltr"
    data-theme="theme-default">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Админ-панель</title>

     <!-- Favicon -->
     <link rel="icon" type="image/x-icon" href="{{ asset('assets/img/favicon/favicon.ico.js') }}" />

     <!-- Fonts -->
     <link rel="preconnect" href="https://fonts.googleapis.com" />
     <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
     <link
       href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
       rel="stylesheet"
     />

     <!-- Icons. Uncomment required icon fonts -->
     <link rel="stylesheet" href="{{ asset('assets/vendor/fonts/boxicons.css') }}" />

     <!-- Core CSS -->
     <link rel="stylesheet" href="{{ asset('assets/vendor/css/core.css') }}" class="template-customizer-core-css" />
     <link rel="stylesheet" href="{{ asset('assets/vendor/css/theme-default.css') }}" class="template-customizer-theme-css" />
     <link rel="stylesheet" href="{{ asset('assets/css/demo.css') }}" />

     <!-- Vendors CSS -->
     <link rel="stylesheet" href="{{ asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />

     <link rel="stylesheet" href="{{ asset('assets/vendor/libs/apex-charts/apex-charts.css') }}" />

     <!-- Page CSS -->
     <link rel="stylesheet" href="../assets/vendor/css/pages/page-auth.css" />

     <!-- Helpers -->
     <script src="{{ asset('assets/vendor/js/helpers.js') }}"></script>

     <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
     <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
     <script src="{{ asset('assets/js/config.js') }}"></script>

    @vite(['resources/css/app.css', 'resources/js/workshop.js'])
</head>
<body>
    <div id="workshop"></div>

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="{{ asset('assets/vendor/libs/jquery/jquery.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/popper/popper.js') }}"></script>
    <script src="{{ asset('assets/vendor/js/bootstrap.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>

    <script src="{{ asset('assets/vendor/js/menu.js') }}"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->

    <!-- Main JS -->
    <script src="{{ asset('assets/js/main.js') }}"></script>

</body>
</html>
