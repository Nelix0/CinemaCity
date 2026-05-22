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
Route::get('/about', [App\Http\Controllers\WebController::class, 'about'])->name('about');

Route::get('/feedbacks', [App\Http\Controllers\WebController::class, 'feedbacks'])->name('feedbacks');
Route::post('/feedbacks', [App\Http\Controllers\WebController::class, 'feedback_form'])->name('feedback_form');



Route::get('/user', [App\Http\Controllers\WebController::class, 'user'])->name('user');


Route::get('/articles', [App\Http\Controllers\WebController::class, 'articles'])->name('articles');

Route::get('/catalog', [App\Http\Controllers\WebController::class, 'catalog'])->name('catalog');

Route::get('/cart', [App\Http\Controllers\WebController::class, 'cart'])->name('cart');

Route::get('/contacts', [App\Http\Controllers\WebController::class, 'contacts'])->name('contacts');

Route::get('/show', [App\Http\Controllers\WebController::class, 'show'])->name('show');

Route::get('/show/{id}', [App\Http\Controllers\WebController::class, 'show'])->name('show');


Route::post('/cart/add/{id}', [App\Http\Controllers\WebController::class, 'cart_add'])->name('cart.add');

Route::get('/buy/{id}', [App\Http\Controllers\WebController::class, 'buy'])->name('buy');

Route::post('/cart/update/{id}', [App\Http\Controllers\WebController::class, 'cart_update'])->name('cart.update');

Route::delete('/cart/remove/{id}', [App\Http\Controllers\WebController::class, 'cart_remove'])->name('cart.remove');

Route::post('/buy/cart',[App\Http\Controllers\WebController::class, 'buy_cart'])->name('buy.cart');

Route::post('/repeat-order/{id}', [App\Http\Controllers\WebController::class, 'repeatOrder'])->name('repeat.order');




Route::get('/admin/products', [App\Http\Controllers\WebController::class, 'products']);

Route::post('/admin/products/add', [App\Http\Controllers\WebController::class, 'add'])->name('admin.products.add');

Route::post('/admin/products/update/{id}', [App\Http\Controllers\WebController::class, 'update']);

Route::get('/admin/products/delete/{id}', [App\Http\Controllers\WebController::class, 'delete']);


Route::get('/admin/sales', [App\Http\Controllers\WebController::class, 'sales']);

Route::post('/admin/sales/addSales', [App\Http\Controllers\WebController::class, 'addSales'])->name('admin.sales.addSales');

Route::post('/admin/sales/updateSales/{id}', [App\Http\Controllers\WebController::class, 'updateSales']);

Route::get('/admin/sales/deleteSales/{id}', [App\Http\Controllers\WebController::class, 'deleteSales']);




Route::get('/admin/articlesAdmin', [App\Http\Controllers\WebController::class, 'articlesAdmin']);
Route::post('/admin/articles/add', [App\Http\Controllers\WebController::class, 'addArticle'])->name('admin.articles.add');
Route::post('/admin/articles/update/{id}', [App\Http\Controllers\WebController::class, 'updateArticle']);
Route::get('/admin/articles/delete/{id}', [App\Http\Controllers\WebController::class, 'deleteArticle']);


Route::get('/admin/feedbacksAdmin', [App\Http\Controllers\WebController::class, 'feedbacksAdmin']);
Route::get('/admin/feedbacks/delete/{id}', [App\Http\Controllers\WebController::class, 'deleteFeedback']);
