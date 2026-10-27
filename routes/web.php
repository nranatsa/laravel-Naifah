<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PelangganController;

use App\Http\Controllers\BiodataController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home',[HomeController::class,'index']);


Route::post('question/store', [QuestionController::class, 'store'])
		->name('question.store');

Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::get('/home-question-respon', [QuestionController::class, 'respon']);

Route::get('/admin/biodata', [BiodataController::class, 'index'])->name('biodata.index');
Route::get('/admin/biodata/create', [BiodataController::class, 'create'])->name('biodata.create');
Route::post('/admin/biodata', [BiodataController::class, 'store'])->name('biodata.store');
Route::get('/admin/biodata/{id}/edit', [BiodataController::class, 'edit'])->name('biodata.edit');
Route::put('/admin/biodata/{id}', [BiodataController::class, 'update'])->name('biodata.update');
Route::delete('/admin/biodata/{id}', [BiodataController::class, 'destroy'])->name('biodata.destroy');
