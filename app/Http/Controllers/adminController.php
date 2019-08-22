<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\scientist;

class adminController extends Controller
{
    public function AcceptReject(){
    	if(null !== Input::get('accept')){
    		$accept=Input::get('accept');
    		scientist::where('id',$accept)->update(['flag' => 1]);
    		return redirect('/user');
    	}

    	if(null !== Input::get('reject')){
    		$reject=Input::get('reject');
    		scientist::where('id',$reject)->delete();
    		return redirect('/user');
    	}
    }
}
