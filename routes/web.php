<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DrCareController;

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

//Route::get('/', function () {
//    return view('welcome');
//});

Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/', [DrCareController::class, 'index'])->name('index');
Route::get('/about', [DrCareController::class, 'about'])->name('about');
Route::get('/diseases/{id}', function($id) {
    return view('drcare.diseases', ['id' => $id]);
})->name('diseases');
Route::get('/research', [DrCareController::class, 'research'])->name('research');
Route::get('/research/{id}', function ($id) {
    return view('drcare.research-single', ['id' => $id]);
})->name('research-single');
Route::get('/doctor',[DrCareController::class, 'doctor'])->name('doctor');
Route::get('/products', function() {
    return view('drcare.pricing');
});



Route::get('/appointment', function() {
    return view('drcare.appointment');
})->name('appointment');
Route::get('/blog', function() {
    return view('drcare.blog');
})->name('blog');
Route::get('/blog-single', function() {
    return view('drcare.blog-single');
})->name('blog-single');
Route::get('/contact', function() {
    return view('drcare.contact');
})->name('contact');
Route::get('/department', function() {
    return view('drcare.department');
})->name('department');

Route::get('pricing', function() {
    return view('drcare.pricing');
})->name('pricing');

//admin



Route::get('manager', function() {
    return view('admin.home');
});

Route::resource('/admin/appointment', 'App\Http\Controllers\Admin\AppointmentController');
Route::resource('/admin/doctor', 'App\Http\Controllers\Admin\DoctorController');
Route::resource('/admin/occupation', 'App\Http\Controllers\Admin\OccupationController');
Route::resource('/admin/type', 'App\Http\Controllers\Admin\TypeController');
Route::resource('/admin/disease', 'App\Http\Controllers\Admin\DiseaseController');