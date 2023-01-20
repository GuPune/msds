@extends('layouts.apps')

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
    </style>

{{-- <div class="row mb-3">
    <img src="/wallpaperbetter.jpg" class="img-fluid" alt="Responsive image" style="padding: 10px;">
  </div> --}}

  <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">

        @foreach($item as $key => $rs)
        <li data-target="#carouselExampleIndicators" data-slide-to="{{$key}}"
        @if($key == 0)
        class="active"
        @else
        class=""
        @endif></li>
        @endforeach

    </ol>
    <div class="carousel-inner">
      @foreach($item as $key => $rs)
      <div class="carousel-item {{$key == 0 ? 'active' : '' }}">
          <img src="/public/product/{{$rs->image}}" class="d-block w-100"  alt="...">
      </div>
      @endforeach
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>






@endsection


