<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminPeopleController;

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
    return view('admin.dashboard.index');
})->name('admin.dashboard.index');

Route::get('/tree', function () {
    return view('admin.tree.index');
})->name('admin.tree.index');

Route::delete('/admin/people/{uuid}/delete', [AdminPeopleController::class, 'destroy'])->name('admin.people.deletePenggunaUtama');
Route::get('/admin/people/{uuid}/edit', [AdminPeopleController::class, 'edit'])->name('admin.people.editPenggunaUtama'); //menampilkan data edit
Route::patch('/admin/people/{uuid}/update', [AdminPeopleController::class, 'update'])->name('admin.people.updatePenggunaUtama'); //proses update edit

Route::get('/admin/people/create', [AdminPeopleController::class, 'create'])->name('admin.people.tambahPenggunaUtama'); //menampilka
Route::post('/admin/people/store', [AdminPeopleController::class, 'store'])->name('admin.people.storePenggunaUtama'); //proses simpan data

Route::get('/admin/people', [AdminPeopleController::class, 'index'])->name('admin.people.kelolaPenggunaUtama');