<?php

namespace App\Exports;

use App\CoreFunction\Datatable;
use App\Models\FactVote;
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

        \Log::info($this->st);

        if($this->st == '1'){

            $reportReturn = \DB::table('fact_votes as fsc')
            ->select(
                \DB::Raw('count(*) as total'),'dsc.image','dsc.des','fsc.votes_id','dsc.name'
            )->leftjoin('votes as dsc','fsc.votes_id','=','dsc.id')
            ->where('dsc.type','1')
            ->where('dsc.group_id','1')
            ->groupBy('fsc.votes_id')->orderby('total','desc')->get();
            $type = '1';
        }
        if($this->st == '2'){

            $reportReturn = \DB::table('fact_votes as fsc')
            ->select(
                \DB::Raw('count(*) as total'),'dsc.image','dsc.des','fsc.votes_id','dsc.name'
            )->leftjoin('votes as dsc','fsc.votes_id','=','dsc.id')
            ->where('dsc.type','2')
            ->where('dsc.group_id','1')
            ->groupBy('fsc.votes_id')->orderby('total','desc')->get();
            $type = '2';
        }
        if($this->st == '3'){

            $reportReturn = \DB::table('fact_votes as fsc')
            ->select(
                \DB::Raw('count(*) as total'),'dsc.image','dsc.des','fsc.votes_id','dsc.name'
            )->leftjoin('votes as dsc','fsc.votes_id','=','dsc.id')
            ->where('dsc.type','2')
            ->where('dsc.group_id','2')
            ->groupBy('fsc.votes_id')->orderby('total','desc')->get();
            $type = '3';
        }




    $pert = collect($reportReturn)->map(function($x){ return (array) $x; })->toArray();




$max = 0;
$datas = [];
$labels = [];
$data = [];
foreach ($pert as $key => $regroup) {
    $datas[$key]['id'] = $key+1;
    $datas[$key]['total'] = $regroup['total'];
    $datas[$key]['name'] = $regroup['name'];
    $datas[$key]['des'] = $regroup['des'];
    $labels[$key] = $regroup['name'];
    $data[$key] = $regroup['total'];

    $max = FactVote::where('headvotes_id',$type)->count();

    $getvotecount_id = FactVote::where('headvotes_id',$type)->where('votes_id',$regroup['votes_id'])->count();
    $datazone = Datatable::vote($max,$getvotecount_id);
    $datas[$key]['vote'] = $datazone;

}

$s = collect($datas);
        return $s;

    }

    public function headings(): array
    {
        return ["ลำดับ", "ทั้งหมด", "ชื่อ","รายละเอียด","เปอร์เซ็น"];
    }
}
