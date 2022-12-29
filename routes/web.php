<?php

use App\Http\Controllers\ContactController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/contacts/create', [ContactController::class, 'create'])->name('contacts.create');

Route::get('/contacts/{contact}/edit', [ContactController::class, 'edit'])->name('contacts.edit');

Route::put('/contacts/{contact}/update', [ContactController::class, 'update'])->name('contacts.update');

Route::post('/contacts/', [ContactController::class, 'store'])->name('contacts.store');




/*
Route::post('/contact',  function (Request $request) {
   $data = $request->all();

   Contact::create($data);
   return "Contact stored";
});

*/









