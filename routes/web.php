<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
    return view('auth.login');
});

Auth::routes();
Route::group(['middleware' => 'auth'], function() {
    Route::get('/home', 'HomeController@index')->name('home');

    // Users Info
    Route::get('/add-user', 'UserController@create')->name('user.create');
    Route::get('/user-list', 'UserController@index')->name('user.index');
    Route::post('/create-user', 'UserController@store')->name('user.store');

    // Category Info
    Route::get('/category-list', 'AssetCategoryController@index')->name('asset_category.index');
    Route::post('/create-category', 'AssetCategoryController@store')->name('asset_category.store');

    // Asset Info
    Route::get('/add-asset', 'AssetController@create')->name('asset.create');
    Route::get('/asset-list', 'AssetController@index')->name('asset.index');
    Route::post('/create-asset', 'AssetController@store')->name('asset.store');
    
    // Allocation Info
    Route::get('/add-allocation', 'AllocationController@create')->name('allocation.create');
    Route::get('/allocation-list', 'AllocationController@index')->name('allocation.index');
    Route::post('/create-allocation', 'AllocationController@store')->name('allocation.store');
    Route::get('/remaining-asset', 'AllocationController@remainingAsset')->name('allocation.remaining_asset');

});