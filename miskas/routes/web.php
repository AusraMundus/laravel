<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AnimalController as A;
use App\Http\Controllers\CalculatorController as C;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ColorController as R;

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

// trumpesnis uzrasymas: 'App\Http\Controllers\AnimalController' -> A::class

Route::get('/animals', [A::class, 'animals']);

// kai irasymas per parametra - kintamasis i {}
// {color?} - su klaustuku optional parametrai
Route::get('/animals/racoon/{color?}', [A::class, 'racoon']);


// Calculator
Route::get('/calculator', [C::class, 'showCalculator'])->name('calculator');
Route::post('/calculator', [C::class, 'doCalculator'])->name('do-calculator');

// Route grupavimas
Route::prefix('colors')->name('colors-')->group(function () {
    Route::get('/', [R::class, 'index'])->name('index'); // GET /colors from URL: colors Name: colors-index
    Route::get('/create', [R::class, 'create'])->name('create'); // GET /colors/create from URL: colors/create Name: colors-create
    Route::post('/', [R::class, 'store'])->name('store'); // POST /colors from URL:  colors Name: colors-store
});



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
