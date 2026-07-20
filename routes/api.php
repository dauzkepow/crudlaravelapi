<?php

use Illuminate\Support\Facades\Route;

// import controller ProductController
use App\Http\Controllers\Api\ProductController;

// products
// apiResource otomatis buat 5 rute bawaan CRUD
Route::apiResource('/products', ProductController::class);

// sanctum nanti dulu
// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');
