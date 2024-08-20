<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Skydash Admin</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ asset('assets/vendors/feather/feather.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/ti-icons/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/css/vendor.bundle.base.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/mdi/css/materialdesignicons.min.css') }}">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- <link rel="stylesheet" href="assets/vendors/datatables.net-bs4/dataTables.bootstrap4.css') }}"> -->
    <link rel="stylesheet" href="{{ asset('assets/vendors/datatables.net-bs5/dataTables.bootstrap5.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/ti-icons/css/themify-icons.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/js/select.dataTables.min.css') }}">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <!-- endinject -->
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.png') }}" />
    <!-- sweetalert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <div class="container-scroller">
        <!-- header -->
        @include('layouts.partials.header')
        <!-- header -->

        {{-- main --}}
        <div class="container-fluid page-body-wrapper">
            <!-- sidebar -->
            @include('layouts.partials.sidebar')
            <!-- sidebar -->
            {{-- main content --}}
            <div class="main-panel">
                {{-- content --}}
                @yield('content')
                {{-- content --}}
                <!-- partial:partials/_footer.html -->
                <footer class="footer">
                  <div
                    class="d-sm-flex justify-content-center justify-content-sm-between"
                  >
                    <span
                      class="text-muted text-center text-sm-left d-block d-sm-inline-block"
                      >Copyright © 2023. Premium
                      <a href="https://www.bootstrapdash.com/" target="_blank"
                        >Bootstrap admin template</a
                      >
                      from BootstrapDash. All rights reserved.</span
                    >
                    <span
                      class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"
                      >Hand-crafted & made with
                      <i class="ti-heart text-danger ms-1"></i
                    ></span>
                  </div>
                </footer>
                <!-- partial -->
              </div>
            <!-- main content -->
        </div>
        {{-- main --}}
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="{{ asset('assets/vendors/js/vendor.bundle.base.js') }}"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="{{ asset('assets/vendors/chart.js/chart.umd.js') }}"></script>
    <script src="{{ asset('assets/vendors/datatables.net/jquery.dataTables.js') }}"></script>
    <!-- <script src="assets/vendors/datatables.net-bs4/dataTables.bootstrap4.js') }}"></script> -->
    <script src="{{ asset('assets/vendors/datatables.net-bs5/dataTables.bootstrap5.js') }}"></script>
    <script src="{{ asset('assets/js/dataTables.select.min.js') }}"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="{{ asset('assets/js/off-canvas.js') }}"></script>
    <script src="{{ asset('assets/js/template.js') }}"></script>
    <script src="{{ asset('assets/js/settings.js') }}"></script>
    <script src="{{ asset('assets/js/todolist.js') }}"></script>
    <!-- endinject -->
    <!-- Custom js for this page-->
    <script src="{{ asset('assets/js/jquery.cookie.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/js/dashboard.js') }}"></script>
    <!-- <script src="assets/js/Chart.roundedBarCharts.js"></script> -->
    <!-- End custom js for this page-->
    @stack('js')
</body>

</html>
