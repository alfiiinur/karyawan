<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RedirectAuthenticatedUsersController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\AbsensiController;
use App\Http\Controllers\IzinController;
use App\Http\Controllers\PelanggaranController;
use App\Http\Controllers\DataController;

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

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');
Route::group(['middleware' => 'auth'], function() {
    // Route::get('/dashboard', 'Dashboard')->name('dashboard');

    Route::get("/redirectAuthenticatedUsers", [RedirectAuthenticatedUsersController::class, "home"]);

    // Route::get('/karyawan', [KaryawanController::class, 'index']);
    Route::resource('karyawan', KaryawanController::class);
    Route::resource('absensi', AbsensiController::class);
    Route::get('/izin', [IzinController::class, 'index']);

    Route::group(['middleware' => 'checkRole:admin'], function() {
        Route::get('/adminDashboard', function () {
            return view('admin.adminDashboard');
        })->name('adminDashboard');
        // Route::resource('karyawan', KaryawanController::class);
        // Route::get('/izin', [IzinController::class, 'index']);
        Route::post('/izin', [IzinController::class, 'store']);
        Route::get('/izin/create', [IzinController::class, 'create']);
        Route::post('/izin/{id}', [IzinController::class, 'destroy']);

        Route::get('/pelanggaran', [PelanggaranController::class, 'index']);
        Route::post('/pelanggaran', [PelanggaranController::class, 'store']);
        Route::get('/pelanggaran/create', [PelanggaranController::class, 'create']);
        Route::post('/pelanggaran/{id}', [PelanggaranController::class, 'destroy']);
        Route::get('/pelanggaran/{id}', [PelanggaranController::class, 'detail']);


        // Route::post('/absensi', [AbsensiController::class, 'store']);
        // Route::get('/absensi/create', [AbsensiController::class, 'create']);
        // Route::post('/absensi/{id}', [AbsensiController::class, 'destroy']);

        // Route::get('/absensi/create', [AbsensiController::class, 'create'])->name('absensi.create');
        // Route::post('/absensi', [AbsensiController::class, 'store'])->name('absensi.store');
        Route::get('absensi', [DataController::class, 'index'])->name('absensi.index');
        Route::get('/data/create', [DataController::class, 'create'])->name('data.create');
        Route::post('/data', [DataController::class, 'store'])->name('data.store');



    });

    
    Route::group(['middleware' => 'checkRole:user'], function() {
        Route::get('/userDashboard', function () {
            return view('user.userDashboard');
        })->name('userDashboard');
        // Route::get('/karyawan', [KaryawanController::class, 'index']);
        // Route::get('/izin', [IzinController::class, 'index']);
        Route::post('/absensi', [AbsensiController::class, 'store']);
        // Route::get('/absensi/create', [AbsensiController::class, 'create']);
    });
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
