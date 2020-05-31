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

    Route::get('/admin/categories/{category}/destroy', 'CategoryController@destroy');

    // Albums
    Route::get('/admin/albums', 'AlbumController@index')->name('admin.albums');
    // Images
    Route::get('/admin/images', 'ImageController@index')->name('admin.images');
});

