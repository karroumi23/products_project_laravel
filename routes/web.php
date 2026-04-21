<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Front\ProductController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
//homr
Route::get('/', [ProductController::class, 'home']);
Route::get('/products', [ProductController::class, 'index']);
//products
Route::get('/products/{id}', [ProductController::class, 'show']);
//services
Route::get('/services', function () {
    return view('front.services');
});
//apropos
Route::get('/apropos', function () {
    return view('front.apropos');
});

