<?php
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Controllers\FoodController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderItemController;


Route::middleware('guest')->controller(AuthController::class)->group(function () {
    Route::get('/login', 'showLogin')->name('show.login');
    Route::post('/login', 'login')->name('login');
});

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::middleware('auth')->group(function () {
    Route::get('/', function () {return view('welcome');})->name('home');
});
Route::middleware('auth')
    ->get('/orders-read', [AuthController::class, 'ordersReadOnly'])
    ->name('orders.read');

Route::middleware(['auth', AdminMiddleware::class])->group(function () {
    // Admin-only routy
    Route::get('/users', [UserController::class, 'index']  )->name('users.index');
    Route::get('/users/{id}', [UserController::class, 'show'])->name('users.show');
    Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');
    Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update');
    Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::get('/add/user', [UserController::class, 'showCreate'])->name('users.showRegistration');
    Route::post('/users', [UserController::class, 'create'])->name('users.create');

    // Food routes
    Route::get('/foods', [FoodController::class, 'index'])->name('foods.index');
    Route::post('/foods', [FoodController::class, 'store'])->name('foods.store');
    Route::delete('/foods/{food}', [FoodController::class, 'destroy'])->name('foods.destroy');
    Route::get('/foods/filter', [FoodController::class, 'filter'])->name('foods.filter');

    //Order routes
    Route::get('/orders',[OrderController::class,'index'])->name('orders.index');
    Route::get('/orders/create',[OrderController::class,'create'])->name('orders.create');
    Route::post('/orders',[OrderController::class,'store'])->name('orders.store');
    Route::get('/orders/{order}/edit', [OrderController::class, 'edit'])->name('orders.edit');
    Route::put('/orders/{order}', [OrderController::class, 'update'])->name('orders.update');
    Route::delete('/orders/{order}', [OrderController::class, 'destroy'])->name('orders.destroy');

    // Order item routes
    Route::post('/orders/{order}/items', [OrderItemController::class, 'store'])
        ->name('orders.items.store');
    Route::get('/orders/{order}/items', [OrderItemController::class, 'edit'])
        ->name('orders.items.edit');
    Route::delete('/orders/{order}/items/{item}', [OrderItemController::class, 'destroy'])
        ->name('orders.items.destroy');


});


