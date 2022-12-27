<?php

use App\Http\Controllers\ContactController;
use \App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/contact/create', [ContactController::class, 'create'])->name('contact.create');
Route::post('/contact/', [ContactController::class, 'store'])->name('contact.store');

/*
Route::post('/contact',  function (Request $request) {
   $data = $request->all();

   Contact::create($data);
   return "Contact stored";
});

*/









