<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\ContactShareController;
use App\Http\Controllers\StripeController;
use App\Http\Controllers\TokenController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', fn () => auth()->check() ? redirect('/home') : view('welcome'));
Route::get('/billing-portal',[StripeController::class,'billingPortal'])->name('billing-portal');
Route::get('/checkout', [StripeController::class, 'checkout'])->name('checkout');
Route::get('/free-trial-end', [StripeController::class, 'freeTrialEnd'])->name('free-trial-end');

Auth::routes();


Route::middleware(['auth','subscription'])->group(function (){
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::resource('contacts', ContactController::class);
    Route::resource('contact-shares', ContactShareController::class)
        ->except(['show','edit','update']);
    //tMBIÉN PODEMOS PONER ONLY() con los métodos que queremos
    Route::resource('tokens',TokenController::class)->only(['store','create']);
});













