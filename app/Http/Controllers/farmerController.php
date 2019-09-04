<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\farmer;
use App\scientist;
use App\question;
use Illuminate\Support\Facades\DB;

class farmerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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
        // $this->validate($request, [
        //     'name' => 'required',
        //     'email' => 'required|unique:farmers',
        //     'mobile_no' => 'required|unique:farmers',
        //     'village_id' => 'required',
        //     'address' => 'required',
        //     'password' => 'required',

        // ]);
        $farmer = new farmer;
        $farmer->name = $request->fullname;
        $farmer->email = $request->email;
        $farmer->mobile_no = $request->mobile;
        $farmer->village_id= $request->village;
        $farmer->address = $request->address;
        $farmer->password = $request->password;
        $farmer->save();
        return redirect('/');
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

    public function AddQuestion(Request $request)
    {
        $scientist=DB::table('scientists')->where(['group_id'=>$request->group])
        ->select('id','date_of_join')
        ->orderBy('date_of_join','asc')
        ->take(1)
        ->get();
        if(count($scientist)<1){
            return redirect('/question');
        }
        else{
            $file=$request->file('file');
            $filename = $file->getClientOriginalName();
            $path = public_path().'/image/';
            $file->move($path, $filename);
            $question = new question;
            $farmerid=$_COOKIE['farmerid'];
            $question->farmer_id = $farmerid;
            $question->scientist_id = $scientist[0]->id;
            $question->group_id = $request->group;
            $question->question = $request->question;
            $question->path = $filename;
            $question->save();
            echo $filename;

            //return redirect('/question');
        }


    }
}
