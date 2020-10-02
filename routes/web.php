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



Route::get('/admin/home', function() {
    return view('admin.home');
})->name('admin');
//contacts
Route::resource('/admin/contacts/appointment', 'App\Http\Controllers\Admin\AppointmentController');
//doctors
Route::resource('/admin/doctors/doctor', 'App\Http\Controllers\Admin\DoctorController');
Route::resource('/admin/doctors/occupation', 'App\Http\Controllers\Admin\OccupationController');
//researches
Route::resource('/admin/researches/type', 'App\Http\Controllers\Admin\TypeController');
Route::resource('/admin/researches/disease', 'App\Http\Controllers\Admin\DiseaseController');
Route::resource('/admin/researches/research', 'App\Http\Controllers\Admin\ResearchController');
//products
Route::resource('/admin/products/category', 'App\Http\Controllers\Admin\CategoryController');