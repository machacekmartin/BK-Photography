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

//////////////////// PUBLIC ////////////////////
// Index
Route::get('/', 'PageController@index');
Route::get('/home', 'PageController@index');
Route::get('/index', 'PageController@index');
// Contact 
Route::get('/contact', 'PageController@contact');
// Gallery
Route::get('/gallery', 'PageController@gallery');


//////////////////// PRIVATE ////////////////////
Auth::routes();
Route::group(['middleware' => ['auth']], function() {
    Route::get('/admin', 'PageController@admin')->name('admin');

    // Categories
    Route::get('/admin/categories', 'CategoryController@index')->name('admin.categories');
    Route::post('/admin/categories', 'CategoryController@store')->name('admin.categories.store');
    Route::put('/admin/categories/{category}', 'CategoryController@update')->name('admin.categories.update');
    Route::get('/admin/categories/{category}/destroy', 'CategoryController@destroy')->name('admin.categories.destroy');
    
    // Albums
    Route::get('/admin/albums', 'AlbumController@index')->name('admin.albums');
    Route::post('/admin/albums', 'AlbumController@store')->name('admin.albums.store');
    Route::put('/admin/albums/{album}', 'AlbumController@update')->name('admin.albums.update');
    Route::get('/admin/albums/{album}/destroy', 'AlbumController@destroy')->name('admin.albums.destroy');
    // Images
    Route::get('/admin/images', 'ImageController@index')->name('admin.images');
});

