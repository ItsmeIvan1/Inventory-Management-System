<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SupplierController;

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


Route::get('/', [UserController::class, 'index'])->name('login');

Route::get('/create-account', [UserController::class, 'createAccount'])->name('create-account');

Route::post('/create', [UserController::class, 'insertUserAccount'])->name('create');

Route::post('/email-checker', [UserController::class, 'checkEmailInDB'])->name('findEmail');

Route::post('/clickLogin', [UserController:: class, 'login'])->name('clickLogin');

Route::get('/index', [UserController:: class, 'indexAfterLogin'])->middleware('auth')->name('index');

Route::post('/logout', [UserController:: class, 'logout'])->name('logout');

// Supplier
Route::get('/Supplier', [SupplierController:: class, 'index'])->name('index_supplier');

//Supplier insert
Route::post('/create-supplier', [SupplierController:: class, 'storeSupplier'])->name('create-supplier');

//capture the supplier
Route::post('/capture-supplier/{id}', [SupplierController:: class, 'captureSupplierInModal'])->name('capture');

//update the supplier
Route::put('/update-supplier/{id}', [SupplierController:: class, 'updateSupplierInModal'])->name('update');

//update the supplier
Route::put('/disabled-supplier-status/{id}', [SupplierController:: class, 'disabledSupplier'])->name('disabled-status');

//update the supplier
Route::put('/retrieved-supplier-status/{id}', [SupplierController:: class, 'retrievedUser'])->name('retrieved-status');


