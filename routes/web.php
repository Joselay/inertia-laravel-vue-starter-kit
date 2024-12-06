<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get("/", function () {
    return Inertia::render("Home");
})->name("home");

Route::inertia("/about", "About", ["user" => "John Doe"])->name("about");
