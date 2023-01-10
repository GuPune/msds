
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  @include('templateadmin.styles')
</head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">

<style>
    .bocdy  {
      background-image: url("http://139.5.146.235/img/A1.jpg");
      background-size: 100% 100%;


    }
    .srta{
        background-color: #000000;
    border-color: #000000;
    }
    .fixed-btn{
  position: fixed;
  bottom: 10%;
  /* right: 45%; */
  /* background: #0FACF3; */
  /* width: 180px;
  height: 45px; */
  line-height: 45px;
  text-align: center;
  border-radius: 3px;
  /* box-shadow: 4px 4px 4px #0a78aa; */
  cursor: pointer;
}

.fixed-btn p{
  text-transform: uppercase;
  font-family: arial;
  font-weight: 900;
  color: #fff;
}

.fixed-btn:active{
  box-shadow: 0  0;
}

/* @media (min-width:320px)  {
    .fixed-btn{
  position: fixed;
  bottom: 10%;
  right: 40%;
  background: #0FACF3;
  width: 180px;
  height: 45px;
  line-height: 45px;
  text-align: center;
  border-radius: 3px;
  box-shadow: 4px 4px 4px #0a78aa;
  cursor: pointer;
}

 } */
@media (min-width:480px)  {


 }
@media (min-width:600px)  { /* portrait tablets, portrait iPad, e-readers (Nook/Kindle), landscape 800x480 phones (Android) */ }
@media (min-width:801px)  { /* tablet, landscape iPad, lo-res laptops ands desktops */ }
/* @media (min-width:1025px) {
    .fixed-btn{
  position: fixed;
  bottom: 10%;
  right: 43%;
  background: #0FACF3;
  width: 180px;
  height: 45px;
  line-height: 45px;
  text-align: center;
  border-radius: 3px;
  box-shadow: 4px 4px 4px #0a78aa;
  cursor: pointer;
}
} */
@media (min-width:1281px) { /* hi-res laptops and desktops */ }
    </style>
<body >
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
            @foreach($sys as $k => $rs)
            <div class="col-12">

                <div class="card-body">

                    <h6 class="card-subtitle mb-2">
                        @if ($rs->period == 'D')
                            {{'ช่วงเช้า'}}
                        @else
                             {{'ช่วงบ่าย'}}
                        @endif
                    </h6>
                    <p class="card-text"> {!! QrCode::size(350)->generate($rs->url); !!}</p>
                  </div>

            </div>
            @endforeach
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- base:js -->

  <!-- endinject -->
</body>

</html>
