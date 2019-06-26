<?php

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
Route::get('/test', function () {
    return view('admin.index');
});

Route::prefix('admin')->middleware('admin')->group(function () {

    Route::get('/dashboard', function () {
        return view('admin.index');
    })->name('admin.index');

    Route::prefix('categories')->group(function () {
        Route::get('/list', 'CategoryController@index')->name('category.index');
        Route::get('/create', 'CategoryController@create')->name('category.create');
        Route::post('/create', 'CategoryController@store')->name('category.store');
        Route::get('/edit/{id}', 'CategoryController@edit')->name('category.edit');
        Route::put('/edit/{id}', 'CategoryController@update')->name('category.update');
        Route::delete('/destroy/{id}', 'CategoryController@destroy')->name('category.destroy');
    });

    Route::prefix('products')->group(function () {
        Route::get('/list', 'ProductController@index')->name('product.index');
        Route::get('/show/{id}', 'ProductController@show')->name('product.show');
        Route::get('/create', 'ProductController@create')->name('product.create');
        Route::post('/create', 'ProductController@store')->name('product.store');
        Route::get('/edit/{id}', 'ProductController@edit')->name('product.edit');
        Route::put('/edit/{id}', 'ProductController@update')->name('product.update');
        Route::delete('/destroy/{id}', 'ProductController@destroy')->name('product.destroy');
    });

});;

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/user/activation/{token}', 'Auth\RegisterController@userActivation');
