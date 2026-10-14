<?php

use Illuminate\Support\Facades\Route;
use App\Models\Product;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::get('/', function () {
    $products = Product::latest()->get();

    return view('index', compact('products'));
})->name('index');

Route::get('/about', function () {
    return view('about');

})->name('about');
Route::get('/contact', function () {
    return view('contact');
})->name('contact');
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    
Route::get('/dashboard', function () {
    $products = Product::latest()->take(8)->get();
    $productCount = Product::count();
    $averagePrice = Product::avg('price') ?? 0;
    $latestProduct = Product::latest()->first();

    return view('dashboard', compact(
        'products',
        'productCount',
        'averagePrice',
        'latestProduct'
    ));
})->name('dashboard');
      Route::get('/users', function () {
        return view('users');
    })->name('users');

    Route::get('/addusers', function () {
        return view('adduser');
    })->name('addusers');

     Route::get('/edituser/{id}', function ($id) {
        return view('edituser', compact('id'));
    })->name('edituser');
});
