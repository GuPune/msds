
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
      background-image: url("https://cdn.vuetifyjs.com/images/backgrounds/vbanner.jpg");
      background-color: #aa1212;
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
        <input id="period" type="text" class="form-control form-control-lg" style="border-radius: 10px;"  name="period" value="{{Auth::user()->period}}" >
        <div class="modal-body" style="margin-top: 25px;font-size: 25px;">
            ระบบได้บันทึกข้อมูลการลงทะเบียนรอบที่ 1 (ช่วงเช้า) แล้ว
        </div>
        <hr>
        <div class="modal-body" style="text-align: center;">
            <button type="button" class="btn btn-primary mr-auto save">ถัดไป</button>
           </div>

      </div>
    </div>
  </div>






  <div class="modal fade" id="night" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <input id="period" type="text" class="form-control form-control-lg" style="border-radius: 10px;"  name="period" value="{{Auth::user()->period}}" >
        <div class="modal-body" style="margin-top: 25px;font-size: 25px;">
         ระบบได้บันทึกข้อมูลการลงทะเบียนรอบที่ 2 (ช่วงเย็น) แล้ว
        </div>
        <hr>
        <div class="modal-body" style="text-align: center;">
            <button type="button" class="btn btn-primary mr-auto save">ถัดไป</button>
           </div>

      </div>
    </div>
  </div>


    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <!-- Bootstrap JS -->
    <script src="https://dinovery.app/app/assets/vendor/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- jQuery Custom Scroller CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>

    <script type="text/javascript">

$(document).ready(function () {
    var period = $('#period').val();

    if(period == 'D'){

        $("#day").modal()
    }else{

        $("#night").modal()
    }
        });

        function goBack() {
          window.history.back();
        }

        $('body').on('click', '.save', function () {
                $.ajaxSetup({
               headers: {
                   'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
               }
               });

           $.ajax({
               dataType: 'json',
               type:'POST',
               data:{
                   '_token': "{{ csrf_token() }}",
                  },
               url: '/checkin',
               success: function(datas){
                swal("บันทึกสำเร็จ!", "บันทึกสำเร็จ!", "success");
               }
           })



        });

    </script>


</body>

</html>
