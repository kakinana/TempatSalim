<?php

use App\Http\Controllers\HomeUserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SesiController;
use App\Http\Controllers\userDataController;
use App\Http\Controllers\HomeUserControllerController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\GedungController;

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
        Route::get('/admin/homepage', [])->name('admin.homepage');

        //Regist
        Route::get('/admin/regist', [SesiController::class, 'showRegistForm'])->name('admin-regist');
        Route::post('/admin/regist', [SesiController::class, 'register'])->name('admin-registing');

    });

    // Routes for user
    Route::middleware(['role:user'])->group(function () {
        Route::get('/{username}/homepage', [HomeUserController::class, 'index'])->name('user.homepage');
        Route::get('/categories/{id_ct}', [HomeUserController::class, 'show'])->name('user.homepage.categories.show');


    });

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
Route::get('/admin/gedung', [GedungController::class, 'view'])->name('gedung.show');

#add-gedung
Route::get('/admin/gedung/create', [GedungController::class, 'create'])->name('gedung.create');
Route::post('/admin/gedung', [GedungController::class, 'store'])->name('gedung.store');

#edit-gedung
Route::get('/gedung/{id_gd}/edit', [GedungController::class, 'edit'])->name('gedung.edit');
Route::put('/gedung/{id_gd}', [GedungController::class, 'update'])->name('gedung.update');

#delete-gedung
Route::delete('/gedung/{id_gd}', [GedungController::class, 'destroy'])->name('gedung.delete');
