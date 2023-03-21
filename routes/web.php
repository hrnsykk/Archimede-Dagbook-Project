<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Auth::routes();

Route::get("/", [\App\Http\Controllers\DagBookController::class, "index"]);
Route::resource("/dag-book", \App\Http\Controllers\DagBookController::class);
Route::get("/user-settings", [\App\Http\Controllers\ChangeUserSettings::class, 'index'])->name("user-settings");
Route::post("/update-password/{id}", [\App\Http\Controllers\ChangeUserSettings::class , "update_password"])->name("update-password");
Route::post("/update-email/{id}", [\App\Http\Controllers\ChangeUserSettings::class , "update_email"])->name("update-email");
