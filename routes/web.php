<?php

use Illuminate\Support\Facades\Route;

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
    return view('home');
});

Route::group(['prefix' => 'notes'], function () {
    Route::get('/',[\App\Http\Controllers\NoteController::class, 'index'])->name('notes.list');
    Route::get('/create',[\App\Http\Controllers\NoteController::class, 'create'])->name('notes.create');
    Route::post('/create', [\App\Http\Controllers\NoteController::class, 'store'])->name('notes.store');
    Route::get('/{id}/edit', [\App\Http\Controllers\NoteController::class, 'edit'])->name('notes.edit');
    Route::post('/{id}/edit', [\App\Http\Controllers\NoteController::class,'update'])->name('notes.update');
    Route::get('/{id}/delete', [\App\Http\Controllers\NoteController::class, 'delete'])->name('notes.delete');
    Route::get('/search', [\App\Http\Controllers\NoteController::class, 'search'])->name('notes.search');
});

Route::group(['prefix' => 'notetype'], function (){
    Route::get('/', [\App\Http\Controllers\NoteTypeController::class, 'index'])->name('notetypes.list');
    Route::get('/create',[\App\Http\Controllers\NoteTypeController::class, 'create'])->name('notetypes.create');
    Route::post('/create', [\App\Http\Controllers\NoteTypeController::class, 'store'])->name('notetypes.store');
    Route::get('/{id}/edit', [\App\Http\Controllers\NoteTypeController::class, 'edit'])->name('notetypes.edit');
    Route::post('/{id}/edit', [\App\Http\Controllers\NoteTypeController::class,'update'])->name('notetypes.update');
    Route::get('/{id}/delete', [\App\Http\Controllers\NoteTypeController::class, 'delete'])->name('notetypes.delete');
    Route::get('/search', [\App\Http\Controllers\NoteTypeController::class, 'search'])->name('notetypes.search');
});
