<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Models\Product;
use App\Http\Controllers\CartController;
use App\Http\Controllers\Admin\OrderController as AdminOrderController;
use App\Http\Controllers\User\OrderController as UserOrderController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\ServiceController;
use App\Http\Livewire\AppointmentManager;
use App\Http\Controllers\Admin\AppointmentController;
use App\Http\Controllers\AdminController;




Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/admin/dashboard', function () {
    return view('admin');
})->middleware(['auth', 'verified','rolemanager:admin'])->name('admin');

Route::get('/user/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified','rolemanager:user'])->name('user');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//pages routes
Route::get('/user/home', function () {
    return view('user.home');
})->middleware(['auth', 'verified'])->name('user.home');
Route::get('/user/shopnow', function () {
    return view('user.shopnow');
})->middleware(['auth', 'verified'])->name('user.shopnow');
Route::get('/user/services',function(){
    return view('user.services');
})->middleware(['auth', 'verified'])->name('user.services');

//admin products

Route::middleware(['auth', 'verified'])->prefix('admin')->group(function () {
    Route::resource('products', ProductController::class);
});

//user shop products

Route::get('/user/shopnow', function () {
    $products = Product::all(); // Get all products
    return view('user.shopnow', compact('products'));
})->middleware(['auth', 'verified'])->name('user.shopnow');

//cart controlling


Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/cart', [CartController::class, 'index'])->name('user.cart');
    Route::post('/cart/add/{id}', [CartController::class, 'add'])->name('cart.add');
    Route::post('/cart/update/{id}', [CartController::class, 'update'])->name('cart.update');
    Route::post('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');
    Route::get('/checkout', [CartController::class, 'checkout'])->name('cart.checkout');
});


//checkout and confirmation
// Show checkout form (GET)
Route::get('/checkout', [CartController::class, 'showCheckoutForm'])->name('cart.checkout');

// Process checkout form and save order (POST)
Route::post('/checkout', [CartController::class, 'processCheckout'])->name('cart.processCheckout');

// Order confirmation page after placing order
Route::get('/order/confirmation/{order}', function ($orderId) {
    $order = \App\Models\Order::findOrFail($orderId);
    return view('user.order_confirmation', compact('order'));
})->name('order.confirmation');

//admin handling orders
Route::middleware(['auth', 'verified'])->prefix('admin')->group(function () {
    Route::get('/admin/orders', [AdminOrderController::class, 'index'])->name('admin.orders');
Route::post('/admin/orders/{order}/update', [AdminOrderController::class, 'update'])->name('admin.orders.update');
});

//user to view orders
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/my-orders', [UserOrderController::class, 'index'])->name('user.orders');
});

//admin control users


Route::middleware(['auth', 'verified'])->prefix('admin')->group(function () {
    Route::get('/users', [AdminUserController::class, 'index'])->name('admin.users');
    Route::delete('/users/{id}', [AdminUserController::class, 'destroy'])->name('admin.users.destroy');
});

Route::get('/admin/products', function () {
    return view('admin.products.index');
})->name('admin.products');

Route::get('/admin', function () {
    return view('admin');
})->name('admin.dashboard');

//services routes


Route::middleware('auth')->group(function () {
    Route::get('/services', [ServiceController::class, 'index'])->name('services.index');
    Route::post('/services', [ServiceController::class, 'store'])->name('services.store');
});

//appoinment routes

Route::middleware('auth')->get('/appointments', function () {
    return view('user.appointments.index');
})->name('appointments.index');

//admin handling appoinments


Route::get('/appointments', [\App\Http\Controllers\Admin\AppointmentController::class, 'index'])
->name('admin.appointments.index');

Route::delete('/appointments/{id}', [\App\Http\Controllers\Admin\AppointmentController::class, 'destroy'])
    ->name('admin.appointments.destroy');

// In routes/web.php
Route::middleware(['auth'])->get('/appointments', function () {
    return view('user.appointments.index'); // ✅ matches your folder
})->name('appointments.index'); // ✅ name must match



Route::middleware(['auth', 'verified'])->prefix('admin')->group(function () {
    // other admin routes...

    Route::get('/appointments', [AppointmentController::class, 'index'])->name('admin.appointments.index');
});






require __DIR__.'/auth.php';
