<?php

namespace App\Http\Controllers;

use App\CoreFunction\Datatable;
use App\Exports\QAExport;
use App\Models\User;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\UsersExport;

use App\Exports\UsersRegisExport;
use App\Exports\VoteExport;
use App\Models\FactVote;
use App\Models\QA;
use DB;
use Illuminate\Support\Facades\Auth;


class ReportController extends Controller
{
    //

    public function reporttotal(Request $request)
    {


        $a = Auth::guard('admin')->user();
        if(!$a){
        return redirect('/admin/login');
        }
        $reportuser = User::all();
        $cou = User::all()->count();



        return view('backend.reporttotal')->with('report',$reportuser)->with('count',$cou);

    }
    public function reportfirst(Request $request)
    {
        $reportuser = User::where('period','D')->get();


        $cou = User::where('period','D')->get()->count();

        // $datas =  User::select('users.id','users.fname','users.lname','users.dep','users.email','checkin.created_at')
        // ->leftJoin('checkin', 'users.id', '=', 'checkin.user_id')->get()->groupBy(function($data) {
        //     return $data->fname;
        // });

        $users = User::select("users.id","fname","lname","email","dep", DB::raw("count(*) as total"),"checkin.created_at")
        ->leftJoin('checkin', 'users.id', '=', 'checkin.user_id')
        ->where('checkin.period','D')
        ->groupBy('users.id','users.fname','users.lname','users.email','users.dep')
        ->get();




        return view('backend.reportfirst')->with('report',$users)->with('count',$cou);
    }
    public function reporttwo(Request $request)
    {

        $a = Auth::guard('admin')->user();
        if(!$a){
        return redirect('/admin/login');
        }
     //   $reportuser = User::where('period','N')->get();
        $cou = User::where('period','N')->get()->count();


        $users = User::select("users.id","fname","lname","email","dep", DB::raw("count(*) as total"),"checkin.created_at")
        ->leftJoin('checkin', 'users.id', '=', 'checkin.user_id')
        ->where('checkin.period','N')
        ->groupBy('users.id','users.fname','users.lname','users.email','users.dep')
        ->get();


        return view('backend.reporttwo')->with('report',$users)->with('count',$cou);
    }
    public function reportqa(Request $request)
    {

        $a = Auth::guard('admin')->user();
        if(!$a){
        return redirect('/admin/login');
        }

        $type = '';
        if($request->type == 'D'){
            $type = 'D';

        }
        if($request->type == 'N'){
            $type = 'N';
        }

        $qa = QA::where('period',$type)->get();

        return view('backend.reportqa')->with('report',$qa)->with(compact('type'));
    }
    public function reportvoten()
    {
        return view('backend.reportvoten');
    }
    public function reportvoted(Request $request)
    {
        $a = Auth::guard('admin')->user();
        if(!$a){
        return redirect('/admin/login');
        }
      $type = $request->type;

        $reportReturn = \DB::table('fact_votes as fsc')
        ->select(
            \DB::Raw('count(*) as total'),'dsc.image','dsc.des','fsc.votes_id','dsc.name'
        )->leftjoin('votes as dsc','fsc.votes_id','=','dsc.id')
        ->where('dsc.type',$request->type)
        ->groupBy('fsc.votes_id')->orderby('total','desc')->get();



if(!$request->type){
    $reportReturn = \DB::table('fact_votes as fsc')
->select(
    \DB::Raw('count(*) as total'),'dsc.image','dsc.des','fsc.votes_id','dsc.name'
)->leftjoin('votes as dsc','fsc.votes_id','=','dsc.id')
->where('dsc.type','1')
->groupBy('fsc.votes_id','dsc.image')->orderby('total','desc','name')->get();


$type = '1';
}

if($request->type == '3'){

    $reportReturn = \DB::table('fact_votes as fsc')
    ->select(
        \DB::Raw('count(*) as total'),'dsc.image','dsc.des','fsc.votes_id','dsc.name'
    )->leftjoin('votes as dsc','fsc.votes_id','=','dsc.id')
    ->where('dsc.type','3')
    ->where('dsc.group_id','2')
    ->groupBy('fsc.votes_id')->orderby('total','desc')->get();
$type = '3';
}


$pert = collect($reportReturn)->map(function($x){ return (array) $x; })->toArray();




$max = 0;
$datas = [];
$labels = [];
$data = [];
foreach ($pert as $key => $regroup) {
    $datas[$key]['id'] = $key+1;
    $datas[$key]['total'] = $regroup['total'];
    $datas[$key]['image'] = $regroup['image'];
    $datas[$key]['name'] = $regroup['name'];
    $datas[$key]['des'] = $regroup['des'];
    $datas[$key]['votes_id'] = $regroup['votes_id'];
    $labels[$key] = $regroup['name'];
    $data[$key] = $regroup['total'];

    $max = FactVote::where('headvotes_id',$type)->count();

    $getvotecount_id = FactVote::where('headvotes_id',$type)->where('votes_id',$regroup['votes_id'])->count();
    $datazone = Datatable::vote($max,$getvotecount_id);
    $datas[$key]['vote'] = $datazone;

}

$s = collect($datas);



if($type == '1'){
    $name = 'Talent Show';
}
if($type == '2'){
    $name = 'Next Idol';
}
if($type == '3'){
    $name = 'Next Idol Group';
}



        return view('backend.reportvoted')->with('s',$s)->with(compact('labels', 'data','type','name','max'));
    }
    public function export($y)
    {

if($y == 'total'){
    return Excel::download(new UsersRegisExport($y), 'report.xlsx');
}
        return Excel::download(new UsersExport($y), 'report.xlsx');
    }

    public function reportfirstshow($id)
    {


        $a = Auth::guard('admin')->user();
        if(!$a){
        return redirect('/admin/login');
        }
        $users = User::select("user_id","fname","lname","email","dep","checkin.created_at")
        ->leftJoin('checkin', 'users.id', '=', 'checkin.user_id')
        ->where('checkin.user_id',$id)
        ->where('checkin.period','D')
        ->get();


        return view('backend.reportone')->with('users',$users);
    }

    public function reporttwoshow($id)
    {


        $a = Auth::guard('admin')->user();
        if(!$a){
        return redirect('/admin/login');
        }
        $users = User::select("user_id","fname","lname","email","dep","checkin.created_at")
        ->leftJoin('checkin', 'users.id', '=', 'checkin.user_id')
        ->where('checkin.user_id',$id)
        ->where('checkin.period','N')
        ->get();



        return view('backend.reporttwoshow')->with('users',$users);
    }

    public function exportqa($y){



        return Excel::download(new QAExport($y), 'report.xlsx');
    }


    public function exportvote($y){



        return Excel::download(new VoteExport($y), 'report.xlsx');
    }





}
