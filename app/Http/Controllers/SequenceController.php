<?php

namespace App\Http\Controllers;

use App\Models\Carosel;
use Illuminate\Http\Request;

class SequenceController extends Controller
{
    //

    public function up(Request $request)
    {


        $sequence_a = Carosel::where('sequence',   $request->no)->first();

        switch($request->name):
            case "cate":
                $sequence_a = Carosel::where('sequence',   $request->no)->first();
                $sequence_b = Carosel::where('sequence', --$request->no)->first();
                break;
        endswitch;

        $sequence_a->sequence = --$sequence_a->sequence;
        $sequence_b->sequence = ++$sequence_b->sequence;
        $sequence_b->save();
        $sequence_a->save();



        return response("success up");

    }

    public function down(Request $request)
    {

        switch($request->name):
            case "cate":
                $sequence_a = Carosel::where('sequence',   $request->no)->first();
                $sequence_b = Carosel::where('sequence', ++$request->no)->first();
                break;
        endswitch;

        $sequence_a->sequence = ++$sequence_a->sequence;
        $sequence_b->sequence = --$sequence_b->sequence;
        $sequence_b->save();
        $sequence_a->save();

        return response("success down");
    }

}
