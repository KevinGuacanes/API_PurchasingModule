<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Hola'); // Renderiza la página Hola.jsx
});




Route::get('/hola', function () {
    return Inertia::render('Hola'); // Renderiza la página Hola.jsx
});

