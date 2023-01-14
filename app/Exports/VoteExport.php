<?php

namespace App\Exports;

use App\Models\Vote;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class VoteExport implements FromCollection,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */

    function __construct($y) {
        $this->st = $y;

 }
 public function collection()
    {

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
