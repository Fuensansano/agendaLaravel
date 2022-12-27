<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/contact', fn () => Response::view('contact'));
//cuando sólo tienes un return, se puede abreviar de esta forma

/*Route::post('/contact',  function (Request $request) {
    return Response::json(['message' => 'welcome'])->setStatusCode(400);
});


Route::post('/contact',  function (Request $request) {
   $data = $request->all();

   DB::statement('INSERT INTO contacts (name,phone_number) VALUES (?,?)', [$data["name"], $data["phone_number"]]);
   return "Contact stored";
});
*/

Route::post('/ejercicio2/a', function (Request $request) {
    return Response::json($request->all());
});

Route::post('/ejercicio2/b', function (Request $request) {
    if ($request->get('price') < 0) {
        return Response::json(["message" => "Price can't be less than 0"], 422);
    }
    return Response::json($request->all());
});


Route::post('/ejercicio2/c', function (Request $request) {

    $price = $request->get('price');
    $discountPercentage = match ($request->get('discount')) {
        'SAVE5' => 5,
        'SAVE10' => 10,
        'SAVE15' => 15,
        default => 0
    };

    $priceWithDiscount = $price - (($price  * $discountPercentage) / 100);
    return Response::json([
        'name' => $request->get('name'),
        'description' => $request->get('description'),
        'price' => $priceWithDiscount,
        'discount' => $discountPercentage]);

});









