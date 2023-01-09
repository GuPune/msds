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


    public static function vote($total,$vote_user)
    {


if($vote_user == 0){
    return 0;
}

$percent = ($vote_user * 100) / $total;



return $percent;
    }









}
