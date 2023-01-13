
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  @include('templateadmin.styles')
</head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">

<style>
    .bocdy  {
      /* background-image: url("https://cdn.vuetifyjs.com/images/backgrounds/vbanner.jpg"); */
      background-image: url("http://139.5.146.235/Art.png");
    }
    </style>
<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0 bocdy">
        <div class="row w-100 mx-0">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5" style="border-radius: 30px;">

              {{-- <h4>Hello! let's get started</h4> --}}
              <div class="table-responsive">
                <table class="table table-bordered" id="example" width="100%" cellspacing="0" style="text-align: center;">
                    <thead>
                        <tr class="center">
                            <th>#</th>
                            <th>QRCODE</th>
                            <th>หน้า</th>

                        </tr>
                    </thead>

                    <tbody>

                        @foreach($sys as $key => $user)
                        <tr>
                            <td class="text-center">{{$key+1}}</td>
                            <td class="text-center"> {!! QrCode::size(150)->generate($user->url); !!}</td>
                            <td class="text-center">
                            @if ($user->period == 'D')
                            {{'เช้า'}}
                            @elseif ($user->period == 'N')
                            {{'บ่าย'}}
                            @else
                            {{'สำหรับลงทะเบียนก่อน'}}
                            @endif
                            </td>

                        </tr>
                        @endforeach


                    </tbody>
                </table>
            </div>




            </div>
          </div>
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script type="text/javascript">

var x = localStorage.getItem("url");
var path = $('#path').val(x);




   </script>
