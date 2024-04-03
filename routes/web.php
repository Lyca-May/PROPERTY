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

Route::get('/dash-prop', [PropertyController::class , 'countCard']);
Route::get('/dash-accounting', function () {
    return view('accounting_division.dash-accounting');
});
Route::get('/stock-card-form', function () {
    return view('property_division.stock-card-form');
});
Route::get('/property-card-form', function () {
    return view('property_division.property-card-form');
});

//AUTHENTICATION
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/reg-account', [AuthController::class, 'register'])->name('register');
Route::post('/forgot-account', [AuthController::class, 'resetPassword'])->name('password.reset');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// PROPERTY DIVISION
// stock card
Route::post('/add-stock-card', [PropertyController::class, 'addStockCard'])->name('add-stock-card');
Route::get('/all-forms', [PropertyController::class, 'getStockCards']);
Route::get('/view-slc/{id}', [PropertyController::class, 'viewSLC']);
Route::get('/printable-stock-page/{id}', [PropertyController::class, 'printStockPage']);
Route::get('/printable-stock-pageAcc/{id}', [PropertyController::class, 'printStockPageAcc']);
Route::post('/edit-stock-card/{id}', [PropertyController::class, 'edit_stock_card']);

// property card
Route::post('/add-property-card', [PropertyController::class, 'addPropertyCard'])->name('add-property-card');
Route::get('/all-property', [PropertyController::class, 'getPropertyCards']);
Route::get('/view-ppelc/{id}', [PropertyController::class, 'viewPPELC']);
Route::get('/printable-prop-page/{id}', [PropertyController::class, 'printPropPage']);
Route::get('/printable-prop-pageAcc/{id}', [PropertyController::class, 'printPropPageAcc']);
Route::post('/edit-property-card/{id}', [PropertyController::class, 'edit_property_card']);

// semi-expandable card
Route::post('/add-semi-card', [PropertyController::class, 'addSemi'])->name('add-semi-card');
Route::view('/all-semi-expandable', 'property_division.SEC');
Route::view('/sec-form', 'property_division.SEC-form');

//ACCOUNTING DIVISION
// stock card
Route::get('/all-slc', [PropertyController::class, 'getDataForSLC']);
Route::post('/edit-slc/{id}', [PropertyController::class, 'edit_SLC']);
//ppelc
Route::get('/all-ppelc', [PropertyController::class, 'getDataForPPELC']);
Route::post('/edit-ppelc/{id}', [PropertyController::class, 'edit_PPELC']);

// semi-expandable ledger card
Route::view('/all-semi-expandable-ledger', 'accounting_division.SELC');

