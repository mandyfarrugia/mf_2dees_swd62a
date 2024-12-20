<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/items', function() {
    return "<h1>All items</h1>";
})->name('items.index');

Route::get('/items/create', function() {
    return "<h1>Add new item</h1>";
})->name('items.create');

Route::get('/items/{id}', function($id) {
    return App\Models\Item::find($id);
})->name('items.show');