<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\siswa\siswaController;
use App\Http\Controllers\admin\adminController;
use App\Http\Controllers\guru\guruController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\admin\adminSiswaController;
use App\Http\Controllers\admin\adminGuruController;
use App\Http\Controllers\admin\adminMapelController;
use App\Http\Controllers\admin\adminJurusanController;
use App\Http\Controllers\admin\adminKelasController;
use App\Http\Controllers\admin\adminCodeController;
use App\Http\Controllers\admin\adminPengajarController;
use App\Http\Controllers\admin\adminListController;

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
Route::middleware(['auth:admin'])->group(function () {
    Route::get('/admin',          [adminController::class, 'index']);
    Route::resource('/admin/siswa',adminSiswaController::class);
    Route::resource('/admin/guru',   adminGuruController::class,);
    Route::resource('/admin/mapel',  adminMapelController::class,);
    Route::resource('/admin/jurusan',adminJurusanController::class,);
    Route::resource('/admin/kelas',  adminKelasController::class,);
    Route::resource('/admin/code-guru',  adminCodeController::class,);
    Route::resource('/admin/pengajar',  adminPengajarController::class,);
    Route::resource('/admin/list',  adminListController::class,);
});


Route::middleware(['auth:guru'])->group(function () {
    Route::get('/guru',  [guruController::class, 'index']);
    Route::get('/guru/mapel/{id}',  [guruController::class, 'showKelas']);
    Route::get('/guru/mapel/{id}/kelas/{idk}',  [guruController::class, 'showDiagram']);
    Route::get('/guru/mapel/{id}/kelas/{idk}?d={s}',  [guruController::class, 'showSiswa']);
    Route::get('/guru/mapel/{id}/kelas/{idk}/detail',  [guruController::class, 'detail']);
    // Route::get('/guru/mapel/{id}/kelas/',  [guruController::class, 'showSiswa']);
});


Route::middleware(['auth:siswa'])->group(function () {
    Route::get('/',  [siswaController::class, 'index']);
    Route::get('/mapel/{id}',[siswaController::class, 'list_assessment']);
    Route::post('/mapel/{id}',[siswaController::class, 'inputList']);
});

route::get('/login',[AuthController::class,'index'])->name("login");
route::post('/login',[AuthController::class,'loginUser'])->name('login.post');
route::get('/logout',[AuthController::class,'logoutUser']);

