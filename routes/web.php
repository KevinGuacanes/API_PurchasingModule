<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});


use Inertia\Inertia;

Route::get('/hola', function () {
    return Inertia::render('Hola'); // Renderiza la página Hola.jsx
});

use App\Http\Controllers\SupplierController;

Route::middleware(['web'])->group(function () {
    Route::get('suppliers', [SupplierController::class, 'index'])->name('suppliers.index');
});
