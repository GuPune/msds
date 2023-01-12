<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class UsersRegisExport implements FromCollection,WithHeadings
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


        $users = User::select("id","fname","lname","email","dep")->get();


        return $users;

    }

    public function headings(): array
    {
        return ["ลำดับ", "ชื่อ", "นามสกุล","อีเมล","แผนก"];
    }
}
