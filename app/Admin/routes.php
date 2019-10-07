<?php
use Illuminate\Http\Request;
//Auth::routes();
//Route::namespace('App\Admin\Http\Controllers')->group(function () {
/*
Route::get('/', function () {
    return 'test';
});
*/
/*
Route::get('login', function() {
    return view('admin::auth.login');
    //return 'test';
})->name('admin.login');
*/
Route::get('login', 'Http\Controllers\Auth\AdminLoginController@showLoginForm')->name('admin.login');
Route::post('login', 'Http\Controllers\Auth\AdminLoginController@login')->name('admin.login.submit');
Route::post('logout', 'Http\Controllers\Auth\AdminLoginController@logout')->name('admin.logout');
//});
/*
Route::namespace('Http\Controllers')->middleware('auth:admin')->group(function () {
    Route::get('/', 'HomeController@index')->name('admin.home');
});
*/

Route::namespace('Http\Controllers')->middleware(['auth:admin'])->group(function () {

    //Route::get('/', function () {
    //    return 'test';
    //});

    Route::get('/', 'HomeController@index')->name('admin.dashboard');
    //Route::get('/home', 'HomeController@index');
    Route::resource('users', 'UserController');
    Route::resource('admins', 'AdminController');
    Route::resource('products', 'ProductController');
    Route::resource('categories', 'CategoryController');
    Route::resource('units', 'UnitController');
    Route::resource('banners', 'BannerController');
    Route::resource('shops', 'ShopController');
    Route::resource('orders', 'OrderController');
});
