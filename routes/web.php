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
  Route::group(['prefix' => '/listings', 'namespace' => 'Listing'], function() {
    Route::get('/favourites', 'ListingFavouriteController@index')->name('listings.favourites.index');
    Route::post('/{listing}/favourites', 'ListingFavouriteController@store')->name('listings.favourites.store');
    Route::delete('/{listing}/favourites', 'ListingFavouriteController@destroy')->name('listings.favourites.destroy');

    Route::get('/viewed', 'ListingViewedController@index')->name('listings.viewed.index');
    Route::post('/contact', 'ListingContactController@store')->name('listings.contact.store');
  });

  Route::get('/{listing}', 'Listing\ListingsController@show')->name('listings.show');

});
