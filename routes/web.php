<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


// Public Routes
Route::middleware(["auth:0"])->group(function () {

    Route::view("/", "index");

    Route::get("/subscription", "App\Http\Controllers\SubscriptionController@subscription");
    
    Route::view("/login", "auth.login");

    Route::view("/register", "auth.register");

    Route::post("/register", "App\Http\Controllers\UserController@register");

    Route::post("/login/{mode}", "App\Http\Controllers\UserController@login");

    Route::get("/logout/{mode}", "App\Http\Controllers\UserController@logout");

    Route::get("/logout", "App\Http\Controllers\UserController@logout");

    Route::view("/forgot-password", "auth.forgot-password")->name("password.request");

    Route::post('/forgot-password', "App\Http\Controllers\UserController@forgot_password")->name("password.email");

    Route::get('/reset-password/{token}', function ($token) { return view('auth.reset-password', ['token' => $token]); })->middleware('guest')->name('password.reset');

    Route::post("/reset-password", "App\Http\Controllers\UserController@reset_password")->name('password.update');

    Route::view("/admin/login", "admin.auth.login");

    Route::view("/admin/403", "admin.errors.403");

    Route::view("/admin/forgot-password", "admin.auth.forgot-password");
});

// Protected Routes
Route::middleware(["auth:1"])->group(function () {

    Route::get("/profile", "App\Http\Controllers\UserController@profile")->middleware(["verified"]);

    Route::post("/profile", "App\Http\Controllers\UserController@edit_profile")->middleware(["verified"]);

    Route::get("/profile/password", "App\Http\Controllers\UserController@password")->middleware(["verified"]);

    Route::post("/profile/password", "App\Http\Controllers\UserController@change_password")->middleware(["verified"]);

    Route::get("/subscription/paiment", "App\Http\Controllers\SubscriptionController@paiment");

    Route::get("/subscription/pay", "App\Http\Controllers\SubscriptionController@pay");

    Route::get("/email/verify/{id}/{hash}", "App\Http\Controllers\UserController@verify")->name("verification.verify");

    Route::get("/profile/verify", "App\Http\Controllers\UserController@verification")->name("verification.notice");
});

// Paid Routes
Route::middleware(["auth:2"])->group(function () {
    Route::view("/watch", "watch");
    
});


// Admin Routes
Route::middleware(["auth:3", "admin.app"])->group(function () {
    Route::view("/admin", "admin.index");

    Route::get("/admin/clients", "App\Http\Controllers\UserController@clients");
    Route::get("/admin/clients/delete/{clientID}", "App\Http\Controllers\UserController@deleteClient");

    Route::get("/admin/shows", "App\Http\Controllers\ShowController@index");
    Route::get("/admin/shows/add", "App\Http\Controllers\ShowController@add");
    Route::post("/admin/shows/add", "App\Http\Controllers\ShowController@create");
    Route::get("/admin/shows/delete/{showID}", "App\Http\Controllers\ShowController@delete");
    Route::get("/admin/shows/edit/{showID}", "App\Http\Controllers\ShowController@edit");
    Route::post("/admin/shows/edit/{showID}", "App\Http\Controllers\ShowController@update");
});