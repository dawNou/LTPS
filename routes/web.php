<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;

use App\Http\Controllers\AdminDashboardController;

use App\Http\Controllers\AdminFeedbackController;
use App\Http\Controllers\DashboardFeedbackController;

use App\Http\Controllers\AdminCategoryController;

use App\Http\Controllers\PostController;
use App\Http\Controllers\DashboardPostController;

use App\Http\Controllers\AdminProdukController;
use App\Http\Controllers\AdminKatprodController;
use App\Http\Controllers\KatalogProdukController;

use App\Http\Controllers\AdminPertanyaanController;

use App\Http\Controllers\PemilikController;

use Chatify\Http\Controllers\MessagesController;

use GuzzleHttp\Middleware;

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

// Halaman BERANDA
// Route::get('/', function () {
//     return view('home', [
//         "title" => "Beranda",
//         "active" => 'home'
//     ]);
// });

use App\Http\Controllers\BerandaController;

Route::get('/', [BerandaController::class, 'index'])->name('home');

// Halaman Tentang Kami
Route::get('/tentangKami', function () {
    return view('tentangKami', [
        "title" => "Tentang Kami",
        "active" => 'tentangKami'
    ]);
});

// Route::get('/', function () {
//     return redirect('/produks');
// });

// Halaman konten BLOG
Route::get('/posts', [PostController::class, 'index']);
Route::get('/posts/{post:slug}', [PostController::class, 'show']);

// Halaman katalog PRODUK
Route::get('/produks', [KatalogProdukController::class, 'index']);
Route::get('/produks/{produk:slug}', [KatalogProdukController::class, 'show']);


// LOGIN
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::get('/refresh-captcha', function () 
{
    return response()->json(['captcha'=> captcha_img()]);
});

// LOGOUT
Route::post('/logout', [LoginController::class, 'logout']);

// REGISTRASI
Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);


// DASHBOARD
Route::get('/dashboard', function () {
    return view('dashboard.index');
})->middleware('auth');
Route::get('/dashboard', [AdminDashboardController::class, 'dashboardHitung'])->name('dashboard')->middleware(['auth']);

// Admin UMPAN BALIK
Route::resource('/dashboard/adminfeedbacks', AdminFeedbackController::class)->middleware('admin');
// proses ekstrak data jawaban
Route::post('/dashboard/feedbacks/proses', [AdminFeedbackController::class, 'prosesFeedback'])->name('feedback.proses')->middleware('admin');
// ekspor PDF
Route::get('/admin-download-feedback-pdf', [AdminFeedbackController::class, 'downloadpdf'])->middleware('admin');

Route::resource('/dashboard/feedbacks', DashboardFeedbackController::class)->middleware('auth');

Route::get('/get-pertanyaans-by-produk/{produk}', [DashboardFeedbackController::class, 'getPertanyaansByProduk']);

// Admin KATA KUNCI
Route::get('/dashboard/keywords', [AdminFeedbackController::class, 'showKeywords'])->name('kata_kunci.show')->middleware('admin');
Route::get('/dashboard/keywords', [AdminFeedbackController::class, 'filter'])->name('keywords.filter')->middleware('admin');

// Admin KATEGORI blog
Route::resource('/dashboard/categories', AdminCategoryController::class)->except('show')->middleware('admin');
Route::get('/dashboard/categories/checkSlug', [AdminCategoryController::class, 'checkSlug'])->middleware('admin');
Route::get('/dashboard/categories/checkKeywords', [AdminCategoryController::class, 'checkKeywords'])->name('categories.checkKeywords')->middleware('admin');
Route::get('/dashboard/categories/{category_id}/keywords', [AdminCategoryController::class, 'getKeywordsByCategory'])->middleware('admin');

// Admin Konten BLOG
Route::resource('/dashboard/posts', DashboardPostController::class)->middleware('admin');
Route::get('dashboard/posts/checkSlug', [DashboardPostController::class, 'checkSlug'])->middleware('admin');
// ekspor pdf
Route::get('/admin-download-post-pdf', [DashboardPostController::class, 'downloadpdf'])->middleware('admin');

Route::get('/dashboard/posts/categories/{id}/keywords', [DashboardPostController::class, 'getKeywords'])->middleware('admin');

// Admin PRODUK
Route::resource('/dashboard/produks', AdminProdukController::class)->middleware('admin');
Route::get('/dashboard/produks/checkSlug', [AdminProdukController::class, 'checkSlug'])->middleware('admin');

// Admin KATEOGRI Produk
Route::resource('/dashboard/katprods', AdminKatprodController::class)->except('show')->middleware('admin');
Route::get('/dashboard/katprods/checkSlug', [AdminKatprodController::class, 'checkSlug'])->middleware('admin');

// Admin PERTANYAAN
Route::resource('/dashboard/pertanyaans', AdminPertanyaanController::class)->except('show')->middleware('admin');
Route::get('/dashboard/pertanyaans/checkSlug', [AdminPertanyaanController::class, 'checkSlug'])->middleware('admin');

// PEMILIK
Route::get('/dashboard/keloladmins', [PemilikController::class, 'daftarPengguna'])->middleware('pemilik');
// menampilkan data umpan balik
Route::get('feedbacks/tampil', [PemilikController::class, 'daftarFeedback'])
    ->middleware('pemilik')
    ->name('feedbacks.tampil');
// menampilkan data konten blog
Route::get('kontens/tampil', [PemilikController::class, 'daftarKonten'])
    ->middleware('pemilik')
    ->name('kontens.tampil');
// menambah admin
Route::post('/dashboard/keloladmins/tambah/{user}', [PemilikController::class, 'tambahAdmin'])->middleware('pemilik');
// menghapus admin
Route::post('/dashboard/keloladmin/hapus/{user}', [PemilikController::class, 'hapusAdmin'])->middleware('pemilik');
// ekspor PDF
Route::get('/pemilik-download-post-pdf', [PemilikController::class, 'downloadpdfpost'])->middleware('pemilik');
Route::get('/pemilik-download-feedback-pdf', [PemilikController::class, 'downloadpdffeedback'])->middleware('pemilik');

Route::get('/dashboard/chatify', [MessagesController::class, 'index'])->name('dashboard.chatify')->middleware('auth');
