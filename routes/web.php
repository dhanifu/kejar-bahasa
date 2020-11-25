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

// Ini buat landing page aja
Route::get('/home', 'HomeController@index')->name('home');
// dan seterusnya


// user logged in
Route::name('user.')->middleware('role:user')->group(function(){
    // 
});


// Admin
Route::prefix('admin')->name('admin.')->middleware('role:admin')->group(function(){
    Route::get('/', 'Admin\DashboardController@dashboard')->name('home');
    Route::get('/home', 'Admin\DashboardController@dashboard')->name('home');

    Route::prefix('category')->name('category.')->group(function(){
        Route::get('/', 'Admin\CategoryController@index')->name('index');
        Route::post('/', 'Admin\CategoryController@store')->name('store');
        Route::put('/{categoryClass}/update', 'Admin\CategoryController@update')->name('update');
        Route::delete('/{categoryClass}/delete', 'Admin\CategoryController@destroy')->name('destroy');
    });
});
