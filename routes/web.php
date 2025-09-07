<?php

use Illuminate\Support\Facades\Route;

// Controllers
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\LayananController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\KontakController;
use App\Http\Controllers\ProfilKotaController;
use App\Http\Controllers\InformasiPublikController;
use App\Http\Controllers\ApbdController;
use App\Http\Controllers\IpkdController;
use App\Http\Controllers\DokumenController;
use App\Http\Controllers\SearchController;
use App\Models\Galeri;
use App\Http\Controllers\SambutanController;
use App\Http\Controllers\SejarahController;


Route::get('/layanans', [LayananController::class, 'index'])->name('layanans.index');

Route::get('/profil/visi-misi/{id}/edit', [ProfilKotaController::class, 'visiMisiEdit'])->name('profil.visimisi.edit');
Route::put('/profil/visi-misi/{id}', [ProfilKotaController::class, 'visiMisiUpdate'])->name('profil.visimisi.update');

Route::get('/profil/visi-misi', [ProfilController::class, 'visiMisi']);

Route::get('/visi-misi', [\App\Http\Controllers\VisiMisiController::class, 'index'])
    ->name('visi-misi');


Route::get('/profil/sambutan-walikota', [SambutanController::class, 'index'])->name('profil.sambutan');
Route::get('/profil/sejarah', [SejarahController::class, 'index'])->name('profil.sejarah');
Route::get('/profil/visi-misi', [ProfilKotaController::class, 'visiMisi'])->name('profil.visi-misi');
Route::get('/admin/profil/visi-misi', [ProfilKotaController::class, 'visiMisi'])->name('profil.visimisi');
Route::get('/admin/profil/visi-misi/edit', [ProfilKotaController::class, 'visiMisiEdit'])->name('profil.visimisi.edit');
Route::post('/admin/profil/visi-misi/update', [ProfilKotaController::class, 'visiMisiUpdate'])->name('profil.visimisi.update');


Route::get('/profil/sejarah', [ProfilKotaController::class, 'sejarah'])->name('profil.sejarah');


Route::get('/sambutan', [App\Http\Controllers\SambutanController::class, 'index'])->name('sambutan');


Route::get('/galeri', function () {
    $galeri = Galeri::all();
    return view('galeri', compact('galeri'));
});

/*
|--------------------------------------------------------------------------
| Language Switcher
|--------------------------------------------------------------------------
*/
Route::get('/lang/{lang}', function ($lang) {
    if (in_array($lang, ['id', 'en'])) {
        session(['locale' => $lang]);
    }
    return redirect()->back();
})->name('lang.switch');

/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/search', [SearchController::class, 'index'])->name('search');

// Berita
Route::prefix('berita')->name('berita.')->group(function () {
    Route::get('/', [BeritaController::class, 'index'])->name('index');
    Route::get('/{id}', [BeritaController::class, 'show'])->name('show');
});

// Profil Kota
Route::prefix('profil')->name('profil.')->group(function () {
    Route::get('/', [ProfilKotaController::class, 'index'])->name('index');
    Route::get('/sambutan-walikota', [ProfilKotaController::class, 'sambutan'])->name('sambutan');
    Route::get('/sejarah-kota', [ProfilKotaController::class, 'sejarah'])->name('sejarah');
    Route::get('/visi-misi', [ProfilKotaController::class, 'visimisi'])->name('visimisi');
});

// APBD
Route::prefix('apbd')->name('apbd.')->group(function () {
    Route::get('/', [ApbdController::class, 'index'])->name('index');
    Route::get('/{year}', [ApbdController::class, 'show'])->name('show');
});

// Layanan
Route::get('/layanan', [LayananController::class, 'index'])->name('layanan');

// Galeri & Kontak
Route::get('/galeri', [GaleriController::class, 'index'])->name('galeri');
Route::get('/kontak', [KontakController::class, 'index'])->name('kontak');

// Informasi Publik
Route::prefix('informasi-publik')->name('informasi-publik.')->group(function () {
    Route::get('/', [InformasiPublikController::class, 'index'])->name('index');
    Route::get('/ppid', [InformasiPublikController::class, 'ppid'])->name('ppid');
    Route::get('/laporan', [InformasiPublikController::class, 'laporan'])->name('laporan');

    // APBD
    Route::get('/apbd', [ApbdController::class, 'index'])->name('apbd');
    Route::get('/apbd/{year}', [InformasiPublikController::class, 'showApbd'])->name('apbd.show');

    // IPKD
    Route::get('/ipkd', [IpkdController::class, 'index'])->name('ipkd.index');
    Route::get('/ipkd/{id}', [IpkdController::class, 'show'])->name('ipkd.show');

    // Dokumen
    Route::get('/dokumen', [DokumenController::class, 'index'])->name('dokumen.index');
    Route::get('/dokumen/kategori/{id}', [DokumenController::class, 'kategori'])->name('dokumen.kategori');
});

/*
|--------------------------------------------------------------------------
| Admin Area (Filament)
|--------------------------------------------------------------------------
| Semua route admin sudah otomatis di-handle Filament.
| Cek: app/Providers/Filament/AdminPanelProvider.php
|--------------------------------------------------------------------------
*/

/*
|--------------------------------------------------------------------------
| Laravel Default Auth
|--------------------------------------------------------------------------
*/
require __DIR__ . '/auth.php';
