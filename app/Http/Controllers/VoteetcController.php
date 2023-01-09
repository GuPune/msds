<?php

namespace App\Http\Controllers;

use App\Models\FactVote;
use App\Models\Headvote;
use App\Models\Vote;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\CoreFunction\Datatable;


class VoteetcController extends Controller
{
    //

    public function chud()
    {
        $getauth = Auth::user()->period;
        $getvote = Vote::where('period',$getauth)->where('type','1')->get();
        $gethead = Headvote::where('period',$getauth)->where('type','1')->first();
        $getvoteuser = FactVote::where('user_id',Auth::user()->id)->where('headvotes_id',$gethead->id)->first();

        $counts = FactVote::all()->count();

        $datas = [];

        foreach ($getvote as $index => $getvotes) {

$datas[$index]['id'] = $getvotes->id;
$datas[$index]['image'] = $getvotes->image;
$datas[$index]['sequence'] = $getvotes->sequence;
$datas[$index]['des'] = $getvotes->des;
$datas[$index]['type'] = $getvotes->type;
$datas[$index]['period'] = $getvotes->period;



$getvotecount = FactVote::where('headvotes_id',$gethead->id)->count();
$getvotecount_id = FactVote::where('headvotes_id',$gethead->id)->where('votes_id',$getvotes->id)->count();


$datazone = Datatable::vote($getvotecount,$getvotecount_id);
$datas[$index]['vote'] = $datazone;
$datas[$index]['votea'] = 20;
$datas[$index]['voteb'] = 80;
        }



        $abc = collect($datas);




        return view('pages.chud')->with('vote',$getvote)->with('headvote',$gethead)->with('uservote',$getvoteuser)->with('abc',$abc);
    }

    public function store(Request $request)
    {


        $authid = Auth::user()->id;
        $voteid = $request->vote_id;
        $headvotes_id = $request->headid;
        $findvote = FactVote::where('user_id',$authid)->where('headvotes_id',$headvotes_id)->first();

        if($findvote){ /// insert
            $updatecontent = FactVote::where('user_id',$authid)->where('headvotes_id',$headvotes_id)->update([
                'user_id' => $authid,
                'headvotes_id' => $headvotes_id,
                'votes_id' => $voteid,
            ]);

            return response()->json([
                'msg_return' => 'ลบสำเร็จ',
                'code_return' => 1,
            ]);

        }else {
            $inse = FactVote::create([
                'user_id' => $authid,
                'headvotes_id' => $headvotes_id,
                'votes_id' => $voteid,
            ]);
            return response()->json([
                'msg_return' => 'ลบสำเร็จ',
                'code_return' => 1,
            ]);

        }


    }




    public function idol()
    {
        $getauth = Auth::user()->period;
        $getvote = Vote::where('period',$getauth)->where('type','2')->get();
        $gethead = Headvote::where('period',$getauth)->where('type','2')->first();

        return view('pages.idol')->with('vote',$getvote)->with('headvote',$gethead);
    }

}
