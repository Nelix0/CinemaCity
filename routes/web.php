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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/', [App\Http\Controllers\WebController::class, 'index'])->name('index');

Route::get('/afisha', [App\Http\Controllers\WebController::class, 'afisha'])->name('afisha');
Route::get('/account', [App\Http\Controllers\WebController::class, 'account'])->name('account');
Route::get('/schedule/{date?}', [App\Http\Controllers\WebController::class, 'schedule'])->name('schedule');
Route::get('/card/{id}', [App\Http\Controllers\WebController::class, 'card'])->name('card');

Route::post('/buy', [App\Http\Controllers\WebController::class, 'buy'])->name('buy')->middleware('auth');

Route::get('/admin/films', [App\Http\Controllers\WebController::class, 'films'])->name('admin.films')->middleware('auth');
Route::post('/admin/films/add', [App\Http\Controllers\WebController::class, 'addFilm'])->name('admin.films.addFilm');
Route::get('/admin/films/delete/{id}', [App\Http\Controllers\WebController::class, 'deleteFilm']);
Route::post('/admin/films/update/{id}', [App\Http\Controllers\WebController::class, 'updateFilm']);


Route::get('/admin/sessions', [App\Http\Controllers\WebController::class, 'sessions'])->name('admin.sessions')->middleware('auth');
Route::post('/admin/sessions/add', [App\Http\Controllers\WebController::class, 'addSession'])->name('admin.sessions.addSession');
Route::get('/admin/sessions/delete/{id}', [App\Http\Controllers\WebController::class, 'deleteSession']);




