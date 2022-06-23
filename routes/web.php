<?php

use App\Http\Controllers\Admin;
use App\Http\Controllers\CMS;
use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\Superadmin;
use App\Http\Controllers\AboutUs;
use App\Http\Controllers\ContactUs;
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


    Route::get('/about-us',[AboutUs::class,'page'])->name('cmsaboutpage');
    Route::post('/about-us/update',[AboutUs::class,'aboutupdate'])->name('aboutupdate');

    Route::get('/contact-us',[ContactUs::class,'page'])->name('cmscontactpage');
    Route::post('/contact-us/update',[ContactUs::class,'contactpdate'])->name('contactpdate');

    

});
});
