<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  @php
  $imga = \App\CoreFunction\Cutstr::getconfig();
  @endphp
  <title>{{$imga->cg_name}}</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->


  <link href="/public/product/{{$imga->image_shotcut}}" rel="icon">
  <link href="/public/product/{{$imga->image_shotcut}}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="/assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
  <!-- Template Main CSS File -->
  <link href="/assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Presento - v3.9.1
  * Template URL: https://bootstrapmade.com/presento-bootstrap-corporate-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
  <style>

    .section-diff .service {
    background: white;
}

.service .service-desc::before {
    content: "";
    position: absolute;
    top: 0px;
    border-bottom: 2px solid #d9d9d9;
    width: 100%;
    left: 0;
}
    .service .service-icon {
    font-size: 48px;
    color: #f4ad42;
    margin-top: 15px;
}
.service .service-header, .service-header {
    font: 18px "Prompt", sans-serif;
    color: #191919;
    text-transform: uppercase;
    padding: 25px 0 45px 0;
}

.service .service-desc {
    position: relative;
    padding: 25px 20px;
    margin: -15px;
    color: #666666;
    font-size: 12px;
    line-height: 18px;
    text-align: left;
    height: 170px;
}
.service-desc {
    text-indent: 25px;
    font-size: 16px!important;
}
    .service {
    cursor: pointer;
}

.service {
    text-align: center;
    background: #f2f2f2;
    padding: 15px;
    position: relative;
}
.fadeLeft {
    left: -80px;
    opacity: 0;
    position: relative;
}

.service .service-desc::after {
    font: 25px FontAwesome;
    content: "\f0d8";
    position: absolute;
    top: -16px;
    left: 48.1%;
    color: #d9d9d9;
}

.section-bg-1 {
    background: url(//www.workbythai.com/assets/images/coding.jpg);
    background-size: cover;
}
    </style>
</head>

<body>

  <!-- ======= Header ======= -->
  @include('template.header')

  <!-- ======= Hero Section ======= -->


  <main id="main">



    @yield('content')
  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  @include('template.footer')




  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="/assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="/assets/vendor/aos/aos.js"></script>
  <script src="/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="/assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="/assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="/assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="/assets/js/main.js"></script>

</body>

</html>
