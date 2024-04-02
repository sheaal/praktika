<?php

use Src\Route;


Route::add('GET', '/hello', [Controller\Site::class, 'hello'])
    ->middleware('auth');
Route::add(['GET', 'POST'], '/signup', [Controller\Site::class, 'signup'])
    ->middleware('admin');
Route::add(['GET', 'POST'], '/login', [Controller\Site::class, 'login']);
Route::add('GET', '/logout', [Controller\Site::class, 'logout']);
Route::add('GET', '/search', [Controller\Site::class, 'search'])
    ->middleware('auth');
Route::add(['GET', 'POST'], '/add_book', [Controller\Site::class, 'addBook'])
    ->middleware('librarian');
Route::add(['GET', 'POST'], '/add_reader', [Controller\Site::class, 'addReader'])
    ->middleware('librarian');
Route::add('GET', '/add_librarian', [Controller\Site::class, 'addLibrarian'])
    ->middleware('auth');
Route::add('GET', '/selection', [Controller\Site::class, 'selection'])
    ->middleware('librarian');
Route::add(['GET', 'POST'], '/book_distribution', [Controller\Site::class, 'bookDistribution'])
    ->middleware('librarian');

