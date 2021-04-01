<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\SecretController;

Route::get('/secrets', [SecretController::class, 'index']);

// Customers
Route::get('/customers', [CustomerController::class, 'list']);

// Invoices
Route::get('/invoices', [InvoiceController::class, 'list']);
Route::post('/invoices/generate', [InvoiceController::class, 'generate']);
Route::get('/invoices/random', [InvoiceController::class, 'random']);