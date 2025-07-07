<?php
  
use Illuminate\Support\Facades\Route;
  
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
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
use App\Http\Controllers\StockActivityController;
   
// Route::get('/', function () {
//     return view('welcome');
// });
  
Auth::routes();
  
Route::get('/home', [HomeController::class, 'index'])->name('home');
  
Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
    Route::resource('products', ProductController::class);


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

    Route::get('/stock-management', [StockActivityController::class, 'index'])->name('stock.index');

    Route::post('/stock-management/stock-in', [StockActivityController::class, 'stockInStore'])->name('stock.in.store');

    Route::post('/stock-management/stock-out', [StockActivityController::class, 'stockOutStore'])->name('stock.out.store');
});