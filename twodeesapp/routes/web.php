<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\NavigationController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\ProfileController;

/* 
  _____   ____   ____ _______           _   _     __      _______ _____       _______ _____ ____  _   _ 
 |  __ \ / __ \ / __ |__   __|    _    | \ | |   /\ \    / |_   _/ ____|   /\|__   __|_   _/ __ \| \ | |
 | |__) | |  | | |  | | | |     _| |_  |  \| |  /  \ \  / /  | || |  __   /  \  | |    | || |  | |  \| |
 |  _  /| |  | | |  | | | |    |_   _| | . ` | / /\ \ \/ /   | || | |_ | / /\ \ | |    | || |  | | . ` |
 | | \ \| |__| | |__| | | |      |_|   | |\  |/ ____ \  /   _| || |__| |/ ____ \| |   _| || |__| | |\  |
 |_|  \_\\____/ \____/  |_|            |_| \_/_/    \_\/   |_____\_____/_/    \_|_|  |_____\____/|_| \_|
                                                                                                               
 * The below route uses a GET request to render a view to display the home page. */
Route::get('/', [NavigationController::class, 'welcome'])->name('/');

/* 
  _   _     __      _______ _____       _______ _____ ____  _   _ 
 | \ | |   /\ \    / |_   _/ ____|   /\|__   __|_   _/ __ \| \ | |
 |  \| |  /  \ \  / /  | || |  __   /  \  | |    | || |  | |  \| |
 | . ` | / /\ \ \/ /   | || | |_ | / /\ \ | |    | || |  | | . ` |
 | |\  |/ ____ \  /   _| || |__| |/ ____ \| |   _| || |__| | |\  |
 |_| \_/_/    \_\/   |_____\_____/_/    \_|_|  |_____\____/|_| \_|
                                                                  
  * The below routes define HTTP endpoints to interact with the navigation bar. */

//This route uses a GET request to render a view to display the about page.
Route::get('/about', [NavigationController::class, 'about'])->name('navigation.about');

/* 
  _____ _______ ______ __  __  _____   _____   ____  _    _ _______ ______  _____ 
 |_   _|__   __|  ____|  \/  |/ ____| |  __ \ / __ \| |  | |__   __|  ____|/ ____|
   | |    | |  | |__  | \  / | (___   | |__) | |  | | |  | |  | |  | |__  | (___  
   | |    | |  |  __| | |\/| |\___ \  |  _  /| |  | | |  | |  | |  |  __|  \___ \ 
  _| |_   | |  | |____| |  | |____) | | | \ \| |__| | |__| |  | |  | |____ ____) |
 |_____|  |_|  |______|_|  |_|_____/  |_|  \_\\____/ \____/   |_|  |______|_____/ 

 * The below routes define HTTP endpoints to interact with items. 
 * Each route is mapped to its respective method, better known as a controller action, inside ItemController. */

//This route uses a GET request to render a view to display all items persisted in the database.
Route::get('/items', [ItemController::class, 'index'])->name('items.index');

//This route uses a GET request to render a view to create a new item by interacting with a form.
Route::get('/items/create', [ItemController::class, 'create'])->name('items.create');

/* This route uses a POST request to validate the data furnished by the user. 
 * Upon successful validation checks, persist a new item to the database.
 * Otherwise, the user is redirected to items.create to fix errors and re-submit. */
Route::post('/items', [ItemController::class, 'store'])->name('items.store');

/* This route uses a GET request to render a view to display a single item persisted in the database,
 * accepting a dynamic parameter with the name id which uniquely identifies each item.
 * Upon supplying a valid id, the user is redirected to a page containing information pertaining to the item bearing this id. */
Route::get('/items/{id}', [ItemController::class, 'show'])->name('items.show');

//This route uses a GET request to render a view with a form to edit an existing item based on the id supplied.
Route::get('/items/{id}/edit', [ItemController::class, 'edit'])->name('items.edit');

/* This route uses a PUT request to validate the data furnished by the user.
 * Upon successful validation checks, update the item in the database.
 * Otherwise, the user is redirected to items.edit to fix errors and re-submit. */
Route::put('/items/{id}', [ItemController::class, 'update'])->name('items.update');

//This route uses a DELETE request to remove an item from the database based on the id supplied.
Route::delete('/items/{id}', [ItemController::class, 'destroy'])->name('items.destroy');

/* 
   _____       _______ ______ _____  ____  _____  _____ ______  _____   _____   ____  _    _ _______ ______  _____ 
  / ____|   /\|__   __|  ____/ ____|/ __ \|  __ \|_   _|  ____|/ ____| |  __ \ / __ \| |  | |__   __|  ____|/ ____|
 | |       /  \  | |  | |__ | |  __| |  | | |__) | | | | |__  | (___   | |__) | |  | | |  | |  | |  | |__  | (___  
 | |      / /\ \ | |  |  __|| | |_ | |  | |  _  /  | | |  __|  \___ \  |  _  /| |  | | |  | |  | |  |  __|  \___ \ 
 | |____ / ____ \| |  | |___| |__| | |__| | | \ \ _| |_| |____ ____) | | | \ \| |__| | |__| |  | |  | |____ ____) |
 \_____/_/    \_|_|  |______\_____|\____/|_|  \_|_____|______|_____/  |_|  \_\\____/ \____/   |_|  |______|_____/ 
                                                                                                                   
 * The below routes define HTTP endpoints to interact with categories.
 * Each route is mapped to its respective method, better known as a controller action, inside CategoryController. */

//This route uses a GET request to render a view to display all categories persisted in the database.
Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');

//This route uses a GET request to render a view to create a new category by interacting with a form.
Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');

/* This route uses a POST request to validate the data furnished by the user. 
 * Upon successful validation checks, persist a new category to the database.
 * Otherwise, the user is redirected to categories.create to fix errors and re-submit. */
Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');

//This route uses a GET request to render a view with a form to edit an existing category based on the id supplied.
 Route::get('/categories/{id}/edit', [CategoryController::class, 'edit'])->name('categories.edit');

/* This route uses a PUT request to validate the data furnished by the user.
 * Upon successful validation checks, update the category in the database.
 * Otherwise, the user is redirected to categories.edit to fix errors and re-submit. */
Route::put('/categories/{id}', [CategoryController::class, 'update'])->name('categories.update');

//This route uses a DELETE request to remove a category from the database based on the id supplied.
Route::delete('/categories/{id}', [CategoryController::class, 'destroy'])->name('categories.destroy');

/* 
          _    _ _______ _    _ ______ _   _ _______ _____ _____       _______ _____ ____  _   _ 
     /\  | |  | |__   __| |  | |  ____| \ | |__   __|_   _/ ____|   /\|__   __|_   _/ __ \| \ | |
    /  \ | |  | |  | |  | |__| | |__  |  \| |  | |    | || |       /  \  | |    | || |  | |  \| |
   / /\ \| |  | |  | |  |  __  |  __| | . ` |  | |    | || |      / /\ \ | |    | || |  | | . ` |
  / ____ | |__| |  | |  | |  | | |____| |\  |  | |   _| || |____ / ____ \| |   _| || |__| | |\  |
 /_/    \_\____/   |_|  |_|  |_|______|_| \_|  |_|  |_____\_____/_/    \_|_|  |_____\____/|_| \_|
                                                                                                 
  * The below routes define HTTP endpoints related to user authentication and registration. */

//This route uses a GET request to render a view to display a form for user registration.
Route::get('/register', [AuthenticationController::class, 'register'])->name('authentication.register');

/* This route uses a POST request to validate the data furnished by the user. 
 * Upon successful validation checks, persist a new user to the database. 
 * Otherwise, the user is redirected to authentication.register to fix errors and re-submit. */
Route::post('/register', [AuthenticationController::class, 'register_post'])->name('authentication.register_post');

//This route uses a GET request to render a view to display a form for user login.
Route::get('/login', [AuthenticationController::class, 'login'])->name('authentication.login');

//This route uses a POST request to authenticate a user based on the credentials supplied.
Route::post('/login', [AuthenticationController::class, 'authenticate'])->name('authentication.authenticate');

//This route uses a GET request to log out a user.
Route::get('logout', [AuthenticationController::class, 'logout'])->name('authentication.logout');

/* 
  _____  _____   ____  ______ _____ _      ______ 
 |  __ \|  __ \ / __ \|  ____|_   _| |    |  ____|
 | |__) | |__) | |  | | |__    | | | |    | |__   
 |  ___/|  _  /| |  | |  __|   | | | |    |  __|  
 | |    | | \ \| |__| | |     _| |_| |____| |____ 
 |_|    |_|  \_\\____/|_|    |_____|______|______|
                                                  
  * The below route uses a GET request to render a view to display the profile of an authenticated user. */
Route::get('/profile/{id}', [ProfileController::class, 'index'])->name('profile.index');