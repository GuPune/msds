<?php

namespace App\Http\Controllers;

use App\Models\System;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FirstController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request,$token)
    {
        //
       $user = Auth::user();
        if(Auth::user()){

            return redirect()->route('twostep');
        }

       $gettoken = $token;
        $checkto = System::where('token',$token)->first();

    if(!$checkto){
    return abort(403);
    }

        return view('welcome')->with(compact('gettoken'));
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


    public function home(Request $request)
    {
        //
        $system = System::all();
        return view('index')->with('sys',$system);
    }

    public function login(Request $request)
    {
        //



$system = System::where('period','E')->first();
$gettoken = $system->token;
$getauth = Auth::guard('web')->user();

if($getauth){
    return redirect()->route('twostep');
                   }

        return view('loginhome')->with(compact('gettoken'));
    }

}
