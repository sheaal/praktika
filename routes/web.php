<?php

use Src\Route;


Route::add('GET', '/hello', [Controller\Site::class, 'hello'])
    ->middleware('auth');
Route::add(['GET', 'POST'], '/signup', [Controller\Site::class, 'signup']);
Route::add(['GET', 'POST'], '/login', [Controller\Site::class, 'login']);
Route::add('GET', '/logout', [Controller\Site::class, 'logout']);
Route::add('GET', '/search', [Controller\Site::class, 'search']);
Route::add(['GET', 'POST'], '/add_book', [Controller\Site::class, 'addBook']);
Route::add('GET', '/add_reader', [Controller\Site::class, 'addReader']);
Route::add('GET', '/add_librarian', [Controller\Site::class, 'addLibrarian']);
Route::add('GET', '/selection', [Controller\Site::class, 'selection']);

