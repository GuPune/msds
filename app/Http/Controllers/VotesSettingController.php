<?php

namespace App\Http\Controllers;

use App\Models\Vote;
use Illuminate\Http\Request;

class VotesSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {



$vote =  Vote::select('votes.id','votes.image','votes.sequence','votes.des','votes.type','headvotes.title','votes.period')
->leftJoin('headvotes', 'votes.type', '=', 'headvotes.id');

if($request->type){
$vote->where('votes.type',$request->type);
}
if($request->period){
    $vote->where('votes.period',$request->period);
}
if(!$request->period && $request->type){

}
if($request->all() == null){

    $vote->where('votes.period','D')->where('votes.type','1');
}
$a = $vote->get();
// $min = Carosel::min('sequence');
// $max = Carosel::max('sequence');
// $count = Carosel::get()->count();
$count = $vote->get()->count();
$min = $vote->get()->min('sequence');
$max = $vote->get()->max('sequence');

        return view('backend.usersettingvotes')->with('vote',$a)->with('min',$min)->with('max',$max)->with('count',$count)->with('type',$request->type)->with('period',$request->period);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $image_display = url('img/image.jpg');
        $data = [
            'image_display' => $image_display,
        ];



        return view('backend.createsettingvotes')->with($data);
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
\Log::info($request->all());




        $this->validate($request, [
            'image' => 'required',
        ]);


        $max = Vote::where('type',$request->type)->where('period',$request->period)->max('sequence');
        $shell_category = Vote::create([
            "image" => $request->image,
            "sequence" => $max+1,
            "des" => $request->des,
            "type" => $request->type,
            "period" => $request->period,
        ]);



        return redirect()->route('votess.index')->with('success','Vote created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //

        $editvote = Vote::find($id);

        return view('backend.editsettingvotes')->with('res',$editvote);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //

        return redirect()->route('votess.index')->with('success','Vote Update successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
