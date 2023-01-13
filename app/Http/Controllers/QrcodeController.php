<?php

namespace App\Http\Controllers;

use App\Models\System;
use Illuminate\Http\Request;

class QrcodeController extends Controller
{
    //
    public function index()
    {

        $system = System::all();
return view('qrcode')->with('sys',$system);
    }
}
