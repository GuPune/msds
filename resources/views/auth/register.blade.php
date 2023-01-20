
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  @include('templateadmin.styles')
</head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<style>
    .bocdy  {
        background-image: url("http://139.5.146.235/Art.png");
      /* background-image: url("https://cdn.vuetifyjs.com/images/backgrounds/vbanner.jpg"); */

    }
    html {
	-webkit-text-size-adjust: none;
	touch-action: manipulation;
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

<span class="text-danger">กรุณากรอกเป็นตัวอักษรภาษาอังกฤษพิมพ์ใหญ่ และตัวเลขเท่านั้น</span>
              <form class="pt-3" method="POST" action="{{ route('register.post') }}" onsubmit="return validateForm();">

                @csrf

                  <div class="form-group">
                    <label class="my-1 d-flex align-items-center" style="font-size: 14px;" for="role">  First Name <span class="ml-auto"></span></label>
                    <input id="token" type="hidden" class="form-control form-control-lg" style="border-radius: 10px;"  name="token" value="{{$gettoken}}" required >

                    <input id="fname" type="text" class="form-control form-control-lg" style="border-radius: 10px;" placeholder="First Name"  name="fname"  required oninput="validateAlpha(event);">
                    @if ($errors->has('fname'))
                    <span class="text-danger">{{ $errors->first('fname') }}</span>
                @endif
                  </div>
                  <div class="form-group">
                    <label class="my-1 d-flex align-items-center" style="font-size: 14px;" for="role">  Last Name <span class="ml-auto"></span></label>
                    <input id="lname" type="text" style="border-radius: 10px;" class="form-control  @error('password') is-invalid @enderror"  placeholder="Last Name" name="lname" required oninput="validateAlphalname(event);">
                    @if ($errors->has('lname'))
                    <span class="text-danger">{{ $errors->first('lname') }}</span>
                @endif
                  </div>

                  <div class="form-group">
                    <label class="my-1 d-flex align-items-center" style="font-size: 14px;" for="role"> Department <span class="ml-auto"></span></label>
                    <input id="department" type="text" style="border-radius: 10px;" class="form-control"   placeholder="Department" name="department" required oninput="validateAlphadep(event);">
                    @if ($errors->has('dep'))
                    <span class="text-danger">{{ $errors->first('dep') }}</span>
                @endif
                  </div>


                  <div class="form-group">
                    <label class="my-1 d-flex align-items-center" style="font-size: 14px;" for="role"> E-MAIL <span class="ml-auto text-danger">ตัวอย่าง msd@merck.com</span></label>
                    <input id="email" type="email" class="form-control form-control-lg" style="border-radius: 10px;" placeholder="Email"  name="email" value="{{ old('email') }}" required autocomplete="email" autofocus oninput="handleInput(event);">
                    @if ($errors->has('email'))
                    <span class="text-danger">{{ $errors->first('email') }}</span>
                @endif
                  </div>
                  <div class="form-group">
                    <label class="my-1 d-flex align-items-center" style="font-size: 14px;" for="role"> Password <span class="ml-auto"></span></label>
                    <input id="password" type="password" style="border-radius: 10px;" class="form-control  @error('password') is-invalid @enderror"  placeholder="Password" name="password" required autocomplete="current-password" oninput="validateAlphaPass(event);">
                    @if ($errors->has('password'))
                    <span class="text-danger">{{ $errors->first('password') }}</span>
                @endif
                  </div>

                  <div class="form-group">
                    <label class="my-1 d-flex align-items-center" style="font-size: 14px;" for="role"> Confirm Password <span class="ml-auto"></span></label>
                    <input id="password_confirmation" type="password" name="password_confirmation"  style="border-radius: 10px;" class="form-control  @error('password') is-invalid @enderror"   required placeholder="Confirm Password" required="required" oninput="validateAlphaPassC(event);">
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
<style type="text/css">
    .help-block-bd,.help-block-tel,.help-block-email,.help-block-surname,.help-block-gende,.help-block-name{
        display: none;
        color: red;
        text-align: center;
    }
</style>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script type="text/javascript">


function alphaOnly(event) {
  var key = event.keyCode;
  return ((key >= 65 && key <= 90) || key == 8);
};

function validateAlpha(e){
    var ss = e.target.selectionStart;
   var se = e.target.selectionEnd;
   e.target.value = e.target.value.toUpperCase();
    var textInput = document.getElementById("fname").value;
    textInput = textInput.replace(/[^A-Z0-9]/g, "");
    document.getElementById("fname").value = textInput;
}

function validateAlphalname(e){
    var ss = e.target.selectionStart;
   var se = e.target.selectionEnd;
   e.target.value = e.target.value.toUpperCase();
    var textInput = document.getElementById("lname").value;
    textInput = textInput.replace(/[^A-Z0-9]/g, "");
    document.getElementById("lname").value = textInput;
}

function validateAlphadep(e){
    var ss = e.target.selectionStart;
   var se = e.target.selectionEnd;
   e.target.value = e.target.value.toUpperCase();
    var textInput = document.getElementById("department").value;
    textInput = textInput.replace(/[^A-Z0-9]/g, "");
    document.getElementById("department").value = textInput;
}


function validateAlphaPass(e){
    var ss = e.target.selectionStart;
   var se = e.target.selectionEnd;
   e.target.value = e.target.value.toUpperCase();
    var textInput = document.getElementById("password").value;
    textInput = textInput.replace(/[^A-Z0-9]/g, "");
    document.getElementById("password").value = textInput;
}



function validateAlphaPassC(e){
    var ss = e.target.selectionStart;
   var se = e.target.selectionEnd;
   e.target.value = e.target.value.toUpperCase();
    var textInput = document.getElementById("password_confirmation").value;
    textInput = textInput.replace(/[^A-Z0-9]/g, "");
    document.getElementById("password_confirmation").value = textInput;
}


function handleInput(e) {
   var ss = e.target.selectionStart;
   var se = e.target.selectionEnd;
   e.target.value = e.target.value.toUpperCase();

   var textInput = document.getElementById("email").value;
    textInput = textInput.replace(/[^A-Z0-9.@]/g, "");
    document.getElementById("email").value = textInput;

}

function myFunctionName(){

    alert('ok');
}


function validateForm(){

var email = $('#email').val();

console.log(email);

return true;





}

 </script>
