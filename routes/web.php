<?php

use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\Autenticador;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/home', function () {
return Inertia::render('Site/Home.vue');
})->name('site.home');

Route::controller(UserController::class)->prefix("user")->group(function(){
    Route::get("/create", "create")->name("user.create");
    Route::post("/store", "store")->name("user.store");
    Route::get("/logar", "logar")->name("user.logar");
    Route::post("/login", "login")->name("user.login");
    Route::delete("/deslogar", "deslogar")->name("user.deslogar");
});

Route::middleware("autenticador")->controller(ProdutoController::class)->prefix("produto")->group(function(){
    Route::get("/home", "home")->name("produto.home");
    Route::get("/create", "create")->name("produto.create");
    Route::post("/store", "store")->name("produto.store");
});


Route::fallback( function () {
    return Inertia::render('Site/Home.vue');
});
