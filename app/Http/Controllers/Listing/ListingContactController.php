<?php

namespace App\Http\Controllers\Listing;

use Mail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\{Area, Listing};
use App\Http\Requests\StoreListingContactFormRequest;
use App\Mail\ListingContactCreated;

class ListingContactController extends Controller {

  public function __construct() {
    return $this->middleware('auth');
  }

  public function store(StoreListingContactFormRequest $request, Area $area, Listing $listing) {
    Mail::to($listing->user)->queue(
      new ListingContactCreated($listing, $request->user(), $request->message)
    );

    return back()->withSuccess("We have sent your message to: {$listing->user->name}");
  }

}
