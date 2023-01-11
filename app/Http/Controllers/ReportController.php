<?php

namespace App\Http\Controllers;

use App\CoreFunction\Datatable;
use App\Models\User;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\UsersExport;
use App\Models\FactVote;
use DB;

class ReportController extends Controller
{
    //

    public function reporttotal(Request $request)
    {

        $reportuser = User::all();
        $cou = User::all()->count();

        return view('backend.reporttotal')->with('report',$reportuser)->with('count',$cou);

    }
    public function reportfirst(Request $request)
    {
        $reportuser = User::where('period','D')->get();
        $cou = User::where('period','D')->get()->count();


        return view('backend.reportfirst')->with('report',$reportuser)->with('count',$cou);
    }
    public function reporttwo(Request $request)
    {
        $reportuser = User::where('period','N')->get();
        $cou = User::where('period','N')->get()->count();
        return view('backend.reporttwo')->with('report',$reportuser)->with('count',$cou);
    }
    public function reportqa(Request $request)
    {
        return view('backend.reportqa');
    }
    public function reportvoten()
    {
        return view('backend.reportvoten');
    }
    public function reportvoted(Request $request)
    {
      $type = $request->type;

        $reportReturn = \DB::table('fact_votes as fsc')
        ->select(
            \DB::Raw('count(*) as total'),'dsc.image','dsc.des','fsc.votes_id'
        )->leftjoin('votes as dsc','fsc.votes_id','=','dsc.id')
        ->where('dsc.type',$request->type)
        ->where('dsc.period','D')
        ->groupBy('fsc.votes_id')->orderby('total','desc')->get();


if(!$request->type){
    $reportReturn = \DB::table('fact_votes as fsc')
->select(
    \DB::Raw('count(*) as total'),'dsc.image','dsc.des','fsc.votes_id'
)->leftjoin('votes as dsc','fsc.votes_id','=','dsc.id')
->where('dsc.type','1')
->where('dsc.period','D')
->groupBy('fsc.votes_id')->orderby('total','desc')->get();

$type = '1';
}


$pert = collect($reportReturn)->map(function($x){ return (array) $x; })->toArray();



$datas = [];
$labels = [];
$data = [];
foreach ($pert as $key => $regroup) {
    $datas[$key]['id'] = $key+1;
    $datas[$key]['total'] = $regroup['total'];
    $datas[$key]['image'] = $regroup['image'];
    $datas[$key]['des'] = $regroup['des'];
    $datas[$key]['votes_id'] = $regroup['votes_id'];
    $labels[$key] = $regroup['image'];
    $data[$key] = $regroup['total'];
    $max = FactVote::where('headvotes_id',$type)->count();
    $getvotecount_id = FactVote::where('headvotes_id',$type)->where('votes_id',$regroup['votes_id'])->count();
    $datazone = Datatable::vote($max,$getvotecount_id);
    $datas[$key]['vote'] = $datazone;

}

$s = collect($datas);

if($type == '1'){
    $name = 'ประกวดการแต่งกาย';
}
if($type == '2'){
    $name = 'ประกวดโชว์ไอดอล';
}



        return view('backend.reportvoted')->with('s',$s)->with(compact('labels', 'data','type','name','max'));
    }
    public function export($y)
    {

        return Excel::download(new UsersExport($y), 'report.xlsx');
    }



}
