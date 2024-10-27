<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SesiController;
use App\Http\Controllers\userDataController;
use App\Http\Controllers\HomeUserController;
use App\Http\Controllers\HomeAdmController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\GedungController;
use App\Http\Controllers\DaftarPinjamController;

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


Route::middleware(['guest'])->group(function(){
    // landing page
    Route::get('/', function () {
        return view('landing');
    });

    //login
    Route::get('/login', [SesiController::class, 'indexSesi'])->name('login');
    Route::post('/login', [SesiController::class, 'login'])->name('login.process');

});

#Logged-in Role
Route::middleware(['auth'])->group(function () {
    // Routes for admin
    Route::middleware(['role:admin'])->group(function () {
        // Homepage
        Route::get('/admin/homepage', [HomeAdmController::class, 'index'])->name('admin.homepage');

    });

    // Routes for user
    Route::middleware(['role:user'])->group(function () {
        Route::get('/user/homepage', [HomeUserController::class, 'index'])->name('user.homepage');
        Route::get('/user/gedung/{id}', [HomeUserController::class, 'showGedung'])->name('gedung.show');


    });

    Route::get('/logout', [SesiController::class, 'logout'])->name('logout');

});

#MANAGE-USER
#show-user
Route::get('/admin/manage-user', [userDataController::class, 'showUserData']) -> name('admin.manageUser');
#add-user
Route::get('/register', [SesiController::class, 'showRegistForm'])->name('register');
Route::post('/register', [SesiController::class, 'register'])->name('register.register');
#update-user
Route::get('/admin/edit/{id_user}', [userDataController::class, 'edit']) -> name('admin.editAkun');
Route::put('/admin//update/{id_user}', [userDataController::class, 'update']) -> name('admin.update');
#hapus-user
Route::delete('/admin/delete/{id_user}', [userDataController::class, 'destroy']) -> name('admin.delete');


#MANAGE KATEGORI
#show-category
Route::get('/admin/manage-kategori', [KategoriController::class, 'showKategori'])->name('admin.manageKategori');
#add-category
Route::get('/admin/kategori/add', [KategoriController::class, 'showKategoriForm'])->name('admin.addKategori');
Route::post('/admin/kategori/store', [KategoriController::class, 'store'])->name('admin.storeKategori');
#edit-category
Route::get('/admin/kategori/{id}/edit', [KategoriController::class, 'showEditForm'])->name('admin.editKategori');
Route::put('/admin/kategori/{id}', [KategoriController::class, 'update'])->name('admin.updateKategori');
#delete-category
Route::delete('/admin/kategori/{id}', [KategoriController::class, 'destroy'])->name('kategori.delete');


#MANAGE GEDUNG
#show-gedung
Route::get('/admin/manage-gedung', [GedungController::class, 'showGedung'])->name('admin.manageGedung');
#add-gedung
Route::get('/admin/gedung/add', [GedungController::class, 'showGedungForm'])->name('admin.addGedung');
Route::post('/admin/gedung/store', [GedungController::class, 'store'])->name('admin.storeGedung');
#edit-gedung
Route::get('/admin/gedung/{id}/edit', [GedungController::class, 'edit'])->name('admin.editGedung');
Route::put('/admin/gedung/{id}', [GedungController::class, 'update'])->name('admin.updateGedung');
#delete-gedung
Route::delete('/admin/gedung/{id}', [GedungController::class, 'destroy'])->name('admin.deleteGedung');


#Peminjaman
#show-pinjam
Route::get('/admin/manage-pinjam', [DaftarPinjamController::class, 'showDaftarPinjam'])->name('admin.managePinjam');

#add-pinjam
Route::get('/admin/pinjam', [DaftarPinjamController::class, 'showPinjamForm'])->name('admin.addPinjam');
Route::post('/admin/pinjam/store', [DaftarPinjamController::class, 'store'])->name('admin.storePinjam');
