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
    return view('items.index');
})->name('items.index');

Route::get('/items/create', function() {
    return view('items.create');
})->name('items.create');

Route::get('/items/{id}', function($id) {
    $item = App\Models\Item::find($id);
    return view('items.show', compact('item'));
})->name('items.show');