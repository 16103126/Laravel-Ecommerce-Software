<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Star Admin Premium Bootstrap Admin Dashboard Template</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{asset('admin_dashboard/vendors/iconfonts/mdi/css/materialdesignicons.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin_dashboard/vendors/iconfonts/ionicons/dist/css/ionicons.css')}}">
    <link rel="stylesheet" href="{{asset('admin_dashboard/vendors/iconfonts/flag-icon-css/css/flag-icon.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin_dashboard/vendors/css/vendor.bundle.base.css')}}">
    <link rel="stylesheet" href="{{asset('admin_dashboard/vendors/css/vendor.bundle.addons.css')}}">
    <!-- endinject -->
    <!-- plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- table:css -->
    <link rel="stylesheet" href="{{asset('css/data-tables.min.css')}}">
    <!-- inject:css -->
    <link rel="stylesheet" href="{{asset('admin_dashboard/css/shared/style.css')}}">
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="{{asset('admin_dashboard/css/demo_1/style.css')}}">
    <!-- End Layout styles -->
    <link rel="shortcut icon" href="{{asset('admin_dashboard/images/favicon.ico')}}" />
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_navbar.html -->
      @include('backend.partials.nav')
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
        @include('backend.partials.sidebar')
        <!-- partial -->

        
        @yield('content')

        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="{{asset('admin_dashboard/vendors/js/vendor.bundle.base.js')}}"></script>
    <script src="{{asset('admin_dashboard/vendors/js/vendor.bundle.addons.js')}}"></script>
    <!-- endinject -->
    <!-- Plugin js for this page-->
    <!-- End plugin js for this page-->
    <!-- data-table:js -->
    <script src="{{asset('js/data-tables.min.js')}}"></script>
    <script>
      $(document).ready( function () {
        $('#dataTable').DataTable();
    } );
  </script>
    <!-- inject:js -->
    <script src="{{asset('admin_dashboard/js/shared/off-canvas.js')}}"></script>
    <script src="{{asset('admin_dashboard/js/shared/misc.js')}}"></script>
    <!-- endinject -->
    <!-- Custom js for this page-->
    <script src="{{asset('admin_dashboard/js/demo_1/dashboard.js')}}"></script>
    <!-- End custom js for this page-->
  </body>
</html>