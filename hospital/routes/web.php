<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\PrescriptionController;
use App\Http\Controllers\PrescriptionMedicineController;
use App\Http\Controllers\BillController;
use App\Http\Controllers\MedicineController;
use App\Http\Controllers\MedicinePurchaseController;
use App\Http\Controllers\MedicineSaleController;


Route::get('/', [DashboardController::class,'index'])->name('dashboard');
Route::resource('medicines', MedicineController::class);
Route::resource('medicine-purchases', MedicinePurchaseController::class);
Route::resource('medicine-sales', MedicineSaleController::class);

Route::resource('bills', BillController::class);
Route::resource('prescriptions', PrescriptionMedicineController::class);
Route::resource('prescriptions', PrescriptionController::class);
Route::resource('doctors', DoctorController::class);
Route::resource('appointments', AppointmentController::class);
Route::resource('patients', PatientController::class);
