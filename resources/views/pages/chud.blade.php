
@extends('layouts.apps3', ['page' => 'chud'])
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
    left: 50%;
    margin-top: -25px;
    margin-left: -65px;
}
    </style>
<div class="row">
<div class="col-2 col-md-4" style="padding-top: 5px;padding-bottom: 5px">

    </div>
    <div class="col-8 col-md-4" style="padding-top: 5px;padding-bottom: 5px">
        <div class="card-body">

            <p style="text-align: center;">{{$headvote->title}}</p>
          </div>
        </div>
        <div class="col-2 col-md-4" style="padding-top: 5px;padding-bottom: 5px">

            </div>
        </div>
<div class="row">

    @foreach($vote as $key => $rs)
    <div class="col-4 col-md-4" style="padding-top: 5px;padding-bottom: 5px">
<div class="card">
    <img class="card-img-top" src="/public/product/{{$rs->image}}" alt="Card image cap">
</div>
</div>
    @endforeach

  </div>
<br>




@endsection


