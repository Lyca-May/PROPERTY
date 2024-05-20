<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\PPELC_Controller;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PropCardExtension_Controller;
use App\Http\Controllers\StockCardExtension_Controller;
use App\Http\Controllers\SemiExtension_Controller;
use App\Http\Controllers\SEPLC_Controller;

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

Route::get('/dash-accounting', [PropertyController::class , 'countCardAccounting']);
Route::get('/dash-prop', [PropertyController::class , 'countCard']);

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
Route::post('/clicked-stock-card/{id}', [PropertyController::class, 'clickSC']);

// property card
Route::post('/add-property-card', [PropertyController::class, 'addPropertyCard'])->name('add-property-card');
Route::get('/all-property', [PropertyController::class, 'getPropertyCards']);
Route::get('/view-ppelc/{id}', [PropertyController::class, 'viewPPELC']);
Route::get('/printable-prop-page/{id}', [PropertyController::class, 'printPropPage']);
Route::get('/printable-prop-pageAcc/{id}', [PropertyController::class, 'printPropPageAcc']);
Route::get('/printable-sepc-page/{id}', [PropertyController::class, 'printSEPPage']);
Route::post('/edit-property-card/{id}', [PropertyController::class, 'edit_property_card']);
Route::post('clicked-sep/{id}', [PropertyController::class, 'clickSep']);

// semi-expandable card
Route::post('/add-semi-card', [PropertyController::class, 'addSemiPropertyCard'])->name('add-sep-card');
Route::get('/all-semi-expandable', [PropertyController::class, 'getDataForSEPC']);
Route::view('/sec-form', 'property_division.SEC-form');
Route::post('/edit-sep-card/{id}', [PropertyController::class, 'edit_sep_card']);
Route::post('/clicked-property-card/{id}', [PropertyController::class, 'clickPc']);

//ACCOUNTING DIVISION
// stock card
Route::get('/all-slc', [PropertyController::class, 'getDataForSLC']);
Route::post('/edit-slc/{id}', [PropertyController::class, 'edit_SLC']);
Route::get('/get-stock-data/{id}', [PropertyController::class, 'getStockEditData']);
Route::post('/update-stock-data/{id}', [PropertyController::class, 'saveEditedData']);
Route::delete('/delete-stock-data/{id}', [PropertyController::class, 'deleteStock']);


//ppelc
Route::get('/all-ppelc', [PropertyController::class, 'getDataForPPELC']);
// Route::post('/edit-ppelc-card/{id}', [PropertyController::class, 'edit_PPELC']);
Route::get('/get-ppelc-data/{id}', [PPELC_Controller::class, 'getPPELCData']);
Route::post('/update-ppelc-data/{id}', [PPELC_Controller::class, 'updatePPELC']);
Route::get('/get-ppelc-ext-data/{id}', [PPELC_Controller::class, 'getPPELC_EXTData']);
Route::post('/update-ppelcext-data/{id}', [PPELC_Controller::class, 'updatePPELCext']);
Route::get('/getPropAdjCost/{id}', [PPELC_Controller::class, 'getLatestData']);
Route::get('/getPropExtAdjCost/{propId}', [PPELC_Controller::class, 'getPropExtData']);





// semi-expandable ledger card
Route::get('/all-semi-expandable-ledger', [PropertyController::class, 'getDataForSELC']);
Route::get('/get-latest-adj-cost', [SEPLC_Controller::class, 'getLatestAdjCost']);
// Route::post('/add-seplc-data', [SEPLC_Controller::class, 'createSEPLC']);
Route::post('/update-seplc-data/{id}', [SEPLC_Controller::class, 'updateSEPLC']);
Route::post('/update-seplcext-data/{id}', [SEPLC_Controller::class, 'updateSEPLCext']);
Route::get('/get-seplc-data/{id}', [SEPLC_Controller::class, 'getSEPLCData']);
Route::get('/get-seplc-ext-data/{id}', [SEPLC_Controller::class, 'getSEPLC_EXTData']);
Route::get('/getLatestData/{id}', [SEPLC_Controller::class, 'getLatestData']);




// users
Route::get('/all-users', [UserController::class, 'getUsers']);

//prop ext
Route::post('/add-prop-extension', [PropCardExtension_Controller::class, 'addPropExt']);
Route::get('/get-prop-ext-data/{id}', [PropCardExtension_Controller::class, 'getPropExtData']);
Route::post('/update-prop-ext-data/{id}', [PropCardExtension_Controller::class, 'saveEditedData']);
Route::delete('/delete-propext-data/{id}', [PropCardExtension_Controller::class, 'deletePropExt']);
Route::get('/get-issue-qty/propertycard', [PropCardExtension_Controller::class, 'getOfficerIssueQty']);
Route::get('/get-latest-issue-row', [PropCardExtension_Controller::class, 'getLatestIssueRow']);
Route::get('/get-prop-id', [PropCardExtension_Controller::class, 'getPropID']);
Route::get('/get-disposal-issue-qty', [PropCardExtension_Controller::class, 'getDisposalIssueQty']);

//semiext
Route::post('/add-semi-extension', [SemiExtension_Controller::class, 'addSemiExt']);
Route::get('/get-semi-ext-data/{id}', [SemiExtension_Controller::class, 'getSemiExtData']);
Route::post('/update-semi-ext-data/{id}', [SemiExtension_Controller::class, 'saveEditedData']);
Route::delete('/delete-semiext-data/{id}', [SemiExtension_Controller::class, 'deleteSemiExt']);
Route::get('/get-issue-qty/semicard', [SemiExtension_Controller::class, 'getOfficerIssueQty']);
Route::get('/get-latest-issue', [SemiExtension_Controller::class, 'getLatestIssueRow']);
Route::get('/get-semi-id', [SemiExtension_Controller::class, 'getSemiID']);
Route::get('/get-disposal-issue-qty', [SemiExtension_Controller::class, 'getDisposalIssueQty']);


//stock ext
Route::post('/add-stock-extension', [StockCardExtension_Controller::class, 'addStockExt']);
Route::get('/get-stock-ext-data/{id}', [StockCardExtension_Controller::class, 'getStockExtData']);
Route::post('/update-stock-ext-data/{id}', [StockCardExtension_Controller::class, 'saveEditedData']);
Route::delete('/delete-stockext-data/{id}', [StockCardExtension_Controller::class, 'deleteStockExt']);

//slc
Route::get('/get-slc-data/{id}', [StockCardExtension_Controller::class, 'getSLCData']);
Route::post('/update-slc-data/{id}', [StockCardExtension_Controller::class, 'updateSLC']);
Route::get('/get-slc/{id}', [StockCardExtension_Controller::class, 'getStockData']);
Route::post('/update-slc/{id}', [StockCardExtension_Controller::class, 'saveEditedData']);
