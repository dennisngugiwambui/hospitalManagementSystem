<?php

use App\Http\Controllers\GoogleAuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\OperationalController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('homepages.index');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// HOME PAGE CONTROLLER
Route::get('/', [App\Http\Controllers\MainController::class, 'index']);

Route::get('/about', [App\Http\Controllers\MainController::class, 'about']);

Route::get('/contact', [App\Http\Controllers\MainController::class, 'contact']);

Route::get('/appointments', [App\Http\Controllers\MainController::class, 'appointments']);

Route::get('/doctors', [App\Http\Controllers\MainController::class, 'doctors']);

Route::get('/department', [App\Http\Controllers\MainController::class, 'department']);



Route::get('auth/google', [GoogleAuthController::class, 'redirect'])->name('google-auth');

Route::get('auth/google/callback', [GoogleAuthController::class, 'callbackGoogle']);


Route::get('profile/{name}', [HomeController::class, 'profile'])->name('profile');


Route::get('allusers', [HomeController::class, 'All_users'])->name('allusers');
Route::get('receptionist', [HomeController::class, 'receptionist'])->name('receptionist');

Route::get('my_appointments', [HomeController::class, 'all_appointment'])->name('appointments');

Route::get('/medications', [HomeController::class, 'medications'])->name('medications');


Route::get('/Alldoctors', [HomeController::class, 'doctors'])->name('doctors');

Route::get('/doctors', [MainController::class, 'home_doctors'])->name('home_doctors');

Route::get('/treatment', [HomeController::class, 'treatment'])->name('treatment');

Route::get('/user_details/{id}', [HomeController::class, 'user_details'])->name('user_details');

Route::get('/laboratory', [HomeController::class, 'lab'])->name('lab');

Route::get('/lab_testing/{id}', [HomeController::class, 'lab_testing'])->name('lab_testing');

Route::get('/wards', [HomeController::class, 'wards'])->name('wards');


Route::get('/ward_profile/{id}', [HomeController::class, 'Patient_ward_profile'])->name('Patient_ward_profile');

Route::get('/pharmacy', [HomeController::class, 'pharmacy'])->name('pharmacy');



Route::get('/medicine/price', [OperationalController::class, 'getPrice'])->name('get_medicine_price');

Route::get('/search/ticket', [OperationalController::class, 'searchTicket'])->name('search_ticket');

Route::get('/admitted', [HomeController::class, 'admitted_patients'])->name('admitted');

Route::get('/contacted', [HomeController::class, 'contacted'])->name('contacted');
Route::get('/payment', [HomeController::class, 'paid_cases'])->name('paid_cases');



//Route::post('/users', [\App\Http\Controllers\UserController::class, 'user']);



Route::post('pharmcyPatient',[OperationalController::class, 'pharmacy_patient'])->name('pharmacy_patient');

Route::post('pharmacy',[OperationalController::class, 'pharmacy'])->name('pharmacy-post');


Route::post('Booking_ward/{id}',[OperationalController::class, 'Booking_ward'])->name('Booking_ward');


Route::post('contact',[OperationalController::class, 'contactus'])->name('contactus');

Route::post('Lab_Data',[OperationalController::class, 'Lab_Data'])->name('Lab_Data');

Route::post('/getting_lab/{id}',[OperationalController::class, 'getting_lab'])->name('getting_lab');


Route::post('/ward_patients',[OperationalController::class, 'ward_patients'])->name('ward_patients');



Route::post('/adding_ward_patient',[OperationalController::class, 'adding_ward_patient'])->name('adding_ward_patient');


Route::post('/register_patients', [\App\Http\Controllers\OperationalController::class, 'register_patients'])->name('register_patients');

Route::post('/update', [\App\Http\Controllers\OperationalController::class, 'update'])->name('users.update');

Route::post('/making_admin', [\App\Http\Controllers\OperationalController::class, 'making_admin'])->name('making_admin');

Route::post('/adding_doctors', [\App\Http\Controllers\OperationalController::class, 'adding_doctors'])->name('adding_doctors');

Route::post('/Doctor_booking', [\App\Http\Controllers\OperationalController::class, 'Doctor_booking'])->name('Doctor_booking');

Route::post('/search_users', [\App\Http\Controllers\OperationalController::class, 'search-users'])->name('search-users');

Route::post('/patient_treatment', [\App\Http\Controllers\OperationalController::class, 'patient_treatment'])->name('patient_treatment');



Route::post('/destroy/{id}', [App\Http\Controllers\OperationalController::class, 'user_destroy'])->name('destroy-user');

Route::post('/appoinment_add', [App\Http\Controllers\OperationalController::class, 'addingAppointment'])->name('appointment_add');
