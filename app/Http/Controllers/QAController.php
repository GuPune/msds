<?php

namespace App\Http\Controllers;

use App\Models\FactQA;
use App\Models\QA;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QAController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        return view('pages.qafirst');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        $ldate = date('H:i:s');

//         รอบที่ 1 : ช่วง 9.00-10.00
// รอบที่ 2 : ช่วง 13.00-15.00
$first1 = '09:00:00';
$last1 = '10:00:00';
$first2 = '13:00:00';
$last2 = '15:00:00';
$type = 'E';
if(($ldate > $first1) && ($ldate < $last1)){
    $type = 'D';
}
if(($ldate > $first2) && ($ldate < $last2)){
    $type = 'N';
}

        $auth = Auth::user()->id;
        // if($ldate )
        $save = QA::create([
            "message" => $request->message,
            "time" => $ldate,
            "period" => $type,
        ]);

        $saveqa = FactQA::create([
            "user_id" => $auth,
            "qa_id" => $save->id,
        ]);



        return response()->json([
            'code_return' => 200,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
