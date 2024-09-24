<?php

use App\Http\Controllers\ItemController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/items', [ItemController::class, 'index'])->name('items');
Route::get('/items/create', [ItemController::class, 'create'])->name('items.create');
Route::post('/items', [ItemController::class, 'store'])->name('items.store');
Route::get('/items/{id}/show', [ItemController::class, 'show'])->name('items.show');
Route::delete('/items/{id}/destroy', [ItemController::class, 'destroy'])->name('items.destroy');
Route::get('/items/{id}/edit', [ItemController::class, 'edit'])->name('items.edit');
Route::post('/items/{id}/update', [ItemController::class, 'update'])->name('items.update');
Route::post('items/{id}/buy', [ItemController::class, 'buy'])->name('items.buy');
