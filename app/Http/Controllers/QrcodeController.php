<?php

namespace App\Http\Controllers;

use App\Models\QA;
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

    public function show($id)
    {

$data = QA::find($id);

        return view('pages.qashow')->with('data',$data);

    }
}
