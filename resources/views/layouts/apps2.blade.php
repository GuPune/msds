
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no" />

    <!-- <title>DINO DELIVERY</title> -->


    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">


    <link rel="stylesheet" href="https://restu.idtest.work/css/sidebar.css">
    <link rel="stylesheet" href="https://restu.idtest.work/css/custom.css">
    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css?v1">
    <!-- Font Awesome All -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css?v1">
    <!-- <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css"> -->
    <!-- Font -->
    <link href="https://fonts.googleapis.com/css?family=Mitr&display=swap" rel="stylesheet">

		<!-- jQuery -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Poppins" />

    <style media="screen">
         .bocdy  {
            background-image: url("http://139.5.146.235/Art.png");
            background-size: cover;
    background-repeat: no-repeat;
    background-position: center
      /* background-image: url("https://cdn.vuetifyjs.com/images/backgrounds/vbanner.jpg"); */

    }
    body{
    font-family: 'Poppins', sans-serif;
}

      h1, h2, h3, h4, h5, h6{
        font-family: 'Mitr', sans-serif !important;
      }
	  .tabbable .nav-pills {
         overflow-x: auto;
         overflow-y:hidden;
         flex-wrap: nowrap;
		 white-space: nowrap;
      }
    </style>

<style>
    .carousel-inner > .item > img,
    .carousel-inner > .item > a > img {
      width: 70%;
      margin: auto;
    }

    .ima{
        width: 100px;
    }

    @media only screen and (max-width: 600px) {
        .ima{
        width: 100%;
    }

}
    .ima2{
        width: 100px;
    }

    @media only screen and (max-width: 600px) {
        .ima2{
        width: 40%;
    }

    @media (min-width:320px)  {
        .ima2 {
    width: 20%;
}

     }
@media (min-width:480px)  {

 }
@media (min-width:600px)  {

  }
@media (min-width:801px)  {

 }
@media (min-width:1025px) {

 }
@media (min-width:1281px) {

  }

}
    </style>
    <!-- Global site tag (gtag.js) - Google Analytics -->


</head>

<body>


    <title>MSD</title>
<style>
/* Gradient transparent - color - transparent */
hr.style-two {
	border: 0;
	height: 1px;
	background-image: linear-gradient(to right, rgba(0, 0, 0, 0), rgba(0, 0, 0, 0.75), rgba(0, 0, 0, 0));
}


</style>
<script type="text/javascript">
$(document).ready(function(){

	// validate support storage
	if(typeof(Storage) == "undefined") {
		alert("Not storage support");
	}
  // set storage
  localStorage.setItem("customer_id", "");
  localStorage.setItem("customer_name", "");

  $("#customer_id").html( localStorage.getItem("customer_id"));
  $("#customer_name").html( localStorage.getItem("customer_name"));

});
</script>


<div class="wrapper w3-animate-top">
  <!-- Sidebar  -->


  <!-- Page Content  -->
  <div id="content" class="bocdy">

    <div class="px-3" style="margin-top:5rem;">
        @yield('content')



    </div>


    <div class="p-2 shadow fixed-top">
        @include('template.header')
      </div>
		<div style="height:90px;"></div>
		<div class="p-2 shadow fixed-bottom">
            @include('template.footer2')

</div>
  </div>

</div>
<div class="overlay"></div>

<!--<div class="fixed-bottom" style="z-index:888;">
      <div class="bg-white p-3 shadow">
        <div class="">
          <a href="https://dinovery.app/app/index.php/Home/cart" class="btn btn-success btn-block">
          <div class="row py-1 px-2">
            <div class="col-8 text-left">
              ดูตะกร้า 1 รายการ
            </div>
            <div class="col-4 text-right">
              <div class="">60 บาท</div>
            </div>
          </div>
          </a>
        </div>
      </div>
    </div>-->

    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <!-- Bootstrap JS -->

    <!-- jQuery Custom Scroller CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            $("#sidebar").mCustomScrollbar({
                theme: "minimal"
            });

            $('#dismiss, .overlay').on('click', function () {
                $('#sidebar').removeClass('active');
                $('.overlay').removeClass('active');
            });

            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').addClass('active');
                $('.overlay').addClass('active');
                $('.collapse.in').toggleClass('in');
                $('a[aria-expanded=true]').attr('aria-expanded', 'false');
            });
        });

        function goBack() {
          window.history.back();
        }

    </script>


</body>

</html>






