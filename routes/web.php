<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\PelatihanController;
use App\Http\Controllers\TentangController;
use App\Http\Controllers\VisiController;
use App\Http\Controllers\SejarahController;
use App\Http\Controllers\OrganisasiController;
use App\Http\Controllers\TrainerController;
use App\Http\Controllers\HighlightController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\PengumumanController;


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
    return view('halaman_beranda.index');
});

Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/produk', [ProdukController::class, 'index'])->name('produk');
    Route::get('/produk/create', [ProdukController::class, 'create'])->name('produk.create');
    Route::post('/produk/store', [ProdukController::class, 'store'])->name('produk.store');
    Route::get('/produk/edit/{id}', [ProdukController::class, 'edit'])->name('produk.edit');
    Route::post('/produk/update/{id}', [ProdukController::class, 'update'])->name('produk.update');
    Route::get('/produk/destroy/{id}', [ProdukController::class, 'destroy'])->name('produk.destroy');

    Route::get('/pelatihan', [PelatihanController::class, 'index'])->name('pelatihan');
    Route::get('/pelatihan/create', [PelatihanController::class, 'create'])->name('pelatihan.create');
    Route::post('/pelatihan/store', [PelatihanController::class, 'store'])->name('pelatihan.store');
    Route::get('/pelatihan/edit/{id}', [PelatihanController::class, 'edit'])->name('pelatihan.edit');
    Route::post('/pelatihan/update/{id}', [PelatihanController::class, 'update'])->name('pelatihan.update');
    Route::get('/pelatihan/destroy/{id}', [PelatihanController::class, 'destroy'])->name('pelatihan.destroy');

    Route::get('/tentang', [TentangController::class, 'index'])->name('tentang');
    Route::get('/tentang/create', [TentangController::class, 'create'])->name('tentang.create');
    Route::post('/tentang/store', [TentangController::class, 'store'])->name('tentang.store');
    Route::get('/tentang/edit/{id}', [TentangController::class, 'edit'])->name('tentang.edit');
    Route::post('/tentang/update/{id}', [TentangController::class, 'update'])->name('tentang.update');
    Route::get('/tentang/destroy/{id}', [TentangController::class, 'destroy'])->name('tentang.destroy');

    Route::get('/visi', [VisiController::class, 'index'])->name('visi');
    Route::get('/visi/create', [VisiController::class, 'create'])->name('visi.create');
    Route::post('/visi/store', [VisiController::class, 'store'])->name('visi.store');
    Route::get('/visi/edit/{id}', [VisiController::class, 'edit'])->name('visi.edit');
    Route::post('/visi/update/{id}', [VisiController::class, 'update'])->name('visi.update');
    Route::get('/visi/destroy/{id}', [VisiController::class, 'destroy'])->name('visi.destroy');

    Route::get('/sejarah', [SejarahController::class, 'index'])->name('sejarah');
    Route::get('/sejarah/create', [SejarahController::class, 'create'])->name('sejarah.create');
    Route::post('/sejarah/store', [SejarahController::class, 'store'])->name('sejarah.store');
    Route::get('/sejarah/edit/{id}', [SejarahController::class, 'edit'])->name('sejarah.edit');
    Route::post('/sejarah/update/{id}', [SejarahController::class, 'update'])->name('sejarah.update');
    Route::get('/sejarah/destroy/{id}', [SejarahController::class, 'destroy'])->name('sejarah.destroy');

    Route::get('/organisasi', [OrganisasiController::class, 'index'])->name('organisasi');
    Route::get('/organisasi/create', [OrganisasiController::class, 'create'])->name('organisasi.create');
    Route::post('/organisasi/store', [OrganisasiController::class, 'store'])->name('organisasi.store');
    Route::get('/organisasi/edit/{id}', [OrganisasiController::class, 'edit'])->name('organisasi.edit');
    Route::post('/organisasi/update/{id}', [OrganisasiController::class, 'update'])->name('organisasi.update');
    Route::get('/organisasi/destroy/{id}', [OrganisasiController::class, 'destroy'])->name('organisasi.destroy');

    Route::get('/trainer', [TrainerController::class, 'index'])->name('trainer');
    Route::get('/trainer/create', [TrainerController::class, 'create'])->name('trainer.create');
    Route::post('/trainer/store', [TrainerController::class, 'store'])->name('trainer.store');
    Route::get('/trainer/edit/{id}', [TrainerController::class, 'edit'])->name('trainer.edit');
    Route::post('/trainer/update/{id}', [TrainerController::class, 'update'])->name('trainer.update');
    Route::get('/trainer/destroy/{id}', [TrainerController::class, 'destroy'])->name('trainer.destroy');

    Route::get('/highlight', [HighlightController::class, 'index'])->name('highlight');
    Route::get('/highlight/create', [HighlightController::class, 'create'])->name('highlight.create');
    Route::post('highlight/store', [HighlightController::class, 'store'])->name('highlight.store');
    Route::get('/highlight/edit/{id}', [HighlightController::class, 'edit'])->name('highlight.edit');
    Route::post('highlight/update/{id}', [HighlightController::class, 'update'])->name('highlight.update');
    Route::get('/highlight/destroy/{id}', [HighlightController::class, 'destroy'])->name('highlight.destroy');

    Route::get('/testimonial', [TestimonialController::class, 'index'])->name('testimonial');
    Route::get('/testimonial/create', [TestimonialController::class, 'create'])->name('testimonial.create');
    Route::post('testimonial/store', [TestimonialController::class, 'store'])->name('testimonial.store');
    Route::get('/testimonial/edit/{id}', [TestimonialController::class, 'edit'])->name('testimonial.edit');
    Route::post('testimonial/update/{id}', [TestimonialController::class, 'update'])->name('testimonial.update');
    Route::get('/testimonial/destroy/{id}', [TestimonialController::class, 'destroy'])->name('testimonial.destroy');

    Route::get('/pengumuman', [PengumumanController::class, 'index'])->name('pengumuman');
    Route::get('/pengumuman/create', [PengumumanController::class, 'create'])->name('pengumuman.create');
    Route::post('pengummuan/store', [PengumumanController::class, 'store'])->name('pengumuman.store');
    Route::get('/pengumuman/edit/{id}', [PengumumanController::class, 'edit'])->name('pengumuman.edit');
    Route::post('pengumuman/update/{id}', [PengumumanController::class, 'update'])->name('pengumuman.update');
    Route::get('/pengumuman/destroy/{id}', [PengumumanController::class, 'destroy'])->name('pengumuman.destroy');
});
Auth::routes();

Route::get('/', [ProdukController::class, 'index1'])->name('web');
Route::get('/produk/bagian/{id}', [PelatihanController::class, 'index1'])->name('pelatihan.index1');
Route::get('/produk/bagian/show/{id}', [PelatihanController::class, 'show'])->name('pelatihan.show');
Route::get('/tentang-kami/{id}', [TentangController::class, 'index1'])->name('tentang.index1');
Route::get('/highlight-kegiatan', [HighlightController::class, 'index1'])->name('highlight_fe');
Route::get('/highlight/show/{id}', [HighlightController::class, 'show'])->name('highlight.show');
Route::get('/pengumuman-smi', [PengumumanController::class, 'index1'])->name('pengumuman_fe');
