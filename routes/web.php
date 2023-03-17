<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'admin', 'namespace' => 'User'], function () {
    Route::get('/login', [AuthController::class, 'index'])->name('adminLogin');
    Route::post('/login', [AuthController::class, 'postLogin'])->name('adminLoginPost');
 
    // Route::group(['middleware' => 'adminauth'], function () {
    //     Route::get('/', function () {
    //         return view('welcome');
    //     })->name('adminDashboard');
 
    // });
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/invoice', [App\Http\Controllers\InvoiceController::class, 'index'])->name('invoice');
Route::get('/invoice/create', [App\Http\Controllers\InvoiceController::class, 'create'])->name('create-invoice-all');
Route::post('/invoice/create', [App\Http\Controllers\InvoiceController::class, 'store'])->name('create-invoice');
Route::get('/invoice/edit/{id}', [App\Http\Controllers\InvoiceController::class, 'edit'])->name('edit-invoice');


Route::get('/invoice/customer/{id}', [App\Http\Controllers\InvoiceController::class, 'getSelectedCustomer'])->name('customer-selected');

Route::post('/invoice/customer/create', [App\Http\Controllers\CustomerController::class, 'store'])->name('create-customer');
Route::get('/invoice/customer', [App\Http\Controllers\CustomerController::class, 'latestCustomer'])->name('latest-customer');



// Route::post('/invoice/create', [App\Http\Controllers\CustomerController::class, 'store'])->name('create-customer-invoice');

Route::post('/invoice/item/create', [App\Http\Controllers\ItemController::class, 'store'])->name('create-item');



