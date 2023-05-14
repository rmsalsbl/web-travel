<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TravelController;

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

Route::get('/', [HomeController::class, 'index']);
//menampilkan data
Route::get('/travel', [TravelController::class, 'index']);
//menampilkan data yang dipilih
Route::get('/travel/{id}', [TravelController::class, 'show']);
//mengarahkan untuk menampilkan tampilan create
Route::get('/travel/data/create', [TravelController::class, 'create']);
//menyimpan data ke db
Route::post('/travel', [TravelController::class, 'store']);
//menampilkan view form data edit
Route::get('/travel/{id}/edit', [TravelController::class, 'edit']);
//mengupdate data ke db
Route::put('/travel/{id}', [TravelController::class, 'update']);
// Route::put('edit/{travel}', 'TravelController@update')->name('update');
//delete data
Route::delete('/travel/{id}', [TravelController::class, 'destroy']);



Route::get('/', function () {
    return view('welcome');
});
