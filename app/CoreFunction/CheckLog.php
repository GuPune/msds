<?php

namespace App\CoreFunction;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;







class CheckLog extends Model
{





    public static function checklo()
    {
        $a = Auth::guard('admin')->user();
        if($a == null){
            return redirect('/admin/login');
        }

    }










}
