<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use App\scientist;
use App\admin;

class adminController extends Controller
{
    public function __construct()
    {
        $this->middleware('RouteAccessAdmin');
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

    public function AcceptReject(){
    	if(null !== Input::get('accept')){
    		$accept=Input::get('accept');
    		scientist::where('id',$accept)->update(['flag' => 1]);
    		return redirect('/user?err==1');
    	}
    	if(null !== Input::get('reject')){
    		$reject=Input::get('reject');
    		scientist::where('id',$reject)->delete();
    		return redirect('/user?err==2');
    	}
    } 

    public function profile()
    {
        $id = Input::get('id') ;
        $admin=admin::where('id','=',$id)->get();
        return $admin;
    }
}