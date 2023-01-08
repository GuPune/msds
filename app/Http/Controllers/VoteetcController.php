<?php

namespace App\Http\Controllers;

use App\Models\Headvote;
use App\Models\Vote;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class VoteetcController extends Controller
{
    //

    public function chud()
    {
        $getauth = Auth::user()->period;
        $getvote = Vote::where('period',$getauth)->where('type','1')->get();
        $gethead = Headvote::where('period',$getauth)->where('type','1')->first();

        return view('pages.chud')->with('vote',$getvote)->with('headvote',$gethead);
    }


    public function idol()
    {
        $getauth = Auth::user()->period;
        $getvote = Vote::where('period',$getauth)->where('type','2')->get();
        $gethead = Headvote::where('period',$getauth)->where('type','2')->first();

        return view('pages.idol')->with('vote',$getvote)->with('headvote',$gethead);
    }

}
