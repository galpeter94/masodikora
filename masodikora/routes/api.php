<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\LendingController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});


//BÁRKI ÁLTAL LÁTOGATHATÓ ÚTVONALAK A POPESZOMBA
//Route::get('/book-with-copies', [BookController::class, 'bookWithCopies']);
// Route::get('/reservations', [ReservationController::class, 'index']);
Route::post('/register',[RegisteredUserController::class, 'store']);
Route::post('/login',[AuthenticatedSessionController::class, 'store']);
Route::get('/book-title/{title}', [BookController::class, 'bookTitle']);

//AUTENTIKÁLT FELHASZNÁLÓK ÁLTAL LÁTOGATHATÓ ÚTVONALAK A POPESZOMBA
Route::middleware(['auth:sanctum'])
->group(function () {
    Route::get('/users/{id}', [UserController::class, 'show']);
    Route::get('/book-with-copies', [BookController::class, 'bookWithCopies']);
    Route::get('/lending-with-copies/{id}', [LendingController::class, 'lendingWithCopies']);  //ezt az autentikáció miatt csak TC-ben tudjuk tesztelni
    // Kijelentkezés útvonal
    Route::post('/logout', [AuthenticatedSessionController::class, 'destroy']);
    Route::post('/reservations', [ReservationController::class, 'store']);
});


Route::middleware(['auth:sanctum', Admin::class])
->group(function () {
    Route::get('/users', [UserController::class, 'index']);
    Route::get('/reservations', [ReservationController::class, 'index']);
    Route::get('/reservations/{book_id}/{user_id}/{start}', [ReservationController::class, 'show']);
});



