<?php

Route::get('/', 'HomeController@index');

Auth::routes();

Route::get('/user/area/{area}', 'User\AreaController@store')->name('user.area.store');
Route::get('/braintree/token', 'BraintreeController@token');

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
    Route::post('/{listing}/contact', 'ListingContactController@store')->name('listings.contact.store');

    Route::get('/{listing}/payment', 'ListingPaymentController@show')->name('listings.payment.show');
    Route::post('/{listing}/payment', 'ListingPaymentController@store')->name('listings.payment.store');
    Route::patch('/{listing}/payment', 'ListingPaymentController@update')->name('listings.payment.update');

    Route::group(['middleware' => 'auth'], function() {
      Route::get('/create', 'ListingsController@create')->name('listings.create');
      Route::post('/', 'ListingsController@store')->name('listings.store');

      Route::get('/{listing}/edit', 'ListingsController@edit')->name('listings.edit');
      Route::patch('/{listing}', 'ListingsController@update')->name('listings.update');
    });
  });

  Route::get('/{listing}', 'Listing\ListingsController@show')->name('listings.show');

});
