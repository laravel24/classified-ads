<?php

namespace App\Http\Controllers\Category;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\{Area, Category};

class CategoriesController extends Controller {

  public function index(Area $area) {
    $categories = Category::get()->toTree();
    return view('categories.index', compact('categories'));
  }

}
