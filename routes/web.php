<?php

use App\Http\Controllers\ProfileController;
use App\Models\Akta;
use App\Models\Dokumen;
use App\Models\Notaris;
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
    return redirect()->route('login');
});

use App\Http\Controllers\NotarisController;
use App\Http\Controllers\AktaController;
use App\Http\Controllers\DokumenController;

Route::resource('notaris', NotarisController::class)->parameters([
    'notaris' => 'notaris'
]);
Route::resource('akta', AktaController::class)->parameters([
    'akta' => 'akta'
]);
Route::resource('dokumen', DokumenController::class)->parameters([
    'dokumen' => 'dokumen'
]);
Route::get('dokumen/{dokumen}/view', [DokumenController::class, 'view'])->name('dokumen.view');
Route::get('dokumen/{dokumen}/download', [DokumenController::class, 'download'])->name('dokumen.download');

Route::get('/dashboard', function () {
    return view('dashboard', [
        'notarisCount' => Notaris::count(),
        'aktaCount' => Akta::count(),
        'dokumenCount' => Dokumen::count(),
    ]);
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
