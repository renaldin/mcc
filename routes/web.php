<?php

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

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\MaintenanceController;
use App\Http\Controllers\JadwalKalibrasiController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CsTreatmentController;



Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'index'])->name('Auth.profile');
    Route::post('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
});

Route::middleware(['auth'])->group(function () {
    Route::get('dashboard', function () {
        return view('AdminDashboard');
    })->name('admin.dashboard');
});
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);
Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::get('/Maintenance/dashboard', function () {
    return view('Maintenance.dashboard');
})->name('Maintenance.dashboard');

Route::prefix('Maintenance')->middleware(['auth'])->group(function () {
    Route::get('/dashboard', [MaintenanceController::class, 'index'])->name('Maintenance.dashboard');
    Route::get('/create', [MaintenanceController::class, 'create'])->name('Maintenance.create');
    Route::post('/store', [MaintenanceController::class, 'store'])->name('Maintenance.store');
    Route::get('/edit/{id}', [MaintenanceController::class, 'edit'])->name('Maintenance.edit');
    Route::put('/update/{id}', [MaintenanceController::class, 'update'])->name('Maintenance.update');
    Route::post('/verify/{id}', [MaintenanceController::class, 'verify'])->name('Maintenance.verify');
    Route::get('/notifications', [MaintenanceController::class, 'notify'])->name('Maintenance.notifications');
});

Route::prefix('jadwal')->middleware(['auth'])->group(function () {
// Route::get('/jadwal-kalibrasi', [JadwalKalibrasiController::class, 'index'])->name('jadwal.JadwalKalibrasi');
Route::resource('jadwal_kalibrasi', JadwalKalibrasiController::class);
Route::post('/', [JadwalKalibrasiController::class, 'store'])->name('jadwal.JadwalKalibrasi');
Route::put('/jadwal/{id}', [JadwalKalibrasiController::class, 'update'])->name('jadwal.JadwalKalibrasi');
Route::delete('/jadwal-kalibrasi/{id}', [JadwalKalibrasiController::class, 'destroy']);

    Route::get('/', [JadwalKalibrasiController::class, 'index'])->name('jadwal.JadwalKalibrasi');
    // Route::get('/jadwal/data', [JadwalKalibrasiController::class, 'data'])->name('jadwal.data');
    // Route::get('/jadwal-kalibrasi/tambah', [JadwalKalibrasiController::class, 'buat'])->name('jadwal.TambahJadwalKalibrasi');
    // Route::post('/jadwal/store', [JadwalKalibrasiController::class, 'store'])->name('jadwal.store');
    // Route::get('/jadwal/get-jadwal', [JadwalKalibrasiController::class, 'getJadwal']);
    // Route::post('/jadwal/simpan', [JadwalKalibrasiController::class, 'simpan'])->name('jadwal.simpan');
    // Route::post('/jadwal/verifikasi/{id}', [JadwalKalibrasiController::class, 'verifikasi'])->name('verifikasi');
    // Route::get('/jadwal/edit/{id}', [JadwalKalibrasiController::class, 'edit'])->name('EditJadwalKalibrasi');
    // Route::post('/simpan', [JadwalKalibrasiController::class, 'simpan'])->name('jadwal.simpan');
    // Route::get('/edit/{id}', [JadwalKalibrasiController::class, 'edit'])->name('jadwal.EditJadwalKalibrasi');
    // Route::put('/perbarui/{id}', [JadwalKalibrasiController::class, 'perbarui'])->name('jadwal.perbarui');
    // Route::post('/verifikasi/{id}', [JadwalKalibrasiController::class, 'verifikasi'])->name('jadwal.verifikasi');
});

Route::get('/cs_treatment', [CsTreatmentController::class, 'index'])->name('cs_treatment.index');
Route::post('/cs_treatment', [CsTreatmentController::class, 'store'])->name('cs_treatment.store');
Route::get('/cs_treatment/create', [CsTreatmentController::class, 'create'])->name('cs_treatment.create');
Route::get('/cs_treatment/{id}', [CsTreatmentController::class, 'show'])->name('cs_treatment.show');
Route::get('/cs_treatment/{id}/edit', [CsTreatmentController::class, 'edit'])->name('cs_treatment.edit');
Route::put('/cs_treatment/{id}', [CsTreatmentController::class, 'update'])->name('cs_treatment.update');
Route::delete('/cs_treatment/{id}', [CsTreatmentController::class, 'destroy'])->name('cs_treatment.destroy');


// Route::view('/', 'AdminDashboard');
Route::view('/', 'dashboard');
