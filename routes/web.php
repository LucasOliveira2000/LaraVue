<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/home', function () {
return Inertia::render('Site/Home.vue');
})->name('site.home');

Route::controller(UserController::class)->prefix("user")->group(function(){
    Route::get("/create", "create")->name("user.create");
    Route::post("/store", "store")->name("user.store");
});


Route::fallback( function () {
    return Inertia::render('Site/Home.vue');
});