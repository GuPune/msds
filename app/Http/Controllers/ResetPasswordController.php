<?php

namespace App\Http\Controllers;

use App\Models\System;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
class ResetPasswordController extends Controller
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


        return view('resetpassword')->with(compact('gettoken'));
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

        $checktoken = System::where('token',$request->token)->first();
$checkemail = User::where('email',$request->email)->where('period',$checktoken->period)->first();

if(!$checkemail){
    return redirect()->back()->withErrors(['msg' => 'ไม่เจอ Email ดังกล่าว ติดต่อเจ้าหน้าที่']);
}

$bytes = openssl_random_pseudo_bytes(16 * 2);
$new_token = substr(str_replace(array('/', '+', '='), '', base64_encode($bytes)), 0, 16);
$new_token .= '_' . base64_encode(date('Y-m-d H:i:s'));
DB::table('password_resets')->insert([
    'email' => $request->email,
    'token' => $new_token,
    'created_at' => Carbon::now()
]);

$updateuser = User::find($checkemail->id);
$updateuser->status = 'R';
$updateuser->save();

        return redirect()->route('login', [
            'token' => $request->token,
        ])->with('success','เจ้าหน้าที่จะส่งEmail แจ้งให้ภายหลัง');
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
    public function reset(Request $request)
    {



        $updateuser = User::find($request->id);
        $updateuser->resetpassword = $request->password;
        $updateuser->status = "";
        $updateuser->save();

        return response()->json([
            'msg_return' => 'บันทึกสำเร็จ',
            'code' => 200,
        ]);
    }

}
