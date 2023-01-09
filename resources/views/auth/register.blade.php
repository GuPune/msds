
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
      background-color: #aa1212;
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
              <h1 class="font-weight-light"><strong>สมัครสมาชิก</strong></h1>

@if ($errors->any())
@php

@endphp
<div class="alert alert-danger">
    <button type="button" class="close" data-dismiss="alert">×</button>
    Check the following errors :( {{$errors->first()}}
</div>
@endif
              <form class="pt-3" method="POST" action="{{ route('register.post') }}">

                @csrf

                  <div class="form-group">
                    <label class="my-1 d-flex align-items-center" style="font-size: 14px;" for="role">  First Name <span class="ml-auto"></span></label>
                    <input id="token" type="hidden" class="form-control form-control-lg" style="border-radius: 10px;"  name="token" value="{{$gettoken}}" required >

                    <input id="fname" type="text" class="form-control form-control-lg" style="border-radius: 10px;" placeholder="First Name"  name="fname"  required>
                    @if ($errors->has('fname'))
                    <span class="text-danger">{{ $errors->first('fname') }}</span>
                @endif
                  </div>
                  <div class="form-group">
                    <label class="my-1 d-flex align-items-center" style="font-size: 14px;" for="role">  Last Name <span class="ml-auto"></span></label>
                    <input id="lname" type="text" style="border-radius: 10px;" class="form-control  @error('password') is-invalid @enderror"  placeholder="Last Name" name="lname" required>
                    @if ($errors->has('lname'))
                    <span class="text-danger">{{ $errors->first('lname') }}</span>
                @endif
                  </div>

                  <div class="form-group">
                    <label class="my-1 d-flex align-items-center" style="font-size: 14px;" for="role"> Department <span class="ml-auto"></span></label>
                    <input id="department" type="text" style="border-radius: 10px;" class="form-control"   placeholder="Department" name="department" required>
                    @if ($errors->has('dep'))
                    <span class="text-danger">{{ $errors->first('dep') }}</span>
                @endif
                  </div>


                  <div class="form-group">
                    <label class="my-1 d-flex align-items-center" style="font-size: 14px;" for="role"> E-MAIL <span class="ml-auto"></span></label>
                    <input id="email" type="email" class="form-control form-control-lg" style="border-radius: 10px;" placeholder="Email"  name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                    @if ($errors->has('email'))
                    <span class="text-danger">{{ $errors->first('email') }}</span>
                @endif
                  </div>
                  <div class="form-group">
                    <label class="my-1 d-flex align-items-center" style="font-size: 14px;" for="role"> Password <span class="ml-auto"></span></label>


                    <input id="password" type="password" style="border-radius: 10px;" class="form-control  @error('password') is-invalid @enderror"  placeholder="Password" name="password" required autocomplete="current-password">

                    @if ($errors->has('password'))
                    <span class="text-danger">{{ $errors->first('password') }}</span>
                @endif
                  </div>

                  <div class="form-group">
                    <label class="my-1 d-flex align-items-center" style="font-size: 14px;" for="role"> Confirm Password <span class="ml-auto"></span></label>
                    <input id="password_confirmation" type="password" name="password_confirmation"  style="border-radius: 10px;" class="form-control  @error('password') is-invalid @enderror"   required placeholder="Confirm Password" required="required">
                    @if ($errors->has('password_confirmation'))
                    <span class="text-danger">{{ $errors->first('password_confirmation') }}</span>
                @endif
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
