<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

class uploadController extends Controller
{
    //

    public function upload(Request $request)
    {
        //




        $random = Str::random(20);



        if ($files = $request->file('product_img')) {
            $destinationPath = 'public/product/'; // upload path
            $profileImage = date('YmdHis').$random. "." . $files->getClientOriginalExtension();
            $files->move($destinationPath, $profileImage);
        }

        if ($files = $request->file('product_vote')) {
            $destinationPath = 'public/product/'; // upload path
            $profileImage = date('YmdHis').$random. "." . $files->getClientOriginalExtension();
            $files->move($destinationPath, $profileImage);
        }




        return response()->json([
            'data' => $profileImage
        ], 200);
    }
}
