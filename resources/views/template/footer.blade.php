
@php
$aaa = Session::get('path');


use App\Models\System;
$b = System::where('period',$aaa)->first();
$a = [];

$ldate = date('Y-m-d H:i:s');
@endphp
@if($b)
@if(($ldate > $b->start) && ($b->end > $ldate))
    <div class="row" style="margin-bottom:2%; font-family:Mitr;">
        {{-- <div class="col-4 text-center text-white" style="padding-top:1%;">
          <a href="#"> <img src="/button-15389.png" alt="buttonpng" border="0" class="ima"/><br>HOME</a>
        </div> --}}
        <div class="col-4 text-center text-white" style="padding-top:1%;">
          <a href="https://kahoot.it" target="_blank"><img src="/THE WALL.png" alt="buttonpng" border="0" class="ima"/></a>
        </div>
        <div class="col-4 text-center text-white" style="padding-top:1%;">
          <a href="/dash/qafirst"><img src="/Q_A.png" alt="buttonpng" border="0" class="ima"/></a>
        </div>
        <div class="col-4 text-center text-white" style="padding-top:1%;">
          <a href="/dash/votefirst"><img src="/VOTE.png" alt="buttonpng" border="0" class="ima"/></a>
        </div>
      </div>

@endif


@else

@endif


