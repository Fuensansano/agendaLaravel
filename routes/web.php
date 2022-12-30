<?php

use App\Http\Controllers\ContactController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/billing-portal', function (Request $request) {
    return $request->user()->redirectToBillingPortal();
});

Route::get('/checkout', function (Request $request) {
    return $request->user()
        ->newSubscription('default', config('stripe.price_id'))
        ->checkout();
});

Route::get('/', fn () => auth()->check() ? redirect('/home') : view('welcome'));
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('contacts', ContactController::class);











