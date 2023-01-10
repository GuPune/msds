
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  @include('templateadmin.styles')
</head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">

<style>
    .bocdy  {
      background-image: url("https://cdn.vuetifyjs.com/images/backgrounds/vbanner.jpg");

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
              <h1 class="font-weight-light"><strong>ลืมรหัสผ่าน</strong></h1>


@if ($errors->any())
<div class="alert alert-danger">
    <button type="button" class="close" data-dismiss="alert">×</button>
    Check the following errors :(  {{$errors->first()}}
</div>
@endif


              <form class="pt-3" method="POST" action="{{ route('reset.custom') }}">
                @csrf
                  <div class="form-group">
                    <label class="my-1 d-flex align-items-center" style="font-size: 20px;" for="role"><i class="fa fa-user-o" aria-hidden="true"></i>  E-MAIL <span class="ml-auto"></span></label>

                    <input id="token" type="hidden" class="form-control form-control-lg" style="border-radius: 10px;"  name="token" value="{{$gettoken}}" required >

                    <input id="email" type="email" class="form-control form-control-lg" style="border-radius: 10px;" placeholder="Email"  name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                  </div>




                <div class="col-auto" style="text-align: center;">
                    <button type="submit" class="btn btn-primary" style="background-color: black;border-color: #0a0a0a;">แจ้งลืมรหัสผ่าน</button>
                </div>



                {{-- <div class="my-2 d-flex justify-content-between align-items-center">
                  <div class="form-check">
                    <label class="form-check-label text-muted">
                      <input type="checkbox" class="form-check-input">
                      Keep me signed in
                    </label>
                  </div>
                  <a href="#" class="auth-link text-black">Forgot password?</a>
                </div> --}}
              </form>
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
