<?php
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Controllers\FoodController;

Route::middleware('guest')->controller(AuthController::class)->group(function () {
    Route::get('/login', 'showLogin')->name('show.login');
    Route::post('/login', 'login')->name('login');
});

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function () {
    Route::get('/', function () {return view('welcome');})->name('home');

    // Food routes
    Route::get('/foods', [FoodController::class, 'index'])->name('foods.index');
    Route::post('/foods', [FoodController::class, 'store'])->name('foods.store');
});

Route::middleware(['auth', AdminMiddleware::class])->group(function () {
    // Admin-only routy
    Route::get('/users', [UserController::class, 'index']  )->name('users.index');
    Route::get('/users/{id}', [UserController::class, 'show'])->name('users.show');
    Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');
    Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update');
    Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::get('/add/user', [UserController::class, 'showCreate'])->name('users.showRegistration');
    Route::post('/users', [UserController::class, 'create'])->name('users.create');
});


