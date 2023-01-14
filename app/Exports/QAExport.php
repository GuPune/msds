<?php

namespace App\Exports;

use App\Models\QA;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Support\Facades\DB;


class QAExport implements FromCollection,WithHeadings
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


        $users = QA::select("qa.message","qa.time","users.fname")
        ->leftJoin('factqa', 'qa.id', '=', 'factqa.qa_id')
        ->leftJoin('users', 'users.id', '=', 'factqa.user_id')
        ->where('qa.period',$this->st)
        ->get();
        return $users;

    }

    public function headings(): array
    {
        return ["คำถาม", "เวลา", "ชื่อ"];
    }
}
