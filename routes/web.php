<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use Illuminate\Support\Facades\Input;
use App\district;
use App\taluka;
use App\village;
use App\department;
use App\group;
use App\video;
use App\farmer;
use App\scientist;
use App\admin;

Route::get('/', function () {
    return view('welcome');
});



Route::get('/dist','AddinfoController@district');
Route::get('/taluka','AddinfoController@talukaView');
Route::get('/village','AddinfoController@villageView');
Route::get('/departmentType','AddinfoController@department_type');
Route::get('/department','AddinfoController@departmentView');
Route::get('/groupType','AddinfoController@group_typeView');
Route::get('/group','AddinfoController@groupView');
Route::get('/act','AddinfoController@activity');
Route::get('/Aprofile','AddinfoController@profile');
Route::post('/groupType/update','AddinfoController@editGTP');
Route::get('/groupType/delete','AddinfoController@deleteGTP');
Route::post('/group/update','AddinfoController@editGroup');
Route::get('/group/delete','AddinfoController@deleteGroup');
Route::post('/department/update','AddinfoController@editDepartment');
Route::get('/department/delete','AddinfoController@deleteDepartment');
Route::post('/district/update','AddinfoController@editDistrict');
Route::get('/district/delete','AddinfoController@deleteDistrict');
Route::post('/taluka/update','AddinfoController@editTaluka');
Route::get('/taluka/delete','AddinfoController@deleteTaluka');
Route::post('/village/update','AddinfoController@editVillage');
Route::get('/village/delete','AddinfoController@deleteVillage');
Route::post('/addDist','AddinfoController@dist');
Route::post('/addTaluka','AddinfoController@taluka');
Route::post('/addVillage','AddinfoController@village');
Route::post('/addDepartmenttp','AddinfoController@departmenttp');
Route::post('/addDepartment','AddinfoController@department');
Route::post('/addGrouptp','AddinfoController@grouptp');
Route::post('/addGroup','AddinfoController@group');
Route::get('/SAprofile','AddinfoController@profile');
Route::post('/SAprofile/{SAprofile}','AddinfoController@UpdateProfile');





Route::get('/AcceptReject','adminController@AcceptReject');
Route::get('/user','adminController@user');
Route::get('/Aprofile','adminController@profile');
Route::post('/Aprofile/{Aprofile}','adminController@UpdateProfile');


Route::get('/question','farmerController@question');
Route::get('/ViewVideo','farmerController@ViewVideo');
Route::post('/addQuestion','farmerController@AddQuestion');
Route::get('/Sprofile','farmerController@profile');
Route::get('/viewAnswer','farmerController@viewAnswer');
Route::resource('farmer','farmerController');


Route::get('/upload','scientistcontroller@upload');
Route::get('/myvideo','scientistcontroller@MyVideo');
Route::get('/Sprofile','scientistcontroller@profile');
Route::get('/myvideo/delete','scientistcontroller@MyVideoDelete');
Route::post('/addAnswer','scientistcontroller@AddAnswer');
Route::post('/UpdateAnswer','scientistcontroller@UpdateAnswer');
Route::post('/UploadVideo','scientistcontroller@UploadVideo');
Route::get('/viewQuestion','scientistcontroller@ViewQuestion');
Route::get('/Fprofile','farmerController@profile');
Route::resource('scientist','scientistcontroller');


Route::post('/login','logincotroller@login');
Route::get('/signout','logincotroller@logout');
Route::get('/regf','logincotroller@signup');
Route::get('/regs','logincotroller@ssignup');
Route::get('/signin','logincotroller@signin');
Route::get('/contact','logincotroller@contact');
Route::get('/about','logincotroller@about');
Route::get('/about','logincotroller@about');
Route::get('/ForgotPassword','logincotroller@ForgotPassword');
Route::post('/ForgotPassword/SendMail','logincotroller@SendMail');


Route::get('/youtube','dropcontroller@youtube');



Route::get('/ajax-taluka',function(){
	$dist_id = Input::get('dist') ;
	$taluka= taluka::where('district_id','=',$dist_id)->get();
	return $taluka;
});
Route::get('/ajax-village',function(){
	$taluka_id = Input::get('taluka') ;
	$village= village::where('taluka_id','=',$taluka_id)->get();
	return $village;
});

Route::get('/ajax-dept',function(){
	$dept_id = Input::get('dept') ;
	$depart= department::where('department_type_id','=',$dept_id)->get();
	return $depart;
});
Route::get('/ajax-grouptype',function(){
	$grouptp_id = Input::get('grouptp') ;
	$group= group::where('group_type_id','=',$grouptp_id)->get();
	return $group;
});

Route::get('/ajax-farmer',function(){
	$id = Input::get('farmer_id') ;
	$farmer= DB::table('farmers')
                ->join('villages','villages.id','=','farmers.village_id')
                ->where('farmers.id',$id)
                ->select('farmers.name AS name','farmers.email AS email','farmers.mobile_no AS mono','villages.name AS vnm')
                ->get();
	return $farmer;
});

Route::get('/ajax-group',function(){
	$group_id = Input::get('group') ;
	$videos= video::where('group_id','=',$group_id)->get();
	return $videos;
});
Route::get('/ajax-video',function(){
	$videos= video::get();
	return $videos;
});

Route::get('/ajax-video',function(){
	$keyword = Input::get('keyword');
	$videos= video::where('title','LIKE','%'.$keyword.'%')->get();
	return $videos;
});

Route::get('/ajax-email',function(){
	$email = Input::get('mail');
	$farmer= farmer::where('email',$email)->count();
	$scientist=scientist::where('email',$email)->count();
	$admin =admin::where('email',$email)->count();
	$cnt=$farmer+$scientist+$admin;
	return $cnt;
});

Route::get('/ajax-mobile',function(){
	$mobile = Input::get('mobile');
	$farmer= farmer::where('mobile_no',$mobile)->count();
	$scientist=scientist::where('mobile_no',$mobile)->count();
	$admin =admin::where('mobile_no',$mobile)->count();
	$cnt=$farmer+$scientist+$admin;
	return $cnt;
});