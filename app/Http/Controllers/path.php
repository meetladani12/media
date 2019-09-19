<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\scientist;
use App\farmer;
use App\district;
use App\taluka;
use App\village;
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

    
}
