<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\scientist;
use App\farmer;
use App\district;
use App\taluka;
use App\department_type;
use App\department;
use App\group_type;
use App\group;
use App\video;
use App\question;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class path extends Controller
{
    public function signup()
    { 
       	$dist=district::get();
        return view('signup',compact('dist')); 
    }
    
    public function ssignup()
    { 
        $dept=department_type::get();
        $group=group_type::get();
        return view('ssignup',compact('dept','group')); 
    }

    public function signin()
    {
       	return view('signin');  
    }

    public function contact()
    {
       	return view('contact');  
    }

    public function about()
    {
       	return view('about');  
    }

    public function dist()
    {
        $dist=district::get();
        return view('dist',compact('dist'));  
    }

    public function taluka()
    {
        $dist=district::get();
        
        $taluka=taluka::get();
        return view('taluka',compact('dist','taluka')); 
    }

    public function village()
    {
        $dist=district::get();
        return view('village',compact('dist'));  
    }

    public function department_type()
    {
        $dept=department_type::get();
        return view('departmenttp',compact('dept'));  
    }

    public function department()
    {
        $dept=department_type::get();
        $department=department::get();
        return view('department',compact('dept','department'));  
    }

    public function group_type()
    {
        $grouptp=group_type::get();
        return view('grouptp',compact('grouptp'));  
    }

    public function group()
    {
        $grouptp=group_type::get();
        $group=group::get();
        return view('group',compact('grouptp','group'));  
    }

    public function user()
    {
        $tp=Session::get('user');
        $scientist=DB::table('departments')
              ->join('scientists','scientists.department_id','=','departments.id')
              ->join('department_types','department_types.id','departments.department_type_id')
              ->select('department_types.type','departments.name AS dnm','scientists.name','scientists.email','scientists.designation','scientists.mobile_no','scientists.id AS sid','scientists.flag')
              ->where(['department_types.type'=>$tp,'scientists.flag'=>0])
              ->get();
        $group=DB::table('scientists')  
              ->join('groups','groups.id','=','scientists.group_id')
              ->select('scientists.name','groups.name AS nm','scientists.id AS sid1')
              ->get();
        $cnt=count($group);
        return view('user',compact('scientist','group','cnt'));  
    }

    public function question()
    {
        $grouptp=group_type::get();
        return view('question',compact('grouptp'));  
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

    public function viewAnswer()
    {
        $id=$_COOKIE['farmerid'];
        $question=question::where(['farmer_id'=>$id])->get();
        $answer=DB::table('answers')
                ->join('questions','questions.id','=','answers.question_id')
                ->where(['questions.flag'=>'1','farmer_id'=>$id])
                ->select('answers.question_id AS qid','answer','answers.id AS aid','questions.question')
                ->get();
        $cnt=count($answer);
        return view('viewAnswer',compact('question','cnt','answer'));
    }
    
    public function upload()
    {
        return view('upload');  
    }

    public function ViewVideo()
    {
        $video=video::get();
        return view('video',compact('video'));  
    }
}
