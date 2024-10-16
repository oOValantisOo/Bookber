<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;

Route::post('create-book', [BookController::class, 'store']->name('books.create'));
Route::get('get-book/{id}', [BookController::class, 'showBook'])->name('books.show');
Route::delete('delete-book/{id}', [BookController::class, 'deleteBook']->name('books.delete'));
