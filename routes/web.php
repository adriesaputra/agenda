<?php

use App\Http\Controllers\Admin\AgendaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\JabatanController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\LiputanController;
use App\Http\Controllers\Admin\PejabatController;
use App\Http\Controllers\Admin\ProtokolController;

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
    return redirect()->route('login');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', DashboardController::class)->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'is_admin'], function () {
        Route::resource('/prokopim/jabatan', JabatanController::class);
        Route::resource('/prokopim/pejabat', PejabatController::class);
        Route::resource('/prokopim/protokol', ProtokolController::class);
        Route::resource('/prokopim/liputan', LiputanController::class);
        Route::resource('/prokopim/agenda', AgendaController::class);
    });
});

require __DIR__ . '/auth.php';
