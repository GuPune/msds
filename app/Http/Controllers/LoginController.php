<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;
use App\Models\Checkin;
use App\Models\User;
use App\Models\System;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($token)
    {
        //
        $gettoken = $token;
        $checkto = System::where('token',$token)->first();

        if(!$checkto){
            return abort(403);
                }

        return view('auth.login')->with(compact('gettoken'));
    }

    public function customLogin(Request $request)
    {

        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        $getperiod = System::where('token',$request->token)->first();
        $request->merge(["period"=>$getperiod->period]);
        $credentials = $request->only('email', 'password','period');

        if (Auth::attempt($credentials)) {

            $a = Auth::user();

            $findcheckin = Checkin::where('user_id',$a->id)->first();

if(!$findcheckin){

   $save = Checkin::create([
                'user_id' => $a->id
            ]);
}



          return redirect()->route('firststep');

        }


        return redirect()->back()->withErrors(['msg' => 'Oppes! You have entered invalid credentials.']);

      //  return redirect("login")->withSuccess('Login details are not valid');
    }

    public function registration($token)
    {


        $gettoken = $token;

        $checkto = System::where('token',$token)->first();

        if(!$checkto){
    return abort(403);
        }
        return view('auth.register')->with(compact('gettoken'));

    }
    public function postRegistration(RegisterRequest $request)
    {




   //   $user = User::create($request->validated());

    //  auth()->login($user);

    $getperiod = System::where('token',$request->token)->first();

$checkemail = User::where('email',$request->email)->where('period',$getperiod->period)->first();

if($checkemail){

    return redirect()->back()->withErrors(['msg' => 'The email has already been taken.']);

}
    $adsuser = User::create([
        "fname" => $request->fname,
        "lname" => $request->lname,
        "password" => $request->password,
        "dep" => $request->department,
        "email" => $request->email,
        "period" => $getperiod->period,
        "is_admin" => 0,
    ]);

    // $table->text('fname')->nullable();
    // $table->text('dep')->nullable();
    // $table->text('lname')->nullable();
    // $table->string('name')->nullable();
    // $table->string('email')->unique();
    // $table->timestamp('email_verified_at')->nullable();
    // $table->string('password');
    // $table->string('period');
    // $table->integer('is_admin');

    // "fname" => "3123"
    // "password" => "123456"
    // "department" => "312"
    // "email" => "rkknoob2@gmail.com"
    // "password_confirmation" => "123456"

    //  return redirect('/')->with('success', "Account successfully registered.");


    //   return redirect()->route('login', [
    //     'token' => $request->token,
    // ]);

    // return redirect()->route('login', [
    //     'token' => 1
    // ]);

    // return redirect()->route('login', [$request->token]);
    // return to_route('login', [$request->token]);


    return redirect()->route('login', [
        'token' => $request->token,
    ]);
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
}
