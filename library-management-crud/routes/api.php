<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\BorrowedBookController;

Route::apiResource('books', BookController::class);
Route::apiResource('members', MemberController::class);
Route::apiResource('borrowed-books', BorrowedBookController::class);
