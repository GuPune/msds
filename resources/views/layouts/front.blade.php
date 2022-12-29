<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>จัดการเว็ปไซค์</title>
    <!-- base:css -->

    {{-- @include('templateadmin.styles') --}}
    <!-- endinject -->
    <link href="{{ asset('cms/vendors/typicons.font/font/typicons.css') }}" rel="stylesheet">
    <link href="{{ asset('cms/vendors/css/vendor.bundle.base.css') }}" rel="stylesheet">
    <link href="{{ asset('cms/css/vertical-layout-light/style.css') }}" rel="stylesheet">
    <link href="{{ asset('cms/vendors/mdi/css/materialdesignicons.min.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">




    <link rel="shortcut icon" href="{{ asset('cms/images/favicon.png') }}" />
  </head>


  <body>

    <div class="container-scroller">
      <!-- partial:partials/_navbar.html -->

      <!-- partial -->
      <div class="container-fluid page-body-wrapper">

        <div class="main-panel">
          <div class="content-wrapper">
            @yield('content')
          </div>

        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>

    <script src="{{ mix('/js/app.js') }}"></script>

    <script src="{{ asset('cms/vendors/js/vendor.bundle.base.js') }}"></script>

    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>


    {{-- @include('templateadmin.script') --}}
    <script>

        $(document).ready( function () {
          $('#myTable').DataTable();
      } );

        </script>
  </body>




</html>
