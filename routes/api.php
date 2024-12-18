<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InvoiceDetailController;
use App\Http\Controllers\Api\SupplierController;

Route::get('suppliers', [SupplierController::class, 'index']); 

use App\Http\Controllers\Api\PurchaseInvoiceController;
Route::get('/purchase-invoices/detailed', [PurchaseInvoiceController::class, 'getDetailedInvoices']);
