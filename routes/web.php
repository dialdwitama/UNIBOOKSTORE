<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\PublisherController;
use Illuminate\Support\Facades\Route;

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
// VIEW
Route::view('/', 'ujikom.layouts.main');

// GET
Route::get('/ujikom/reports', [BookController::class, 'reports']);

// RESOURCES
Route::resources([
    '/ujikom/books' => BookController::class,
    '/ujikom/publishers' => PublisherController::class
]);