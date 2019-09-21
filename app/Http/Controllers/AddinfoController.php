<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\district;
use App\taluka;
use App\village;
use App\department_type;
use App\department;
use App\group_type;
use App\scientist;
use App\group;
use App\question;
use App\answer;
use App\farmer;
use App\admin;

class AddinfoController extends Controller
{

    public function __construct()
    {
        $this->middleware('RouteAccessAdminSuper');
    }
    
    public function dist(Request $r){
    	$add = new district;
    	$add->name = $r->dist;
    	$add->save();
    	return redirect('/dist?err=2');
    }

    public function district()
    {
        $dist=district::get();
        return view('dist',compact('dist'));  
    }

    public function taluka(Request $r){
    	$add = new taluka;
    	$add->district_id = $r->district;
    	$add->name = $r->taluka;
    	$add->save();
    	return redirect('/taluka?err=2');
    }

    public function talukaView()
    {
        $dist=district::get();
        $taluka=taluka::get();
        return view('taluka',compact('dist','taluka')); 
    }

    public function village(Request $r){
    	$add = new village;
    	$add->taluka_id = $r->taluka;
    	$add->name = $r->village;
    	$add->save();	
    	return redirect('/village?err=2');
    }

    public function villageView()
    {
        $dist=district::get();
        $village=village::get();
        return view('village',compact('dist','village'));  
    }

    public function departmenttp(Request $r){
    	$add = new department_type;
    	$add->type = $r->departmenttp;
    	$add->save();
    	return redirect('/departmentType?err=2');
    }

    public function department_type()
    {
        $dept=department_type::get();
        return view('departmenttp',compact('dept'));  
    }

    public function department(Request $r){
    	$add = new department;
    	$add->department_type_id = $r->departmenttp;
    	$add->name = $r->department;
    	$add->save();
    	return redirect('/department?err=2');
    }

    public function departmentView()
    {
        $dept=department_type::get();
        $department=department::get();
        return view('department',compact('dept','department'));  
    }

    public function grouptp(Request $r){
    	$add = new group_type;
    	$add->type = $r->grouptp;
    	$add->save();
    	return redirect('/groupType?err=2');
    }

    public function group_typeView()
    {
        $grouptp=group_type::get();
        return view('grouptp',compact('grouptp'));  
    }

    public function group(Request $r){
    	$add = new group;
    	$add->group_type_id = $r->grouptp;
    	$add->name = $r->group;
    	$add->save();
    	return redirect('/group?err=2');
    }

    public function groupView()
    {
        $grouptp=group_type::get();
        $group=group::get();
        return view('group',compact('grouptp','group'));  
    }

    public function activity()
    {
        return view('activity');  
    }
    
    public function editGTP(Request $r){
        group_type::where('id',$r->gid)->update(['type' => $r->edit]);
            return redirect('/groupType?err=1');
    }

    public function deleteGTP(){

        $gid=Input::get('gid');
        $group=group::where('group_type_id',$gid)->get();
        $row=count($group);
        if($row==0){
            group_type::where('id',$gid)->delete();
            return redirect('/groupType?err=3');
        }
        else{
            foreach ($group as $g) {
                $id=$g->id;
                $question=question::where('group_id',$id)->get();
                foreach ($question as $q) {
                    $qid=$q->id;
                    answer::where('question_id',$qid)->delete();
                }
                question::where('group_id',$id)->delete();
                scientist::where('group_id',$id)->delete();
                group::where('id',$id)->delete();
            }
            group_type::where('id',$gid)->delete();
            return redirect('/groupType?err=3');
        }
        // echo $row;
        
    }

    public function editGroup(Request $r){
        group::where('id',$r->gid)->update(['name' => $r->edit]);
        return redirect('/group?err=1');
    }

    public function deleteGroup(){

        $gid=Input::get('gid');
        $question=question::where('group_id',$gid)->get();
        foreach ($question as $q) {
            $qid=$q->id;
            answer::where('question_id',$qid)->delete();
        }
        question::where('group_id',$gid)->delete();
        scientist::where('group_id',$gid)->delete();
        group::where('id',$gid)->delete();
        return redirect('/group?err=3');
    }

    public function editDepartment(Request $r){
        department::where('id',$r->did)->update(['name' => $r->edit]);
        return redirect('/department?err=1');
    }

    public function deleteDepartment(){

        $did=Input::get('did');
        $scientist=scientist::where('department_id',$did)->get();
        foreach ($scientist as $s) {
            $sid=$s->id;
            $question=question::where('scientist_id',$sid)->get();
            foreach ($question as $q) {
                $qid=$q->id;
                answer::where('question_id',$qid)->delete();
            }
            question::where('scientist_id',$sid)->delete();
        }
        scientist::where('department_id',$did)->delete();
        department::where('id',$did)->delete();
        return redirect('/department?err=3');
    }

    public function editDistrict(Request $r){
        district::where('id',$r->did)->update(['name' => $r->edit]);
        return redirect('/dist?err=1');
    }

    public function deleteDistrict(){

        $did=Input::get('did');
        $taluka=taluka::where('district_id',$did)->get();
        foreach ($taluka as $t) {
            $tid=$t->id;
            $village=village::where('taluka_id',$tid)->get();
            foreach ($village as $v) {
                $vid=$v->id;
                $farmer=farmer::where('village_id',$vid)->get();
                foreach ($farmer as $f) {
                    $fid=$f->id;
                    $question=question::where('farmer_id',$fid)->get();
                    foreach ($question as $q) {
                        $qid=$q->id;
                        answer::where('question_id',$qid)->delete();
                    }
                    question::where('farmer_id',$fid)->delete();
                }
                farmer::where('village_id',$vid)->delete();
            }
            village::where('taluka_id',$tid)->delete();
        }
        taluka::where('district_id',$did)->delete();
        district::where('id',$did)->delete();
        return redirect('/dist?err=3');
    }

    public function editTaluka(Request $r){
        taluka::where('id',$r->did)->update(['name' => $r->edit]);
        return redirect('/taluka?err=1');
    }

    public function deleteTaluka(){

        $tid=Input::get('tid');
        $village=village::where('taluka_id',$tid)->get();
            foreach ($village as $v) {
                $vid=$v->id;
                $farmer=farmer::where('village_id',$vid)->get();
                foreach ($farmer as $f) {
                    $fid=$f->id;
                    $question=question::where('farmer_id',$fid)->get();
                    foreach ($question as $q) {
                        $qid=$q->id;
                        answer::where('question_id',$qid)->delete();
                    }
                    question::where('farmer_id',$fid)->delete();
                }
                farmer::where('village_id',$vid)->delete();
            }
            village::where('taluka_id',$tid)->delete();
        taluka::where('id',$tid)->delete();
        return redirect('/taluka?err=3');
    }

    public function editVillage(Request $r){
        village::where('id',$r->vid)->update(['name' => $r->edit]);
        return redirect('/village?err=1');
    }

    public function deleteVillage(){

        $vid=Input::get('vid');
        $farmer=farmer::where('village_id',$vid)->get();
            foreach ($farmer as $f) {
                $fid=$f->id;
                $question=question::where('farmer_id',$fid)->get();
                foreach ($question as $q) {
                     $qid=$q->id;
                    answer::where('question_id',$qid)->delete();
                }
                question::where('farmer_id',$fid)->delete();
            }
            farmer::where('village_id',$vid)->delete();
        village::where('id',$vid)->delete();
        return redirect('/village?err=3');
    }

    public function profile()
    {
        $id = Input::get('id') ;
        $admin=admin::where('id','=',$id)->get();
        return view('SuperAdminProfile',compact('admin'));
    }

    public function UpdateProfile(Request $request,$id)
    {
        $admin=admin::find($id);
        $admin->name = $request->fullname;
        $admin->email = $request->email;
        $admin->mobile_no = $request->mobile;
        $admin->password = $request->password;
        $admin->save();
        return redirect('/SAprofile?id='.$id.'&&err=1');
    }
}
