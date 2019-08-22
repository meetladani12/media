<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\district;
use App\taluka;
use App\village;
use App\department_type;
use App\department;
use App\group_type;
use App\group;

class AddinfoController extends Controller
{
    public function dist(Request $r){
    	$add = new district;
    	$add->name = $r->dist;
    	$add->save();
    	return redirect('/dist');
    }

    public function taluka(Request $r){
    	$add = new taluka;
    	$add->district_id = $r->district;
    	$add->name = $r->taluka;
    	$add->save();
    	return redirect('/taluka');
    }

    public function village(Request $r){
    	$add = new village;
    	$add->taluka_id = $r->taluka;
    	$add->name = $r->village;
    	$add->save();	
    	return redirect('/village');
    }

    public function departmenttp(Request $r){
    	$add = new department_type;
    	$add->type = $r->departmenttp;
    	$add->save();
    	return redirect('/departmentType');
    }

    public function department(Request $r){
    	$add = new department;
    	$add->department_type_id = $r->departmenttp;
    	$add->name = $r->department;
    	$add->save();
    	return redirect('/department');
    }

    public function grouptp(Request $r){
    	$add = new group_type;
    	$add->type = $r->grouptp;
    	$add->save();
    	return redirect('/groupType');
    }

    public function group(Request $r){
    	$add = new group;
    	$add->group_type_id = $r->grouptp;
    	$add->name = $r->group;
    	$add->save();
    	return redirect('/group');
    }

    

}
