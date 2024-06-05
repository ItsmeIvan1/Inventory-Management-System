<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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