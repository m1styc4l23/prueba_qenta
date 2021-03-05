<?php

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

/*Route::get('/', function () {
    return view('home');
});*/


use App\Http\Controllers\PlayerController;

//listar jugadores
Route::get('/', [PlayerController::class, 'index'])->name('players')/*->middleware('auth')*/;


//Route::resources('/', [ApiController::class, 'index'])/*->middleware('auth')*/;


Route::resource('players', PlayerController::class)->except(['create', 'destroy', 'store']);

