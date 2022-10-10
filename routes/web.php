<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\TicketController;
use App\Http\Middleware\Authenticate;
use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpFoundation\Response;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can auth web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::get('/', function () {
    return view('welcome');
});


Route::prefix("tickets")->middleware("auth")->group(function () {
    Route::get("/", [TicketController::class, "index"])->name("tickets");
    Route::post("/", [TicketController::class, "store"])->name("tickets.store");

    Route::get("/create", [TicketController::class, "create"])->name("tickets.create");
    Route::get("/{id}", [TicketController::class, "show"])->name("tickets.show")
        ->where("id", "[0-9]*");

});

Route::middleware("guest")->group(function () {
    Route::get("login", [LoginController::class, "create"])->name("login");
    Route::post("login", [LoginController::class, "store"]);

    Route::get("register", [RegisterController::class, "create"])->name("auth");
    Route::post("register", [RegisterController::class, "store"]);
});

Route::get("logout", [LoginController::class, "logout"])->middleware("auth");

Route::fallback(function () {
   abort(Response::HTTP_NOT_FOUND);
});
