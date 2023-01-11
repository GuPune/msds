<div class="row" style="font-family:Mitr;">
    <div class="col-4 text-center text-white" style="padding-top:1%;">
      <a href="#"><img src="/cms/images/msd-logo.svg" class="imaghead"></a>
    </div>
    <div class="col-5 text-white" style="padding-top:1%;">
      <a href="#" class="ffasd"><i class="fa fa-user-circle fa-2x" aria-hidden="true"></i>
        @if(Auth::guard('web')->check())
        {{Auth::user()->fname}}
        @endif
        </a>
    </div>
    <div class="col-3 text-white logot">
      <a href="{{ route('logout.front') }}" class="logoutee" >Logout</a>
    </div>
  </div>
<style>


    @media (min-width:320px)  {

        .ffasd{
            font-size: 10px;
        }
        .imaghead{
            height: auto;
            width: 50px;
        }
        .logoutee{
            font-size: 13px;
        }

        .logot{
        padding-top: 1.4%;
    }

     }
@media (min-width:480px)  {
    .logot{
            padding-top:1%;
        }


 }

 @media (min-width:600px)  {
    .logot{
        padding-top: 1%;
    }

  }
@media (min-width:801px)  {
    .logot{
        padding-top: 1%;
    }

}

@media (min-width:1024px) {
    .logot{
        padding-top: 1.7%;
    }

    .ffasd{
            font-size: 17px;
        }
        .imaghead{
            height: auto;
            width: 100px;
        }
        .logoutee{
            font-size: 17px;
        }

 }
@media (min-width:1281px) {
  .logot{
        padding-top: 1.7%;
    }

    .imaghead{
            height: auto;
            width: 100px;
    }

    .ffasd{
            font-size: 20px;
        }

        .logoutee{
            font-size: 20px;
        }

 }

    </style>
