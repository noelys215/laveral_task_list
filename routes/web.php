<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return 'Main Page';
});

Route::get('/hello', function () {
    return 'Hello World';
})->name('hello');

ROute::get('/hallo', function () {
    return redirect('/hello')->route('hello');
});

Route::get('/greet/{name}', function ($name) {
    return 'Hello ' . $name;
});

Route::fallback(function () {
    return 'Where are you?';
});
