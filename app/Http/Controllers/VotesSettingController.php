<?php

namespace App\Http\Controllers;

use App\Models\Vote;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;



class VotesSettingController extends Controller
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
$vote =  Vote::select('votes.id','votes.image','votes.sequence','votes.des','votes.type','headvotes.title','votes.name','votes.name_des')
->leftJoin('headvotes', 'votes.type', '=', 'headvotes.id')->where('votes.type','1');
$a = $vote->orderBy('sequence')->get();
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


        $this->validate($request, [
            'image' => 'required',
            'name' => 'required',
        ]);




        $max = Vote::where('type','1')->max('sequence');
        $shell_category = Vote::create([
            "image" => $request->image,
            "sequence" => $max+1,
            "des" => $request->des,
            "name" => $request->name,
            "name_des" => $request->name_des,
            "type" => 1,
            "group_id" => 1,
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

        $max = Vote::where('type',$request->type)->where('period',$request->period)->max('sequence');

        /// check ก่อนว่าได้เปลี่ยน type รึ period ไหม
       $check = Vote::where('id',$id)->where('type',$request->type)->where('period',$request->period)->first();
       if(!$check){
        $updatedata = Vote::where("id", $id)->update([
            "image" =>  $request->image,
            "des" =>  $request->des,
            "sequence" => $max+1,
            "name" => $request->name,
            "name_des" => $request->name_des,


         ]);
         return redirect()->route('votess.index')->with('success','Vote Update successfully');
       }


       $updatedata = Vote::where("id", $id)->update([
        "image" =>  $request->image,
        "des" =>  $request->des,
        "name" => $request->name,
        "name_des" => $request->name_des,
     ]);

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



        $vat = Vote::where('id',$id)->first();
        $seq = Vote::where('sequence','>',$vat->sequence)->where('type',$vat->type)->where('period',$vat->period)->get();

        $datase = $vat->sequence;


        foreach ($seq as $key => $seq) {
            $updateseq = Vote::where('id',$seq->id)->update([
                'sequence' => $datase
            ]);

            $datase++;
        }

     $delete = Vote::where('id',$id)->delete();


        return response()->json([
            'msg_return' => 'ลบสำเร็จ',
            'code_return' => 1,
        ]);
    }
}
