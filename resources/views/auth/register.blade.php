
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  @include('templateadmin.styles')
</head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0" style="background-color: blue">
        <div class="row w-100 mx-0">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5" style="border-radius: 30px;">

              {{-- <h4>Hello! let's get started</h4> --}}
              <h1 class="font-weight-light"><strong>สมัครสมาชิก</strong></h1>

@if ($errors->any())
<div class="alert alert-danger">
    <button type="button" class="close" data-dismiss="alert">×</button>
    Check the following errors :(
</div>
@endif
              <form class="pt-3" method="POST" action="{{ route('register.post') }}">

                @csrf

                  <div class="form-group">
                    <label class="my-1 d-flex align-items-center" style="font-size: 14px;" for="role">  First Name <span class="ml-auto"></span></label>
                    <input id="token" type="hidden" class="form-control form-control-lg" style="border-radius: 10px;"  name="token" value="{{$gettoken}}" required >

                    <input id="fname" type="text" class="form-control form-control-lg" style="border-radius: 10px;" placeholder="First Name"  name="fname"  required>

                  </div>
                  <div class="form-group">
                    <label class="my-1 d-flex align-items-center" style="font-size: 14px;" for="role">  Last Name <span class="ml-auto"></span></label>
                    <input id="lname" type="text" style="border-radius: 10px;" class="form-control  @error('password') is-invalid @enderror"  placeholder="Last Name" name="password" required autocomplete="current-password">
                  </div>

                  <div class="form-group">
                    <label class="my-1 d-flex align-items-center" style="font-size: 14px;" for="role"> Department <span class="ml-auto"></span></label>
                    <input id="department" type="text" style="border-radius: 10px;" class="form-control"   placeholder="Department" name="department" required>
                  </div>


                  <div class="form-group">
                    <label class="my-1 d-flex align-items-center" style="font-size: 14px;" for="role"> E-MAIL <span class="ml-auto"></span></label>
                    <input id="email" type="email" class="form-control form-control-lg" style="border-radius: 10px;" placeholder="Email"  name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                  </div>
                  <div class="form-group">
                    <label class="my-1 d-flex align-items-center" style="font-size: 14px;" for="role"> Password <span class="ml-auto"></span></label>


                    <input id="password" type="password" style="border-radius: 10px;" class="form-control  @error('password') is-invalid @enderror"  placeholder="Password" name="password" required autocomplete="current-password">

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  </div>

                  <div class="form-group">
                    <label class="my-1 d-flex align-items-center" style="font-size: 14px;" for="role"> Confirm Password <span class="ml-auto"></span></label>
                    <input id="password_confirmation" type="password" name="password_confirmation"  style="border-radius: 10px;" class="form-control  @error('password') is-invalid @enderror"   required placeholder="Confirm Password" required="required">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  </div>








                <div class="col-auto" style="text-align: center;">
                    <button type="submit" class="btn btn-primary" style="background-color: black;border-color: #0a0a0a;">ยืนยัน</button>
                </div>

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
