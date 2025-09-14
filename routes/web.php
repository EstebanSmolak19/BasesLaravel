<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\EventController;
use Illuminate\Support\Facades\Route;

Route::controller(AuthController::class)->name('login.')->group(function() {
    Route::get('/', 'index')->name('index');
    Route::post('/', 'login')->name('login');
}); 

Route::resource('/app', EventController::class);

?>