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
    {{-- <div class="row" id="proBanner">
      <div class="col-12">
        <span class="d-flex align-items-center purchase-popup">
          <p>Get tons of UI components, Plugins, multiple layouts, 20+ sample pages, and more!</p>
          <a href="https://www.bootstrapdash.com/product/celestial-admin-template/?utm_source=organic&utm_medium=banner&utm_campaign=free-preview" target="_blank" class="btn download-button purchase-button ml-auto">Upgrade To Pro</a>
          <i class="typcn typcn-delete-outline" id="bannerClose"></i>
        </span>
      </div>
    </div> --}}
    <div class="container-scroller">
      <!-- partial:partials/_navbar.html -->
      @include('templateadmin.header')
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_settings-panel.html -->
        <div class="theme-setting-wrapper">
          <div id="settings-trigger"><i class="typcn typcn-cog-outline"></i></div>
          <div id="theme-settings" class="settings-panel">
            <i class="settings-close typcn typcn-delete-outline"></i>
            <p class="settings-heading">SIDEBAR SKINS</p>
            <div class="sidebar-bg-options" id="sidebar-light-theme">
              <div class="img-ss rounded-circle bg-light border mr-3"></div>
              Light
            </div>
            <div class="sidebar-bg-options selected" id="sidebar-dark-theme">
              <div class="img-ss rounded-circle bg-dark border mr-3"></div>
              Dark
            </div>
            <p class="settings-heading mt-2">HEADER SKINS</p>
            <div class="color-tiles mx-0 px-4">
              <div class="tiles success"></div>
              <div class="tiles warning"></div>
              <div class="tiles danger"></div>
              <div class="tiles primary"></div>
              <div class="tiles info"></div>
              <div class="tiles dark"></div>
              <div class="tiles default border"></div>
            </div>
          </div>
        </div>
        <!-- partial -->
        <!-- partial:partials/_sidebar.html -->
        @include('templateadmin.menu')
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            @yield('content')



          </div>
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->

          @include('templateadmin.footer')
          <!-- partial -->
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
