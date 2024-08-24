<?php

use App\Http\Controllers\CarsController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\RentalController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', [PageController::class, 'homepage'])->name('home.page');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('cars')->middleware(['auth', 'owner'])->group(function () {
   Route::get('/create', [CarsController::class, 'create_car'])->name('cars.create');
   Route::post('/create', [CarsController::class, 'store_car'])->name('cars.store');

   Route::get('/all', [CarsController::class, 'all_cars'])->name('cars.all');

   Route::get('/{id}/edit', [CarsController::class, 'edit_car'])->name('edit.car');
   Route::patch('/{id}/update', [CarsController::class, 'update_car'])->name('update.car');

   Route::delete('/{id}/delete', [CarsController::class, 'delete_car'])->name('delete.car');


   Route::get('show-all-rentals', [RentalController::class, 'admin_show_rentals'])->name('admin.show.all.rentals');
});


Route::middleware('auth')->group(function () {
   Route::get('{id}/rent-a-car', [RentalController::class, 'rent_form'])->name('rent.form');
   Route::post('{id}/rent-a-car', [RentalController::class, 'submit_rent_form'])->name('rent.form.submit');
   Route::get('my-rentals', [RentalController::class, 'show_user_rentals'])->name('show.user.rentals');
});