<?php

use App\Http\Controllers\CarsController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', [PageController::class, 'homepage'])->name('home.page');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('cars')->group(function () {
   Route::get('/create', [CarsController::class, 'create_car'])->name('cars.create');
   Route::post('/create', [CarsController::class, 'store_car'])->name('cars.store');

   Route::get('/all', [CarsController::class, 'all_cars'])->name('cars.all');

   Route::get('/{id}/edit', [CarsController::class, 'edit_car'])->name('edit.car');
   Route::patch('/{id}/update', [CarsController::class, 'update_car'])->name('update.car');

   Route::delete('/{id}/delete', [CarsController::class, 'delete_car'])->name('delete.car');
});