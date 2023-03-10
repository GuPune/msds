<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Support\Facades\DB;

class UsersExport implements FromCollection,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */

    function __construct($y) {
        $this->st = $y;

 }
    public function collection()
    {

        // $type = DB::table('users')->select('id','fname','lname','dep','email');
        // if($this->st == 'D'){
        // $type->where('period',$this->st);
        // }
        // if($this->st == 'N'){
        //     $type->where('period',$this->st);
        // }


        $users = User::select("users.id","fname","lname","email","dep", DB::raw("count(*) as total"),"checkin.created_at")
        ->leftJoin('checkin', 'users.id', '=', 'checkin.user_id')
        ->where('checkin.period',$this->st)
        ->groupBy('users.id','users.fname','users.lname','users.email','users.dep')
        ->get();

        return $users;

    }

    public function headings(): array
    {
        return ["ลำดับ", "ชื่อ", "นามสกุล","อีเมล","แผนก","จำนวนครั้งที่เข้าระบบ","เวลาล่าสุด"];
    }
}
