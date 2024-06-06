<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ScrapController;
use Illuminate\Support\Facades\Auth;
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
    // Define a route for the homepage, returning the 'app' layout view
Route::get('/', function () {
    return view('layouts.app');
});

// Define authentication routes with email verification disabled
Auth::routes(['verify' => false]);

// Group routes that require authentication middleware
Route::middleware(['auth', 'web'])->group(function () {

    // Defining routes for specific user operations
    Route::put('users/{userid}/change-password', [App\Http\Controllers\UserController::class, 'changePassword'])->name('users.changePassword');

    // Define resourceful routes for users and roles
    Route::resources(['users' => UserController::class]);
    Route::get('home', [HomeController::class, 'index'])->name('home');
    Route::post('updatestatus/{activityid}', [HomeController::class, 'statusupdate'])->name('updatestatus');

    // Route to show the upload form
    Route::get('/scrape', [ScrapController::class, 'index'])->name('scrape.index');

    // Route to handle the file upload
    Route::post('/scrape', [ScrapController::class, 'upload'])->name('scrape.upload');

});

