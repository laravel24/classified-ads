<?php

Route::get('/', 'HomeController@index');

Auth::routes();

Route::get('/user/area/{area}', 'User\AreaController@store')->name('user.area.store');
Route::group(['prefix' => '/{area}'], function() {

  /**
   * Category
   */
  Route::group(['prefix' => '/categories'], function() {
    Route::get('/', 'Category\CategoriesController@index')->name('category.index');

    Route::group(['prefix' => '/{category}'], function() {
      Route::get('/listings', 'Listing\ListingsController@index')->name('listings.index');
    });
  });

  /**
   * Listings
   */
  Route::get('/{listing}', 'Listing\ListingsController@show')->name('listings.show');

});
