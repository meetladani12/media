<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\farmer;
use App\scientist;
use App\admin;
use App\district;
use App\department_type;
use App\group_type;
Use \Carbon\Carbon;
use Mail;
use App\mail\sendMail;

class logincotroller extends Controller
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


    public function login(Request $req){
    	$email=$req->email;
    	$password=$req->password;
    	$s=0;
    	$farmer=farmer::where(['email'=>$email,'password'=>$password,'flag'=>'1'])->get();
    	if(count($farmer)>0){
    		Session::put('user','farmer');
            foreach ($farmer  as $f) {
            $id=$f->id;
            $nm=$f->name;
            }
            setcookie('farmerid',$id);
            setcookie('nm',$nm);
            return redirect('/');
    	}
    	else{
    		$scientist=scientist::where(['email'=>$email,'password'=>$password,'flag'=>'1'])->get();
    		if(count($scientist)>0){
    			Session::put('user','scientist');
                setcookie('scientistid',$scientist[0]->id);
                setcookie('nm',$scientist[0]->name);
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
                    Session::put('admin',$type);
                    setcookie('admin',$admin[0]->id);
                    setcookie('nm',$admin[0]->name);
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
    
    public function ForgotPassword(){
        return view('ForgotPassword');
    }

    public function SendMail(Request $req){
        $mail=$req->email;
        $farmer=farmer::where(['email'=>$mail])->get();
        $row = $farmer->count();
        if($row==1)
        {
            Mail::send(new sendMail());
            return redirect('/ForgotPassword?err=1');
        }
        else{
            $scientist=scientist::where(['email'=>$mail])->get();
            $row = $scientist->count();
            if ($row==1) {
                Mail::send(new sendMail());
                return redirect('/ForgotPassword?err=1');
            }
            else{
                $admin=admin::where(['email'=>$mail])->get();
                $row = $admin->count();
                if ($row==1) {
                    Mail::send(new sendMail());
                    return redirect('/ForgotPassword?err=1');
                }
                else{
                    return redirect('/ForgotPassword?err=2');
                }
            }
        }
        
        
    }

    public function logout(){

    	Session::forget('user');
        Session::forget('admin');
        setcookie('farmerid','',0);
        setcookie('scientistid','',0);
        setcookie('groupid','',0);
        setcookie('admin','',0);
        setcookie('nm','',0);
    	return redirect('/signin?err=2');
    }

    public function FarmerSignup(Request $request)
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
        return redirect('/regf?err=1');
    }

    public function ScientistSignup(Request $request)
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
        return redirect('/regs?err=1');
    }
}
