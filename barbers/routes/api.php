<?php

use App\Http\Controllers\BarberController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get("/barbers", [BarberController::class, "index"]);
Route::post("/barbers", [BarberController::class, "store"]);
Route::delete("/barbers", [BarberController::class, "delete"]);

Route::get("/appointments", [BarberController::class, "index"]);
Route::post("/appointments", [BarberController::class, "store"]);
Route::delete("/appointments", [BarberController::class, "delete"]);
