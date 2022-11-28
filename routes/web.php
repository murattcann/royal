<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\HomeController;
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
Route::get('/login', [AuthController::class, "index"])->name("login-page");
Route::post('/login-post', [AuthController::class, "login"])->name("login-post");

Route::group(["middleware" => ["apiAuth"]], function(){
    Route::get('/', [HomeController::class, "index"])->name("home-page");

    // === Authors ===
    Route::get('/authors', [AuthorController::class, "index"])->name("authors.index");
    Route::get('/authors/{authorId}', [AuthorController::class, "detail"])->name("authors.detail");
    Route::delete('/authors/{authorId}', [AuthorController::class, "delete"])->name("authors.delete");

    // === Books ===
    Route::get('/books', [BookController::class, "index"])->name("books.index");
    Route::get('/books/create', [BookController::class, "create"])->name("books.create");
    Route::post('/books', [BookController::class, "store"])->name("books.store");
    Route::delete('/books/{bookId}', [BookController::class, "delete"])->name("books.delete");

    Route::get("/logout", [AuthController::class, "logout"])->name("logout");
});
