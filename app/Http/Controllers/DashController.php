<?php

namespace App\Http\Controllers;

use App\Models\Carosel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */





    public function index(Request $request)
    {


        //


        return view('pages.first');
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

    public function dashboard()
    {
        //
     //   $gettoken = $token;

$a = Auth::user();


        return view('pages.first');
    }

    public function checkin()
    {
        //
     //   $gettoken = $token;

$a = Auth::user();





    //    return view('pages.first');
    }

    public function home(Request $request)
    {
        //
     //   $gettoken = $token;

     dd(Auth::user());



     if(!Auth::user()){
        $session_data = $request->session()->get('id');
        $user = User::find($session_data);
        if(!$user){
            return redirect('/');
        }
        if($user->token == 'a3'){
            return redirect('/');
        }
        if($user->token == 'fgq5123yh47y34ujsf1'){
            return redirect()->route('login', [
                'token' => 'fgq5123yh47y34ujsf1',
            ]);
        }
        if($user->token == 'fgq5123yh47y3441245'){
            return redirect()->route('login', [
                'token' => 'fgq5123yh47y3441245',
            ]);
        }

     }





     $getcal = Carosel::orderBy('sequence', 'asc')->get();
        return view('pages.two')->with('item',$getcal);
    }


}
