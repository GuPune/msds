<?php

namespace App\Http\Controllers;

use App\Models\FactVote;
use App\Models\Vote;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;



class VotesIdolController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $a = Auth::guard('admin')->user();
        if(!$a){
        return redirect('/admin/login');
        }


$vote =  Vote::select('votes.id','votes.image','votes.sequence','votes.des','votes.type','headvotes.title','votes.group_id','votes.name','votes.name_des')
->leftJoin('headvotes', 'votes.type', '=', 'headvotes.id');



if($request->group_id){

    $vote->where('votes.group_id',$request->group_id)->whereIn('votes.type',[2,3]);
}

if($request->all() == null){
    $vote->where('votes.group_id','1')->where('votes.type','2');
}
$a = $vote->orderBy('sequence')->get();
// $min = Carosel::min('sequence');
// $max = Carosel::max('sequence');
// $count = Carosel::get()->count();
$count = $vote->get()->count();
$min = $vote->get()->min('sequence');
$max = $vote->get()->max('sequence');



        return view('backend.usersettingvotesidol')->with('vote',$a)->with('min',$min)->with('max',$max)->with('count',$count)->with('type',$request->type)->with('group_id',$request->group_id);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        $image_display = url('img/image.jpg');
        $data = [
            'image_display' => $image_display,
        ];



        return view('backend.createsettingvotesidol')->with($data);
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




        $this->validate($request, [
            'name' => 'required',
        ]);


$images = $request->image;
if($request->image == null){
    $images = 'image.jpg';
}




        if($request->group_id == 1){
            $max = Vote::where('type','2')->where('group_id','1')->max('sequence');
            $shell_category = Vote::create([
                "image" => $images,
                "sequence" => $max+1,
                "des" => $request->des,
                "type" => 2,
                "name_des" => $request->name_des,
                "name" => $request->name,
                "type" => 2,
                "group_id" => 1,
            ]);
        }
        if($request->group_id == 2){
            $max = Vote::where('type','3')->where('group_id','2')->max('sequence');
            $shell_category = Vote::create([
                "image" => $images,
                "sequence" => $max+1,
                "des" => $request->des,
                "type" => 3,
                "group_id" => 2,
                "name_des" => $request->name_des,
                "name" => $request->name,
            ]);
        }


        return redirect()->route('idol.index')->with('success','Vote created successfully');
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

        return view('backend.editsettingvotesidol')->with('res',$editvote);
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


        if($request->group_id == 1){
            $max = Vote::where('group_id',$request->group_id)->where('type','2')->max('sequence');

            $check = Vote::where('id',$id)->where('group_id',$request->group_id)->first();

            if(!$check){
                $updatedata = Vote::where("id", $id)->update([
                    "image" =>  $request->image,
                    "des" =>  $request->des,
                    "sequence" => $max+1,
                    "type" => 2,
                    "group_id" => $request->group_id,
                    "name_des" => $request->name_des,
                    "name" => $request->name,
                 ]);


                $checkupseq = Vote::where('group_id','2')->where('type','3')->orderBy('sequence')->get();
                foreach ($checkupseq as $key => $seq) {
                    $updateseq = Vote::where('id',$seq->id)->update([
                        'sequence' => $key+1
                    ]);

                }


        }

        if($check){
            $updatedata = Vote::where("id", $id)->update([
                "image" =>  $request->image,
                "des" =>  $request->des,
                "name_des" => $request->name_des,
                "name" => $request->name,
             ]);

    }
    }
        if($request->group_id == 2){
            $max = Vote::where('group_id',$request->group_id)->where('type','3')->max('sequence');
            $check = Vote::where('id',$id)->where('group_id',$request->group_id)->first();

            if(!$check){
                $updatedata = Vote::where("id", $id)->update([
                    "image" =>  $request->image,
                    "des" =>  $request->des,
                    "sequence" => $max+1,
                    "type" => 3,
                    "group_id" => $request->group_id,
                    "name_des" => $request->name_des,
                    "name" => $request->name,
                 ]);


                 $checkupseq = Vote::where('group_id','1')->where('type','2')->orderBy('sequence')->get();
               //  $datase = $checkupseq->sequence;

                 foreach ($checkupseq as $key => $seq) {
                    $updateseq = Vote::where('id',$seq->id)->update([
                        'sequence' => $key+1
                    ]);

                }

        }

        if($check){
            $updatedata = Vote::where("id", $id)->update([
                "image" =>  $request->image,
                "des" =>  $request->des,
                "name_des" => $request->name_des,
                "name" => $request->name,
             ]);

    }

    }




        return redirect()->route('idol.index')->with('success','Vote Update successfully');
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



        $vat = Vote::where('id',$id)->first();
        $seq = Vote::where('sequence','>',$vat->sequence)->where('type',$vat->type)->where('group_id',$vat->group_id)->get();

        $datase = $vat->sequence;


        foreach ($seq as $key => $seq) {
            $updateseq = Vote::where('id',$seq->id)->update([
                'sequence' => $datase
            ]);

            $datase++;
        }

     $delete = Vote::where('id',$id)->delete();
     $deletevote = FactVote::where('votes_id',$id)->delete();


        return response()->json([
            'msg_return' => 'ลบสำเร็จ',
            'code_return' => 1,
        ]);
    }
}
