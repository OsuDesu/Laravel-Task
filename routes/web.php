<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RecordsController;
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

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('index');

Route::middleware(['auth'])->group(function () {
	Route::delete('delete/{id}', [RecordsController::class, 'delete'])->name('delete_record');
	Route::get('edit/{id}', [RecordsController::class, 'edit'])->name('edit_record');
	Route::post('update/{id}', [RecordsController::class, 'update'])->name('update_record');
});