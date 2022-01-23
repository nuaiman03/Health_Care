<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MedicineController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\PrescriptionController;

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

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/login', function () {
//     return view('auth.login');
// });

// Route::get('/registration', function () {
//     return view('auth.registration');
// });

Route::get('/start', function () {
    return view('start');
});

Route::get('/dashboard', function () {
    return view('dashboard.dashboard');
});



// Route::get('/prescribe', function () {
//     return view('prescription.prescribe');
// });



// Route::get('/add-new-medicine', function () {
//     return view('medicine.add-new-medicine');
// });


Route::resource('medicine','App\Http\Controllers\MedicineController');
Route::resource('test','App\Http\Controllers\TestController');

// Route::resource('prescribe','App\Http\Controllers\PrescribeController');

Route::get('/prescribe', [PrescriptionController::class, 'create'])->name('prescription.create');
Route::post('/prescription/create', [PrescriptionController::class, 'store'])->name('prescription.store');
Route::get('/patients_info', [PrescriptionController::class, 'patients_info'])->name('patients_info');
Route::get('/get_student_history', [PrescriptionController::class, 'get_student_history'])->name('get_student_history');
Route::post('/submitData',[PrescriptionController::class, 'submitData']);