<?php

use Illuminate\Http\Request;

//Auth::routes();

// Authentication Routes...

Route::get('login', 'Http\Controllers\Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Http\Controllers\Auth\LoginController@login')->name('login.submit');
Route::post('logout', 'Http\Controllers\Auth\LoginController@logout')->name('logout');

// Registration Routes...
Route::get('register', 'Http\Controllers\Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Http\Controllers\Auth\RegisterController@register');

// Password Reset Routes...
Route::get('password/reset', 'Http\Controllers\Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Http\Controllers\Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Http\Controllers\Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Http\Controllers\Auth\ResetPasswordController@reset')->name('password.update');




//Route::namespace('App\Frontend')->group(function () {

    
    Route::get('/about', function () {
        return view('frontend::pages.about');
    })->name('about');
    
    

    /*Route::get('/', function () {
        return view('home');
    });
    */

    Route::get('/', 'Http\Controllers\HomeController@index')->name('home');
    Route::get('/home','Http\Controllers\HomeController@Home');

    /*
    Route::get('/products/{product_id}', function() {
      return view('frontend::products.product_detail');
    })->name('product-detail')->where('id', '[0-9]+');
    */
    Route::get('/products/{id}', ['as'=>'product.show', 'uses'=>'Http\Controllers\ProductController@show' ])->where('id', '[0-9]+');

    Route::get('/cart', ['as'=>'cart', 'uses'=>'Http\Controllers\CartController@index']);
    Route::post('/add-cart/{id}', ['as'=>'add-cart', 'uses'=>'Http\Controllers\CartController@addCart']);
    Route::post('/update-cart/{id}/{qty}', ['as'=>'update-cart', 'uses'=>'Http\Controllers\CartController@updateCart']);
    Route::post('/rm-cart/{id}', ['as'=>'rm-cart', 'uses'=>'Http\Controllers\CartController@removeCart']);
    Route::get('/delete-cart', ['as'=>'delete-cart', 'uses'=>'Http\Controllers\CartController@clearCart']);




    Route::get('/checkout', ['as'=>'checkout', 'uses'=>'Http\Controllers\CheckoutController@index']);

    Route::get('/checkout/completed', ['as'=>'checkout-completed', 'uses'=>'Http\Controllers\CheckoutController@index_completed']);

    /*
    Route::get('/search', function () {
        return view('frontend::products.search');
    })->name('search');
    */
    Route::get('/search', ['as'=>'search', 'uses'=>'Http\Controllers\ProductController@index']);


//});

Route::group(['middleware' => ['auth']], function() {

    Route::get('/my/account', 'Http\Controllers\MyAccountController@show')->name('my.account');
    Route::get('/my/profile', 'Http\Controllers\MyAccountController@profile_show')->name('my.profile');

});
