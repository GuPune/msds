<?php

namespace App\Http\Controllers;

use App\Models\Carosel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CaroselController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $a = Auth::guard('admin')->user();
        if(!$a){
        return redirect('/admin/login');
        }



        $getca = Carosel::orderBy('sequence')->get();
        $min = Carosel::min('sequence');
        $max = Carosel::max('sequence');
        $count = Carosel::get()->count();


         return view('backend.caroe')->with('cal',$getca)->with('min',$min)->with('max',$max)->with('count',$count);
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

        return view('backend.caroecreate')->with($data);
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
                    ]);
        $max = Carosel::max('sequence');
        $shell_category = Carosel::create([
            "image" => $request->image,
            "sequence" => $max+1
        ]);


        return redirect()->route('carosel.index')
        ->with('success','Carosel created successfully');
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
$editca = Carosel::find($id);

        return view('backend.caroeedit')->with('item',$editca);
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

        $affectedRows = Carosel::where("id", $id)->update(["image" =>  $request->image]);


        return redirect()->route('carosel.index')->with('success','Carosel update successfully');

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


        $categor = Carosel::where('id',$id)->first();
        $seq = Carosel::where('sequence','>',$categor->sequence)->get();

        $datase = $categor->sequence;
        foreach ($seq as $key => $seq) {
            $updateseq = Carosel::where('id',$seq->id)->update([
                'sequence' => $datase
            ]);

            $datase++;
        }

        $delete = Carosel::where('id',$id)->delete();

        return response()->json([
            'msg_return' => 'ลบสำเร็จ',
            'code_return' => 1,
        ]);
    }
}
