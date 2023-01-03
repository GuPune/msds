
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no" />

    <!-- <title>DINO DELIVERY</title> -->


    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://dinovery.app/app/assets/vendor/bootstrap/dist/css/bootstrap.min.css?v1">
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="https://dinovery.app/app/assets/css/custom.css?v1">
    <link rel="stylesheet" href="https://dinovery.app/app/assets/css/sidebar.css?v1">
    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css?v1">
    <!-- Font Awesome All -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css?v1">
    <!-- <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css"> -->
    <!-- Font -->
    <link href="https://fonts.googleapis.com/css?family=Mitr&display=swap" rel="stylesheet">

		<!-- jQuery -->
		<script src="https://dinovery.app/app/assets/js/jquery-3.4.1.min.js"></script>

    <style media="screen">
         .bocdy  {
      background-image: url("https://cdn.vuetifyjs.com/images/backgrounds/vbanner.jpg");
      background-color: #aa1212;
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
    <!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-162912447-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-162912447-1');
</script>

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
  <nav id="sidebar">
    <div id="dismiss"> <i class="fas  fa-arrow-left"></i> </div>
    <div class="sidebar-header">
      <h5 >Main Menu</h5 >
    </div>
    <ul class="list-unstyled components">
      <li> <a href="https://dinovery.app/app/index.php/Home/history"><i class="far fa-list-alt text-dino mr-1"></i> ออเดอร์ของฉัน</a> </li>
      <li> <a href="#" onclick="return confirm('เมนูนี้ยังไม่เปิดให้บริการ')" ><i class="far fa-user-circle text-dino mr-1"></i> โปรไฟล์ของฉัน</a> </li>
      <li> <a href="https://dinovery.app/app/index.php/Home/order_location"><i class="fas fa-map-marker-alt text-dino mr-1"></i> ที่อยู่ของฉัน</a> </li>
      <li> <a href="https://dinovery.app/app/index.php/Auth/logout"><i class="fas fa-sign-out-alt text-dino mr-1"></i> ออกจากระบบ</a> </li>
    </ul>
  </nav>

  <!-- Page Content  -->
  <div id="content" class="bocdy">

    <div class="px-3" style="margin-top:1rem;">
      <div class="row mb-3">

      </div>









    </div>
		<div style="height:90px;"></div>
		<div class="p-2 shadow fixed-bottom" style="background-color:#ec7d23;">
  <div class="row" style="margin-bottom:2%; font-family:Mitr;">
    <div class="col-3 text-center text-white" style="padding-top:1%;">
      <a href="https://dinovery.app/app/index.php/Home"><i class="fa fa-th fa-2x" aria-hidden="true"></i><br>หน้าแรก</a>
    </div>
    <div class="col-3 text-center text-white" style="padding-top:1%;">
      <a href="https://dinovery.app/app/index.php/Home/history"><i class="fa fa-history fa-2x" aria-hidden="true"></i><br>ออเดอร์</a>
    </div>
    <div class="col-3 text-center text-white" style="padding-top:1%;">
      <a href="https://dinovery.app/app/index.php/Home/message"><i class="fa fa-envelope fa-2x" aria-hidden="true"></i><br>ข้อความ</a>
    </div>
    <div class="col-3 text-center text-white" style="padding-top:1%;">
      <a href="https://dinovery.app/app/index.php/Home/profile"><i class="fa fa-user-circle fa-2x" aria-hidden="true"></i><br>โปรไฟล์</a>
    </div>
  </div>
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
    <script src="https://dinovery.app/app/assets/vendor/bootstrap/dist/js/bootstrap.min.js"></script>
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