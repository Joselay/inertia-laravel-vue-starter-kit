<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get("/", function () {
    return Inertia::render("Home");
});


Route::get("/admin", [UserController::class, 'index'])->name("admin");


Route::post("/admin/users/add", [UserController::class, 'store'])->name('users.store');

Route::delete('/admin/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');

Route::get("/admin/users/add", [UserController::class, 'create'])->name('users.create');


Route::get("/admin/users/{user}/edit", [UserController::class, 'edit'])->name('users.edit');
Route::patch("/admin/users/{user}", [UserController::class, 'update'])->name('users.update');
