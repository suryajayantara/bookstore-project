<?php

use App\Http\Controllers\BookController;
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

Route::get('/', [BookController::class,'booksViews'])->name('books');
Route::get('/authors', [BookController::class,'authorsView'])->name('authors');
Route::get('/ratings', [BookController::class,'rating'])->name('ratings');
Route::post('/rating', [BookController::class, 'storeRating'])->name('ratings.store');


