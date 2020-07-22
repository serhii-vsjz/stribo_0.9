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
Auth::routes(['verify' => true]);

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
Route::get('category/active/{category}', 'CategoryController@active')->name('category.active');
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
Route::delete('product/{id}', 'ProductController@destroy')->name('product.destroy');

//
//Route::middleware('can:is_admin')->group(function () {
//
//});
//
Route::get('admin', 'AdminController@index')->name('admin.index')->middleware('can:is_admin');
Route::get('admin/admins', 'AdminController@admins')->name('admin.admins');
Route::get('admin/charts', 'AdminController@charts')->name('admin.charts');
Route::get('admin/buttons', 'AdminController@buttons')->name('admin.buttons');
Route::get('admin/users', 'AdminController@users')->name('admin.users');

Route::get('admin/colors', 'AdminController@colors')->name('admin.colors');
Route::get('admin/borders', 'AdminController@borders')->name('admin.borders');
Route::get('admin/animations', 'AdminController@animations')->name('admin.animations');
Route::get('admin/other', 'AdminController@other')->name('admin.other');

// work with users
Route::get('admin/user/{user}/active','AdminController@userActive')->name('admin.user.active');

// work with product/categories
Route::get('admin/categories', 'AdminController@categories')->name('admin.categories');
Route::get('admin/products', 'AdminController@products')->name('admin.products');
Route::get('admin/category/{category}', 'AdminController@categoryShow')->name('admin.category.show');


Route::post('admin/category/{category}/products/edit', 'AdminController@productsEdit')->name('admin.products.edit');
Route::post('admin/category/{category}/products/update', 'AdminController@productsUpdate')->name('admin.products.update');

Route::post('admin/products/upload', 'AdminController@productsUpload')->name('admin.products.upload');
Route::post('admin/categories/upload', 'AdminController@categoriesUpload')->name('admin.categories.upload');


