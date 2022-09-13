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

Route::prefix('advertisement')->group(function() {
    Route::resource('AdverCategory', 'AdvertisementCategoryController');
    Route::post('AdverCategory-sort', 'AdvertisementCategoryController@sort_item')->name('AdverCategory-sort');
    Route::resource('AdverProperty', 'AdvertisementPropertyController');
    Route::resource('advertisement', 'AdvertisementController');
    Route::get('advertisement/{advertisement}/confirm', 'AdvertisementController@confirm')->name('advertisement.confirm');
    Route::post('advertisement/reject', 'AdvertisementController@reject')->name('advertisement.reject');
});
