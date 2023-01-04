<div class="row" style="font-family:Mitr;">
    <div class="col-4 text-center text-white" style="padding-top:1%;">
      <a href="#"><img src="/cms/images/msd-logo.svg" style="height: auto; width: 100px;"></a>
    </div>
    <div class="col-5 text-white" style="padding-top:1%;">
      <a href="#"><i class="fa fa-user-circle fa-2x" aria-hidden="true"></i>
        @if(Auth::guard('admin')->check())
        {{Auth::user()->name}}
        @endif
        </a>
    </div>
    <div class="col-3 text-center text-white logot">

      <a href="{{ route('logout.front') }}">Logout</a>
    </div>
  </div>
<style>


    @media (min-width:320px)  {
        .logot{
            padding-top:3.5%;
        }

     }
@media (min-width:480px)  {
    .logot{
            padding-top:3%;
        }


 }



 @media (min-width:600px)  {
    .logot{
        padding-top: 1.7%;
    }

  }
@media (min-width:801px)  {
    .logot{
        padding-top: 1.7%;
    }

}

@media (min-width:1024px) {
    .logot{
        padding-top: 1.7%;
    }
 }
@media (min-width:1281px) {
  .logot{
        padding-top: 1.7%;
    }
 }

    </style>
