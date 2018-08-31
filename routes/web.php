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

use App\Models\Category;

Route::get('/', function () {

    $cats = Category::with('devices.breakings')->get();

    return view('calc', [
        'cats' => $cats,
    ]);
});

Route::group(['prefix'=>'admin','middleware'=>'auth'], function() {

    Route::resource('categories','CategoryController');
    Route::resource('breakings', 'BreakingController');
    Route::resource('devices', 'DeviceController');
    Route::post('devices/set_order', 'DeviceController@setOrder');
    Route::get('/', 'AdminController@index')->name('admin');
    Route::get('/showPasswordForm', 'AdminController@showPasswordForm')->name('showPasswordForm');
    Route::post('/showPasswordForm', 'AdminController@changePassword');
});

Auth::routes();

Route::get('/admin', 'AdminController@index')->name('admin');
