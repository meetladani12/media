<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\scientist;
use App\answer;
use App\question;
use App\video;
use App\group;
use App\group_type;
use App\department;
use App\department_type;
use Illuminate\Support\Facades\DB;

class scientistcontroller extends Controller
{
    public function __construct(){
        $this->middleware('RouteAccessScientist');
    }
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
        $scientist=scientist::find($id);
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
        return redirect('/Sprofile?err=1&&id='.$id.'');

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
        return redirect('/viewQuestion?err=1');
    }

    public function UpdateAnswer(Request $request)
    {
        answer::where('id',$request->aid)
        ->update(['answer' => $request->ans]);
        return redirect('/viewQuestion?err=2');
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

    public function upload()
    {
        return view('upload');  
    }

    public function MyVideo()
    {
        $id=$_COOKIE["scientistid"];
        $video=video::where('scientist_id',$id )->get();
        return view('MyVideo',compact('video'));  
    }

    public function MyVideoDelete()
    {
        $id=Input::get('id') ;
        $video=video::where('id',$id )->delete();
        return redirect('/myvideo');
    }

    public function ViewQuestion()
    {
        $id=$_COOKIE['scientistid'];
        $question=question::where('scientist_id',$id)->get();
        $answer=DB::table('answers')
                ->join('questions','questions.id','=','answers.question_id')
                ->where(['questions.scientist_id'=>$id,'questions.flag'=>'1'])
                ->select('answers.question_id AS qid','answer','answers.id AS aid')
                ->get();
        $cnt=count($answer);
        return view('viewQuestion',compact('question','cnt','answer'));
    }

    public function profile()
    {
        $id = Input::get('id') ;
        $scientist=scientist::where('id','=',$id)->get();
        $dept=department_type::get();
        $grouptp=group_type::get();
        $groupid=group::where('id','=',$scientist[0]->group_id)->get();
        $group=group::where('group_type_id','=',$groupid[0]->group_type_id)->get();
        $departid=department::where('id','=',$scientist[0]->department_id)->get();
        $department=department::where('department_type_id','=',$departid[0]->department_type_id)->get();
        
        return view('ScientistProfile',compact('scientist','dept','grouptp','group','department','groupid','departid'));
    }
}
