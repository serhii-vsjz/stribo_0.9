<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Category;
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
Auth::routes(['verify' => true]);

Route::get('/admin', function () {
    return view('admin');
});

Route::get('/user', function () {
    return view('user');
})->name('user');

/*for verified email*/
/*->middleware('verified')*/

Route::get('/', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/contacts', function () {
    return view('home.contacts');
})->name('contacts');

Route::get('/about', function () {
    return view('home.about');
})->name('about');

Route::get('category', 'CategoryController@index')->name('category.index');
Route::get('category/create/{category?}', 'CategoryController@create')->name('category.create');
Route::post('category', 'CategoryController@store')->name('category.store');
Route::get('category/{category}', 'CategoryController@show')->name('category.show');
Route::get('category/{category}/edit', 'CategoryController@edit')->name('category.edit');
Route::put('category/{category}', 'CategoryController@update')->name('category.update');
Route::delete('category/{category}', 'CategoryController@destroy')->name('category.destroy');

Route::get('product/{category?}', 'ProductController@index')->name('product.index');
Route::get('product/create/{category}', 'ProductController@create')->name('product.create');
Route::post('product', 'ProductController@store')->name('product.store');
Route::get('product/show/{product}', 'ProductController@show')->name('product.show');
Route::get('product/{product}/edit', 'ProductController@edit')->name('product.edit');
Route::put('product/{product}', 'ProductController@update')->name('product.update');
Route::delete('product/{product}', 'ProductController@destroy')->name('product.destroy');




