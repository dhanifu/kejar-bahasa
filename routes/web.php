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

Auth::routes();


Route::name('user.')->group(function(){
    Route::get('/', 'PagesController@welcome')->name('welcome');
    Route::get('/about-us', 'PagesController@about')->name('about');
    Route::get('/contact', 'PagesController@contact')->name('contact');

    Route::get('/dashboard', 'HomeController@index')->middleware('role:user')->name('home');
    
    Route::prefix('class')->name('class.')->group(function(){
        Route::get('/', 'ClassController@index')->name('index');
        Route::get('/{code}', 'ClassController@class')->name('class');
        Route::post('/{class}/buy', 'ClassController@beli')->middleware('role:user')->name('beli');
        Route::get('/{class}/{module}/', 'ClassController@module')->name('module');
    });
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

    Route::prefix('class')->name('class.')->group(function(){
        Route::get('/', 'Admin\ClassController@index')->name('index');
        Route::get('/new', 'Admin\ClassController@create')->name('create');
        Route::post('/new', 'Admin\ClassController@store')->name('store');
        Route::get('/{classs}', 'Admin\ClassController@show')->name('show');
        Route::get('/{classs}/edit', 'Admin\ClassController@edit')->name('edit');
        Route::put('/{classs}/update', 'Admin\ClassController@update')->name('update');
        Route::delete('/{classs}/delete', 'Admin\ClassController@destroy')->name('destroy');

        Route::prefix('{id}/modules')->name('module.')->group(function(){
            Route::get('/', 'Admin\ClassController@showModule')->name('index');
            Route::get('/new', 'Admin\ClassController@newModule')->name('create');
            Route::post('/new', 'Admin\ClassController@storeModule')->name('store');
            Route::get('/{module}', 'Admin\ClassController@previewModule')->name('show');
            Route::get('/{module}/preview', 'Admin\ClassController@previewModule')->name('show');
            Route::get('/{module}/edit', 'Admin\ClassController@editModule')->name('edit');
            Route::put('/{module}/edit', 'Admin\ClassController@updateModule')->name('update');
            Route::delete('/{module}/delete', 'Admin\ClassController@deleteModule')->name('destroy');
        });
    });

    Route::prefix('module')->name('module.')->group(function(){
        Route::get('/', 'Admin\ModuleController@index')->name('index');
        Route::get('/new', 'Admin\ModuleController@create')->name('create');
        Route::post('/new', 'Admin\ModuleController@store')->name('store');
        Route::get('/{module}/preview', 'Admin\ModuleController@show')->name('show');
        Route::get('/{module}/edit', 'Admin\ModuleController@edit')->name('edit');
        Route::put('/{module}/edit', 'Admin\ModuleController@update')->name('update');
        Route::delete('/{module}/delete', 'Admin\ModuleController@destroy')->name('destroy');
    });

    Route::prefix('profile')->name('profile.')->group(function(){
        Route::get('/', 'Admin\ProfileController@index')->name('index');
        Route::put('/{user}/update', 'Admin\ProfileController@update')->name('update');
        Route::patch('/change-password', 'Admin\ProfileController@changePassword')->name('changePassword');
    });

    Route::prefix('about')->name('about.')->group(function(){
        Route::get('/', 'Admin\AboutController@index')->name('index');
        Route::get('/{about}/preview', 'Admin\AboutController@show')->name('show');
        Route::get('/{about}/edit', 'Admin\AboutController@edit')->name('edit');
        Route::put('/{about}/update', 'Admin\AboutController@update')->name('update');
        
    });

    Route::prefix('reports')->name('report.')->group(function(){
        Route::get('/', 'Admin\ReportController@index')->name('index');
        Route::get('/pdf/{daterange}', 'Admin\ReportController@reportPdf')->name('pdf');
    });
});
