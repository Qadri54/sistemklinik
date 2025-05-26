<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OnlineBookingController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DokterController;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ResepsionisController;
use App\Http\Controllers\Konsultasi;

Route::get('/', function () {
    return view('index');
});


Route::middleware(['auth'])->group(function () {

    // =================== PASIEN ===================
    Route::prefix('pasien')->group(function () {
        // data diri pasien
        Route::get('/dashboard-pasien', [PasienController::class, 'dashboard'])->name('dashboard.pasien');
        Route::get('/profil-pasien', [PasienController::class, 'dashboard'])->name('profil.pasien');
        Route::post('/profil/update', [PasienController::class, 'update'])->name('profil-pasien.update');

        // membuat konsultasi pasein
        Route::get('/konsultasi-pasien', [Konsultasi::class, 'index'])->name('buatjanji');
        Route::post('/konsultasi', [Konsultasi::class, 'storepasien'])->name('konsultasi-pasien-online');

        //list jadwal konsultasi pasien
        Route::get('/jadwal-konsultasi', [PasienController::class, 'jadwalKonsultasi'])->name('jadwal.konsultasi');

        // pembayaran pasien
        Route::get('/pembayaran', [PasienController::class, 'pembayaran'])->name('pembayaran.pasien');
        Route::post('/pembayaran/{id}/bayar', [PasienController::class, 'bayar'])->name('bayar.pasien');
    });

    // =================== Resepsionis ===================
    Route::prefix('resepsionis')->group(function () {
        Route::get('/dashboard', [ResepsionisController::class, 'dashboard'])->name('dashboard.resepsionis');

        // konsultasi
        Route::get('/konsultasi', [ResepsionisController::class, 'getAllScheduls'])->name('dashboard.konsultasi');
        Route::post('/konsultasi', [Konsultasi::class, 'store'])->name('konsultasi-pasien');

        Route::get('/scheduls', [Konsultasi::class, 'create'])->name('dashboard.view.scheduls');

        //view create resepsionis
        Route::get('/resepsins', [AdminController::class, 'create_resepsionis'])->name('dashboard.view.resepsionis');
        Route::post('/resepsins', [AdminController::class, 'store_resepsionis'])->name('dashboard.create.resepsionis');

        Route::get('/pasien', [ResepsionisController::class, 'getPasien'])->name('dashboard.view.pasien');

        // Pasien
        Route::get('/add-pasien', [ResepsionisController::class, 'createPasien'])->name('dashboard.add.pasien');
        Route::post('/add-pasien', [ResepsionisController::class, 'tambahPasien'])->name('dashboard.create.pasien');
    });

    // =================== DOKTER ===================
    Route::prefix('dokter')->group(function () {

        Route::get('/dashboard', [DokterController::class, 'dashboard'])->name('dashboard.dokter');

        // route untuk jadwal yang telah selesai
        Route::get('/jadwal-selesai', [DokterController::class, 'jadwalSelesai'])->name('jadwal.selesai');

        // profile dokter
        Route::get('/profile', [DokterController::class, 'profile'])->name('profile.dokter');
        Route::put('/profile', [DokterController::class, 'updateProfile'])->name('update.dokter');

        // Route untuk tindak lanjut (contoh untuk ke halaman detail konsultasi atau form diagnosis)
        Route::get('/dokter/konsultasi/{id}/tindaklanjut', [DokterController::class, 'showTindakLanjutForm'])->name('dokter.tindaklanjutedit.form');
        Route::post('/dokter/konsultasi/{id}/tindaklanjut', [DokterController::class, 'updateTindakLanjut'])->name('dokter.tindaklanjut.update');
    });

    // =================== ADMIN ===================
    Route::prefix('admin')->group(function () {

        // =================== KONSULTASI (ADMIN) ===================
        Route::prefix('consultations')->group(function () {
            Route::get('/', [AdminController::class, 'getAllConsultations'])->name('admin.consultations');
            Route::delete('/{id}', [AdminController::class, 'deleteConsultation'])->name('admin.consultations.delete');
        });


        Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard.admin');

        // Pasien
        Route::get('/patients', [AdminController::class, 'getAllPatients'])->name('admin.patients');
        Route::post('/patients/{id}', [AdminController::class, 'destroyPatients'])->name('admin.delete.patients');

        // Dokter
        Route::get('/doctors', [AdminController::class, 'getAllDoctors'])->name('admin.doctors');
        Route::get('/add/doctors', [AdminController::class, 'createdokter'])->name('admin.create.doctors');
        Route::post('/add/doctors', [AdminController::class, 'store_dokter'])->name('admin.create.doctors');
        Route::post('/doctors/{id}', [AdminController::class, 'delete_dokter'])->name('admin.doctors.delete');

        // Jadwal Konsultasi
        Route::get('/scheduls', [AdminController::class, 'getAllScheduls'])->name('admin.view.scheduls');
        Route::post('/add/scheduls', [AdminController::class, 'store_scheduls'])->name('admin.create.scheduls');
    });
});

// Form Register
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
// Proses Register
Route::post('/register', [AuthController::class, 'register']);
// Form Login
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
// Proses Login
Route::post('/login', [AuthController::class, 'login']);
// Logout
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
