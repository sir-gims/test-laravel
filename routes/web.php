<?php

use App\Http\Controllers\FilterController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::get('/', function () {
//    return view('welcome');
//});

Route::middleware(['autheapi'])->group(function (){

    Route::get('/home', [FilterController::class, 'index' ])->name('home');
    Route::get('/filter', [FilterController::class, 'filter' ])->name('filter');
});
