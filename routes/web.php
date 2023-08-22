<?php

use App\Http\Controllers\ApartementController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ResidenceController;
use App\Http\Controllers\UserController;

//.. Other routes

Auth::routes();

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth','admin'])->group(function () {
    // Routes that require admin access
    
    // ... other routes
    Route::resource('users', UserController::class);
    Route::get('residences/{residence_id}/apartments', 'ApartementController@index')->name('apartments.index.by_residence');
});
Route::middleware(['auth'])->group(function () {
    Route::resource('residences', ResidenceController::class);
    Route::resource('apartments', ApartementController::class);
});






