<?php

namespace App\Http\Controllers\Listing;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\{Area, Listing};
use App\Http\Requests\StoreListingShareFormRequest;

class ListingShareController extends Controller {

  public function __construct() {
    return $this->middleware('auth');
  }

  public function index(Area $area, Listing $listing) {
    return view('listings.share.index', compact('listing'));
  }

  public function store(StoreListingShareFormRequest $request) {

  }

}
