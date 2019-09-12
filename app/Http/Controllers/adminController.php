<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\scientist;
use App\group_type;
use App\group;
use App\question;
use App\answer;
use App\department;
use App\district;
use App\taluka;
use App\village;
use App\farmer;

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

    public function editGTP(Request $r){
        group_type::where('id',$r->gid)->update(['type' => $r->edit]);
            return redirect('/groupType');
    }

    public function deleteGTP(){

        $gid=Input::get('gid');
        $group=group::where('group_type_id',$gid)->get();
        $row=count($group);
        if($row==0){
            group_type::where('id',$gid)->delete();
            return redirect('/groupType');
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
            return redirect('/groupType');
        }
        // echo $row;
        
    }

    public function editGroup(Request $r){
        group::where('id',$r->gid)->update(['name' => $r->edit]);
        return redirect('/group');
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
        return redirect('/group');
    }

    public function editDepartment(Request $r){
        department::where('id',$r->did)->update(['name' => $r->edit]);
        return redirect('/department');
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
        return redirect('/department');
    }

    public function editDistrict(Request $r){
        district::where('id',$r->did)->update(['name' => $r->edit]);
        return redirect('/dist');
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
        return redirect('/dist');
    }

    public function editTaluka(Request $r){
        taluka::where('id',$r->did)->update(['name' => $r->edit]);
        return redirect('/taluka');
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
        return redirect('/taluka');
    }

    public function editVillage(Request $r){
        village::where('id',$r->vid)->update(['name' => $r->edit]);
        return redirect('/village');
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
        return redirect('/village');
    }
}