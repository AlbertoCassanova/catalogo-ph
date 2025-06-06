<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

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
    return view('index', ['pageTitle' => 'Inicio']);
});
Route::get('/planes', function () {
    return view('planes', ['pageTitle' => 'Planes']);
});

// Dashboard
Route::get('/admin/login', [AdminController::class, 'AuthView'])->name('admin.login');
Route::post('/admin/login', [AdminController::class, 'login'])->name('admin.login.post');
Route::get('/admin/logout', [AdminController::class, 'logout'])->name('admin.logout');
Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
})->middleware('auth');
Route::get('/admin/dashboard/gestionplanes', [AdminController::class, 'gestionplanes'])->middleware('auth')->name('admin.gestionplanes');
Route::post('/admin/dashboard/editarplan', [AdminController::class, 'editarplan'])->middleware('auth')->name('admin.editarplan');
Route::delete('/admin/dashboard/eliminarplan', [AdminController::class, 'eliminarplan'])->middleware('auth')->name('admin.eliminarplan');
