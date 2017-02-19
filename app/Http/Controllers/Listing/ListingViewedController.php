<?php

namespace App\Http\Controllers\Listing;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ListingViewedController extends Controller {

  const INDEX_LIMIT = 10;

  public function __construct() {
    return $this->middleware('auth');
  }

  public function index(Request $request) {
    $listings = $request->user()->viewedListings()->with(['area', 'user'])
      ->orderByPivot('updated_at', 'desc')
      ->isLive()
      ->take(self::INDEX_LIMIT)
      ->get();

    return view('user.listings.viewed.index', [
      'listings' => $listings,
      'indexLimit' => self::INDEX_LIMIT
    ]);
  }

}
