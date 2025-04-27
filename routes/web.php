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
use App\Http\Controllers\CalibrationScheduleController;
use App\Http\Controllers\ChecksheetTreatmentController;
use App\Http\Controllers\ChecksheetTreatmentDetailController;
use App\Http\Controllers\MaintenanceController;
use App\Http\Controllers\JadwalKalibrasiController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CsTreatmentController;
use App\Http\Controllers\Dashboard;
use App\Http\Controllers\DrainScheduleController;
use App\Http\Controllers\LihatJadwalKalibrasiController;
use App\Http\Controllers\UserController;

// Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
// Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'index'])->name('Auth.profile');
    Route::post('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
});

// Route::middleware(['auth'])->group(function () {
//     Route::get('dashboard', function () {
//         return view('AdminDashboard');
//     })->name('admin.dashboard');
// });
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

Route::get('/kelola-jadwal-kalibrasi', [JadwalKalibrasiController::class, 'index'])->name('kelola-jadwal-kalibrasi');
Route::get('/tambah-jadwal-kalibrasi', [JadwalKalibrasiController::class, 'store'])->name('tambah-jadwal-kalibrasi');
Route::post('/tambah-jadwal-kalibrasi', [JadwalKalibrasiController::class, 'store'])->name('tambah-jadwal-kalibrasi');
Route::get('/edit-jadwal-kalibrasi/{id}', [JadwalKalibrasiController::class, 'update'])->name('edit-jadwal-kalibrasi');
Route::post('/edit-jadwal-kalibrasi/{id}', [JadwalKalibrasiController::class, 'update'])->name('edit-jadwal-kalibrasi');
Route::get('/hapus-jadwal-kalibrasi/{id}', [JadwalKalibrasiController::class, 'delete'])->name('hapus-jadwal-kalibrasi');

Route::get('/lihat-jadwal-kalibrasi', [LihatJadwalKalibrasiController::class, 'index'])->name('lihat-jadwal-kalibrasi');

// Route::view('/', 'AdminDashboard');
Route::view('/', 'dashboard');

Route::group(['middleware' => 'revalidate'], function () {
    
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::get('/dashboard', [Dashboard::class, 'index'])->name('dashboard');

    Route::get('/kelola-user', [UserController::class, 'index'])->name('kelola-user');
    Route::get('/tambah-user', [UserController::class, 'store'])->name('tambah-user');
    Route::post('/tambah-user', [UserController::class, 'store']);
    Route::get('/edit-user/{id}', [UserController::class, 'update'])->name('edit-user');
    Route::post('/edit-user/{id}', [UserController::class, 'update']);
    Route::get('/hapus-user/{id}', [UserController::class, 'delete']);
    
    Route::get('/kelola-checksheet-treatment', [ChecksheetTreatmentController::class, 'index'])->name('kelola-checksheet-treatment');
    Route::get('/tambah-checksheet-treatment', [ChecksheetTreatmentController::class, 'store'])->name('tambah-checksheet-treatment');
    Route::post('/tambah-checksheet-treatment', [ChecksheetTreatmentController::class, 'store'])->name('tambah-checksheet-treatment');
    Route::get('/edit-checksheet-treatment/{id}', [ChecksheetTreatmentController::class, 'update'])->name('edit-checksheet-treatment');
    Route::post('/edit-checksheet-treatment/{id}', [ChecksheetTreatmentController::class, 'update']);
    Route::get('/hapus-checksheet-treatment/{id}', [ChecksheetTreatmentController::class, 'delete']);

    Route::get('/detail-checksheet-treatment/{id}', [ChecksheetTreatmentDetailController::class, 'index'])->name('detail-checksheet-treatment');

    Route::get('/kelola-jadwal-kalibrasi', [CalibrationScheduleController::class, 'index'])->name('kelola-jadwal-kalibrasi');
    Route::get('/tambah-jadwal-kalibrasi', [CalibrationScheduleController::class, 'store'])->name('tambah-jadwal-kalibrasi');
    Route::post('/tambah-jadwal-kalibrasi', [CalibrationScheduleController::class, 'store'])->name('tambah-jadwal-kalibrasi');
    Route::get('/edit-jadwal-kalibrasi/{id}', [CalibrationScheduleController::class, 'update'])->name('edit-jadwal-kalibrasi');
    Route::post('/edit-jadwal-kalibrasi/{id}', [CalibrationScheduleController::class, 'update']);
    Route::get('/hapus-jadwal-kalibrasi/{id}', [CalibrationScheduleController::class, 'delete']);

    Route::get('/kelola-jadwal-pengurasan', [DrainScheduleController::class, 'index'])->name('kelola-jadwal-pengurasan');
    Route::get('/tambah-jadwal-pengurasan', [DrainScheduleController::class, 'store'])->name('tambah-jadwal-pengurasan');
    Route::post('/tambah-jadwal-pengurasan', [DrainScheduleController::class, 'store'])->name('tambah-jadwal-pengurasan');
    Route::get('/edit-jadwal-pengurasan/{id}', [DrainScheduleController::class, 'update'])->name('edit-jadwal-pengurasan');
    Route::post('/edit-jadwal-pengurasan/{id}', [DrainScheduleController::class, 'update']);
    Route::get('/hapus-jadwal-pengurasan/{id}', [DrainScheduleController::class, 'delete']);
});
