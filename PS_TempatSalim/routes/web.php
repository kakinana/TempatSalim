<?php

use App\Http\Controllers\HomeUserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SesiController;
use App\Http\Controllers\userDataController;
use App\Http\Controllers\HomeUserControllerController;
use App\Http\Controllers\KategoriController;

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

Route::get('/register', [SesiController::class, 'showRegistForm'])->name('register');
Route::post('/register', [SesiController::class, 'register'])->name('register.register');

#show-data
Route::get('/admin/manage-user', [userDataController::class, 'showUserData']) -> name('admin.manageUser');

#update-data
Route::get('/admin/edit/{id_user}', [userDataController::class, 'edit']) -> name('admin.editAkun');
Route::put('/admin//update/{id_user}', [userDataController::class, 'update']) -> name('admin.update');

#hapus-data
Route::delete('/admin/delete/{id_user}', [userDataController::class, 'destroy']) -> name('admin.delete');