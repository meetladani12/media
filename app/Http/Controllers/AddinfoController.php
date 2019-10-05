<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
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
use App\video;

class AddinfoController extends Controller
{

    public function __construct()
    {
        $this->middleware('RouteAccessAdminSuper');
    }
    
    public function dist(Request $r){
        $di=district::where('name','=',$r->dist)->count();
        if($di==0){
            $add = new district;
            $add->name = $r->dist;
            $add->save();
            return redirect('/dist?err=2');
        }else{
            return redirect('/dist?err=4');
        }
    	
    }

    public function district()
    {
        $dist=district::get();
        return view('dist',compact('dist'));  
    }

    public function taluka(Request $r){
        $di=taluka::where('district_id','=',$r->district)->where('name','=',$r->taluka)->count();
        if($di==0){
            $add = new taluka;
            $add->district_id = $r->district;
            $add->name = $r->taluka;
            $add->save();
            return redirect('/taluka?err=2');
        }else{
            return redirect('/taluka?err=4');
        }
    	
    }

    public function talukaView()
    {
        $dist=district::get();
        $taluka=taluka::get();
        return view('taluka',compact('dist','taluka')); 
    }

    public function village(Request $r){
        $di=village::where('taluka_id','=',$r->taluka)->where('name','=',$r->village)->count();
        if($di==0){
            $add = new village;
            $add->taluka_id = $r->taluka;
            $add->name = $r->village;
            $add->save();   
            return redirect('/village?err=2');
        }else{
            return redirect('/village?err=4');
        }
    	
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
        $di=department::where('name','=',$r->department)->count();
        if($di==0){
            $add = new department;
            $add->department_type_id = $r->departmenttp;
            $add->name = $r->department;
            $add->save();
            return redirect('/department?err=2');
        }else{
            return redirect('/department?err=4');
        }
    	
    }

    public function departmentView()
    {
        $dept=department_type::get();
        $department=department::get();
        return view('department',compact('dept','department'));  
    }

    public function grouptp(Request $r){
        $di=group_type::where('type','=',$r->grouptp)->count();
        if($di==0){
            $add = new group_type;
            $add->type = $r->grouptp;
            $add->save();
            return redirect('/groupType?err=2');
        }else{
            return redirect('/groupType?err=4');
        }
    	
    }

    public function group_typeView()
    {
        $grouptp=group_type::get();
        return view('grouptp',compact('grouptp'));  
    }

    public function group(Request $r){
        $di=group::where('name','=',$r->group)->count();
        if($di==0){
            $add = new group;
            $add->group_type_id = $r->grouptp;
            $add->name = $r->group;
            $add->save();
            return redirect('/group?err=2');
        }else{
            return redirect('/group?err=4');
        }
    	
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
        $di=group_type::where('id','!=',$r->gid)->where('type','=',$r->edit)->count();
        if($di==0){
            group_type::where('id',$r->gid)->update(['type' => $r->edit]);
            return redirect('/groupType?err=1');
        }else{
            return redirect('/groupType?err=4');
        }
        
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
        $di=group::where('id','!=',$r->gid)->where('name','=',$r->edit)->count();
        if($di==0){
            group::where('id',$r->gid)->update(['name' => $r->edit]);
            return redirect('/group?err=1');
        }else{
            return redirect('/group?err=4');
        }
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
        $di=department::where('id','!=',$r->did)->where('name','=',$r->edit)->count();
        if($di==0){
            department::where('id',$r->did)->update(['name' => $r->edit]);
            return redirect('/department?err=1');
        }else{
            return redirect('/department?err=4');
        }
        
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
        $di=district::where('id','!=',$r->did)->where('name','=',$r->edit)->count();
        if($di==0){
            district::where('id',$r->did)->update(['name' => $r->edit]);
            return redirect('/dist?err=1');
        }else{
            return redirect('/dist?err=4');
        }
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

        $did2='did'.$r->did;
        $di=taluka::where('id','!=',$r->did)->where('district_id','=',$r->$did2)->where('name','=',$r->edit)->count();
        if($di==0){
            taluka::where('id',$r->did)->update(['name' => $r->edit]);
            return redirect('/taluka?err=1');
        }else{
            return redirect('/taluka?err=4');
        }
        
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
        $did2='taluka'.$r->vid;
        $di=village::where('id','!=',$r->vid)->where('taluka_id','=',$r->$did2)->where('name','=',$r->edit)->count();
        if($di==0){
            village::where('id',$r->vid)->update(['name' => $r->edit]);
            return redirect('/village?err=1');
        }else{
            return redirect('/village?err=4');
        }
        
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

    public function reportq(){
        $start = Input::get('start');
        $end = Input::get('end');
        // $question= question::where('created_at','>', $start)->where('created_at','<', $end)->get();
        $question=DB::table('questions')
                    ->join('groups','groups.id','=','questions.group_id')
                    ->join('scientists','scientists.id','=','questions.scientist_id')
                    ->join('farmers','farmers.id','=','questions.farmer_id')
                    ->where('questions.created_at','>', $start)->where('questions.created_at','<', $end)
                    ->select('scientists.name AS snm','farmers.name AS fnm','groups.name AS gnm','question','questions.created_at AS dt','questions.id AS qid')
                    ->get();
        return $question;
    }

    public function ans(){
        $qid = Input::get('qid');
        $ans= answer::where('question_id',$qid)->get();
        $cnt = count($ans);
        if($cnt==0){
            $answer=0;
        }
        else{
            $answer=$ans[0]->answer;
        }
        return $answer;
    }

    public function reportv(){
        $start = Input::get('start');
        $end = Input::get('end');
        $video=DB::table('videos')
                    ->join('groups','groups.id','=','videos.group_id')
                    ->join('scientists','scientists.id','=','videos.scientist_id')
                    ->where('videos.created_at','>', $start)->where('videos.created_at','<', $end)
                    ->select('scientists.name AS snm','title','description','tags','groups.name AS gnm','videos.created_at AS dt','youtube_video_id','videos.id AS vid')
                    ->orderBy('videos.created_at','asc')
                    ->get();
        return $video;
    }

    public function MyVideoDelete()
    {
        $id=Input::get('id') ;
        $video=video::where('id',$id )->delete();
        return redirect('/act?err=1');
    }

    public function q_aDelete()
    {
        $id=Input::get('id') ;
        $video=question::where('id',$id )->get();
        answer::where('question_id',$video[0]->id )->delete();
        question::where('id',$id )->delete();

        return redirect('/act?err=2');
    }
    
    public function Advisory()
    {
        $farmer= farmer::get();
        $dist= district::get();
        return view('Advisory',compact('farmer','dist'));
    }
    
    public function SortFarmer()
    {
        $vid=Input::get('village') ;
        $farmer= farmer::where('village_id',$vid)->get();
        return $farmer;
    }

    public function SendWMessage()
    {
        
        $data = [
        'phone' => '919737246983', // Receivers phone
        'body' => 'Hello!', // Message
        ];
        $json = json_encode($data); // Encode data to JSON
        // URL for request POST /message
        $url = 'https://eu50.chat-api.com/instance51372/message?token=5ij4hq7268f23il3';
        // Make a POST request
        $options = stream_context_create(['http' => [
            'method'  => 'POST',
            'header'  => 'Content-type: application/json',
            'content' => $json
        ]
        ]);
        $result = file_get_contents($url, false, $options);

        return redirect('/Advisory?err=2');
    }

}
