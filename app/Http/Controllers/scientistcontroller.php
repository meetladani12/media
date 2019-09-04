<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\scientist;
use App\answer;
use App\question;
use App\video;

class scientistcontroller extends Controller
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
        //     'email' => 'required|unique:scientists',
        //     'phone_no' => 'required|unique:scientists',
        //     'mobile_no' => 'required|unique:scientists',
        //     'designation' => 'required',
        //     'department_id' => 'required',
        //     'date_of_join' => 'required',
        //     'group_id' => 'required',
        //     'address' => 'required',
        //     'password' => 'required',

        // ]);
        $scientist = new scientist;   
        $scientist->name = $request->fullname;
        $scientist->email = $request->email;
        $scientist->phone_no = $request->phone;
        $scientist->mobile_no = $request->mobile;
        $scientist->designation= $request->designation;
        $scientist->department_id= $request->department;
        $scientist->date_of_join = $request->date;
        $scientist->group_id = $request->group;
        $scientist->address = $request->address;
        $scientist->password = $request->password;
        $scientist->save();
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

    public function AddAnswer(Request $request)
    {
        $answer= new answer;
        $answer->question_id= $request->qid;
        $answer->answer = $request->answer;
        $answer->save();
        question::where('id',$request->qid)->update(['flag' => "1"]);
        return redirect('/viewQuestion');
    }

    public function UpdateAnswer(Request $request)
    {
        answer::where('id',$request->aid)
        ->update(['answer' => $request->ans]);
        return redirect('/viewQuestion');
    }

    public function UploadVideo(Request $request)
    {
        echo "hello";
        $file=$request->file('file');
        $filename = $file->getClientOriginalName();
        $path = public_path().'/video/';
        $file->move($path, $filename);

        $title=$request->title;
        $description=$request->description;
        $tags=$request->tags;
        $sid=$_COOKIE["scientistid"];
        $gid=$_COOKIE["groupid"];
        $videoup=new video;
        $videoup->title = $title;
        $videoup->description = $request->description;
        $videoup->tags = $request->tags;
        $videoup->file_name = $filename;
        $videoup->youtube_video_id ='0';
        $videoup->scientist_id = $sid;
        $videoup->group_id = $gid;
        $videoup->save();
        return redirect('/youtube');

    }
}
