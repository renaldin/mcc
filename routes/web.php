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
use App\Http\Controllers\CalendarCalibrationScheduleController;
use App\Http\Controllers\CalendarDrainScheduleController;
use App\Http\Controllers\CalibrationScheduleController;
use App\Http\Controllers\ChecksheetCheckingController;
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


Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'index'])->name('Auth.profile');
    Route::post('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
});

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
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

// Route::view('/', 'AdminDashboard');
Route::view('/', 'dashboard');

Route::group(['middleware' => 'revalidate'], function () {

    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::get('/dashboard', [Dashboard::class, 'index'])->name('dashboard');;

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
    Route::post('/edit-detail-checksheet-treatment/{id}', [ChecksheetTreatmentDetailController::class, 'update'])->name('edit-detail-checksheet-treatment');

    Route::get('/checksheet-treatment/laporan', [ChecksheetTreatmentController::class, 'laporan'])->name('checksheet-treatment.laporan');
    Route::get('/checksheet-treatment/{id}/cetak-pdf', [ChecksheetTreatmentDetailController::class, 'cetakPDF'])->name('checksheet-treatment-detail.cetakPDF');

    Route::get('/kelola-jadwal-kalibrasi', [CalibrationScheduleController::class, 'index'])->name('kelola-jadwal-kalibrasi');
    Route::get('/tambah-jadwal-kalibrasi', [CalibrationScheduleController::class, 'store'])->name('tambah-jadwal-kalibrasi');
    Route::post('/tambah-jadwal-kalibrasi', [CalibrationScheduleController::class, 'store'])->name('tambah-jadwal-kalibrasi');
    Route::get('/edit-jadwal-kalibrasi/{id}', [CalibrationScheduleController::class, 'update'])->name('edit-jadwal-kalibrasi');
    Route::post('/edit-jadwal-kalibrasi/{id}', [CalibrationScheduleController::class, 'update']);
    Route::get('/detail-jadwal-kalibrasi/{id}', [CalibrationScheduleController::class, 'detail'])->name('detail-jadwal-kalibrasi');
    Route::get('/hapus-jadwal-kalibrasi/{id}', [CalibrationScheduleController::class, 'delete']);
    Route::get('/verifikasi-jadwal-kalibrasi/{id}', [CalibrationScheduleController::class, 'verify'])->name('verifikasi-jadwal-kalibrasi');

    Route::get('/kalender-jadwal-kalibrasi', [CalendarCalibrationScheduleController::class, 'index'])->name('kalender-jadwal-kalibrasi');

    Route::get('/kalender-jadwal-pengurasan', [CalendarDrainScheduleController::class, 'index'])->name('kalender-jadwal-pengurasan');

    Route::get('/kelola-jadwal-pengurasan', [DrainScheduleController::class, 'index'])->name('kelola-jadwal-pengurasan');
    Route::get('/tambah-jadwal-pengurasan', [DrainScheduleController::class, 'store'])->name('tambah-jadwal-pengurasan');
    Route::post('/tambah-jadwal-pengurasan', [DrainScheduleController::class, 'store'])->name('tambah-jadwal-pengurasan');
    Route::get('/edit-jadwal-pengurasan/{id}', [DrainScheduleController::class, 'update'])->name('edit-jadwal-pengurasan');
    Route::post('/edit-jadwal-pengurasan/{id}', [DrainScheduleController::class, 'update']);
    Route::get('/detail-jadwal-pengurasan/{id}', [DrainScheduleController::class, 'detail'])->name('detail-jadwal-pengurasan');
    Route::get('/hapus-jadwal-pengurasan/{id}', [DrainScheduleController::class, 'delete']);
    Route::get('/verifikasi-jadwal-pengurasan/{id}', [DrainScheduleController::class, 'verify'])->name('verifikasi-jadwal-pengurasan');

    Route::get('/kelola-checksheet-pengecheckan', [ChecksheetCheckingController::class, 'index'])->name('kelola-checksheet-pengecheckan');
    Route::get('/tambah-checksheet-pengecheckan', [ChecksheetCheckingController::class, 'store'])->name('tambah-checksheet-pengecheckan');
    Route::post('/tambah-checksheet-pengecheckan', [ChecksheetCheckingController::class, 'store'])->name('tambah-checksheet-pengecheckan');
    Route::get('/edit-checksheet-pengecheckan/{id}', [ChecksheetCheckingController::class, 'update'])->name('edit-checksheet-pengecheckan');
    Route::post('/edit-checksheet-pengecheckan/{id}', [ChecksheetCheckingController::class, 'update']);
    Route::get('/hapus-checksheet-pengecheckan/{id}', [ChecksheetCheckingController::class, 'delete']);

    Route::get('/laporan-checksheet-pengecekan', [ChecksheetCheckingController::class, 'laporan'])->name('laporan-checksheet-pengecekan');
    Route::get('/laporan-checksheet-pdf', [ChecksheetCheckingController::class, 'cetakPDF'])->name('laporan-checksheet-pdf');
});

Route::group(['middleware' => 'qc'], function () {
    Route::get('/profile-qc', [UserController::class, 'profileQC'])->name('profile.qc');
    Route::post('/profile-qc/update', [UserController::class, 'updateProfileQC'])->name('profile.qc.update');
});

Route::group(['middleware' => 'maintenance'], function () {
    Route::get('/profile-maintenance', [UserController::class, 'profileMaintenance'])->name('profile.maintenance');
    Route::post('/profile-maintenance/update', [UserController::class, 'updateProfileMaintenance'])->name('profile.maintenance.update');
});

Route::get('/notifications/fetch', [App\Http\Controllers\NotificationController::class, 'fetch'])->name('notifications.fetch');
Route::post('/notifications/mark-as-read', [App\Http\Controllers\NotificationController::class, 'markAsRead'])->name('notifications.markAsRead');
