<?php

namespace App\Http\Controllers\Listing;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\{Area, Category, Listing};

class ListingsController extends Controller {

  public function index(Area $area, Category $category) {
    $listings = Listing::with(['user', 'area'])->isLive()->inArea($area)->fromCategory($category)->latestFirst()->paginate(10);
    return view('listings.index', compact('listings', 'category'));
  }

}
