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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/regf','path@signup');
Route::get('/regs','path@ssignup');
Route::get('/signin','path@signin');
Route::get('/contact','path@contact');
Route::get('/about','path@about');
Route::get('/dist','path@dist');
Route::get('/taluka','path@taluka');
Route::get('/village','path@village');
Route::get('/departmentType','path@department_type');
Route::get('/department','path@department');
Route::get('/groupType','path@group_type');
Route::get('/group','path@group');
Route::get('/user','path@user');
Route::get('/question','path@question');
Route::get('/upload','path@upload');
Route::get('/ViewVideo','path@ViewVideo');
Route::post('/addAnswer','scientistcontroller@AddAnswer');
Route::post('/UpdateAnswer','scientistcontroller@UpdateAnswer');
Route::post('/UploadVideo','scientistcontroller@UploadVideo');
Route::post('/addQuestion','farmerController@AddQuestion');
Route::get('/viewQuestion','path@ViewQuestion');
Route::get('/viewAnswer','path@viewAnswer');
Route::get('/AcceptReject','adminController@AcceptReject');
Route::resource('farmer','farmerController');
Route::resource('scientist','scientistcontroller');
Route::post('/login','logincotroller@login');
Route::get('/signout','logincotroller@logout');
Route::post('/addDist','AddinfoController@dist');
Route::post('/addTaluka','AddinfoController@taluka');
Route::post('/addVillage','AddinfoController@village');
Route::post('/addDepartmenttp','AddinfoController@departmenttp');
Route::post('/addDepartment','AddinfoController@department');
Route::post('/addGrouptp','AddinfoController@grouptp');
Route::post('/addGroup','AddinfoController@group');

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

Route::get('/ajax-distedit',function(){
	$dist_id = Input::get('did') ;
	$dist_name = Input::get('dnm') ;
	$update=district::where('id', $dist_id)->update(['name' => $dist_name]);
	return $update;
});