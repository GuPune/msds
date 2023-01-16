<?php

namespace App\Http\Controllers;

use App\Models\System;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;
use Mail;
use App\Mail\DemoMail;

class ResetPasswordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //






        return view('resetpassword');
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




$checkemail = User::where('email',$request->email)->first();

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


        if($request->path == '/'){
            $getpath = System::where('path',$request->path)->first();
            $gettoken = $getpath->token;
            return redirect()->route('loginhome')->with('success','เจ้าหน้าที่จะส่งEmail แจ้งให้ภายหลัง');
        }
        if($request->path == '/login/a1'){
            $getpath = System::where('path',$request->path)->first();
            return redirect()->route('login', [
                'token' => $getpath->token,
            ])->with('success','เจ้าหน้าที่จะส่งEmail แจ้งให้ภายหลัง');
        }
        if($request->path == '/login/a2'){
            $getpath = System::where('path',$request->path)->first();
            return redirect()->route('login', [
            'token' => $getpath->token,
        ])->with('success','เจ้าหน้าที่จะส่งEmail แจ้งให้ภายหลัง');

        }


        return back()->with('success', 'Resetpassword successfully');

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

$input['password'] = Hash::make($request->password);
        // $updateuser = User::find($request->id);
        // $updateuser->resetpassword = $request->password;
        // $updateuser->status = "";
        // $updateuser->password = Hash::make('123456');
        // $updateuser->save();

        $user = User::where('id',$request->id)->update([
            'password' =>  $input['password'],
            'status' => "",
            'resetpassword' => $request->password,
        ]);
        $email = User::where('id',$request->id)->first();
        $mailData = [
            'title' => 'Mail from MSD',
            'body' => 'รหัสผ่านของคุณ',
            'fname' => $email->fname,
            'pass' => $email->resetpassword
        ];






        Mail::to($email->email)->send(new DemoMail($mailData));

        return response()->json([
            'msg_return' => 'บันทึกสำเร็จ',
            'code' => 200,
        ]);
    }

}
