
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
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.5.3/js/bootstrap.min.js"></script>


    <style media="screen">

      h1, h2, h3, h4, h5, h6{
        font-family: 'Mitr', sans-serif !important;
      }
	  .tabbable .nav-pills {
         overflow-x: auto;
         overflow-y:hidden;
         flex-wrap: nowrap;
		 white-space: nowrap;
      }
      .bocdy  {
        background-image: url("http://139.5.146.235/Art.png");
      /* background-image: url("https://cdn.vuetifyjs.com/images/backgrounds/vbanner.jpg"); */

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

<div class="wrapper w3-animate-top">
  <!-- Sidebar  -->


  <!-- Page Content  -->
  <div id="content" class="bocdy">

    <div class="px-3" style="margin-top:1rem;">

  </div>

</div>
<div class="overlay"></div>

<div class="modal fade" id="day" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <input id="period" type="hidden" class="form-control form-control-lg" style="border-radius: 10px;"  name="period" value="{{$gettoken}}" >
        <div class="modal-body" style="margin-top: 25px;font-size: 25px;">
            ??????????????????????????????????????????????????????????????????????????????????????????????????????????????? 1 (????????????????????????) ????????????
        </div>
        <hr>
        <div class="modal-body" style="text-align: center;">
            <button type="button" class="btn btn-primary mr-auto save">???????????????</button>
           </div>
      </div>
    </div>
  </div>






  <div class="modal fade" id="night" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <input id="period" type="hidden" class="form-control form-control-lg" style="border-radius: 10px;"  name="period" value="{{$gettoken}}" >
        <div class="modal-body" style="margin-top: 25px;font-size: 25px;">
         ??????????????????????????????????????????????????????????????????????????????????????????????????????????????? 2 (????????????????????????) ????????????
        </div>
        <hr>
        <div class="modal-body" style="text-align: center;">
            <button type="button" class="btn btn-primary mr-auto save">???????????????</button>
           </div>

      </div>
    </div>
  </div>


    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <!-- Bootstrap JS -->

    <!-- jQuery Custom Scroller CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>

    <script type="text/javascript">

$(document).ready(function () {
    var period = $('#period').val();
    if(period == 'D'){
        $("#day").modal()
    }else if(period == 'N'){
        $("#night").modal()
    }else{
        window.location.href = '/dash/home'
    }
        });

        function goBack() {
          window.history.back();
        }

        $('body').on('click', '.save', function () {
            window.location.href = '/dash/home'
        });

    </script>


</body>

</html>
