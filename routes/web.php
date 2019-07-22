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
    return redirect('/index');
});

Route::get('/index', 'IndexController@index')->name('index');
Route::get('/product/{id}', 'IndexController@productDetail')->name('productDetail');
Route::get('/category', 'IndexController@getCategory')->name('getCategory');
Route::get('/category/{id}', 'IndexController@getProductByCategory')->name('getProductByCategory');

Route::get('/cart', 'CartController@getCart')->name('getCart');
Route::post('/addCart/{id}', 'CartController@addCart')->name('addCart');
Route::post('/addCartOne', 'CartController@addcartOne')->name('addcartOne');
Route::post('/updateCart', 'CartController@updateCart')->name('updateCart');
Route::get('/removeCart/{id}','CartController@removeCart')->where('id','[0-9]+')->name('removeCart');
Route::get('/orderConfirm', 'CartController@orderConfirm')->name('orderConfirm');
Route::post('/orderPay', 'CartController@orderPay')->name('orderPay');

Route::get('/order_manager/','HomeController@order_manager')->name('order_manager');
Route::get('/order_manager/details/{user_name}/{id}','HomeController@order_manager_detail')->name('order_manager_detail');

Route::get('/profile/','HomeController@profile_manager')->name('profile_manager');
Route::put('/profile/{id}','HomeController@update_profile_manager')->name('update_profile_manager');

Route::get('/change-password/','HomeController@change_password')->name('change_password');
Route::put('/change-password/{id}','HomeController@update_change_password')->name('update_change_password');

Route::get('/search', 'searchController@index')->name('search.index');
Route::get('autocomplete', ['as'=>'autocomplete', 'uses'=>'searchController@autocomplete']);

Route::group(['prefix'=>'admin','middleware'=>'adminPage'],function () {

    Route::get('/dashboard', 'AdminController@index')->name('admin.index');

    Route::group(['prefix'=>'categories','middleware'=>'admin'],function () {
        Route::get('/list', 'CategoryController@index')->name('category.index');
        Route::get('/create', 'CategoryController@create')->name('category.create');
        Route::post('/create', 'CategoryController@store')->name('category.store');
        Route::get('/edit/{id}', 'CategoryController@edit')->name('category.edit');
        Route::put('/edit/{id}', 'CategoryController@update')->name('category.update');
        Route::delete('/destroy/{id}', 'CategoryController@destroy')->name('category.destroy');
        Route::get('/search', 'CategoryController@search')->name('category.search');
    });

    Route::group(['prefix'=>'products','middleware'=>'admin'],function () {
        Route::get('/list', 'ProductController@index')->name('product.index');
        Route::get('/show/{id}', 'ProductController@show')->name('product.show');
        Route::get('/create', 'ProductController@create')->name('product.create');
        Route::post('/create', 'ProductController@store')->name('product.store');
        Route::get('/edit/{id}', 'ProductController@edit')->name('product.edit');
        Route::put('/edit/{id}', 'ProductController@update')->name('product.update');
        Route::delete('/destroy/{id}', 'ProductController@destroy')->name('product.destroy');
        Route::get('/search', 'ProductController@search')->name('product.search');
        Route::get('/images/{id}', 'ProductController@showImage')->name('product.getImage');
        Route::delete('/destroy/image/{id}', 'ProductController@destroyImage')->name('product.destroyImage');
        Route::get('/add/image/{id}', 'ProductController@createImage')->name('product.createImage');
        Route::post('/add/image/{id}', 'ProductController@storeImage')->name('product.storeImage');
        Route::put('/edit/image/{id}', 'ProductController@updateImage')->name('product.updateImage');
    });

    Route::group(['prefix'=>'users','middleware'=>'admin'],function () {
        Route::get('/list', 'UserController@index')->name('user.index');
        Route::get('/show/{id}', 'UserController@show')->name('user.show');
        Route::get('/create', 'UserController@create')->name('user.create');
        Route::post('/create', 'UserController@store')->name('user.store');
        Route::get('/edit/{id}', 'UserController@edit')->name('user.edit');
        Route::put('/edit/{id}', 'UserController@update')->name('user.update');
        Route::delete('/destroy/{id}', 'UserController@destroy')->name('user.destroy');
        Route::get('/search', 'UserController@search')->name('user.search');

        Route::post('/decentralization/{id}', 'UserController@decentralization')->name('user.decentralization');
    });

    Route::group(['prefix'=>'orders'],function () {
        Route::get('/list', 'OrderController@index')->middleware('admin')->name('order.index');
        Route::get('/show/{id}', 'OrderController@show')->name('order.show');
        Route::get('/search', 'OrderController@search')->name('order.search');

        Route::delete('/cancel/{id}', 'OrderController@cancel')->middleware('admin')->name('order.cancel');
        Route::get('/cancel', 'OrderController@getCancel')->middleware('admin')->name('order.getCancel');
        Route::post('/cancel/{id}', 'OrderController@restoreOrders')->middleware('admin')->name('order.restore');

        Route::get('/processing', 'OrderController@getProcessing')->middleware('admin')->name('order.getProcessing');
        Route::put('/processing/{id}', 'OrderController@processing')->middleware('admin')->name('order.processing');

        Route::get('/export', 'OrderController@getExportOrder')->middleware('admin')->name('order.getExport');
        Route::put('/export/{id}', 'OrderController@exportOrder')->middleware('admin')->name('order.export');

        Route::get('/shipped', 'OrderController@getShippedOrder')->middleware('adminPage')->name('order.getShipped');
        Route::put('/shipped/{id}', 'OrderController@shippedOrder')->middleware('adminPage')->name('order.shipped');
    });

    Route::group(['prefix'=>'comments','middleware'=>'admin'],function () {
        Route::get('/list', 'CommentController@index')->name('comment.index');
        Route::get('/show/{product_id}', 'CommentController@show')->name('comment.show');
        Route::post('/comment/{product_id}', 'CommentController@store')->name('comment.store');
        Route::delete('/destroy/{product_id}/{user_id}/{content}', 'CommentController@destroy')->name('comment.destroy');
    });

});;

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/user/activation/{token}', 'Auth\RegisterController@userActivation');
