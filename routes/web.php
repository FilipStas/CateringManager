<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Middleware\AdminMiddleware;

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['guest'])->controller(AuthController::class)->group(function () {
    Route::get('/login', 'showLogin')->name('show.login');
    Route::post('/login', 'login')->name('login');
});

Route::middleware('auth')->group(function () {
    Route::get('/', function () {
        return view('welcome');
    })->name('home');

    Route::get('/Polozky', function () {
        $polozky = [
            ["nazov" => "Burger", "cena" => 5.99, "popis" => "Chutný hovädzí burger s čerstvou zeleninou."],
            ["nazov" => "Pizza", "cena" => 8.99, "popis" => "Tradičná talianska pizza s rôznymi prísadami."],
            ["nazov" => "Šalát", "cena" => 4.99, "popis" => "Čerstvý zeleninový šalát s olivovým olejom."],
        ];
        return view('polozky.polozky', ['polozky' => $polozky]);
    })->name('polozky');
});

Route::middleware(['auth', AdminMiddleware::class])->group(function () {
    // Admin-only routy
    Route::get('/users', [UserController::class, 'index']  )->name('users.index');
    Route::get('/users/{id}', [UserController::class, 'show'])->name('users.show');
    Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');
    Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update');
    Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');

    Route::get('/pridajJedlo', function () {
        return view('polozky.polozkaCreate');
    })->name('pridajPolozku');
    Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');
    Route::get('/add/user', [UserController::class, 'showCreate'])->name('users.showRegistration');
    Route::post('/users', [UserController::class, 'create'])->name('users.create');
});


