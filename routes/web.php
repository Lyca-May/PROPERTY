<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\PropertyController;

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
    return view('login');
});
Route::get('/register', function () {
    return view('register');
});
Route::get('/forgot-pass', function () {
    return view('forgot-pass');
});

Route::get('/dash-prop', function () {
    return view('property_division.dash-prop');
});
Route::get('/dash-accounting', function () {
    return view('accounting_division.dash-accounting');
});
Route::get('/stock-card-form', function () {
    return view('property_division.stock-card-form');
});


//AUTHENTICATION
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/reg-account', [AuthController::class, 'register'])->name('register');
Route::post('/forgot-account', [AuthController::class, 'resetPassword'])->name('password.reset');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

//PROPERTY DIVISION
Route::post('/add-stock-card', [PropertyController::class, 'addStockCard'])->name('add-stock-card');
Route::get('/all-forms', [PropertyController::class, 'getStockCards']);
Route::get('/view-slc/{id}', [PropertyController::class, 'viewSLC']);
Route::post('/edit-stock-card/{id}', [PropertyController::class, 'edit_stock_card']);


//ACCOUNTING DIVISION
Route::get('/all-slc', [PropertyController::class, 'getDataForSLC']);
Route::post('/edit-slc/{id}', [PropertyController::class, 'edit_SLC']);