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




@media (min-width:320px)  {

    .voteshow{
    width: 240px;
    height: 99px;
}

.desktop{
  display: none;
}

.mobile{
  display: block;
}





}

@media (min-width:425px)  {
    .voteshow{
    width: 270px;
    height: 99px;
}
 }
@media (min-width:480px)  {
    .voteshow{
    width: 335px;
    height: 99px;
}
 }
@media (min-width:600px)  {
    .voteshow{
    width: 515px;
    height: 99px;
}
  }
@media (min-width:801px)  {
    .voteshow{
    width: 515px;
    height: 99px;
}
 }

 @media (min-width:900px) {

.voteshow{
width: 604px;
height: 99px;
}

}
@media (min-width:1025px) {

    .voteshow{
    width: 694px;
    height: 99px;
}

 }
@media (min-width:1281px) {

    .voteshow{
    width: 1166px;
    height: 100px;
}

.mobile{
  display: none;

}

.desktop{
  display: block;
}


}
    </style>

{{-- <div class="row" style="
margin-top: 13rem;
">
    <div class="col-sm-4 col-md-12">

      </div>
      <div class="col-sm-4 col-md-12">
        <a href="/vote/chud">
        <div class="card text-white bg-primary mb-3 mx-auto" style="max-width: 70%;height: 100px;border: 0px;">
          <div class="card-body" style="background-color: #1e2c32;">


            <div class='fullscreenDiv' style="border-style: solid;border-color: #6ee5ef;">
                <div class="center" style="font-size: 20px;">MSD TALENT SHOW</div>
            </div>
          </div>
        </div>
        </a>
      </div>
    <div class="col-sm-4 col-md-12">

    </div>
  </div> --}}
<br>
<br>

<br>

{{-- <div class="row">
    <div class="col-sm-4 col-md-12">

      </div>
      <div class="col-sm-4 col-md-12">
        <a href="/vote/idol">
        <div class="card text-white bg-primary mb-3 mx-auto" style="max-width: 70%;height: 100px;border: 0px;">
          <div class="card-body" style="background-color: #1e2c32;">
            <div class='fullscreenDiv' style="border-style: solid;border-color: #6ee5ef;">
                <div class="center"  style="font-size: 20px;">MSD NEXT IDOL</div>
            </div>
          </div>
        </div>
    </a>
      </div>
    <div class="col-sm-4 col-md-12">

    </div>
  </div> --}}


  <div class="row desktop" style="margin-bottom:2%; font-family:Mitr;">
    <div class="col-12 text-center text-white bg-dsr" style="padding-top:1%;">
      <a href="/vote/chud"><img src="/b1.png" alt="buttonpng" border="0"  height="100px" width="1269px" class="voteshow"/></a>
    </div>
  </div>


  <div class="row desktop" style="margin-bottom:2%; font-family:Mitr;">
    <div class="col-12 text-center text-white bg-dsr" style="padding-top:1%;">
      <a href="/vote/idol"><img src="/b3.png" alt="buttonpng" border="0"  height="100px" width="1269px" class="voteshow"/></a>
    </div>
  </div>




  <div class="row mobile" style="margin-bottom:2%; font-family:Mitr;">
    <div class="col-12 text-center text-white bg-dsr" style="padding-top:1%;">
      <a href="/vote/chud"><img src="/b2.png" alt="buttonpng" border="0"  height="100px" width="1269px" class="voteshow"/></a>
    </div>
  </div>

  <div class="row mobile" style="margin-bottom:2%; font-family:Mitr;">
    <div class="col-12 text-center text-white bg-dsr" style="padding-top:1%;">
      <a href="/vote/idol"><img src="/b4.png" alt="buttonpng" border="0"  height="100px" width="1269px" class="voteshow"/></a>
    </div>
  </div>


@endsection


