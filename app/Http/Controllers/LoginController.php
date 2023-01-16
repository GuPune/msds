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



                $getauth = Auth::guard('web')->user();
                if($getauth){
 return redirect()->route('twostep');
                }

        return view('auth.login')->with(compact('gettoken'));
    }

    public function customLogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $remember = request('remember');





        $getperiod = System::where('token',$request->token)->first();
        if($getperiod){
                if($getperiod->status == 'C'){
                    return redirect()->back()->withErrors(['msg' => 'The system is not available yet.']);
                }
        }


        $request->merge(["period"=>$getperiod->period]);
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials,$remember)) {
            $a = Auth::user();
            $findcheckin = Checkin::where('user_id',$a->id)->first();
           $updatetoken = User::find($a->id)->update(['token' => $request->token]);
            $save = Checkin::create([
                'user_id' => $a->id,
                'period' => $getperiod->period
            ]);
            $gettoken = $getperiod->period;

            $request->session()->put('path', $getperiod->period);






            return view('pages.first')->with(compact('gettoken'));
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

$checkemail = User::where('email',$request->email)->first();

if($checkemail){
    return redirect()->back()->withErrors(['msg' => 'The email has already been taken.']);
}
    $adsuser = User::create([
        "fname" => $request->fname,
        "lname" => $request->lname,
        "password" => $request->password,
        "dep" => $request->department,
        "email" => $request->email,
        "is_admin" => 0,
    ]);


    if($getperiod->period == 'E'){
        $gettoken = $getperiod->token;
       // return view('loginhome')->with(compact('gettoken'));
            return redirect()->route('loginhome')->with('success','User created successfully');
    }


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
    ])->with('success','User created successfully');
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

    public function logout()
    {
        //


    $getauth = Auth::guard('web')->user();
    $gettoken = $getauth->token;
    $getperi = System::where('token',$getauth->token)->first();



    if($getperi->period == 'E'){
  //      return redirect()->route('login.home ');
  Auth::guard('web')->logout();
        return redirect('/');

    }

    Auth::guard('web')->logout();
return redirect()->route('login', [
    'token' => $gettoken,
]);
     //  return view('auth.login')->with(compact('gettoken'));
    }


    public function home()
    {
        //




return view('welcome')->with(compact('gettoken'));



    }

}
