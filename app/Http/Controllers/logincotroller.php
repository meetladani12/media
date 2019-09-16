<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\farmer;
use App\scientist;
use App\admin;

class logincotroller extends Controller
{
    public function login(Request $req){
    	$email=$req->email;
    	$password=$req->password;
    	$s=0;
    	$farmer=farmer::where(['email'=>$email,'password'=>$password,'flag'=>'1'])->get();
    	if(count($farmer)>0){
    		Session::put('user','farmer');
            foreach ($farmer  as $f) {
            $id=$f->id;
            }
            setcookie('farmerid',$id);
            return redirect('/');
    	}
    	else{
    		$scientist=scientist::where(['email'=>$email,'password'=>$password,'flag'=>'1'])->get();
    		if(count($scientist)>0){
    			Session::put('user','scientist');
                setcookie('scientistid',$scientist[0]->id);
                setcookie('groupid',$scientist[0]->group_id);
    			return redirect('/');
    		}
    		else{
    			$admin=admin::where(['email'=>$email,'password'=>$password])->get();

	    		if(count($admin)>0){
	    			foreach ($admin  as $a) {
	    				$type=$a->type;
	    			}
	    			Session::put('user',$type);
	    			return redirect('/');
	    		}
	    		else{
	    			return redirect('/signin?err=1');
	    		}
    		}
    	}
    	
    	//Session::forget('user');
    	//Session::get('user');
    }

    public function logout(){
    	Session::forget('user');
    	return redirect('/signin?err=2');
    }
}
