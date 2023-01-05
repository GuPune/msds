<?php

namespace App\CoreFunction;


use Illuminate\Database\Eloquent\Model;
use App;
use App\Models\User;
use DB;
use Log;




class Datatable extends Model
{

    public static function userdata($request = null)
    {

$data = User::all();

return $data;
    }









}
