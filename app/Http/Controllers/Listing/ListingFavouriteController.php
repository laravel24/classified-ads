<?php

namespace App\Http\Controllers\Listing;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

Use App\{Area, Listing};

class ListingFavouriteController extends Controller {

  public function __construct() {
    return $this->middleware('auth');
  }

  public function index(Request $request) {
    $listings = $request->user()->favouriteListings()->with(['user', 'area'])->paginate(10);
    return view('user.listings.favourites.index', compact('listings'));
  }

  public function store(Request $request, Area $area, Listing $listing) {
    $request->user()->favouriteListings()->syncWithoutDetaching([$listing->id]);
    return back()->withSuccess('Listing added to favourites');
  }

  public function destroy(Request $request, Area $area, Listing $listing) {
    $request->user()->favouriteListings()->detach($listing);
    return back()->withSuccess('Listing removed from favourites');
  }

}
