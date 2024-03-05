<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CashierController;
use App\Http\Controllers\StokBarangController;
use App\Http\Controllers\SesiController;


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
Route::middleware(['guest'])->group(function(){
    Route::get('/', [SesiController::class, 'index'])->name('login');
    Route::post('/', [SesiController::class, 'login']);
});

 Route::get('/home', function(){
     return redirect('/StokBarang');
 });


Route::middleware(['auth'])->group(function(){
    // Route::get('/Cashier', [CashierController::class, 'index'])->middleware('userAkses:Cashier');
});
Route::resource('/Cashier', \App\Http\Controllers\CashierController::class);
// Route::get('/StokBarang', [StokBarangController::class, 'index'])->middleware('userAkses:StokBarang');
Route::resource('/StokBarang', \App\Http\Controllers\StokBarangController::class);
Route::get('/logout', [SesiController::class, 'logout']);

Route::get('/print',[ App\Http\Controllers\CashierController::class, 'print'])->name('print');