<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\AuthController;
Route::get('/', function () {
    return view('welcome');
})->name('home');


Route::get('/register', [AuthController::class, 'showRegister'])->name('show.register');
Route::get('/login', [AuthController::class, 'showLogin'])->name('show.login');

Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');




Route::get('/Polozky', function () {
    $polozky = [
        ["nazov" => "Burger", "cena" => 5.99, "popis" => "Chutný hovädzí burger s čerstvou zeleninou."],
        ["nazov" => "Pizza", "cena" => 8.99, "popis" => "Tradičná talianska pizza s rôznymi prísadami."],
        ["nazov" => "Šalát", "cena" => 4.99, "popis" => "Čerstvý zeleninový šalát s olivovým olejom."],
    ];
    return view('polozky.polozky', ['polozky' => $polozky]);
})->name('polozky');


Route::get('/PridajJedlo', function () {
    return view('polozky.polozkaCreate');
})->name('pridajPolozku');


