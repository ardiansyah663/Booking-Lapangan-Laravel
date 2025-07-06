<?php

use App\Http\Controllers\FieldController;
use App\Http\Controllers\BookingController;
use Illuminate\Support\Facades\Route;

Route::get('/', [FieldController::class, 'index'])->name('home');
Route::get('/field/{id}', [FieldController::class, 'show'])->name('field.detail');
Route::post('/booking', [BookingController::class, 'store'])->name('booking.store');
