<?php

use App\Http\Controllers\Admin;
use App\Http\Controllers\CMS;
use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\Superadmin;
use App\Http\Controllers\AboutUs;
use App\Http\Controllers\Appointment;
use App\Http\Controllers\Consultant;
use App\Http\Controllers\ContactUs;
use App\Http\Controllers\Department;
use App\Http\Controllers\Doctor;
use App\Http\Controllers\Equipement;
use App\Http\Controllers\Home;
use App\Http\Controllers\Service;
use App\Http\Controllers\website;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/',[website::class,'index'])->name('index');
Route::get('/about',[website::class,'about'])->name('about');
Route::get('/appointment',[website::class,'appointment'])->name('appointment');
Route::post('/appointment/send',[website::class,'sendappointment'])->name('sendappointment');
Route::get('/contact',[website::class,'contact'])->name('contact');
Route::post('/contact/send',[website::class,'sendcontact'])->name('sendcontact');
Route::get('/department',[website::class,'department'])->name('department');
Route::get('/fordoctor',[website::class,'fordoctor'])->name('fordoctor');
Route::get('/hospitalequipment',[website::class,'hospitalequipment'])->name('hospitalequipment');
Route::get('/meetdr',[website::class,'meetdr'])->name('meetdr');
Route::get('/services',[website::class,'services'])->name('services');
Route::get('/timetable',[website::class,'timetable'])->name('timetable');
Route::get('/telemedicine',function(){return view('website.soon');})->name('telemed');
Route::get('/medical',function(){return view('website.soon');})->name('medical');

Route::get('login', [CustomAuthController::class, 'index'])->name('login');
Route::post('/login', [CustomAuthController::class, 'customLogin'])->name('login.custom');
Route::post('/register', [CustomAuthController::class, 'customRegister'])->name('register.custom');
Route::get('signout', [CustomAuthController::class, 'signOut'])->name('signout');
Route::get('/invitation/{session}',[Superadmin::class,'acceptinvitation'])->name('invit');
Route::post('/invitation/{session}',[Superadmin::class,'register'])->name('accept');
Route::post('/send/admin/superadmin',[Admin::class,'sendtoadmin']);

Route::middleware(['auth'])->group(function () {

    Route::prefix('admin')->group(function () {
    Route::get('/', function(){ return redirect( route('dashboard')); });
    Route::get('/dashboard', [CustomAuthController::class, 'dashboard'])->name('dashboard');
    Route::get('/admins', [Superadmin::class, 'admins'])->name('admins');
    Route::post('/sendadmin',[Superadmin::class,'invitation']);
    Route::get('/admin/{status}/{id}',[Superadmin::class,'changestatus']);

    Route::get('home',[Home::class,'page'])->name('cmshomepage');
    Route::post('home/add/slider',[Home::class,'addslider'])->name('addslider');
    Route::post('home/add/service',[Home::class,'addnewservice'])->name('addnewhomeservice');
    Route::post('home/update/slider/{id}',[Home::class,'updateslider'])->name('updateslider');
    Route::post('home/update/service/{id}',[Home::class,'updateservice'])->name('updatehomeservice');
    Route::post('home/update/who',[Home::class,'updatewho'])->name('updatewho');
    Route::post('home/update/outpatient',[Home::class,'updateoutpatient'])->name('updateoutpatient');
    Route::get('home/delete/slider/{id}',[Home::class,'deleteslider'])->name('deleteslider');
    Route::get('home/delete/service/{id}',[Home::class,'deleteservice'])->name('deletehomeservice');
    Route::get('home/status/slider/{id}/{status}',[Home::class,'statusslider'])->name('statusslider');
    Route::get('home/status/service/{id}/{status}',[Home::class,'statusservice'])->name('statushomeservice');

    Route::get('/about-us',[AboutUs::class,'page'])->name('cmsaboutpage');
    Route::post('/about-us/update',[AboutUs::class,'aboutupdate'])->name('aboutupdate');
    Route::post('/our-vision/update',[AboutUs::class,'visionupdate'])->name('visionupdate');
    Route::post('/our-mission/update',[AboutUs::class,'missionupdate'])->name('missionupdate');
    Route::post('/values/update',[AboutUs::class,'valuesupdate'])->name('valuesupdate');

    Route::get('/service',[Service::class,'page'])->name('cmsservicepage');
    Route::post('/service/add',[Service::class,'addnewservice'])->name('addnewservice');
    Route::post('/service/update/{id}',[Service::class,'updateservice'])->name('updateservice');
    Route::get('/service/delete/{id}',[Service::class,'deleteservice'])->name('deleteservice');
    Route::get('/service/status/{id}/{status}',[Service::class,'statusservice'])->name('statusservice');

    Route::get('/doctors',[Doctor::class,'page'])->name('cmsdoctorpage');
    Route::post('/doctors/add',[Doctor::class,'addnewdoctor'])->name('addnewdoctor');
    Route::post('/doctors/update/{id}',[Doctor::class,'updatedoctor'])->name('updatedoctor');
    Route::get('/doctors/delete/{id}',[Doctor::class,'deletedoctor'])->name('deletedoctor');
    Route::get('/doctors/status/{id}/{status}',[Doctor::class,'statusdoctor'])->name('statusdoctor');

    Route::get('/consultant', [Consultant::class,'page'])->name('cmsconsultantpage');
    Route::post('/consultant/update', [Consultant::class,'update'])->name('cmsconsultantupdate');

    Route::get('/equipement',[Equipement::class,'page'])->name('cmsequipementpage');
    Route::post('/equipement/add',[Equipement::class,'equipementuploadimage'])->name('equipementuploadimage');
    Route::post('/equipement/delete/{id}',[Equipement::class,'equipementdeleteimage'])->name('equipementdeleteimage');

    Route::get('/department',[Department::class,'page'])->name('cmsdepartmentpage');
    Route::post('/department/add',[Department::class,'addnewdepartment'])->name('addnewdepartment');
    Route::post('/department/update/{id}',[Department::class,'updatedepartment'])->name('updatedepartment');
    Route::get('/department/delete/{id}',[Department::class,'deletedepartment'])->name('deletedepartment');
    Route::get('/department/status/{id}/{status}',[Department::class,'statusdepartment'])->name('statusdepartment');

    Route::get('/appointment',[Appointment::class,'page'])->name('cmsappointmentpage');
    Route::post('/appointment/update/{id}',[Appointment::class,'updateappointment'])->name('updateappointment');

    Route::get('/contact-us',[ContactUs::class,'page'])->name('cmscontactpage');
    Route::post('/contact-us/update',[ContactUs::class,'contactpdate'])->name('contactpdate');
    Route::post('/contact-us/opening/update',[ContactUs::class,'openingupdate'])->name('openingupdate');



});
});
