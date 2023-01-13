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
        // $getauth = Auth::user();
        $getvote = Vote::where('type','1')->get();
        $gethead = Headvote::where('type','1')->first();



        $getvoteuser = FactVote::where('user_id',Auth::user()->id)->where('headvotes_id',$gethead->id)->first();

        $datavote = [];
        $datavote['user_id'] = 0;
        $datavote['headvotes_id'] = 0;
        $datavote['votes_id'] = 0;
        if($getvoteuser){
            $datavote = [];
            $datavote['user_id'] = $getvoteuser->user_id;
            $datavote['headvotes_id'] = $getvoteuser->headvotes_id;
            $datavote['votes_id'] = $getvoteuser->votes_id;

        }



        $counts = FactVote::all()->count();

        $datas = [];

        foreach ($getvote as $index => $getvotes) {

$datas[$index]['id'] = $getvotes->id;
$datas[$index]['image'] = $getvotes->image;
$datas[$index]['sequence'] = $getvotes->sequence;
$datas[$index]['des'] = $getvotes->des;
$datas[$index]['type'] = $getvotes->type;
$datas[$index]['name'] = $getvotes->name;
$datas[$index]['name_des'] = $getvotes->name_des;

$getvotecount = FactVote::where('headvotes_id',$gethead->id)->count();
$getvotecount_id = FactVote::where('headvotes_id',$gethead->id)->where('votes_id',$getvotes->id)->count();


$datazone = Datatable::vote($getvotecount,$getvotecount_id);
$datas[$index]['vote'] = $datazone;



$per = 100 - $datazone;
$datas[$index]['perd'] = $per;

        }

        $abc = collect($datas);



        return view('pages.chud')->with('vote',$getvote)->with('headvote',$gethead)->with('abc',$abc)->with(compact('datavote'));
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

        $getvotesolo = Vote::where('type','2')->where('group_id','1')->get();
        $getvotegroup = Vote::where('type','3')->where('group_id','2')->get();

        $getheadsolo = Headvote::where('type','2')->first();
        $getheadgroup = Headvote::where('type','3')->first();


        $getvoteusersolo = FactVote::where('user_id',Auth::user()->id)->where('headvotes_id',$getheadsolo->id)->first();


        $getvoteusergroup = FactVote::where('user_id',Auth::user()->id)->where('headvotes_id',$getheadgroup->id)->first();


        $datavotesolo = [];
        $datavotesolo['user_id'] = 0;
        $datavotesolo['headvotes_id'] = 0;
        $datavotesolo['votes_id'] = 0;

        $datavotegroup = [];
        $datavotegroup['user_id'] = 0;
        $datavotegroup['headvotes_id'] = 0;
        $datavotegroup['votes_id'] = 0;

        if($getvoteusersolo){
            $datavotesolo = [];
            $datavotesolo['user_id'] = $getvoteusersolo->user_id;
            $datavotesolo['headvotes_id'] = $getvoteusersolo->headvotes_id;
            $datavotesolo['votes_id'] = $getvoteusersolo->votes_id;
        }

        if($getvoteusergroup){
            $datavotegroup = [];
            $datavotegroup['user_id'] = $getvoteusergroup->user_id;
            $datavotegroup['headvotes_id'] = $getvoteusergroup->headvotes_id;
            $datavotegroup['votes_id'] = $getvoteusergroup->votes_id;
        }




        $counts = FactVote::all()->count();
        $datas = [];
        $datasgroup = [];
        foreach ($getvotesolo as $index => $getvotessolo) {
$datas[$index]['id'] = $getvotessolo->id;
$datas[$index]['image'] = $getvotessolo->image;
$datas[$index]['sequence'] = $getvotessolo->sequence;
$datas[$index]['des'] = $getvotessolo->des;
$datas[$index]['type'] = $getvotessolo->type;
$datas[$index]['period'] = $getvotessolo->period;
$datas[$index]['name'] = $getvotessolo->name;
$getvotecount = FactVote::where('headvotes_id',$getheadsolo->id)->count();
$getvotecount_id = FactVote::where('headvotes_id',$getheadsolo->id)->where('votes_id',$getvotessolo->id)->count();
$datazone = Datatable::vote($getvotecount,$getvotecount_id);
$datas[$index]['vote'] = $datazone;
$per = 100 - $datazone;
$datas[$index]['perd'] = $per;
}


foreach ($getvotegroup as $index => $getvotegroups) {
    $datasgroup[$index]['id'] = $getvotegroups->id;
    $datasgroup[$index]['image'] = $getvotegroups->image;
    $datasgroup[$index]['sequence'] = $getvotegroups->sequence;
    $datasgroup[$index]['des'] = $getvotegroups->des;
    $datasgroup[$index]['type'] = $getvotegroups->type;
    $datasgroup[$index]['period'] = $getvotegroups->period;
    $datasgroup[$index]['name'] = $getvotegroups->name;

    $getvotecount = FactVote::where('headvotes_id',$getvotegroups->id)->count();
    $getvotecount_id = FactVote::where('headvotes_id',$getvotegroups->id)->where('votes_id',$getvotegroups->id)->count();
    $datazone = Datatable::vote($getvotecount,$getvotecount_id);
    $datasgroup[$index]['vote'] = $datazone;
    $per = 100 - $datazone;
    $datasgroup[$index]['perd'] = $per;
    }

        $abc = collect($datas);

        $group = collect($datasgroup);



        return view('pages.idol')->with('vote',$getvotesolo)->with('headvote',$getheadsolo)->with('headvotegroup',$getheadgroup)->with('abc',$abc)->with('group',$group)->with(compact('datavotesolo','datavotegroup'));
    }


}
