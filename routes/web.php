<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\User\DashboardController;
use App\Http\Controllers\User\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/cara_order', [PageController::class, 'cara_order'])->name('cara_order');
Route::get('/testimoni', [PageController::class, 'testimoni'])->name('testimoni');
Route::get('/faq', [PageController::class, 'faq'])->name('faq');
Route::get('/kontak', [PageController::class, 'kontak'])->name('kontak');


Route::get('/mahasiswa/login', function () {
    return view('auth.login-mahasiswa');
})->name('mahasiswa.login');
Route::get('/siswa/login', function () {
    return view('auth.login-siswa');
})->name('siswa.login');
Route::get('/umum/login', function () {
    return view('auth.login-umum');
})->name('umum.login');

Route::get('/mahasiswa/signup', [RegisterController::class, 'showRegistrationForm'])->defaults('userType', 'mahasiswa')->name('mahasiswa.signup');
Route::get('/siswa/signup', [RegisterController::class, 'showRegistrationForm'])->defaults('userType', 'siswa')->name('siswa.signup');
Route::get('/umum/signup', [RegisterController::class, 'showRegistrationForm'])->defaults('userType', 'umum')->name('umum.signup');
Route::post('/register', [RegisterController::class, 'register'])->name('register');

Route::get('/password/forget', function () {
    return view('auth.lupa password');
})->name('password.forget');
Route::get('/password/new-password', function () {
    return view('auth.lupa password-new pass');
})->name('password.new');
Route::get('/password/check-email', function () {
    return view('auth.lupa password-check email');
})->name('password.check-email');

Route::get('/dashboard', [DashboardController::class, 'index'])->name('user.dashboard');
Route::get('/profile', [ProfileController::class, 'index'])->name('user.profile');
Route::post('/profile/update-photo', [ProfileController::class, 'updatePhoto'])->name('profile.update-photo');
Route::post('/profile/update-name', [ProfileController::class, 'updateName'])->name('profile.update-name');
Route::post('/profile/update-birthdate', [ProfileController::class, 'updateBirthDate'])->name('profile.update-birthdate');
Route::get('/pesanan/{id}', [ProfileController::class, 'showPesanan'])->name('user.pesanan.detail');
Route::get('/cart', [App\Http\Controllers\CartController::class, 'index'])->name('user.cart');
Route::post('/cart/add/{layananId}', [App\Http\Controllers\CartController::class, 'addToCart'])->name('cart.add');
Route::post('/cart/update/{cartId}', [App\Http\Controllers\CartController::class, 'updateQuantity'])->name('cart.update');
Route::delete('/cart/remove/{cartId}', [App\Http\Controllers\CartController::class, 'removeFromCart'])->name('cart.remove');
Route::get('/cart/checkout', [App\Http\Controllers\CartController::class, 'checkout'])->name('cart.checkout');

Route::get('/order-detail', function () {
    return view('order.order-detail');
})->name('order.order-detail');
Route::get('/layanan/{id}', [App\Http\Controllers\Order\CheckoutController::class, 'showDetail'])->name('layanan.detail');
Route::get('/checkout-detail/{id}', [App\Http\Controllers\Order\CheckoutController::class, 'showCheckout'])->name('order.co-detail');
Route::get('/checkout-verification', [App\Http\Controllers\Order\CheckoutController::class, 'showVerification'])->name('order.co-verification');
Route::post('/checkout/process', [App\Http\Controllers\Order\CheckoutController::class, 'processCheckout'])->name('checkout.process');
Route::get('/checkout-payment', [App\Http\Controllers\Order\CheckoutController::class, 'showPayment'])->name('order.co-payment');
Route::post('/checkout/upload-proof', [App\Http\Controllers\Order\CheckoutController::class, 'uploadPaymentProof'])->name('checkout.upload-proof');
Route::get('/checkout-finish', function () {
    return view('order.co-finish');
})->name('order.co-finish');
Route::get('/checkout-snk', function () {
    return view('order.co-snk');
})->name('order.co-snk');

Route::get('/admin/login', [App\Http\Controllers\Auth\AdminLoginController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [App\Http\Controllers\Auth\AdminLoginController::class, 'login']);
Route::post('/admin/logout', [App\Http\Controllers\Auth\AdminLoginController::class, 'logout'])->name('admin.logout');

Route::middleware(['auth.admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [App\Http\Controllers\Admin\AdminOrderController::class, 'dashboard'])->name('dashboard');
    
    Route::get('/layanan', [App\Http\Controllers\Admin\AdminLayananController::class, 'index'])->name('layanan.index');
    Route::get('/layanan/tambah', [App\Http\Controllers\Admin\AdminLayananController::class, 'create'])->name('layanan.tambah');
    Route::post('/layanan', [App\Http\Controllers\Admin\AdminLayananController::class, 'store'])->name('layanan.store');
    Route::get('/layanan/{id}/edit', [App\Http\Controllers\Admin\AdminLayananController::class, 'edit'])->name('layanan.edit');
    Route::put('/layanan/{id}', [App\Http\Controllers\Admin\AdminLayananController::class, 'update'])->name('layanan.update');
    Route::delete('/layanan/{id}', [App\Http\Controllers\Admin\AdminLayananController::class, 'destroy'])->name('layanan.destroy');

    Route::get('/testimoni', [App\Http\Controllers\Admin\AdminTestimonialController::class, 'index'])->name('testimoni.index');
    Route::post('/testimoni', [App\Http\Controllers\Admin\AdminTestimonialController::class, 'store'])->name('testimoni.store');
    Route::delete('/testimoni/{testimonial}', [App\Http\Controllers\Admin\AdminTestimonialController::class, 'destroy'])->name('testimoni.destroy');
    
    Route::get('/order', [App\Http\Controllers\Admin\AdminOrderController::class, 'index'])->name('order.index');
    Route::get('/order/{id}', [App\Http\Controllers\Admin\AdminOrderController::class, 'show'])->name('order.show');
    Route::get('/order/{id}/edit', [App\Http\Controllers\Admin\AdminOrderController::class, 'edit'])->name('order.edit');
    Route::put('/order/{id}', [App\Http\Controllers\Admin\AdminOrderController::class, 'update'])->name('order.update');
    Route::put('/order/{id}/status', [App\Http\Controllers\Admin\AdminOrderController::class, 'updateStatus'])->name('order.updateStatus');
    Route::delete('/order/{id}', [App\Http\Controllers\Admin\AdminOrderController::class, 'destroy'])->name('order.destroy');
});

// Route login
Route::get('/login', function () {
    return redirect()->route('home');
})->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Route lupa password
Route::get('/password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('/password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('/password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('/password/reset', [ResetPasswordController::class, 'reset'])->name('password.update');

// Route dashboard berdasarkan tipe user (protected)
Route::middleware(['auth'])->group(function () {
    Route::get('/mahasiswa/dashboard', [DashboardController::class, 'index'])
        ->name('mahasiswa.dashboard')
        ->middleware('check.user.type:mahasiswa');
    
    Route::get('/siswa/dashboard', [DashboardController::class, 'index'])
        ->name('siswa.dashboard')
        ->middleware('check.user.type:siswa');
    
    Route::get('/umum/dashboard', [DashboardController::class, 'index'])
        ->name('umum.dashboard')
        ->middleware('check.user.type:umum');
});