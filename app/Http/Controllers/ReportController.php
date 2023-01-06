<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\UsersExport;
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
    public function reportvote()
    {
        return view('backend.reportvote');
    }
    public function export($y)
    {

        return Excel::download(new UsersExport($y), 'report.xlsx');
    }



}
