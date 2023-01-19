@extends('layouts.apps2')

@section('content')
<style>
.carousel-indicators li {
    width: 10px;
    height: 10px;
    border-radius: 100%;
}
.carousel-indicators {
    bottom: -50px;
}

.fullscreenDiv {

    width: 100%;
    height: auto;
    bottom: 0px;
    top: 0px;
    left: 0;
    position: absolute;
}
.center {
    position: absolute;

    top: 50%;
    left: 42%;
    margin-top: -25px;
    margin-left: -65px;
}
    </style>

<div class="row" style="
margin-top: 13rem;
">
    <div class="col-sm-4 col-md-12">

      </div>
      <div class="col-sm-4 col-md-12">
        <a href="/vote/chud">
        <div class="card text-white bg-primary mb-3 mx-auto" style="max-width: 70%;height: 100px;border: 0px;">
          <div class="card-body" style="background-color: #1e2c32;">


            <div class='fullscreenDiv'>
                <div class="center" style="font-size: 20px;">MSD TALENT SHOW</div>
            </div>
          </div>
        </div>
        </a>
      </div>
    <div class="col-sm-4 col-md-12">

    </div>
  </div>
<br>

<div class="row">
    <div class="col-sm-4 col-md-12">

      </div>
      <div class="col-sm-4 col-md-12">
        <a href="/vote/idol">
        <div class="card text-white bg-primary mb-3 mx-auto" style="max-width: 70%;height: 100px;border: 0px;">
          <div class="card-body" style="background-color: #1e2c32;">


            <div class='fullscreenDiv'>
                <div class="center"  style="font-size: 20px;">MSD NEXT IDOL</div>
            </div>
          </div>
        </div>
    </a>
      </div>
    <div class="col-sm-4 col-md-12">

    </div>
  </div>


@endsection


