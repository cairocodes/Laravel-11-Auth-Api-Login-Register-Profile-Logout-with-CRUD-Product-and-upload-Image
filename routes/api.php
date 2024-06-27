<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\API\ApiController;
use App\Http\Controllers\ProductController;

Route::post('register', [ApiController::class, 'register']);
Route::post('login', [ApiController::class, 'login']);

Route::group([
    "middleware" => ["auth:sanctum"]
], function () {
    //profile page
    Route::get('profile', [ApiController::class, 'profile']);
    //logout
    Route::get('logout', [ApiController::class, 'logout']);

    //product page
    Route::get('products', [ProductController::class, 'index']);
    Route::post('products', [ProductController::class, 'store']);
    Route::get('products/{id}', [ProductController::class, 'show']);
    Route::put('productsupdate/{id}', [ProductController::class, 'update']);
    Route::delete('productdelete/{id}', [ProductController::class, 'destroy']);
});

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
