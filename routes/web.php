<?php

use App\Http\Controllers\ContactController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/contact/create', [ContactController::class, 'create'])->name('contact.create');
Route::post('/contact/', [ContactController::class, 'store'])->name('contact.store');

Route::post('/ejercicio3', function (Request $request) {
    $request->validate([
        'name' => 'required|max:64',
        'description' => 'required|max:512',
        'price' => 'required|numeric|min:1',
        'has_battery' => 'required|boolean',
        'colors' => 'required|array',
        'colors.*' => 'required|string',
        'dimensions' => 'required|array',
        'dimensions.width' => 'required|numeric|min:1',
        'dimensions.height' => 'required|numeric|min:1',
        'dimensions.length' => 'required|numeric|min:1',
        'accessories' => 'required|array',
        'accessories.*.price' => 'required|numeric|min:1',
        'accessories.*.name' => 'required|string',

    ]);
});

/*
Route::post('/contact',  function (Request $request) {
   $data = $request->all();

   Contact::create($data);
   return "Contact stored";
});

*/









