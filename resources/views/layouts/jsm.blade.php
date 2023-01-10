<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>MSD</title>

    <!-- Custom fonts for this template-->
    <link rel="shortcut icon" href="{{ asset('logo.jpg') }}">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="{{ asset('ecom/css/sb-admin-2.min.css') }}" rel="stylesheet">
    <link href="{{ asset('ecom/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{!! asset('jsm_cms/vendor/datatables/dataTables.bootstrap4.min.css') !!}" rel="stylesheet">
    <link href="{{ asset('template/icons/icomoon/styles.css') }}" rel="stylesheet">
</head>

<body id="page-top">

<!-- Page Wrapper -->
<div id="wrapper">
@include('templateecom.sidebar')

    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">
        <!-- Main Content -->
        <div id="content">
            <!-- Topbar -->
        @include('templateecom.header')
            <!-- End of Topbar -->

            <!-- Begin Page Content -->
        @yield('content')
            <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->

        <!-- Footer -->
        <footer class="sticky-footer bg-white">
            <div class="container my-auto">
                <div class="copyright text-center my-auto">
                    <span>&copy; Copyright by IDDrives co.ltd</span>
                </div>
            </div>
        </footer>
        <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">คุณต้องการออกจากระบบ?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">เลือก ออกจากระบบ เซสชันปัจจุบันของคุณจะสิ้นสุด </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">ยกเลิก</button>

                <a href="{{ route('logout') }}"  class="btn btn-primary"
                  >
                    ออกจากระบบ </a>

            </div>
        </div>
    </div>
</div>



<script src="{!! asset('ecom/vendor/jquery/jquery.min.js') !!}"></script>
<script src="{!! asset('ecom/vendor/bootstrap/js/bootstrap.bundle.min.js') !!}"></script>
<script src="{!! asset('ecom/js/sb-admin-2.min.js') !!}"></script>
<script src="{!! asset('ecom/vendor/jquery-easing/jquery.easing.min.js') !!}"></script>

<script src="{!! asset('ecom/vendor/datatables/jquery.dataTables.min.js') !!}"></script>
<script src="{!! asset('ecom/vendor/datatables/dataTables.bootstrap4.min.js') !!}"></script>
<script src="{!! asset('ecom/js/demo/datatables-demo.js') !!}"></script>



</body>

</html>
